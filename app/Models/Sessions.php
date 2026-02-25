<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sessions extends Model
{
    protected $fillable = [
        'id',
        'course_id',
        'semester_id',
        'session_date',
        'start_time',
        'end_time',
    ];

    public function course()
    {
        return $this->belongsTo(Courses::class, 'course_id');
    }
}
