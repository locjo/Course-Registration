<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Exams extends Model
{
    
    protected $fillable = [
        'id',
        'exam_title',
        'time_limit',
        'section_class_id',
        'start_time',
        'end_time'
    ];

    public function questions() {
        return $this->hasMany(Questions::class, 'exam_id');
    }
    public function section_class()
    {
        return $this->belongsTo(SectionClass::class);
    }
    
}
