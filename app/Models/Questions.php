<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Questions extends Model
{
    protected $fillable = [
        'id',
        'exam_id',
        'question',
        'option_a',
        'option_b',
        'option_c',
        'option_d',
        'correct_answer',

    ];

    public function exam(){
        return $this->belongsTo(Exams::class, 'exam_id');
    }
}
