<?php

namespace App\Services;

use YooKassa\Client;

class YooKassaService
{
    protected Client $client;

    public function __construct()
    {
        $this->client = new Client;
        $this->client->setAuth(
            config('services.yookassa.shop_id'),
            config('services.yookassa.secret_key')
        );
    }

    public function createPayment(float $amount, string $description, string $returnUrl): array
    {
        $payment = $this->client->createPayment([
            'amount' => ['value' => number_format($amount, 2, '.', ''), 'currency' => 'RUB'],
            'confirmation' => ['type' => 'redirect', 'return_url' => $returnUrl],
            'capture' => true,
            'description' => $description,
        ], uniqid('order_', true));

        return [
            'id' => $payment->getId(),
            'status' => $payment->getStatus(),
            'url' => $payment->getConfirmation()->getConfirmationUrl(),
        ];
    }

    public function getPayment(string $paymentId): array
    {
        $payment = $this->client->getPaymentInfo($paymentId);

        return [
            'id' => $payment->getId(),
            'status' => $payment->getStatus(),
        ];
    }
}
