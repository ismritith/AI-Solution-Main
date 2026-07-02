<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectReview extends Model
{
    protected $fillable = [
        'project_id',
        'client_name',
        'client_role',
        'email',
        'phone',
        'rating',
        'quote_text',
        'status',
    ];

    protected $casts = [
        'rating' => 'integer',
    ];

    /**
     * Relationship with Project.
     */
    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
