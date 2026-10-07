<?php

namespace App\Livewire;

use Livewire\Component;
use UnseenCodes\Chat\Models\Conversation;

class ChatComponent extends Component
{
    public $conversation;

    public function mount($conversationId)
    {
        $this->conversation = Conversation::with(['participants', 'messages'])->find($conversationId);
    }

    public function render()
    {
        return view('livewire.chat-component', ['conversation' => $this->conversation]);
    }
}
