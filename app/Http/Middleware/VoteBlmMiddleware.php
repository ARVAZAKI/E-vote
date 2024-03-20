<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class VoteBlmMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::user()->role != 'mahasiswa'){
            abort(404);
        }
        if(Auth::user()->photo == NULL){
            return redirect('/upload-photo');
        }
        if(Auth::user()->pending_bem_id == NULL){
            return redirect('/vote/bem');
        }
        if(Auth::user()->pending_blm_id != NULL){
            Auth::logout();
            session()->invalidate();
            session()->regenerateToken();
            return redirect('/login')->with('message','Anda telah memilih..');
        }
        return $next($request);
    }
}
