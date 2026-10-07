<?php

namespace App\Livewire;

use App\Models\Order;
use Livewire\Component;
use UnseenCodes\Chat\Models\Conversation;
use UnseenCodes\Chat\Models\Message;

class OrderInList extends Component
{
    public $order;

    public $chatingOrder;

    public $conversation;

    public $messages;

    protected $listeners = ['upload' => 'uploadOrderItem'];

    public function mount($order, $chatingOrder)
    {
        $this->order = $order;
        $this->chatingOrder = $chatingOrder;

        $this->conversation = $order->conversation_id
            ? Conversation::find($order->conversation_id)
            : null;

        $this->messages = $this->conversation
            ? Message::where('conversation_id', $this->conversation->id)->get()
            : collect();
    }

    public function uploadOrderItem($changedOrderId)
    {
        if ($this->order->id == $changedOrderId) {
            $this->order = Order::find($changedOrderId);
            $this->dispatch('order-selected')->to('chat-and-orders');
        }
    }

    public function render()
    {
        return view('livewire.order-in-list');
    }
}
