<?php

namespace App\Jobs;

use App\Models\Order;
use App\Models\User;
use App\Services\MaxNotifier;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use UnseenCodes\Chat\Models\Message;

class NotifyUnreadMessage implements ShouldBeUnique, ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function __construct(
        public string $messageId,
        public int $recipientId,
        public ?int $recipientUserId,
        public string $senderStatus,
    ) {}

    public function uniqueId(): string
    {
        return 'notify-recipient-'.$this->recipientId;
    }

    public function uniqueFor(): int
    {
        return 3600;
    }

    public function handle(): void
    {
        $message = Message::find($this->messageId);
        if (! $message) {
            return;
        }

        $order = Order::where('conversation_id', $message->conversation_id)->first();
        if (! $order) {
            return;
        }

        $sender = User::find($message->sender_id);
        if (! $sender) {
            return;
        }

        // Проверяем прочтение
        if ($this->isReadBy($message, $this->recipientUserId, $this->senderStatus)) {
            return;
        }

        $body = mb_substr((string) $message->body, 0, 300);
        $orderNum = $order->id;
        $senderLabel = $sender->status !== 'admin'
            ? ($sender->name ?: 'Клиент')
            : 'Веб-мастер';

        $link = url("/orders/{$orderNum}");

        $text = "💬 Новое сообщение в чате №{$orderNum}\n"
              ."От: {$senderLabel}\n"
              ."Текст: {$body}\n"
              ."🔗 Открыть: {$link}";

        app(MaxNotifier::class)->send($this->recipientId, $text);
    }

    protected function isReadBy(Message $message, ?int $userId, string $senderStatus): bool
    {
        if ($senderStatus !== 'admin') {
            // Получатель — админ
            $adminId = User::where('status', 'admin')->first()?->id;
            if (! $adminId) {
                return false;
            }

            return $message->readReceipts()->where('user_id', $adminId)->exists();
        }

        // Получатель — клиент
        if (! $userId) {
            return false;
        }

        return $message->readReceipts()->where('user_id', $userId)->exists();
    }
}
