<?php

namespace App\Observers;

use App\Jobs\NotifyUnreadMessage;
use App\Models\Order;
use App\Models\User;
use UnseenCodes\Chat\Models\Message;

class MessageObserver
{
    public function created(Message $message): void
    {
        $adminMaxId = (int) config('services.max.admin_user_id');

        $order = Order::where('conversation_id', $message->conversation_id)->first();
        if (! $order) {
            return;
        }

        $sender = User::find($message->sender_id);
        if (! $sender) {
            return;
        }

        if ($sender->status !== 'admin') {
            // Клиент → уведомить админа
            if (! $adminMaxId) {
                return;
            }
            $recipientId = $adminMaxId;
            $recipientUserId = null;
        } else {
            // Админ → уведомить клиента
            $client = User::find($order->user_id);
            if (! $client || ! $client->max_user_id) {
                return;
            }
            $recipientId = (int) $client->max_user_id;
            $recipientUserId = $client->id;
        }

        NotifyUnreadMessage::dispatch(
            $message->id,
            $recipientId,
            $recipientUserId,
            $sender->status,
        )->delay(now()->addHour());
    }
}