<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Department extends Model
{
    use HasFactory;
    protected $fillable = [
        'code',
        'name',
    ];

    public function courses()
    {
        return $this->hasMany(Courses::class, 'department_id');
    }

    public function users()
    {
        return $this->hasMany(User::class, 'department_id');
    }
}
