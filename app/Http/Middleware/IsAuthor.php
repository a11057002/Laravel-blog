<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Post;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsAuthor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // $post = Post::where('slug',request()->route()->parameters['post'])->first();。
        $post = request()->route()->parameters['post'];
        if(!$post->user->id === auth()->user()->id)
            abort(Response::HTTP_FORBIDDEN);
        return $next($request);
    }
}
