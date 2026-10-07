<?php

namespace App\Jobs;

use App\Models\Order;
use App\Services\YooKassaService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldBeUnique;


class CheckYooKassaPayment implements ShouldQueue, ShouldBeUnique
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function __construct(public int $orderId) {}

    public function handle(): void
    {
        $order = Order::find($this->orderId);

        if (! $order || ! $order->payment_id) {
            return;
        }

        if ($order->payment_status === 'succeeded') {
            return;
        }

        $service = app(YooKassaService::class);
        $result = $service->getPayment($order->payment_id);

        $order->update(['payment_status' => $result['status']]);

        if ($result['status'] === 'succeeded') {
            if ($order->status_id == 3) {
                $order->update(['status_id' => 4]);
            } elseif ($order->status_id == 6) {
                $order->update(['status_id' => 7]);
            }

            $order->update(['payment_id' => null]);
        }

    }
	
	public function uniqueId(): string
    {
        return 'check-payment-' . $this->orderId;
    }
    
    public function uniqueFor(): int
    {
        return 60; // блокировка на 60 секунд
    }
}

