<?php

namespace App\Http\Controllers;

use App\Http\Requests\SessionRequest;
use App\Models\Attendances;
use App\Models\Classes;
use App\Models\Courses;
use App\Models\Lecturers;
use App\Models\SectionClass;
use App\Models\Sessions;
use App\Models\Students;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
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
                'section_class',
                'attendances',
            ])
            ->orderBy('session_date', 'desc')
            ->paginate(10);

        foreach ($sessions as $session) {

            

            $totalStudents = $session->class->students->count();

            $session->present_count = Attendances::where('session_id', $session->id)
                    ->where('status', 'Có mặt')
                    ->count();

            $session->absent_count = Attendances::where('session_id', $session->id)
                    ->where('status', 'Vắng')
                    ->count();
        }

        return view('lecturer.sessions.index', compact('sessions'));
    }


    /**
     * Form tạo session
     */
    public function create()
    {
        $section_classes = SectionClass::all();
        

        return view('lecturer.sessions.create', compact('section_classes'));
    }


    /**
     * Lưu session
     */
    public function store(SessionRequest $request)
    {
      
        Sessions::create([
            
            'section_class_id'      => $request->section_class_id,
            'session_date'    => str_replace('T',' ',$request->session_date),
            'lecturer_id'    => Auth::id()
        ]);

        return redirect()
            ->route('lecturer.sessions.index')
            ->with('success', 'Tạo tiết học thành công');
    }


}