<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth; 
use Closure;
use Illuminate\Http\Request;

class CanEditProfile
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next)
{
    $user = $request->user();

    if ($user && $user->can('edit profile')) {
        return $next($request);
    }

    return redirect()->back()->with('error', 'Bạn không có quyền truy cập vào trang này!');
}


}
