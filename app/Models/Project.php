<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'classification',
        'title',
        'sector',
        'cover_image',
        'description',
        'rating',
        'tech_stack',
        'footer_stat',
        'metric1_val',
        'metric1_lbl',
        'metric2_val',
        'metric2_lbl',
        'metric3_val',
        'metric3_lbl',
        'status_badge',
        'project_code',
        'estimated_date',
        'icon',
    ];

    protected $casts = [
        'rating' => 'decimal:2',
    ];

    public function reviews()
    {
        return $this->hasMany(ProjectReview::class);
    }

    public function approvedReviews()
    {
        return $this->hasMany(ProjectReview::class)->where('status', 'approved');
    }
}
