<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lecturers extends Model
{
    protected $fillable = [
        'user_id',
        'lecturer_code',
        'name',
        'birthday',
        'gender',
        'phone',
        'identity_number',
        'permanent_address',
        'academic_title',
        'degree',
        'photo',
        'hometown',
        'department_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function class()
    {
        return $this->belongsTo(Classes::class);
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }
}
