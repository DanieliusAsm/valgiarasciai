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
            'baltymai' => 'required',
            'riebalai' => 'required',
            'angliavandeniai' => 'required',
            'cholesterolis' => 'required',
            'eVerte' => 'required',
            'tipas' => 'required'
        ];
    }
    public function messages(){
        return[
            'pavadinimas.required' => 'Iveskite produkto pavadinimą',
            'baltymai.required' => 'Įveskite baltymų kiekį',
            'riebalai.required' => 'Įveskite riebalų kiekį',
            'angliavandeniai.required' => 'Įveskite angliavandenių kiekį',
             'cholesterolis.required' => 'Įveskite cholesterolio kiekį',
            'eVerte.required' => 'Įveskite produkto energetinę vertę',
            'tipas.required' => 'Nustatykite produkto tipą'
        ];
    }
}