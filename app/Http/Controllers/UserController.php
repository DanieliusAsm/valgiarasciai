<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\User;

class UserController extends Controller {

    public function createUser(RegisterRequest $request) {
        $user = new User();

        $user->first_name = $request->input("first_name");
        $user->last_name = $request->input("last_name");
        $user->gender = $request->input("gender");
        $user->age = $request->input("age");
        $user->phone = $request->input("phone");
        $user->email = $request->input("email");
        $user->notes = $request->input("notes");
        $user->weight = $request->input("weight");
        $user->wrist = $request->input("wrist");
        $user-> waist = $request->input("waist");

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
        $user->notes = $request->input("notes");
        $user->weight = $request->input("weight");
        $user->wrist = $request->input("wrist");
        $user-> waist = $request->input("waist");

        $user->save();

        return redirect('/user');
    }
	
    public function getUsers() {
        $users = User::all();

        return view('userlist', ['users'=>$users]);
    }

    public function getUser($id) {
        $user = User::find($id);

        return view('edituser', ['user'=>$user,'id'=>$id]);
    }

    public function deleteUser($id) {
        $user = User::find($id);

        if (!empty($user)) {
            $user->delete();
        }

        return redirect('/user');
    }
}
