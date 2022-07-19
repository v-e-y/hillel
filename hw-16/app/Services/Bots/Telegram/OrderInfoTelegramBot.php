<?php

declare(strict_types=1);

namespace App\Services\Bots\Telegram;

use App\Models\Order;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

final class OrderInfoTelegramBot extends Model
{
    // Bot name
    private static string $botName;
    // Bot id
    private static string $botId;
    // API token
    private static string $botApiToken;
    // API url
    private static string $botApiUrl;
    // Default bot message
    private static string $defMessage;
    // Default error message
    private static string $defErrMessage;
    
    /*
    * Initialize static properties
    */
    protected static function booting()
    {
        static::$botName = config('bots.telegram.name');
        static::$botId = config('bots.telegram.id');
        static::$botApiToken = config('bots.telegram.api_token');
        static::$botApiUrl = config('bots.telegram.api_url');
        static::$defMessage = config('bots.telegram.def_message');
        static::$defErrMessage = config('bots.telegram.def_err_message');
    }

    /**
     * Get messages and response to it.
     */
    public function getUpdates()
    {
        $response = Http::get(static::$botApiUrl . static::$botApiToken . '/getUpdates', [
            'offset' => $this->getLastUpdateId()
        ]);

        if ($response->ok() && !empty($response->json('result'))) {
            
            foreach ($response->json('result') as $key => $value) {
                $this->sendMessage(
                    $value['message']['chat']['id'],
                    $this->getMessage($value['message'])
                );

                if ($key === array_key_last($response->json('result'))) {
                    $this->updateLastUpdateId($value['update_id']);
                }
            }
        }
        return Log::info('No messages.');
    }

    /**
     * Send message to the bot
     * @param integer $chatId
     * @param string $message
     * @return \Illuminate\Http\Client\Response
     */
    private function sendMessage(int $chatId, string $message): Response
    {
        return Http::get(static::$botApiUrl . static::$botApiToken . '/sendMessage', [
            'chat_id' => $chatId,
            'text' => $message
        ]);
    }

    /**
     * Get/filter messages
     * @param array $botMessage
     * @return string
     */
    private function getMessage(array $botMessage): string
    {
        // If message hasn't text (media) return error
        if (!array_key_exists('text', $botMessage)) {
            return static::$defErrMessage;
        }

        // If first in chat, like new user.
        if (preg_match('|^[/start]+$|', $botMessage['text'])) {
            return static::$defMessage;
        }

        // If message contains only digits. We will try to send order data
        if (preg_match('/^[0-9]+$/', $botMessage['text'])) {
            return $this->getOrderInfoMessage($botMessage['text']);
        } 
        
        // If message is not number or first message.
        // We will send default error message.
        return static::$defErrMessage;
    }
    
    /**
     * Get/prepare message about order to sent it.
     * @param string $orderNumber
     * @return string
     */
    private function getOrderInfoMessage(string $orderNumber): string
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
     * Retrieve last update id
     * @return integer update_id
     */
    private function getLastUpdateId(): int
    {
        // TODO add fail check
        return DB::table('last_bot_update_ids')
            ->where('bot_id', static::$botId)
            ->value('update_id');
    }

    /**
     * Update update_id to actual
     * @param integer $update_id
     * @return void
     */
    private function updateLastUpdateId(int $update_id): void
    {
        // TODO add fail check
        DB::table('last_bot_update_ids')
            ->where('bot_id', static::$botId)
            ->update([
                'update_id' => $update_id + 1
            ]);
    }

    /**
     * Magics
     */

    public function __toString()
    {
        return static::$botName;
    }
}
