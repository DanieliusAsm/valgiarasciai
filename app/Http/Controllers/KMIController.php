<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Requests\KMIRequest;

class KMIController extends Controller{
    
    public function calculateKMI(KMIRequest $request){

        $ugis = $request->input('ugis');
        $svoris = $request->input('svoris');
        $lytis = $request->input('gender');
        $kmi = round($svoris/(($ugis/100)*($ugis/100)));
        $salyga = '';
        if($lytis=='vyras'){
            if($kmi>=20&& $kmi<=25){
                $salyga="optimalus KMI";
            }
        }else{
            if($kmi>=18.8 && $kmi<23.8){
                $salyga="optimalus KMI";
            }
        }
        if($kmi == 22){
            $salyga="idealus KMI";
        }else if($kmi>=25.5 && $kmi<=29.9){
            $salyga="Antsvoris";
        }else if($kmi>=30 && $kmi<=34.9){
            $salyga="1 laipsnio nutukimas";
        }else if($kmi>=35 && $kmi<=39.9){
            $salyga="2 laipsnio nutukimas";
        }else if($kmi>=40){
            $salyga="3 laipsnio nutukimas";
        }else if($kmi>=17.5 && $kmi<=18.5){
            $salyga="1 laipsnio mitybos nepakankamumas";
        }else if($kmi>=16 && $kmi<=17.4){
            $salyga="2 laipsnio mitybos nepakankamumas";
        }else if($kmi<=16){
            $salyga="3 laipsnio mitybos nepakankamumas";
        }
        return view ('rezultatas', ['kmi'=>$kmi,1,'salyga'=>$salyga]);

    }

}