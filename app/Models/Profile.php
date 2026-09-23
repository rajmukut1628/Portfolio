<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'name',
        'title',
        'short_description',
        'about',
        'photo',
        'cv',
        'email',
        'phone',
        'location',
        'nationality',
        'languages',
        'availability',
    ];
}