<?php

namespace App\Http\Controllers;

use App\Admin;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
	public function getDashboard() {
		return view('dashboard');

	}

    public function postSignUp(Request $request) {

		$email = $request['email'];
		$username = $request['username'];
		$password = bcrypt($request['password']);

		$admin = new Admin();
		$admin->email = $email;
		$admin->username = $username;
		$admin->password = $password;

		$admin->save();

		return redirect()->route('dashboard');
	}

	public function postSignIn(Request $request) {

		if (Auth::attempt(['email' => $request['email'], 'password' => $request['password']])) {
			return redirect()->route('dashboard');
		}

		return redirect()->back();

	}
}