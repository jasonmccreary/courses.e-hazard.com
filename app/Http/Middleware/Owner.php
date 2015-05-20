<?php namespace App\Http\Middleware;

use Closure;

class Owner
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!$request->user()->is_admin && $request->user()->id != $request->route()->getParameter('users')) {
            return redirect('/');
        }

        return $next($request);
    }
}
