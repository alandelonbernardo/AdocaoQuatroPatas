<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    protected $fillable = [
        'name',
        'specie',
        'breed',
        'age',
        'size',
        'description',
        'photo',
        'status',
    ];

    use HasFactory;
}
