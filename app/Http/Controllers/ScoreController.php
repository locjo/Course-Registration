<?php

namespace App\Http\Controllers;

use App\Models\Results;
use App\Models\SectionClass;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ScoreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Lấy danh sách lớp học phần (của giảng viên)
        $sections = SectionClass::where('lecturer_id', Auth::id())->get();

        // Lấy section_id từ request
        $sectionId = $request->section_id;

        $section = null;
        $results = collect();

        if ($sectionId) {
            // Lấy lớp + sinh viên
            $section = SectionClass::with('enrollments.student')
                ->where('teacher_id', Auth::id())
                ->findOrFail($sectionId);

            // Lấy điểm
            $results = Results::where('section_class_id', $sectionId)
                ->get()
                ->keyBy('student_id');
        }

        return view('lecturer.scores.index', compact(
            'sections',
            'section',
            'grades',
            'sectionId'
        ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
