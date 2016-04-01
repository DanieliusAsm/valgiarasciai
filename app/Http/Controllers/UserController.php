<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Requests\RegisterRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;

class UserController extends Controller {

    public function createUser(RegisterRequest $request) {
        $vartotojas = new User();

        $vartotojas->name = $request->input("first_name");
        $vartotojas->lastname = $request->input("last_name");
        $vartotojas->gender = $request->input("gender");
        $vartotojas->age = $request->input("age");
        $vartotojas->phone = $request->input("phone");
        $vartotojas->email = $request->input("email");
        $vartotojas->notes = $request->input("notes");
        $vartotojas->diet = $request->input("diet");
        $vartotojas->created = Carbon::now();

        $vartotojas->save();

        return redirect('/user');
    }

    public function editUser($id, RegisterRequest $request) {
        $user = User::find($id);

        $user->name = $request->input("first_name");
        $user->lastname = $request->input("last_name");
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

        return view('userlist', ['users' => $users]);
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
