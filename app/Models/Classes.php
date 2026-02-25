<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    protected $fillable = [
        'id',
        'course_id',
        'semester_id',
        'class_name',
    ];

    public function course()
    {
        return $this->belongsTo(Courses::class, 'course_id');
    }
}
