<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAdminRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'admin_name' => ['required', 'regex:/(^([a-zA-z]+)(\d+)?$)/u'],
            'admin_mobile' => ['required', 'numeric'],
        ];
    }

    public function messages():array
    {
        return [
            'admin_name.required' => 'Name is required',
            'admin_name.regex' => 'Valid Name is required',
            'admin_mobile.required' => 'Mobile is required',
            'admin_mobile.numeric' => 'Valid Mobile is required',
        ];
    }
}
