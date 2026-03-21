<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use PhpParser\Builder\Use_;

class Enrollments extends Model
{
    protected $fillable = [
        'student_id',
        'section_class_id',
        'status',
        'score'
    ];

    public function student(){
        return $this->belongsTo(Students::class, 'student_id', 'user_id');
    }
    public function section_class(){
        return $this->belongsTo(SectionClass::class, 'section_class_id');
    }
}
