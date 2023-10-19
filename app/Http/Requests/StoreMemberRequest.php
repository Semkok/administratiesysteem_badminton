<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMemberRequest extends FormRequest
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
            'nickname' => 'required|string',
            'name' => 'required|string',
            'surname' => 'required|string',
            'phonenumber' => 'required|string',
            'email' => 'required|email|unique:members',
            'photograph' => 'required|file', // Adjust validation rules as needed.
            'birthday' => 'required|string',
            'address' => 'required|string',
            'bank' => 'required|string',
            'payment_method' => 'required|string',
        ];
    }
}
