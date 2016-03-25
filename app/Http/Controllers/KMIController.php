<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Requests\KMIRequest;

class KMIController extends Controller{
    
    public function calculateKMI(KMIRequest $request){

        $ugis = $request->input('ugis');
        $svoris = $request->input('svoris');
        $kmi = $svoris/(($ugis/100)*($ugis/100));

        return view ('rezultatas', ['kmi'=>$kmi]);

    }

}