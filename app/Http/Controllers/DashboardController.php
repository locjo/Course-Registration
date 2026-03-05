<?php

namespace App\Http\Controllers;

use App\Models\Courses;
use App\Models\Department;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalDepartments = Department::count();

        $totalCourses = Courses::count();

        $totalStudents = User::where('role', 'student')->count();

        $totalLecturers = User::where('role', 'lecturer')->count();

        // Thong ke nghi hoc

        $attendanceStats = DB::table('enrollments')
            ->selectRaw("
            CASE 
                WHEN ")
    }
}
