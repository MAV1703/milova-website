<?php

namespace App\Livewire;

use Livewire\Component;

use App\Models\Order;

class CancelOrder extends Component
{
	
	public $chatingOrder;
	
	protected $listeners = ['changeOrder'=>'changeChatingOrder'];
	
	public function mount($chatingOrder)
	{
		$this->chatingOrder = $chatingOrder;
	}
	
	public function canceleToggle()
	{
		$this->chatingOrder->is_canceled = !$this->chatingOrder->is_canceled;
		$this->chatingOrder->save();
		$this->dispatch('upload')->to('OrderManaging');
		$this->dispatch('upload', $this->chatingOrder->id)->to('OrderInList');
	}
	
	public function changeChatingOrder($newChatingOrderId)
	{
		$this->chatingOrder = Order::find($newChatingOrderId);
	}
	
    public function render()
    {
        return view('livewire.cancel-order');
    }
}
