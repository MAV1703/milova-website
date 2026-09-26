<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Order;
use App\Models\User;
use Livewire\Attributes\On;

class ChatAndOrders extends Component
{
    public $orders;
    public $chatingOrder;
    public $orderAuthor;
    public $filtered;
    public bool $showChatOnMobile = false;

    protected $listeners = ['upload' => 'uploadOrder'];

    public function mount($orders, $chatingOrder, $filtered)
    {
        $this->orders = $orders;
        $this->chatingOrder = $chatingOrder;
        $this->orderAuthor = User::find($chatingOrder->user_id);
        $this->filtered = $filtered;

        // Открывать чат сразу, если в URL есть ?openChat=1
        $this->showChatOnMobile = request()->boolean('openChat', false);
    }

	#[On('close-chat-on-mobile')]
	public function closeChatOnMobile(): void
	{
		$this->showChatOnMobile = false;
	}


    public function uploadOrder()
    {
        return $this->render();
    }

    public function render()
    {
        return view('livewire.chat-and-orders');
    }
}