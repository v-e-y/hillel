<?php

declare(strict_types=1);

return [
    'telegram' => [
        'id' => env('TELEGRAM_BOT_ID'),
        'name' => env('TELEGRAM_BOT_NAME'),
        'api_token' => env('TELEGRAM_API_TOKEN'),
        'api_url' => env('TELEGRAM_API_URL'),
        'def_message'=> env('TELEGRAM_DEF_MESSAGE'),
        'def_err_message' => env('TELEGRAM_DEF_ERR_MESSAGE')
    ]
];