<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class AccountRequest extends Request
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
            'email' => 'required|email',
            'username' => 'required|max:120',
            'password' => 'required'
        ];
    }

    public function messages(){
        return [
            'email.required' => 'El. pašto laukas negali būti tuščias!',
            'email.email' => 'Neteisingas El. pašto formatas!',
            'username.required' => 'Vartotojo vardo laukas negali būti tuščias!',
            'password.required' => 'Slaptažodžio laukas negali būti tuščias!'
        ];
    }
}