<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\File;
use App\Models\Status;
use App\Models\Conversation;

class Order extends Model
{
    protected $fillable = ['user_id', 'name', 'description', 'phone', 'notes', 'status_id', 'deadline'];
    protected $casts = ['deadline'=>'date'];
	
	public function user()
	{
		return $this->belongsTo(User::class);
	}
	
	public function files()
	{
		return $this->morphMany(File::class, 'fileable');
	}
	
	public function conversation()
	{
		return $this->hasOne(Conversation::class);
	}
	
	public function status()
	{
		return $this->belongsTo(Status::class);
	}
}
