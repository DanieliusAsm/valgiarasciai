<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ProductRequest extends Request
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'pavadinimas' => 'required',
            'tipas' => 'required'
        ];
    }
    public function messages(){
        return[
            'pavadinimas.required' => 'Iveskite pavadinimas',
            'tipas.required' => 'Nustatykite produkto tipą'
        ];
    }
}