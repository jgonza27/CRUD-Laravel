<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artifact extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'type', 'power_level', 'description', 'origin_realm_id'];

    public function originRealm()
    {
        return $this->belongsTo(Realm::class, 'origin_realm_id');
    }

    public function heroes()
    {
        return $this->belongsToMany(Hero::class, 'artifact_hero');
    }
}