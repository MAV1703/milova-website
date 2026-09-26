<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use UnseenCodes\Chat\Models\Conversation;
use UnseenCodes\Chat\Models\Message;
use Illuminate\Support\Facades\DB;
	
class NewChatFromMain extends Component
{
	public $name;
	public $message;
	
	public function sendMessage()
	{
		$this->validate([
        'name' => 'required|max:100',
        'message' => 'required|max:1000',
    ], ['name.required'=>'Как вас зовут?', 'name.max'=>'Превышен лимит символов', 'message.required'=>'О чём вы хотите спросить?', 'message..max'=>'Превышен лимит символов']);
	
	$user = auth()->user();

    if (!$user) {
        $guestId = request()->cookie('guest_id');
        $user = $guestId ? User::find($guestId) : null;
		auth()->login($user);
    }   
	

    if (!$user) {
        $user = User::create([
            'name' => $this->name,
            'status' => 'guest',
            'session_id' => session()->getId(),
        ]);
        cookie()->queue(cookie()->forever('guest_id', $user->id));
        auth()->login($user);
    }

    $admin = User::where('status', 'admin')->first();
	$conversationId = DB::table('chat_participants')
		->where('participantable_id', $user->id)
		->where('participantable_type', 'App\Models\User')
		->value('conversation_id');

	$conversation = $conversationId ? Conversation::find($conversationId) : null;

    if (!$conversation) {
        $conversation = Conversation::create(['type' => 'private']);
        DB::table('chat_participants')->insert([
            ['conversation_id' => $conversation->id, 'participantable_id' => $user->id, 'participantable_type' => 'App\Models\User', 'created_at' => now(), 'updated_at' => now()],
            ['conversation_id' => $conversation->id, 'participantable_id' => $admin->id, 'participantable_type' => 'App\Models\User', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }

    Message::create([
        'conversation_id' => $conversation->id,
        'sender_id' => $user->id,
        'body' => $this->message,
    ]);

    $this->reset(['name', 'message']);
    return redirect('orders');
	}
	
	public function render()
    {
        return view('livewire.new-chat-from-main');
    }
}
	
	
    
