<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attendaces extends Model
{
    protected $fillable = [
        'id',
        'enrollment_id',
        'session_id',
        'status',
    ];

    public function enrollment()
    {
        return $this->belongsTo(Enrollments::class, 'enrollment_id');
    }

    public function session()
    {
        return $this->belongsTo(Sessions::class, 'session_id');
    }
}
