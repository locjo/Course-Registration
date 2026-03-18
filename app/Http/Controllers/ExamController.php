<?php

namespace App\Http\Controllers;

use App\Http\Requests\ExamRequest;
use App\Models\Exams;
use App\Models\SectionClass;
use Illuminate\Http\Request;

class ExamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $exams = Exams::paginate(10);
        return view('lecturer.exams.index', compact('exams'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $section_classes = SectionClass::all();
        return view('lecturer.exams.create', compact('section_classes')); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ExamRequest $request)
    {
        
        Exams::create($request->validated());

        return redirect()->route('lecturer.exams.index')
            ->with('success', 'Thêm bài kiểm tra thành công');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        $exam = Exams::with('questions')->findOrFail($id);
        $questions = $exam->questions()->paginate(10);
        return view('lecturer.exams.show', compact('exam','questions'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $exam = Exams::findOrFail($id);
        $section_classes = SectionClass::all();
        return view('lecturer.exams.edit', compact('exam', 'section_classes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ExamRequest $request, string $id)
    {
        $exam = Exams::findOrFail($id);
        $exam->update($request->validated());
        return redirect()->route('lecturer.exams.index')
            ->with('success', 'Cập nhật bài kiểm tra thành công'); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Exams::destroy($id);

        return redirect()->route('lecturer.exams.index')
            ->with('success','Đã xóa bài kiểm tra');

    }
}
