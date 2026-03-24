<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Results extends Model
{
    protected $fillable = [
        'id',
        'student_id',
        'exam_id',
        'score',
    ];
     public function student()
    {
        return $this->belongsTo(Students::class, 'student_id');
    }

    // 👉 1 result thuộc về 1 exam
    public function exam()
    {
        return $this->belongsTo(Exams::class, 'exam_id');
    }
}
