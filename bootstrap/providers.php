<?php

use App\Providers\AppServiceProvider;
use App\Providers\VoltServiceProvider;
use UnseenCodes\Chat\Providers\ChatServiceProvider;

return [
    AppServiceProvider::class,
    VoltServiceProvider::class,
    ChatServiceProvider::class,
];
