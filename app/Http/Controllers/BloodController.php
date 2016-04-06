<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blood;
use App\Http\Requests;
use App\Http\Requests\BloodRequest;
class BloodController extends Controller
{
    public function addBlood($id, BloodRequest $request)
    {
        $blood = new Blood();
        $blood->user_id = $id;
        $blood->arterija = $request->input('arterija');
        $blood->pulsas = $request->input('pulsas');
        $blood->cholesterolis = $request->input('cholesterolis');
        $blood->mtl = $request->input('mtl');
        $blood->dtl = $request->input('dtl');
        $blood->trig = $request->input('trig');
        $blood->gliukozė = $request->input('gliukozė');
        $blood->save();
       return redirect('/user');
    }
}
