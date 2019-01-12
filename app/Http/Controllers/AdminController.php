<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\Thread;
use Illuminate\Http\Request;

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
		//
	}

	public function logout() {
		//
	}

}
