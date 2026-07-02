<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class BlogPost extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'category',
        'reading_time',
        'published_at',
        'author_name',
        'author_role',
        'author_avatar',
        'banner_image',
        'excerpt',
        'body_content',
        'blockquote_text',
        'blockquote_source',
        'technical_metrics',
        'tags',
        'status',
    ];

    protected $casts = [
        'technical_metrics' => 'array',
        'published_at' => 'datetime',
    ];

    protected static function boot()
    {
        parent::boot();

        static::saving(function ($post) {
            if (empty($post->slug)) {
                $post->slug = Str::slug($post->title);
            }
        });
    }
}
