<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Http;
use Livewire\Component;

class ConnectMax extends Component
{
    public $orderAuthor;

    public $chatingOrder;

    public bool $waiting = false;

    public function mount($orderAuthor, $chatingOrder)
    {
        $this->orderAuthor = $orderAuthor;

        $this->chatingOrder = $chatingOrder;
    }

    public function generate(): void
    {
        // Только клиент для своего заказа
        if (auth()->id() !== $this->chatingOrder->user_id) {
            abort(403);
        }

        $this->chatingOrder->max_link_code = $this->chatingOrder->id.'-'.strtoupper(\Str::random(4));
        $this->chatingOrder->save();
    }

    public function markAsSent(): void
    {
        $this->waiting = true;
    }

    public function deleteMaxId(): void
    {
        $isClient = auth()->id() === $this->chatingOrder->user_id;
        $isAdmin = auth()->user()->status === 'admin';

        if (! $isClient && ! $isAdmin) {
            abort(403);
        }

        $this->orderAuthor->max_user_id = null;
        $this->orderAuthor->save();

        $this->chatingOrder->max_link_code = null;
        $this->chatingOrder->save();
    }

    public function confirm(): void
    {
        if (auth()->user()->status !== 'admin') {
            abort(403);
        }

        $code = $this->chatingOrder->max_link_code;
        if (! $code) {
            $this->addError('confirm', 'Клиент не запрашивал подключение');

            return;
        }

        $userId = $this->findUserIdByCodeInMax($code);
        if (! $userId) {
            $this->addError('confirm', 'Клиент не написал боту код. Попросите его отправить сообщение.');

            return;
        }

        $this->orderAuthor->max_user_id = (string) $userId;
        $this->orderAuthor->save();

        $this->chatingOrder->max_link_code = null;
        $this->chatingOrder->save();
    }

    protected function findUserIdByCodeInMax(string $code): ?int
    {

        $response = Http::withOptions([
            'verify' => base_path(config('services.max.ca_cert')),
        ])
            ->withHeaders(['Authorization' => config('services.max.token')])
            ->timeout(10)
            ->get(config('services.max.api_url').'/updates', [
                'timeout' => 0,
            ]);

        if ($response->failed()) {
            \Log::error('MAX getUpdates failed', ['body' => $response->body()]);

            return null;
        }

        $updates = $response->json('updates') ?? [];

        foreach ($updates as $update) {
            if ($update['message']['sender']['is_bot'] ?? false) {
                continue;
            }

            $text = trim($update['message']['body']['text'] ?? '');
            $userId = $update['message']['sender']['user_id'] ?? null;

            if ($text && $userId && str_contains(strtoupper($text), strtoupper($code))) {
                return (int) $userId;
            }
        }

        return null;
    }

    public function render()
    {
        return view('livewire.connect-max');
    }
}
