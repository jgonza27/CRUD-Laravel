<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
    use HasFactory;

    // Estos son los campos que permitimos rellenar desde la API
    protected $fillable = [
        'name',
        'race',
        'kingdom',
        'weapon',
        'description'
    ];
}