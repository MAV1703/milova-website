<?php

namespace App\Http\Controllers;
use App\Models\Order;

use Illuminate\Http\Request;

class OrderDescriptionController extends Controller
{
    public function showOrderDetails($order)
	{
		$order = Order::with('user')->find($order);
		return view('orderDescription', ['order'=>$order, 'title'=>'Детали заказа' . $order->id]);
	}
}
