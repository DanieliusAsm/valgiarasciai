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

		Auth::login($admin);

		return redirect()->route('dashboard');
	}

	public function postSignIn(Request $request) {

		$this->validate($request, [
			'email' => 'required',
			'password' => 'required'
		]);

		if (Auth::attempt(['email' => $request['email'], 'password' => $request['password']])) {
			return redirect()->route('dashboard');
		}

		return redirect()->back()->withErrors(['email' => 'Klaidingai įvestas el. pašto adresas arba slaptažodis']);

	}

	public function getLogout() {
		
		Auth::logout();
		return redirect()->route('home');
	}
}