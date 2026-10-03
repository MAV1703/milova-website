<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\Order;

class Conversation extends Model
{
    protected $table = 'chat_conversations';
	
	public function order()
	{
		return $this->belongsTo(Order::class);
	}
}
