<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    protected $fillable = [
        'id',
        'code',
        'name',
    ];

    public function course()
    {
        return $this->belongsTo(Courses::class, 'course_id');
    }
}
