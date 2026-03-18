<?php

namespace App\Http\Controllers;

use App\Http\Requests\QuestionRequest;
use App\Models\Exams;
use App\Models\Questions;
use Illuminate\Http\Request;
use Termwind\Question;

class QuestionController extends Controller
{

    public function index($exam_id)
    {
        $exam = Exams::findOrFail($exam_id);
        $questions = Questions::where('exam_id', $exam_id)->paginate(10);

        return view('lecturer.questions.index', compact('exam', 'questions'));
    }
    public function create($exam_id)
    {
        $exam = Exams::findOrFail($exam_id); // ✅ trả về OBJECT
        return view('lecturer.questions.create', compact('exam'));
    }

   public function store(Request $request, $exam_id)
    {
        foreach ($request->questions as $q) {

            // bỏ qua câu trống
            if (!empty($q['question'])) {

                Questions::create([
                    'exam_id' => $exam_id,
                    'question' => $q['question'],
                    'option_a' => $q['option_a'],
                    'option_b' => $q['option_b'],
                    'option_c' => $q['option_c'],
                    'option_d' => $q['option_d'],
                    'correct_answer' => $q['correct_answer'],
                ]);
            }
        }

        return redirect()->back()->with('success', 'OK');
    }
    // Chi tiết câu hỏi (THIẾU - cần thêm)
    public function show($id)
    {
        $question = Questions::findOrFail($id);

        return view('lecturer.exams.questions.show', compact('question'));
    }

    public function edit($exam_id){
        $exam = Exams::findOrFail($exam_id);
        $questions = Questions::where('exam_id', $exam_id)->get();
        return view('lecturer.questions.edit',compact('exam','questions'));
    }

    public function update(Request $request, $exam_id, $id)
    {
        foreach ($request->questions as $q) {

            $question = Questions::findOrFail($q['id']);

            $question->update([
                'question' => $q['question'],
                'option_a' => $q['option_a'],
                'option_b' => $q['option_b'],
                'option_c' => $q['option_c'],
                'option_d' => $q['option_d'],
                'correct_answer' => $q['correct_answer'],
            ]);
        }

        return redirect()->route('lecturer.exams.questions.index', ['exam' => $exam_id]);
    }

   public function destroy($exam_id, $id)
    {
        
        $question = Questions::where('exam_id', $exam_id)
                            ->where('id', $id)
                            ->firstOrFail();

        $question->delete();

        return redirect()
            ->route('lecturer.exams.questions.index', ['exam' => $exam_id])
            ->with('success', 'Xóa câu hỏi thành công');
    }
}
