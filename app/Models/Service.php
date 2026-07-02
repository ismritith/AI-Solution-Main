<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'category',
        'service_category',
        'title',
        'description',
        'icon',
        'tags',
        'metric_subtitle',
        'step_number',
        'is_featured',
    ];

    protected $casts = [
        'is_featured' => 'boolean',
    ];
}
