<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    protected $table = 'education';

    protected $fillable = [
        'degree',
        'institution',
        'field_of_study',
        'start_year',
        'end_year',
        'location',
        'description',
        'sort_order',
    ];
}