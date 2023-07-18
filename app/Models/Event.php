<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @method static findOrFail(string $id)
 * @property mixed $title
 * @property mixed $city
 * @property int|mixed $private
 * @property mixed $description
 * @property mixed|string $image
 * @property mixed $items
 */
class Event extends Model
{
    use HasFactory;
    protected $casts = ['items'=> 'array',];
    protected $dates = ['data'];
    protected $guarded = [];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function users():BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }

}
