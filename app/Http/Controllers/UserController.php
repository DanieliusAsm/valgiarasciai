<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\NewUserRequest;
use App\User;

class UserController extends Controller {

    public function createUser(NewUserRequest $request){
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
    }

    public function getUsers() {
        $users = User::all();

        return view('userlist', ['users'=>$users]);
    }
}
