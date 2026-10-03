<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class MaxNotifier
{
    public function send(int $userId, string $text): bool
    {
        $url = config('services.max.api_url') . '/messages?user_id=' . $userId;

        $response =  Http::withOptions([
        'verify' => base_path(config('services.max.ca_cert')),
        'proxy'  => '',
		])
		->withHeaders([
        'Authorization' => config('services.max.token'),
		])
    ->post($url, ['text' => $text]);

        if ($response->failed()) {
            Log::error('MAX send failed', [
                'user_id' => $userId,
                'status' => $response->status(),
                'body' => $response->body(),
				
            ]);
            return false;
        }

        return true;
    }
}