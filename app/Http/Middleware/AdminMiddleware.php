<?php namespace App\Http\Middleware;

use Closure;

class AdminMiddleware {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
        if (!$request->user()->is_admin)
        {
            return redirect('/')->with('flash', ['level' => 'error', 'message' => 'You do not have access to this feature.']);;
        }

		return $next($request);
	}
}
