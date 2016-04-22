<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Http\Requests\BodyRequest;
use App\User;
use App\Body;
use App\Blood;
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
        $user->height = $request->input("height");
        $user->notes = $request->input("notes");
        $user->weight = $request->input("weight");
        $user->wrist = $request->input("wrist");
        $user-> waist = $request->input("waist");
        $user->created = Carbon::now();

        $user->save();

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

    public function addBody($id, BodyRequest $request){
        $body = new Body();

        $body->user_id = $id;
        $body->biological_age = $request->input("biological_age");
        $body->body_fluid = $request->input("body_fluid");
        $body->abdominal_fat = $request->input("abdominal_fat");
        $body->weight = $request->input("weight");
        $body->fat_expression = $request->input("fat_expression");
        $body->muscle_mass = $request->input("muscle_mass");
        $body->bone_mass = $request->input("bone_mass");
        $body->kmi = $request->input("kmi");
        $body->calorie_intake = $request->input("calorie_intake");
        $body->save();

        return redirect('/user');
    }
}
