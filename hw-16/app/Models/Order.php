<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * Getters
     */

    public static function getOrderInfoForBotMessage(int $orderId)
    {
        return Order::where('id', $orderId)
            ->select('id', 'title', 'order_status', 'amount')
            ->first();
    }

    /**
     * Relations
     */

    public function customer(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
