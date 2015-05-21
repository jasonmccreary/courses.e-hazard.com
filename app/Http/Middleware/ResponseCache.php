<?php namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\File;

class ResponseCache
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
        $response = $next($request);

        $cache_filename = str_slug(str_replace('/', '-', $request->getRequestUri())) . '.js';
        $cache_path = public_path() . '/js/cache';

        if (!File::exists($cache_path . DIRECTORY_SEPARATOR . $cache_filename)) {
            File::put($cache_path . DIRECTORY_SEPARATOR . $cache_filename, $response->getContent());
        }

        return $response;
    }
}
