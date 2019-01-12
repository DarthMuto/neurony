<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateThreadRequest;
use App\Models\Thread;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller {

	/** @var User */
	protected $_user;

	public function __construct() {
		$this->middleware(function(Request $request, \Closure $next) {
			$this->_user = Auth::user();
			return $next($request);
		});
	}

	public function profile() {
		return view('profile', ['user' => $this->_user]);
	}

	public function threadEditForm(?int $id = null) {
		$thread = $id ? $this->_user->threads()->find($id) : null;
		$submit = $id ? 'Save' : 'Create';
		return view('thread_edit', compact('thread', 'submit'));
	}

	public function saveThread(UpdateThreadRequest $request) {
		if ($request->id) {
			$thread = $this->_user->threads()->find($request->id);
		} else {
			$thread = new Thread();
			$thread->author_id = $this->_user->id;
		}
		if ($request->delete) {
			$thread->delete();
		} else {
			$thread->title = $request->title;
			$thread->content = $request->content;
			$thread->save();
		}
		return redirect('/profile');
	}



}
