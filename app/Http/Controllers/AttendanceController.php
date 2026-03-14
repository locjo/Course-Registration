<?php

namespace App\Http\Controllers;


use App\Models\Attendances;
use App\Models\Sessions;
use App\Models\Students;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function index($session_id)
    {
        $session = Sessions::with('course')->findOrFail($session_id);

        $students = Students::where('class_id', $session->class_id)->get();

        return view('lecturer.attendances.index', compact('session','students'));
    }

    public function store(Request $request)
    {
        foreach ($request->attendance as $student_id => $status) {

            Attendances::updateOrCreate(
                [
                    'session_id' => $request->session_id,
                    'student_id' => $student_id
                ],
                [
                    'status' => $status
                ]
            );

        }

        return back()->with('success','Attendance saved');
    }

}