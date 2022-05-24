<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable = [
        'title', 'description'
    ];

    /*
    * Relations
    */

    /**
     * Get the user that owns the Board
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    /**
     * Get the user that owns the Card
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function userExecutor(): BelongsTo
    {
        return $this->belongsTo(User::class, 'executor_id');
    }

    /**
     * Get the columns that owns the Card
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function columns(): BelongsTo
    {
        return $this->belongsTo(Column::class);
    }

    /**
     * Get all of the notifications for the Card
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function notifications(): HasMany
    {
        return $this->hasMany(Notification::class);
    }
}
