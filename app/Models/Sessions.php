<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sessions extends Model
{
    use HasFactory;
    protected $table = 'session';
    protected $fillable = [

        'session_date',
        'section_class_id',
   
    ];

    public function class()
    {
        return $this->belongsTo(Classes::class);
    }

    public function subject()
    {
        return $this->belongsTo(Courses::class, 'course_id');
    }

    public function attendances()
    {
        return $this->hasMany(Attendances::class, 'session_id');
    }

    public function lecturer()
    {
        return $this->belongsTo(Lecturers::class);
    }
    
    public function course()
    {
        return $this->belongsTo(Courses::class);
    }

    public function section_class()
    {
        return $this->belongsTo(SectionClass::class, 'section_class_id');
    }

    public function students()
    {
        return $this->belongsToMany(Students::class, 'attendances')
                    ->withPivot('status', 'checkin_time')
                    ->withTimestamps();
    }
}