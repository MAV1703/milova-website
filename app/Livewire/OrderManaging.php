<?php

namespace App\Livewire;

use Livewire\Component;

use Carbon\Carbon;

use App\Models\Order;

class OrderManaging extends Component
{
	
	public $chatingOrder;
	
	public $orderStatus;
	
	public $deadline;
	
	public $price;
	
	protected $listeners = ['upload'=>'render'];
	
	public function mount($chatingOrder )
	{
		$this->chatingOrder = $chatingOrder;
		$this->orderStatus = $chatingOrder->status_id;
		$this->deadline = $chatingOrder->deadline? $chatingOrder->deadline->format('d.m.Y') : null;
		$this->price = $chatingOrder->price;
	}
	
	public function changeStatus($action)
	{
		if($this->chatingOrder->is_canceled == false)
		{
			if($action == 'back')
			{
				$this->orderStatus = max(2, $this->orderStatus - 1);
			} elseif($action == 'forward')
			{
				$this->orderStatus = min(7, $this->orderStatus + 1);
			}
			$this->chatingOrder->status_id = $this->orderStatus;
			$this->chatingOrder->save();
			$this->dispatch('upload', $this->chatingOrder->id)->to('OrderInList');
			$this->dispatch('upload', $this->chatingOrder->id)->to('ChatAndOrders');
		}
	}
	
	public function setConditions()
	{
		$this->validate([        'deadline' => 'required|date_format:d.m.Y', 'price' => 'required|numeric|min:0',], 
		[
		'deadline.required' => 'Укажите срок сдачи заказа',
        'deadline.date_format' => 'Введите дату в формате ДД.ММ.ГГГГ',
		'price.required' => 'Укажите стоимость заказа',
        'price.numeric' => 'Цена должна быть числом',
        'price.min' => 'Цена не может быть отрицательной',
		]);
		$this->chatingOrder->price = $this->price;
		$this->chatingOrder->deadline = \Carbon\Carbon::createFromFormat('d.m.Y', $this->deadline);
		$this->chatingOrder->save();
	}
	
    public function render()
    {
        return view('livewire.order-managing', ['orderStatus'=>$this->orderStatus]);
    }
}
