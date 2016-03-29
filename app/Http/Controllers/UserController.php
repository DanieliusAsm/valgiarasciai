<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\User;

class UserController extends Controller {

    public function createUser(RegisterRequest $request) {
        $vartotojas = new User();

        $vartotojas->first_name = $request->input("first_name");
        $vartotojas->last_name = $request->input("last_name");
        $vartotojas->gender = $request->input("gender");
        $vartotojas->age = $request->input("age");
        $vartotojas->phone = $request->input("phone");
        $vartotojas->email = $request->input("email");
        $vartotojas->notes = $request->input("notes");
        $vartotojas->diet = $request->input("diet");

        $vartotojas->save();

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
        $user->diet = $request->input("diet");

        $user->save();

        return redirect('/user');
    }
	
    public function getUsers() {
        $users = User::all();

        return view('userlist', ['users'=>$users]);
    }

    public function deleteUser($id) {
        $user = User::find($id);

        if (!empty($user)) {
            $user->delete();
        }

        return redirect('/user');
    }
}
