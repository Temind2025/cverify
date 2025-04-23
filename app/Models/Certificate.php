<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Certificate extends Model
{
    protected $fillable = [
        'code',
        'course_id',
        'student_name',
        'course_date',
        'validity_date',
        'is_verified',
        'team_id',
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($certificate) {
            $certificate->code = Str::random(12);
        });
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function team()
    {
        return $this->belongsTo(Team::class);
    }
}