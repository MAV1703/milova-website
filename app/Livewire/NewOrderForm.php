<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use App\Models\Order;
use App\Models\File;
use App\Models\User;
use UnseenCodes\Chat\Models\Conversation;



class NewOrderForm extends Component
{
	public $name='';
	public $description='';
	public $phone='';
	public $files=[];
	public $notes='';
	
	public $rules = ['name'=>'nullable|max:100', 'description'=>'required|max:1000' ,  'phone'=>'required|regex:/^[0-9]{11}$/', 'notes'=>'nullable|max:1000'];
	
	public function mount()
	{
		$this->name = session('order_form.name', '');
		$this->description = session('order_form.description', '');
		$this->phone = session('order_form.phone', '');
		$this->notes = session('order_form.notes', '');
	}

	public function updated($property)
	{
    if (in_array($property, ['name', 'description', 'phone', 'notes'])) 
		{
			session(['order_form.' . $property => $this->$property]);
		}
	}
	
	public function makeOrder()
{
$this->validate();

		$order = Order::where('user_id', auth()->id())->where('status_id', 1)->first();

		if ($order) {
			$order->status_id = 2;
			$order->name = $this->name;
			$order->description = $this->description;
			$order->phone = $this->phone;
			$order->notes = $this->notes;
		} else {
			$order = Order::create([
				'user_id' => auth()->id(),
				'name' => $this->name,
				'description' => $this->description,
				'phone' => $this->phone,
				'notes' => $this->notes,
				'status_id' => 2,
			]);
		}

		if (! $order->conversation_id) {
			$admin = User::where('status', 'admin')->first();
			$conversation = Conversation::create(['type' => 'private']);

			DB::table('chat_participants')->insert([
				[
					'conversation_id' => $conversation->id,
					'participantable_id' => auth()->id(),
					'participantable_type' => 'App\Models\User',
					'created_at' => now(),
					'updated_at' => now(),
				],
				[
					'conversation_id' => $conversation->id,
					'participantable_id' => $admin->id,
					'participantable_type' => 'App\Models\User',
					'created_at' => now(),
					'updated_at' => now(),
				],
			]);

			$order->conversation_id = $conversation->id;
		}

		$order->save();

		if (! empty($this->files)) {
			foreach ($this->files as $file) {
				$originalName = $file['name'];
				$name = time() . '-' . $originalName;
				$temporaryPath = $file['path'];
				$newPath = public_path('uploads/' . $name);
				copy($temporaryPath, $newPath);
				$order->files()->create([
					'name' => $originalName,
					'path' => 'uploads/' . $name,
				]);
			}
		}

		try {
			$adminId = config('services.max.admin_user_id');
			if ($adminId) {
				$link = url("/orders/{$order->id}");
				$text = "🆕 Новый заказ №{$order->id}\n"
					. "Клиент: " . (auth()->user()->name) . "\n"
					. "Телефон: " . ($order->phone) . "\n"
					. "🔗 Открыть: {$link}";

				app(\App\Services\MaxNotifier::class)->send((int) $adminId, $text);
			}
		} catch (\Throwable $e) {
			\Log::error('MAX notify failed', ['error' => $e->getMessage()]);
		}

		session()->forget('order_form');

		return redirect()->route('orders', $order->id);
}					
	
    public function render()
    {
        return view('livewire.new-order-form');
    }
}
