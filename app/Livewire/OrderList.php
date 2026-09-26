<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Order;
use UnseenCodes\Chat\Contracts\MessageServiceContract;
use UnseenCodes\Chat\Models\Conversation;

class OrderList extends Component
{

    public $orders;

    public $filter;

    public $filtered;

    public $chatingOrder;

    public function mount($orders, $chatingOrder, $filtered)
    {
        $this->orders = $orders;
        $this->chatingOrderId = $chatingOrder;
        $this->filtered = $filtered;
		$this->filter = session('orders.filter', 'all');
        if ($chatingOrder && $chatingOrder->conversation_id) {
            app(MessageServiceContract::class)->markAsRead(
                Conversation::find($chatingOrder->conversation_id),
                auth()->user()
            );
        }
    }

    public function filterOrders($value)
    {
        $this->filter = $value;
		session(['orders.filter' => $this->filter]);

    }


    public function render()
    {
        $filteredOrders = $this->orders;
        if ($this->filter == 'active') {
            $filteredOrders = $filteredOrders->where('status_id', '>=', 2)->where('status_id', '<', 7)->where('is_canceled', false);
            $this->filtered = true;

        } elseif ($this->filter == 'completed') {
            $filteredOrders = $filteredOrders->filter(function ($order) {
                return $order->status_id >= 7 || $order->is_canceled == 1;
            });
            $this->filtered = true;
        } else {
            $filteredOrders = $this->orders;
            $this->filtered = false;
        }

        return view('livewire.order-list', ['filtered' => $this->filtered, 'filteredOrders' => $filteredOrders, 'orders' => $this->orders]);
    }
}
