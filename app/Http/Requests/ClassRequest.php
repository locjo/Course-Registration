<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClassRequest extends FormRequest
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
            'code' => 'required|unique:classes,code,',
            'name' => 'required'
        ];
    }

    public function messages(): array
    {
        return [
            'code.required' => 'Mã lớp học không được để trống',
            'code.unique' => 'Mã lớp học đã tồn tại',
            'name.required' => 'Tên lớp học không được để trống'
        ];
    }
}
