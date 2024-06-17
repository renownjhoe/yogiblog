<?php

namespace App\Http\Middleware;

use App\Models\Post;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CanEditPost
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $postId)
    {
        $post = Post::findOrFail($postId);

        if (Auth::guest() || !Auth::user()->hasRole('admin') && !Auth::user()->hasPermission('edit posts')) {
            abort(403, 'Unauthorized'); // Or redirect to an appropriate error page
        }

        return $next($request);
    }
}
