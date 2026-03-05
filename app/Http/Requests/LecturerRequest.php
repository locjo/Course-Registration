<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LecturerRequest extends FormRequest
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
            'lecturer_code' => 'required|unique:lecturers,lecturer_code,' . $this->route('lecturer'),
            'name' => 'required|string|max:255',
            'birthday' => 'required|date',
            'gender' => 'required|in:nam,nữ,khác',
            'phone' => 'required|string|max:20',
            'identity_number' => 'required|string|max:20',
            'permanent_address' => 'required|string|max:255',
            'department_id' => 'required|exists:departments,id',
            'academic_title' => 'required|in:Giang vien,Tro giang,Pho giao su,Giao su',
            'degree' => 'required|in:Cu nhan,Thac si,Tien si',
            'hometown' => 'required|string|max:255',
        ];
    }
}
