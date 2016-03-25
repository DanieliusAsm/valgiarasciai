<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class KMIRequest extends Request
{
    public function authorize(){
        return true;
    }

    public function rules()
    {
        return [
            'svoris' => 'required',
            'ugis' => 'required'
        ];
    }
        public function messages(){
            return[
                'svoris.required' => 'Iveskite svori',
                'ugis.required' => 'Iveskite ugi'
            ];
    }
}