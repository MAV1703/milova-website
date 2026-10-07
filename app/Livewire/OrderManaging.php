<?php

namespace App\Livewire;

use App\Services\YooKassaService;
use Carbon\Carbon;
use Livewire\Component;

class OrderManaging extends Component
{
    public $chatingOrder;

    public $orderStatus;

    public $deadline;

    public $price;

    public $remainingAmount;

    protected $listeners = ['upload' => 'render'];

    public function mount($chatingOrder)
    {
        $this->chatingOrder = $chatingOrder;
        $this->orderStatus = $chatingOrder->status_id;
        $this->deadline = $chatingOrder->deadline ? $chatingOrder->deadline->format('d.m.Y') : null;
        $this->price = $chatingOrder->price;
        $this->remainingAmount = $chatingOrder->price ? $chatingOrder->price / 2 : null;
    }

    public function changeStatus($action)
    {
        if ($this->chatingOrder->is_canceled == false) {
            if ($action == 'back') {
                $this->orderStatus = max(2, $this->orderStatus - 1);
            } elseif ($action == 'forward') {
                $this->orderStatus = min(7, $this->orderStatus + 1);
            }
            $this->chatingOrder->status_id = $this->orderStatus;
            $this->chatingOrder->save();
            $this->dispatch('upload', $this->chatingOrder->id)->to('OrderInList');
            $this->dispatch('upload', $this->chatingOrder->id)->to('ChatAndOrders');
        }
    }

    public function setConditions()
    {
        $this->validate(['deadline' => 'required|date_format:d.m.Y', 'price' => 'required|numeric|min:0'],
            [
                'deadline.required' => 'Укажите срок сдачи заказа',
                'deadline.date_format' => 'Введите дату в формате ДД.ММ.ГГГГ',
                'price.required' => 'Укажите стоимость заказа',
                'price.numeric' => 'Цена должна быть числом',
                'price.min' => 'Цена не может быть отрицательной',
            ]);
        $this->chatingOrder->price = $this->price;
        $this->chatingOrder->deadline = Carbon::createFromFormat('d.m.Y', $this->deadline);
        $this->chatingOrder->save();
    }

    public function createInvoice()
    {
        $amount = $this->price / 2; // 50% предоплата

        $service = app(YooKassaService::class);
        $result = $service->createPayment(
            $amount,
            "Предоплата 50% по заказу №{$this->chatingOrder->id}",
            url("/orders/{$this->chatingOrder->id}")
        );

        $this->chatingOrder->update([
            'payment_id' => $result['id'],
            'payment_url' => $result['url'],
            'payment_status' => $result['status'],
            'status_id' => 3,
        ]);

        $this->chatingOrder->refresh();
        $this->orderStatus = $this->chatingOrder->status_id;

        $this->dispatch('invoice-created');
    }

    public function createRemainingInvoice()
    {
        $this->validate([
            'remainingAmount' => 'required|numeric|min:1',
        ]);

        $service = app(YooKassaService::class);
        $result = $service->createPayment(
            $this->remainingAmount,
            "Остаток по заказу №{$this->chatingOrder->id}",
            url("/orders/{$this->chatingOrder->id}")
        );

        $this->chatingOrder->update([
            'payment_id' => $result['id'],
            'payment_url' => $result['url'],
            'payment_status' => $result['status'],
            'status_id' => 6,
        ]);

        $this->chatingOrder->refresh();
        $this->orderStatus = $this->chatingOrder->status_id;

        $this->dispatch('invoice-created');
        $this->dispatch('upload', $this->chatingOrder->id)->to('OrderInList');
        $this->dispatch('upload', $this->chatingOrder->id)->to('ChatAndOrders');
    }

	public function refreshPaymentLink()
	{

    if (auth()->user()->status !== 'client' || !in_array($this->chatingOrder->status_id, [3, 6])) {
        return;
    }


    $amount = $this->chatingOrder->status_id == 3
        ? $this->chatingOrder->price / 2
        : $this->chatingOrder->price / 2;


    $service = app(\App\Services\YooKassaService::class);
    $result = $service->createPayment(
        $amount,
        "Повторный счёт по заказу №{$this->chatingOrder->id}",
        url("/orders/{$this->chatingOrder->id}")
    );


    $this->chatingOrder->update([
        'payment_id' => $result['id'],
        'payment_url' => $result['url'],
        'payment_status' => $result['status'],
    ]);

    $this->dispatch('invoice-created');
	}
    public function render()
    {
		$this->chatingOrder->refresh();
		$this->orderStatus = $this->chatingOrder->status_id;
        return view('livewire.order-managing', ['orderStatus' => $this->orderStatus]);
    }
}
