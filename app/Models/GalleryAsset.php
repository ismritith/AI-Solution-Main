<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GalleryAsset extends Model
{
    protected $fillable = [
        'category',
        'media_type',
        'upload_method',
        'file_path',
        'external_url',
        'title',
        'description',
        'is_featured',
    ];

    protected $casts = [
        'is_featured' => 'boolean',
    ];
}



