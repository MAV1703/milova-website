<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Order;

class Status extends Model
{
    public function orders()
	{
		return $this->hasMany(Order::class);
	}
}
