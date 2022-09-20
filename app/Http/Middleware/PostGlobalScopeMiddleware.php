<?php

namespace App\Http\Middleware;

use App\Models\Post;
use App\Models\Scopes\PostScope;
use Closure;
use Illuminate\Http\Request;

class PostGlobalScopeMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        Post::addGlobalScope(new PostScope());
        return $next($request);
    }
}
