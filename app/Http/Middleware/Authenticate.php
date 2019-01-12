<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Authenticate {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @param  \Closure $next
	 * @param string $guardName
	 * @param string $loginFormRouteName
	 * @return mixed
	 */
	public function handle($request, Closure $next, string $guardName, string $loginFormRouteName) {
		if (!Auth::guard($guardName)->id()) {
			return redirect()->route($loginFormRouteName);
		}
		return $next($request);
	}
}
