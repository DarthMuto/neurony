<?php

namespace App\Http\Controllers;

use App\Http\Requests\ThreadCommentRequest;
use App\Mail\ThreadCommented;
use App\Models\Thread;
use App\Models\ThreadMessage;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class ThreadsController extends Controller {

	/** @var User */
	protected $_user;

	public function __construct() {
		$this->middleware(function(Request $request, \Closure $next) {
			$this->_user = Auth::user();
			return $next($request);
		});
	}

	public function threads(Request $request, ?string $order = 'newest') {
		if ($order != 'newest' && $order != 'alpha') {
			$order = 'newest';
		}
		$orderBy = [
			'newest' => ['created_at', 'DESC'],
			'alpha' => ['title', 'ASC'],
		][$order];
		$filter = $request->filter;
		$threadsQuery = Thread::filterByUser($filter)->select(['id', 'title', DB::raw('SUBSTRING(`content`, 1, 75) AS `content`')])
			->orderBy(...$orderBy);
		$threads = $threadsQuery->get();
		return view('threads', compact('threads', 'order', 'filter'));
	}

	public function thread(int $id) {
		return view('thread', [
			'thread' => Thread::findOrFail($id),
		]);
	}

	public function saveComment(int $id, ThreadCommentRequest $request) {
		$thread = Thread::findOrFail($id);
		/** @var ThreadMessage $message */
		$message = $thread->thread_messages()->create(['author_id' => $this->_user->id, 'content' => $request->content]);
		Mail::send(new ThreadCommented($message));
		return redirect()->back();
	}

}
