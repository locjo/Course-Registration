<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SessionRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [

            'section_class_id' => 'required|exists:section_classes,id',

            'session_date' => 'required|date',
        ];
    }

    public function messages()
    {
        return [

            'section_class_id.required' => 'Vui lòng chọn môn học',
            'section_class_id.exists' => 'Môn học không tồn tại',

            'class_id.required' => 'Vui lòng chọn lớp',
            'class_id.exists' => 'Lớp không tồn tại',

            'session_date.required' => 'Vui lòng chọn ngày học',
            'session_date.date' => 'Ngày học không hợp lệ',


        ];
    }
}