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
            'last_name' => 'required'
        ];
    }

    public function messages(){
        return [
            'first_name.required'=>'Neivestas Vardas',
            'last_name.required'=>'Neivesta Pavarde'
        ];
    }
}
