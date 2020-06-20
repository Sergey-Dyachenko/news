<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\OnlyExistUserWithExistEmail;
use App\User;
use App\Rules\CheckCorrectPassword;

class LoginDataValidateForShowToken extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'email' => ['required', new OnlyExistUserWithExistEmail(User::class)],
            'password' => ['required', new CheckCorrectPassword(User::class, $this->ValidationData()) ]
        ];
    }
}
