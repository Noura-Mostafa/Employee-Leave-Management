<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required'|'string',
            'email' => 'required'|'email',
            'phone' => 'required'|'string',
            'position' => 'required'|'string',
            'age' => 'nullable'|'int',
            'user_id' => 'nullable'|'int'|'exists:users,id',
        ];
    }
}
