<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Request
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!Auth::user()->is_complete) {
            if (Auth::user()->requested_by) {
                // Redirect Uplaod Bukti
                return redirect()->route('upload');
            }else{
                // Redirect Requested User Code
                return redirect()->route('requested');
            }
        }
    }
}
