<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attendances extends Model
{
    protected $fillable = [
        'id',
        'session_id',
        'student_id',
        'status',
    ];

    public function enrollment()
    {
        return $this->belongsTo(Enrollments::class, 'enrollment_id');
    }

    public function session()
    {
        return $this->belongsTo(Sessions::class, 'session_id');
    }

    public function section_class()
    {
        return $this->belongsTo(Sessions::class, 'session_id');
    }
    
    public function student()
    {
        return $this->belongsTo(Students::class);
    }
}

