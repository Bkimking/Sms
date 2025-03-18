<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use App\Http\Middleware\admin;
use App\Http\Middleware\student;
use App\Http\Middleware\superadmin;
use App\Http\Middleware\teacher;
use App\Http\Middleware\cafeteria;
use App\Http\Middleware\alumni;
use App\Http\Middleware\media;
use App\Http\Middleware\sponsored;
use App\Http\Middleware\user;

use App\Http\Middleware\EnsureProfileIsComplete;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        //
        $middleware->alias([
        //logins
        "admin" => admin::class,
        "student" => student::class,
        "superadmin" => superadmin::class,
        "teacher" => teacher::class,
        "cafeteria" => cafeteria::class,
        "alumni" => alumni::class,
        "media" => media::class,
        "sponsored" => sponsored::class,
        "user" => user::class,
        //ensure profile is added.
        "ensureProfileIsComplete" => EnsureProfileIsComplete::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
