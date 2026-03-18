<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuestionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'exam_id' => 'required|exists:exams,id',
            'question' => 'required|string',
            'option_a' => 'required|string|max:255',
            'option_b' => 'required|string|max:255',
            'option_c' => 'required|string|max:255',
            'option_d' => 'required|string|max:255',
            'correct_answer' => 'required|in:A,B,C,D'
        ];
    }
    public function messages()
    {
        return [
            'exam_id.required' => 'Bài kiểm tra là bắt buộc.',
            'exam_id.exists' => 'Bài kiểm tra không tồn tại.',

            'question.required' => 'Vui lòng nhập nội dung câu hỏi.',

            'option_a.required' => 'Vui lòng nhập đáp án A.',
            'option_b.required' => 'Vui lòng nhập đáp án B.',
            'option_c.required' => 'Vui lòng nhập đáp án C.',
            'option_d.required' => 'Vui lòng nhập đáp án D.',

            'option_a.max' => 'Đáp án A không được vượt quá 255 ký tự.',
            'option_b.max' => 'Đáp án B không được vượt quá 255 ký tự.',
            'option_c.max' => 'Đáp án C không được vượt quá 255 ký tự.',
            'option_d.max' => 'Đáp án D không được vượt quá 255 ký tự.',

            'correct_answer.required' => 'Vui lòng chọn đáp án đúng.',
            'correct_answer.in' => 'Đáp án đúng phải là A, B, C hoặc D.'
        ];
    }
}
