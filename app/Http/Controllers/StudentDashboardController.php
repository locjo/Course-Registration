<?php

namespace App\Http\Controllers;


use App\Models\Students;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentDashboardController extends Controller
{
    public function index()
    {
        $student = Students::with(['user','class','department'])
                ->where('user_id', Auth::id())
                ->first();
        return view('student.dashboard', compact('student'));
    }
}
