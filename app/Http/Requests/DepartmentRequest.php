<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DepartmentRequest extends FormRequest
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
            'code' => 'required|unique:departments,code,',
            'name' => 'required'
        ];
    }

    public function messages(): array
    {
        return [
            'code.required' => 'Mã khoa không được để trống',
            'code.unique' => 'Mã khoa đã tồn tại',
            'name.required' => 'Tên khoa không được để trống'
        ];
    }
}
