<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class AccountController extends Controller
{
    public function registerForm() {
    	return view('reg_form');
    }

    public function register(RegisterRequest $request) {
		$user = new User();
		$user->email = $request->email;
		$user->password = Hash::make($request->password);
		$user->save();
		Auth::login($user);
		return redirect('/');
    }

    public function logout() {
    	Auth::logout();
    	return redirect('/');
    }

    public function loginForm() {
    	return view('login_form');
    }

    public function login(LoginRequest $request) {
    	if (!Auth::attempt($request->only(['email', 'password']))) {
    		return Redirect::back()->with('message', 'Invalid email and/or password');
	    }
    	return redirect('/');
    }
}
