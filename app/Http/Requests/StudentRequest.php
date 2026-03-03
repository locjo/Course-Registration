<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
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
            'email' => 'required|email|unique:users,email',

            // Thông tin sinh viên (bảng students)
            'student_code' => 'required|unique:students,student_code',
            'name' => 'required|string|max:255',
            'birthday' => 'required|date',
            'gender' => 'required|in:Nam,Nữ,Khác',
            'phone' => 'nullable|string|max:20',
            'identity_number' => 'nullable|string|max:20',
            'academic_year' => 'required|string|max:20',
            'place_of_birth' => 'nullable|string|max:255',
            'permanent_address' => 'nullable|string|max:255',
            'class_id' => 'required|exists:classes,id',
            'department_id' => 'required|exists:departments,id',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ];
    }
}
