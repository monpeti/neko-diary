<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Diary extends Model
{
    protected $fillable = [
        'title',
        'body',
        'weight',
        'food_amount',
        'image_path',
        'date',
        'water_count',
        'tag',
    ];
}