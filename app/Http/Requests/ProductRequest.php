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
            'baltymai' => 'required'
        ];
    }
    public function messages(){
        return[
            'baltymai.required' => 'Iveskite baltimus'
        ];
    }
}