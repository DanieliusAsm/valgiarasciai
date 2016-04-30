<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class RegisterRequest extends Request
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
            'first_name' => 'required',
            'last_name' => 'required',
            'age' => 'required',
            'phone' => 'required',
            'email' => 'required|email'
        ];
    }

    public function messages(){
        return [
            'first_name.required'=>'Neįvestas Vardas',
            'last_name.required'=>'Neįvesta Pavarde',
            'age.required'=>'Neįvestas amžius',
            'phone.required'=>'Neįvestas telefono numeris',
            'email.required'=>'Neįvestas el. paštas',
        ];
    }
}
