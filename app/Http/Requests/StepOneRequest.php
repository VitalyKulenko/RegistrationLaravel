<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class StepOneRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'firstName' => 'required|regex:/^[\p{Latin}\p{Cyrillic}\s]+$/u',
            'lastName' => 'required|regex:/^[\p{Latin}\p{Cyrillic}\s]+$/u',
            'phone' => 'required|regex:/^\+\d{2}\s\(\d{3}\)\s\d{3}\-\d{4}$/',
            'email' => 'required|email|unique:users,email',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $errors = $validator->errors();
        throw new HttpResponseException(
            response()->view('components.step1', ['errors' => $errors])
        );
    }
}
