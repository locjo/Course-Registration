<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExamRequest extends FormRequest
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
            'exam_title' => 'required|string',
            'time_limit' => 'required|integer|min:5',
            'section_class_id' => 'required|integer',
        ];
    }

     public function messages()
    {
        return [
            'exam_title.required' => 'Tên bài không được để trống',

            'time_limit.required' => 'Thời gian giới hạn không được để trống',
            'time_limit.integer' => 'Không đúng định dạng',
            'time_limit.min' => 'Thời gian phải lớn hơn 5 phút'
        ];
    }


}
