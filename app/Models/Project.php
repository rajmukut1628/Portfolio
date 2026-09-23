<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'title',
        'description',
        'image',
        'technologies',
        'github_url',
        'live_url',
        'featured',
        'sort_order',
    ];

    protected $casts = [
        'featured' => 'boolean',
    ];
}