<?php

declare(strict_types=1);

namespace App\Services\Bots\Telegram;

use App\Models\Order;
// use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Client\Response as ClientResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class Telegram
{
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
    // Default error message
    private static string $defErrMessage;

    private static int $lastUpdateId = 0;
    
    /*
    * Initialize static properties
    */
    protected static function booting()
    {
        self::$botName = config('bots.telegram.name');
        self::$id = config('bots.telegram.id');
        self::$botApiToken = config('bots.telegram.api_token');
        self::$botApiUrl = config('bots.telegram.api_url');
        self::$defMessage = config('bots.telegram.def_message');
        self::$defErrMessage = config('bots.telegram.def_err_message');
        
    }

    /**
     * Get messages and response it.
     * @return \Illuminate\Http\Client\Response
     */
    public static function getUpdates(): ClientResponse
    {
        static::booting();

        $response = Http::get(static::$botApiUrl . static::$botApiToken . '/getUpdates', [
            'offset' => self::$lastUpdateId
        ]);

        if ($response->ok() && !empty($response->json('result'))) {
            foreach ($response->json('result') as $value) {
                static::sendMessage(
                    $value['message']['chat']['id'],
                    static::getMessage($value['message']['text'])
                );

                static::$lastUpdateId = $value['update_id'] + 1;
            }
        }

        return throw new \Exception("Info, haven't messages", 1);
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
     * Get/filter messages
     * @param string $botMessage
     * @return string
     */
    private static function getMessage(string $botMessage): string
    {
        // If first in chat, like new user.
        if (preg_match('|^[/start]+$|', $botMessage)) {

            return static::$defMessage;

        // If message contains only digits. We will try to send order data
        } elseif(preg_match('/^[0-9]+$/', $botMessage)) {

            return static::getOrderInfoMessage($botMessage);

        } else {
            // If message is not number or first message.
            // We will send default error message.
            return static::$defErrMessage;
        }

        throw new \Exception("Error retrieving message", 1);
    }
    
    /**
     * Get/prepare message about order to sent it.
     * @param string $orderNumber
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

        return throw new \Exception("Error retrieving order info", 1);
    }

    /**
     * Magics
     */

    public function __toString()
    {
        return static::$botName;
    }
}
