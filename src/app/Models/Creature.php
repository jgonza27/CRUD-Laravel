<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Creature extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'species', 'threat_level', 'region_id'];

    public function region()
    {
        return $this->belongsTo(Region::class);
    }
}