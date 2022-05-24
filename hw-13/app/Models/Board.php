<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Board extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable = [
        'title'
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
     * The userS that belong to the Board
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function usersMembers(): BelongsToMany
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }

    /**
     * Get all of the columns for the Board
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function columns(): HasMany
    {
        return $this->hasMany(Column::class);
    }
}
