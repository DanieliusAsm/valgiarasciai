<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
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

        UserController::addBase($user->id,$request);
        UserController::addBody($user->id,$request);
        UserController::addBlood($user->id,$request);

        return redirect('/user');
    }

    public function editUser($id, RegisterRequest $request) {
        $user = User::find($id);

        $user->first_name = $request->input("first_name");
        $user->last_name = $request->input("last_name");
        $user->gender = $request->input("gender");
        $user->age = $request->input("age");
        $user->phone = $request->input("phone");
        $user->email = $request->input("email");
        $user->height = $request->input("height");
        $user->notes = $request->input("notes");
        $user->weight = $request->input("weight");
        $user->wrist = $request->input("wrist");
        $user-> waist = $request->input("waist");

        $user->save();

        return redirect('/user');
    }
	
    public function getUsers() {
        $users = User::all();
        $blood = Blood::all();
        $body = Body::all();

        return view('userlist', ['users' => $users,'blood'=>$blood,'body'=>$body]);
    }

    public function getUser($id) {
        $user = User::find($id);
        $blood = Blood::find($id);
        $body = Body::find($id);

        return view('edituser', ['user'=>$user,'id'=>$id,'blood'=>$blood,'body'=>$body]);
    }

    public function deleteUser($id) {
        $user = User::find($id);

        if (!empty($user)) {
            $user->delete();
        }

        return redirect('/user');
    }

    public function addBase($id, RegisterRequest $request)
    {
        if($request->has("height") || $request->has("weight") || $request->has("wrist") || $request->has("waist")){
            $base = new Base();
            $base->user_id = $id;
            $base->height = $request->input("height");
            $base->weight = $request->input("weight");
            $base->wrist = $request->input("wrist");
            $base->waist = $request->input("waist");
            $base->created = Carbon::now();
            $base->save();
        }
    }
    public function addBody($id, RegisterRequest $request){
        if($request->has("biological_age") || $request->has("body_fluid") || $request->has("abdominal_fat") || $request->has("weight") || $request->has("fat_expression")
            || $request->has("muscle_mass") || $request->has("bone_mass") || $request->has("kmi") || $request->has("calorie_intake")) {
            $body = new Body();
            $body->user_id = $id;
            $body->biological_age =$request->input("biological_age");
            $body->body_fluid = $request->input("body_fluid");
            $body->abdominal_fat = $request->input("abdominal_fat");
            $body->weight = $request->input("weight");
            $body->fat_expression = $request->input("fat_expression");
            $body->muscle_mass = $request->input("muscle_mass");
            $body->bone_mass = $request->input("bone_mass");
            $body->kmi = $request->input("kmi");
            $body->calorie_intake = $request->input("calorie_intake");
            $body->created = Carbon::now();
            $body->save();
        }
    }
    public function addBlood($id, RegisterRequest $request){
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
            $blood->created = Carbon::now();
            $blood->save();
        }
    }
}
