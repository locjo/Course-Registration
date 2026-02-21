<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Semesters extends Model
{
    protected $fillable = [
        'id',
        'name',
        'start_date',
        'end_date',
        'is_active',
    ];

    public function enrollments()
    {
        return $this->hasMany(Enrollments::class, 'semester_id');
    }
}
