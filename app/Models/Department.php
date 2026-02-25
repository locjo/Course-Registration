<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable = [
        'id',
        'name',
    ];

    public function courses()
    {
        return $this->hasMany(Courses::class, 'department_id');
    }
}
