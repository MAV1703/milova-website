<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use App\Models\Order;
use App\Jobs\CheckYooKassaPayment;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

// Проверка оплат — каждую минуту
Schedule::call(function () {
    $orders = Order::whereIn('status_id', [3, 6])
        ->whereNotNull('payment_id')
        ->get();

    foreach ($orders as $order) {
        CheckYooKassaPayment::dispatch($order->id);
    }
})->everyMinute()->name('check-yookassa-payments')->withoutOverlapping();