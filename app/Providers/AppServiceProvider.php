<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use UnseenCodes\Chat\Livewire\ChatBox;

use UnseenCodes\Chat\Models\Message;

use App\Observers\MessageObserver;

use Livewire\Livewire;

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
