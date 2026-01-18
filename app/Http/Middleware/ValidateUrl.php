<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ValidateUrl
{
    public function handle(Request $request, Closure $next)
    {
        $url = $request->input('imagen');

        if (empty($url) || filter_var($url, FILTER_VALIDATE_URL) === false) {
            return redirect('/')->with('error', 'URL de imagen no válida');
        }

        return $next($request);
    }
}
