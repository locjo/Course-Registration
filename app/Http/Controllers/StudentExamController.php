<?php

namespace App\Http\Controllers;

use App\Http\Requests\QuestionRequest;
use App\Models\Exams;
use App\Models\Results;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentExamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
     public function index()
    {
        $exams = Exams::whereHas('section_class.enrollments', function ($query){
            $query->where('student_id', Auth::id());
        })->get();
        return view('student.exams.index', compact('exams'));
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
    public function show($id)
    {
        $exam = Exams::with('questions')->findOrFail($id);

        return view('student.exams.show', compact('exam'));
    }

    /**
     * Show the form for editing the specified resource.
     */

    public function submit(QuestionRequest $request, $id)
    {
        $exam = Exams::with('questions')->findOrFail($id);

        $score = 0;
        $total = $exam->questions->count();

        foreach ($exam->questions as $question) {
            $userAnswer = $request->answers[$question->id] ?? null;

            if ($userAnswer === $question->correct_answer) {
                $score++;
            }
        }
        Results::create([
            'student_id' => Auth::id(),
            'exam_id' => $exam->id,
            'score' => $score,
        ]);

        return view('student.exams.submit', compact('score', 'total'));
    }
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
