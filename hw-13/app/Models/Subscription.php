<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Subscription extends Model
{
    use HasFactory;

    /*
    * Relations
    */

    /**
     * Get the user that owns the Subscription
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the card that owns the Subscription
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function card(): BelongsTo
    {
        return $this->belongsTo(Card::class);
    }

    /**
     * The notifications that belong to the Subscription
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function notifications(): BelongsToMany
    {
        return $this->belongsToMany(Notification::class)->withTimestamps();
    }
}
