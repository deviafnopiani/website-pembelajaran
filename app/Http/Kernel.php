<?php

namespace App\Http;
use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
protected $routeMiddleware = [
    'auth' => \App\Http\Middleware\Authenticate::class,
    'roleadmin' => \App\Http\Middleware\RoleAdmin::class,
    'roleuser' => \App\Http\Middleware\RoleUser::class,
    'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
];

}