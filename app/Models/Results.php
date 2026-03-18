<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Results extends Model
{
    protected $fillable = [
        'id',
        'user_id',
        'exam_id',
        'score',
    ];
}
