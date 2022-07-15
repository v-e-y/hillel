<?php

declare(strict_types=1);

namespace App\Services\Bots\Telegram;

use App\Http\Controllers\Controller;
use App\Http\Services\Bots\BotController;
use Illuminate\Http\Request;

class TelegramBotController extends BotController
{
    // const TELEGRAM_BOT_NAME = config('bots.telegram.name');
    // getUpdates

    public function getUpdates()
    {
        
        $response = Http::get(Telegram::$botApiUrl . self::$botApiToken . '/getUpdates');
        if ($response->ok()) {


            $res = $response->json();

            $data = [];

            foreach ($res['result'] as $value) {
                $data[$value['update_id']] = $value['message']['text'];
            }

            return $data;
        }
        
        //$response->failed();

        return 'error';
    }

}
