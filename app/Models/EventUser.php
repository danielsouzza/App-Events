<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class EventUser extends Model
{
    use HasFactory;

    protected $table = 'event_user';


    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function events():BelongsTo
    {
        return $this->belongsTo(Event::class);
    }

}

