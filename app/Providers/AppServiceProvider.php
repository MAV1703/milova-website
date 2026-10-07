<?php

namespace App\Providers;

use App\Observers\MessageObserver;
use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;
use UnseenCodes\Chat\Livewire\ChatBox;
use UnseenCodes\Chat\Models\Message;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Livewire::component('chat-box', ChatBox::class);
        Message::observe(MessageObserver::class);
    }
}
