<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SectionClassRequest extends FormRequest
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
            'course_id' => 'required|exists:courses,id',

            'lecturer_id' => 'required|exists:lecturers,id',

            'start_date' => 'required|date',

            'end_date' => 'required|date',

            'section_code' => 'required|string|max:50',

            'capacity' => 'required|integer|min:1'
        ];
    }
}
