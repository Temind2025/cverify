<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $fillable = ['name', 'owner_id'];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function certificates()
    {
        return $this->hasMany(Certificate::class);
    }

    public function courses()
    {
        return $this->hasMany(Course::class);
    }
}