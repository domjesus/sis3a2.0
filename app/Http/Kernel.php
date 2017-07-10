<?php

namespace sis3a_oficial\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * The application's global HTTP middleware stack.
     *
     * These middleware are run during every request to your application.
     *
     * @var array
     */
    protected $middleware = [
        \Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode::class,
    ];

    /**
     * The application's route middleware groups.
     *
     * @var array
     */
    protected $middlewareGroups = [
        'web' => [
            \sis3a_oficial\Http\Middleware\EncryptCookies::class,
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            \Illuminate\Session\Middleware\StartSession::class,
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
            \sis3a_oficial\Http\Middleware\VerifyCsrfToken::class,            
        ],

        'api' => [
            'throttle:60,1',
        ],
    ];

    /**
     * The application's route middleware.
     *
     * These middleware may be assigned to groups or used individually.
     *
     * @var array
     */
    protected $routeMiddleware = [
        'auth' => \sis3a_oficial\Http\Middleware\Authenticate::class,
        'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
        'can' => \Illuminate\Foundation\Http\Middleware\Authorize::class,
        'guest' => \sis3a_oficial\Http\Middleware\RedirectIfAuthenticated::class,
        'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
        'logar' => \sis3a_oficial\Http\Middleware\Logar::class,
        'check' => \sis3a_oficial\Http\Middleware\CheckSession::class,
        'admin' => \sis3a_oficial\Http\Middleware\AdminChecker::class,
        'checkuser' => \sis3a_oficial\Http\Middleware\CheckUserAltSenha::class,
        'checkid' => \sis3a_oficial\Http\Middleware\Is_from_ol_id::class,
    ];
}
