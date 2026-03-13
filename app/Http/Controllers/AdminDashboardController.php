<?php

namespace App\Http\Controllers;

use App\Models\Courses;
use App\Models\Students;
use App\Models\Lecturers;
use App\Models\Classes;
use App\Models\Department;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $courses = Courses::count();
        $students = Students::count();
        $lecturers = Lecturers::count();
        $classes = Classes::count();
        $departments = Department::count();

        $departments_data = Department::withCount('students')->get();
        $labels = $departments_data->pluck('name');
        $values = $departments_data->pluck('students_count');
        return view('admin.dashboard', compact(
            'courses',
            'students',
            'lecturers',
            'classes',
            'departments',
            'labels',
            'values'
        ));
    }
}