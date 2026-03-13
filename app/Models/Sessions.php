<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sessions extends Model
{
    use HasFactory;
    protected $table = 'session';
    protected $fillable = [
        'course_id',
        'class_id',
        'session_date',
        'qr_token',
        'qr_expired_at',
        'lecturer_id'
    ];

    public function class()
    {
        return $this->belongsTo(Classes::class);
    }

    public function subject()
    {
        return $this->belongsTo(Courses::class, 'course_id');
    }

    public function attendances()
    {
        return $this->hasMany(Attendances::class, 'session_id');
    }

    public function lecturer()
    {
        return $this->belongsTo(Lecturers::class);
    }
}