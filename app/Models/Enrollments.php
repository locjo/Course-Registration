<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use PhpParser\Builder\Use_;

class Enrollments extends Model
{
    protected $fillable = [
        'id',
        'student_id',
        'course_id',
        'semester_id',
        'status',
    ];

    public function student(){
        return $this->belongsTo (Users::class, 'student_id');
    }
    public function course(){
        return $this->belongsTo (Courses::class, 'course_id');
    }
    public function semester(){
        return $this->belongsTo (Semesters::class, 'semester_id');  
}
}