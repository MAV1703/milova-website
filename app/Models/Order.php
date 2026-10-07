<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['user_id', 'name', 'description', 'phone', 'notes', 'status_id', 'deadline', 'payment_id', 'payment_url', 'payment_status'];

    protected $casts = ['deadline' => 'date'];

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
