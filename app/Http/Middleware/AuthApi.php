<?php

namespace App\Http\Middleware;

use App\Http\Controllers\Core\ApiLogin;
use Closure;

class AuthApi
{
    public function handle($request, Closure $next)
    {
        $token = $request->get('token');

        if($token) {
            $authApi = new ApiLogin();
            $user = $authApi->getUserData($token);

            // Puede que el API retorne un error
            if(isset($user['error']) && $user['code']==403) {
                session()->flush();
                return redirect('login')->withErrors(['auth.api'=>$user]);
            }

            session()->put('token', $token);
            session()->put('user', $user);
            return redirect()->route('home');
        }

        // No hay datos de usuario!
        if(!session('user')) {
            return redirect('login');
        }

        return $next($request);
    }
}