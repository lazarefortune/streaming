<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
      if (! $request->expectsJson()) {
          flash("<i data-feather='info' stroke-width='2.5' width='20' height='20'></i> <b> Connectez</b> vous ou <b>inscrivez vous</b> pour y accéder")->info();
          return route('login');
      }
    }
}
