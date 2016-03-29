<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Requests\KMIRequest;

class KMIController extends Controller{
    
    public function calculateKMI(KMIRequest $request){
        $ugis = $request->input('ugis');
        $svoris = $request->input('svoris');
        $lytis = $request->input('gender');
        $amzius = $request->input('amzius');
        $veiksnys = $request->input('veiksnys1');
        $kmi = round($svoris/(($ugis/100)*($ugis/100)));
        $salyga = '';
        $pma = '';
        $fag = '';
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
        if($lytis == 'vyras'){
            $pma = 66+13.7*$svoris+5*$ugis-6.8*$amzius;
        }else{
            $pma = 655+9.6*$svoris+1.7*$ugis-4.7*$amzius;
        }
        if($veiksnys =='palaikymas'){
            $fag = $pma*1.25;
        }else if($veiksnys = 'prieaugis'){
            $fag = $pma+1000;
        }
        return view ('rezultatas', ['kmi'=>$kmi,'salyga'=>$salyga, 'pma'=>$pma, 'fag'=>$fag]);
}