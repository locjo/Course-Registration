<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'student_code' => 'required|unique:users,student_code',
            'name' => 'required',
            
            'email' => 'required|email|unique:users,email',
            'birthday' => 'required|date',
            'class_id' => 'required'
        ];
    }

    public function messages(): array
    {
        return [
            'student_code.required' => 'Mã sinh viên không được để trống',
            'student_code.unique' => 'Mã sinh viên đã tồn tại',
            'name.required' => 'Tên sinh viên không được để trống',
            'email.required' => 'Email không được để trống',
            'email.email' => 'Email không đúng định dạng',
            'email.unique' => 'Email đã tồn tại',
            'birthday.required' => 'Ngày sinh không được để trống',
            'birthday.date' => 'Ngày sinh không đúng định dạng',
            'class_id.required' => 'Lớp học không được để trống'
        ];
    }
}
