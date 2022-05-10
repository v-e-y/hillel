<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
    use HasFactory;

     /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable = [
        'text'
    ];

    /*
    * Relations
    */

    /**
     * Get the user that owns the Comment
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the columns that owns the Comment
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function columns(): BelongsTo
    {
        return $this->belongsTo(User::class, 'foreign_key', 'other_key');
    }
}
