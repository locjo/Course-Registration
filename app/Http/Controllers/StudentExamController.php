<?php

namespace App\Http\Controllers;

use App\Http\Requests\QuestionRequest;
use App\Models\Exams;
use App\Models\Results;
use App\Models\Students;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentExamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
     public function index()
    {
        $student = auth()->user()->student;
        $exams = Exams::whereHas('section_class.enrollments', function ($query){
            $query->where('student_id', Auth::id());
        })->get();
        $results = Results::where('student_id', $student->id)
        ->pluck('score', 'exam_id') // key = exam_id
        ->toArray();
        return view('student.exams.index', compact('exams', 'results'));
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

        $student = auth()->user()->student;

        $exists = Results::where('student_id', $student->id)
            ->where('exam_id', $id)
            ->exists();
        if ($exists){
                return redirect()
                    ->route('student.exams.index')
                    ->with('error', 'Bạn đã làm bài này rồi');
        }


        return view('student.exams.show', compact('exam', 'exists'));
    }

    /**
     * Show the form for editing the specified resource.
     */

    public function submit(Request $request, $id)
    {
        
        $exam = Exams::with('questions')->findOrFail($id);
        $student = Students::where('user_id', Auth::id())->first();
        $score = 0;
        $total = $exam->questions->count();
        
        foreach ($exam->questions as $question) {
            $userAnswer = $request->answers[$question->id] ?? null;

            if ($userAnswer === $question->correct_answer) {
                $score++;
            }
        }
        Results::create([
            'student_id' => $student->id,
            'exam_id' => $exam->id,
            'score' => $score,
        ]);

        return redirect()
            ->route('student.exams.result', $exam->id)
            ->with([
                'score' => $score,
                'total' => $total
            ]);
    }
    public function result($id)
    {
        $student = auth()->user()->student;

        $result = Results::where('student_id', $student->id)
            ->where('exam_id', $id)
            ->first();

        return view('student.exams.result', compact('result'));
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
