<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\Thread;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller {

	public function index() {
		return view('admin.index', ['threads' => Thread::all()]);
	}

	public function deleteThreads(Request $request) {
		Thread::whereIn('Id', $request->thread_ids)->get()->each(function(Thread $thread) {
			$thread->delete();
		});
		return redirect()->back();
	}

	public function loginForm() {
		return view('admin.login_form');
	}

	public function login(LoginRequest $request) {
		if (!Auth::guard('admin')->attempt($request->only(['email', 'password']))) {
			return redirect()->back()->with('message', 'Invalid email and/or password');
		}
		return redirect('/admin');
	}

	public function logout() {
		Auth::guard('admin')->logout();
		return redirect('/');
	}

}
