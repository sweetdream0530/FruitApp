<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fruit extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'family',
        'genus',
        'order',
        'carbohydrates',
        'protein',
        'fat',
        'calories',
        'sugar',
    ];

    protected $casts = [
        'carbohydrates' => 'float',
        'protein' => 'float',
        'fat' => 'float',
        'calories' => 'float',
        'sugar' => 'float',
    ];
}