<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hero extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'race', 'rank', 'alive', 'realm_id'];

    protected $casts = [
        'alive' => 'boolean',
    ];

    public function realm()
    {
        return $this->belongsTo(Realm::class);
    }

    public function artifacts()
    {
        return $this->belongsToMany(Artifact::class, 'artifact_hero');
    }
}