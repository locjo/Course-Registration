<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
    protected $fillable = [
        'user_id',
        'student_code',
        'name',
        'birthday',
        'phone',
        'identity_number',
        'academic_year',
        'place_of_birth',
        'permanent_address',
        'class_id',
        'department_id',
        'photo'
    ];

     public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function class()
    {
        return $this->belongsTo(Classes::class, 'class_id');
    }

    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id');
    }

    public function sessions()
    {
        return $this->belongsToMany(Sessions::class, 'attendances')
                    ->withPivot('status', 'checkin_time')
                    ->withTimestamps();
    }
    public function attendances()
    {
        return $this->hasMany(Attendances::class);
    }
    public function enrollments()
    {
        return $this->hasMany(Enrollments::class);
    }
     public function results()
    {
        return $this->hasMany(Results::class, 'student_id');
    }
}
