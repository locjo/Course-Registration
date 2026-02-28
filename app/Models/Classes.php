<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    use HasFactory;
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
