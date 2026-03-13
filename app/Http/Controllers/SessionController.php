<?php

namespace App\Http\Controllers;

use App\Http\Requests\SessionRequest;
use App\Models\Classes;
use App\Models\Courses;
use App\Models\Lecturers;
use App\Models\Sessions;
use Carbon\Carbon;
use Illuminate\Support\Str;


class SessionController extends Controller
{
    /**
     * Danh sách session
     */
    public function index()
    {
        $sessions = Sessions::with([
                'class.students',
                'subject',
                'attendances'
            ])
            ->orderBy('session_date', 'desc')
            ->paginate(10);

        foreach ($sessions as $session) {

            $present = $session->attendances
                ->where('status', 'present')
                ->count();

            $totalStudents = $session->class->students->count();

            $session->present_count = $present;
            $session->absent_count = $totalStudents - $present;
        }

        return view('lecturer.sessions.index', compact('sessions'));
    }


    /**
     * Form tạo session
     */
    public function create()
    {
        $classes = Classes::all();
        $courses = Courses::all();

        return view('lecturer.sessions.create', compact('courses', 'classes'));
    }


    /**
     * Lưu session
     */
    public function store(SessionRequest $request)
    {
      
        Sessions::create([
            
            'course_id'      => $request->course_id,
            'class_id'       => $request->class_id,
            'session_date'    => str_replace('T',' ',$request->session_date),
            'qr_token'       => Str::uuid(),
            'qr_expired_at'  => now()->addMinutes(10),
            'lecturer_id'    => auth()->id()
        ]);

        return redirect()
            ->route('lecturer.sessions.index')
            ->with('success', 'Tạo tiết học thành công');
    }


    /**
     * Hiển thị QR Code
     */
   
}