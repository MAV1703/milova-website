<?php

use App\Models\User;
use UnseenCodes\Chat\Models\Attachment;
use UnseenCodes\Chat\Models\Conversation;
use UnseenCodes\Chat\Models\Message;
use UnseenCodes\Chat\Models\Participant;
use UnseenCodes\Chat\Models\Reaction;
use UnseenCodes\Chat\Models\ReadReceipt;

return [

    /*
    |--------------------------------------------------------------------------
    | User Model
    |--------------------------------------------------------------------------
    */
    'user_model' => User::class,

    /*
    |--------------------------------------------------------------------------
    | Table Names
    |--------------------------------------------------------------------------
    | Change BEFORE running migrations. These are hardcoded in the migration
    | files — edit those files too after publishing if you change these.
    */
    'table_names' => [
        'conversations' => 'chat_conversations',
        'participants' => 'chat_participants',
        'messages' => 'chat_messages',
        'attachments' => 'chat_attachments',
        'reactions' => 'chat_reactions',
        'read_receipts' => 'chat_read_receipts',
    ],

    /*
    |--------------------------------------------------------------------------
    | Models — swap any with your own extended version
    |--------------------------------------------------------------------------
    */
    'models' => [
        'conversation' => Conversation::class,
        'participant' => Participant::class,
        'message' => Message::class,
        'attachment' => Attachment::class,
        'reaction' => Reaction::class,
        'read_receipt' => ReadReceipt::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Features — set false to hide from UI and skip service logic
    |--------------------------------------------------------------------------
    */
    'features' => [
        'attachments' => true,
        'reactions' => false,
        'read_receipts' => true,
        'typing_indicator' => true,
        'group_chat' => true,
        'message_editing' => true,
    ],

    /*
    |--------------------------------------------------------------------------
    | Broadcasting — disable for polling-only (no WebSocket server needed)
    |--------------------------------------------------------------------------
    */
    'broadcasting' => [
        'enabled' => env('CHAT_BROADCASTING_ENABLED', false),
    ],

    /*
    |--------------------------------------------------------------------------
    | Pagination
    |--------------------------------------------------------------------------
    */
    'pagination' => [
        'messages_per_page' => 30,
    ],

    /*
    |--------------------------------------------------------------------------
    | Messages
    |--------------------------------------------------------------------------
    */
    'messages' => [
        'max_length' => 5000,
        'soft_delete' => true,
    ],

    /*
    |--------------------------------------------------------------------------
    | Attachments
    |--------------------------------------------------------------------------
    */
    'attachments' => [
        'disk' => env('CHAT_ATTACHMENT_DISK', 'public'),
        'path' => 'chat/attachments',
        'max_size_kb' => 10240,
        'allowed_types' => ['image/*', 'application/pdf', 'video/mp4'],
    ],

    /*
    |--------------------------------------------------------------------------
    | Typing Indicator — uses cache, no DB writes per keystroke
    |--------------------------------------------------------------------------
    */
    'typing' => [
        'ttl_seconds' => 3,
        'cache_store' => env('CACHE_STORE', 'file'),
    ],

    /*
    |--------------------------------------------------------------------------
    | Routes
    |--------------------------------------------------------------------------
    */
    'routes' => [
        'enabled' => true,
        'prefix' => 'chat',
        'middleware' => ['web', 'auth'],
    ],

];
