<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Http\Requests\UserDataRequest;
use App\Http\Requests\Request;
use App\User;
use App\Body;
use App\Blood;
use App\Base;
use Carbon\Carbon;

class UserController extends Controller {

    public function createUser(RegisterRequest $request) {
        $user = new User();
        $user->first_name = $request->input("first_name");
        $user->last_name = $request->input("last_name");
        $user->gender = $request->input("gender");
        $user->age = $request->input("age");
        $user->phone = $request->input("phone");
        $user->email = $request->input("email");
        $user->diet = $request->input("diet");
        $user->notes = $request->input("notes");
        $user->created = Carbon::now();
        $user->save();

        $this->addBase($user->id,$request);
        $this->addBody($user->id,$request);
        $this->addBlood($user->id,$request);

        return redirect('/user');
    }
	
    public function getUsers() {
        $users = User::with("base")->with("blood")->with("body")->get();

        return view('userlist', ['users' => $users]);
    }

    public function getUser($id) {
        $user = User::with("base")->with("blood")->with("body")->get()->find($id);

        return view('client', ['user'=>$user,'id'=>$id]);
    }

    public function editUser($id, RegisterRequest $request) {
        $user = User::with("base")->with("blood")->with("body")->get()->find($id);

        $user->first_name = $request->input("first_name");
        $user->last_name = $request->input("last_name");
        $user->gender = $request->input("gender");
        $user->age = $request->input("age");
        $user->phone = $request->input("phone");
        $user->email = $request->input("email");
        $user->diet = $request->input("diet");
        $user->notes = $request->input("notes");

        $lenght = count($user->base);
        for($i=0;$i<$lenght;$i++){
            $base = $user->base[$i];
            $base->height = $request->get("height","")[$i];
            $base->weight = $request->get("weight","")[$i];
            $base->wrist = $request->get("wrist","")[$i];
            $base->waist = $request->get("waist","")[$i];
            $base->save();
        }

        $lenght = count($user->body);
        for($i=0;$i<$lenght;$i++) {
            $body = $user->body[$i];
            $body->biological_age = $request->get("biological_age","")[$i];
            $body->body_fluid = $request->get("body_fluid","")[$i];
            $body->abdominal_fat = $request->get("abdominal_fat","")[$i];
            $body->weight = $request->get("body_weight","")[$i];
            $body->fat_expression = $request->get("fat_expression","")[$i];
            $body->muscle_mass = $request->get("muscle_mass","")[$i];
            $body->bone_mass = $request->get("bone_mass","")[$i];
            $body->kmi = $request->get("kmi","")[$i];
            $body->calorie_intake = $request->get("calorie_intake","")[$i];
            $body->save();
        }

        $lenght = count($user->blood);
        for($i=0;$i<$lenght;$i++) {
            $blood = $user->blood[$i];
            $blood->blood_pressure = $request->get('blood_pressure','')[$i];
            $blood->pulse = $request->get('pulse','')[$i];
            $blood->cholesterol = $request->get('cholesterol','')[$i];
            $blood->mtl = $request->get('mtl','')[$i];
            $blood->dtl = $request->get('dtl','')[$i];
            $blood->triglycerides = $request->get('triglycerides','')[$i];
            $blood->glucose = $request->get('glucose','')[$i];
            $blood->save();
        }
        $user->save();

        //var_dump($user->toArray());
        return redirect('/user');
    }

    public function deleteUser($id) {
        $user = User::find($id);

        if (!empty($user)) {
            $user->delete();
        }

        return redirect('/user');
    }

    public function addUserData($id, UserDataRequest $request){
        $this->addBase($id, $request);
        $this->addBody($id, $request);
        $this->addBlood($id, $request);

        return redirect('/user');
    }
    public function addBase($id, Request $request)
    {

        if($request->has("height") || $request->has("wrist") || $request->has("waist") || $request->has("weight")){
            $base = new Base();
            $base->user_id = $id;
            $base->height = $request->input("height");
            $base->weight = $request->input("weight");
            $base->wrist = $request->input("wrist");
            $base->waist = $request->input("waist");
            $base->created = Carbon::now()->format('Y-m-d');
            $base->save();
        }
    }
    public function addBody($id, Request $request){
        if($request->has("biological_age") || $request->has("body_fluid") || $request->has("abdominal_fat") || $request->has("fat_expression")
            || $request->has("muscle_mass") || $request->has("bone_mass") || $request->has("kmi") || $request->has("calorie_intake")) {
            $body = new Body();
            $body->user_id = $id;
            $body->biological_age =$request->input("biological_age");
            $body->body_fluid = $request->input("body_fluid");
            $body->abdominal_fat = $request->input("abdominal_fat");
            $body->weight = $request->input("body_weight");
            $body->fat_expression = $request->input("fat_expression");
            $body->muscle_mass = $request->input("muscle_mass");
            $body->bone_mass = $request->input("bone_mass");
            $body->kmi = $request->input("kmi");
            $body->calorie_intake = $request->input("calorie_intake");
            $body->created = Carbon::now()->format('Y-m-d');
            $body->save();
        }
    }
    public function addBlood($id, Request $request){
        if($request->has("blood_pressure") || $request->has("pulse") || $request->has("cholesterol") || $request->has("mtl")
            || $request->has("dtl") || $request->has("triglycerides") || $request->has("glucose")){
            $blood = new Blood();
            $blood->user_id = $id;
            $blood->blood_pressure = $request->input('blood_pressure');
            $blood->pulse = $request->input('pulse');
            $blood->cholesterol = $request->input('cholesterol');
            $blood->mtl = $request->input('mtl');
            $blood->dtl = $request->input('dtl');
            $blood->triglycerides = $request->input('triglycerides');
            $blood->glucose = $request->input('glucose');
            $blood->created = Carbon::now()->format('Y-m-d');
            $blood->save();
        }
    }
}
