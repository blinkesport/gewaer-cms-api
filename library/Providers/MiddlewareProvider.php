<?php

declare(strict_types=1);

namespace Gewaer\Providers;

use Canvas\Providers\MiddlewareProvider as CanvasMiddlewareProvider;
use Gewaer\Middleware\SiteMiddleware;
use Gewaer\Middleware\SiteCmsMiddleware;

class MiddlewareProvider extends CanvasMiddlewareProvider
{
    protected $globalMiddlewares = [
        // Before the handler has been executed
    ];

    /**
     * This are the routes you have access to via the Baka routes components.
     *
     * This follows the order you specify on this array so
     *  - Token will run before Auth
     *
     * @var array
     */
    protected $routeMiddlewares = [
        'auth.site' => SiteMiddleware::class,
        'cms.site' => SiteCmsMiddleware::class
    ];
}
