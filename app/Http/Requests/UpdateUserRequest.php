<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'title' => 'required',
            'date' => 'required|date|after_or_equal:today',
        ];
    }
}
