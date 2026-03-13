<?php

namespace App\Http\Controllers;

use App\Models\Lecturers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LecturerDashboardController extends Controller
{
    public function index()
    {
      $lecturer = Lecturers::with(['user','class','department'])
                ->where('user_id', Auth::id())
                ->first();

        return view('lecturer.dashboard', compact('lecturer'));
    }
}
