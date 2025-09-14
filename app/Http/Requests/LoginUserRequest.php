<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginUserRequest extends FormRequest
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
            'email'    => 'required|email',
            'password' => 'required|string|min:8',

            //
        ];
    }

    public function messages(): array
    {
        return [
            'email.required'    => 'メールアドレス必要だよ',
            'email.email'       => 'メールアドレスをしっかり打ってよ',
            'password.required' => 'パスワード必須っす',
            'password.min'      => 'パスワード8文字以上必須でっせ'

        ];
    }

    public function credentials(): array
    {
        return $this->only('email', 'password');∑
    }
}
