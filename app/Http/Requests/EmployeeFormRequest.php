<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeFormRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'first_name'=>[
                'required'
            ],
            'last_name'=>[
                'required'
            ],
            'company'=>[
                'required',
                'integer',
            ],
            'email'=>[
                'nullable',
                'email'
            ],
            'phone'=>[
                'nullable',
                'integer',
                'digits:10',
            ]
        ];
    }
}
