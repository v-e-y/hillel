<?php

declare(strict_types=1);

namespace App\Services\Bots\Telegram;

use App\Models\Order;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Client\Response as ClientResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class Telegram extends Model
{

    const UPDATE_LIMIT = 1;

    // Bot name
    private static string $botName;
    // Bot id
    private static string $id;
    // API token
    private static string $botApiToken;
    // API url
    private static string $botApiUrl;
    // Default bot message
    private static string $defMessage;
    private static string $defErrMessage;

    private static int $lastUpdateId = 0;
    
    protected static function booting()
    {
        //parent::boot();
        /*
        * Initialize static properties
        */
        self::$botName = config('bots.telegram.name');
        self::$id = config('bots.telegram.id');
        self::$botApiToken = config('bots.telegram.api_token');
        self::$botApiUrl = config('bots.telegram.api_url');
        self::$defMessage = config('bots.telegram.def_message');
        self::$defErrMessage = config('bots.telegram.def_err_message');
        
    }


    ////////////////////////////////////////////////////////////

    /**
     * Get messages and response it.
     * @return \Illuminate\Http\Client\Response
     */
    public static function getUpdates(): ClientResponse
    {
        static::booting();

        $response = Http::get(static::$botApiUrl . static::$botApiToken . '/getUpdates', [
            'offset' => self::$lastUpdateId,
            // 'limit' => self::UPDATE_LIMIT
        ]);

        if ($response->ok() && ! empty($response->json('result'))) {

            foreach ($response->json('result') as $value) {
                
                // If the message is first in chat, like new user.
                if (preg_match('|^[/start]+$|', $value['message']['text'])) {
                    static::sendMessage(
                        $value['message']['chat']['id'],
                        self::$defMessage
                    );
                // If message contains only digits. We will try to send order data
                } elseif(preg_match('/^[0-9]+$/', $value['message']['text'])) {
                    static::sendMessage(
                        $value['message']['chat']['id'],
                        self::getOrderInfoMessage($value['message']['text'])
                    );
                } else {
                    // If message is not number or first message.
                    // We will send default error message.
                    static::sendMessage(
                        $value['message']['chat']['id'],
                        self::$defErrMessage
                    );
                }

                
                static::$lastUpdateId = $value['update_id'] + 1;
            }
        }

        return throw new \Exception("Error, haven't messages", 1);
    }

    /**
     * Send message to the bot
     * @param integer $chatId
     * @param string $message
     * @return \Illuminate\Http\Client\Response
     */
    private static function sendMessage(int $chatId, string $message): ClientResponse
    {
        return Http::get(static::$botApiUrl . static::$botApiToken . '/sendMessage', [
            'chat_id' => $chatId,
            'text' => $message
        ]);
    }
    
    /**
     * Get/prepare message about order to sent it.
     * @return string
     */
    private static function getOrderInfoMessage(string $orderNumber): string
    {
        $orderData = Order::getOrderInfoForBotMessage(
            (int)Str::limit($orderNumber, 19)
        );

        if ($orderData->id) {
            $message = 'Order number - %s. Has status - %s. Title: %s. Amount: %s';

            return sprintf(
                $message,
                $orderData->id, $orderData->order_status, $orderData->title, $orderData->amount
            );
        }

        return throw new \Exception("Error Processing build message", 1);
    }

    /**
     * Magic
     */

    public function __toString()
    {
        return self::$botName;
    }
}
