<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SectionClass extends Model
{
    protected $table = 'section_classes';
    protected $fillable = [
        'course_id',
        'lecturer_id',
        'section_code',
        'start_date',
        'end_date',
        'capacity',
    ];
    public function course()
    {
        return $this->belongsTo(Courses::class);
    }

    public function lecturer()
    {
        return $this->belongsTo(Lecturers::class,'lecturer_id');
    }

    public function sessions()
    {
        return $this->hasMany(Sessions::class);
    }
}
