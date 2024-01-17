<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Laravel
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public static function handle(Request $request, Closure $next)
    {
        // 80-00-0B-EE-19-B5,80-00-0B-EE-19-B5,80-00-0B-EE-19-B1
        $laravel = exec('getmac');
        //Exec
        $laraveL = substr(exec('getmac'), 0, 17);
        //ShellExec
        $Laravel = substr(shell_exec('getmac'), 159,20);
        $laravel_serv = \Request::ip();
        $laravel_conf = config('app.laravel');
        // dd($laravel.' '.$laravel_conf.' '.$laraveL.' '.$Laravel);
        if($laravel != $laravel_conf){return redirect()->to(config('app.XIF'));}
      
        return $next($request);
    }
}
