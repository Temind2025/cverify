<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = ['name', 'description', 'duration', 'team_id'];

    public function certificates()
    {
        return $this->hasMany(Certificate::class);
    }

    public function team()
    {
        return $this->belongsTo(Team::class);
    }
}