<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'category',
        'title',
        'status_badge',
        'main_image',
        'description',
        'location',
        'date_text',
        'capacity',
        'ticket_tier',
        'ticket_price',
        'ticket_inclusions',
        'tracks',
        'agenda',
        'speakers',
    ];

    protected $casts = [
        'tracks' => 'array',
        'agenda' => 'array',
        'speakers' => 'array',
    ];

    public function registrations()
    {
        return $this->hasMany(Registration::class);
    }
}
