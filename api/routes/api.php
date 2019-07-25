<?php

use Baka\Router\RouteGroup;
use Baka\Router\Route;

$routes = [
    Route::get('/')->controller('IndexController'),
    Route::get('/status')->controller('IndexController')->action('status'),
];

$privateRoutes = [
    Route::crud('/posts'),
    Route::crud('/tags'),
    Route::crud('/posts-status')->controller('StatusController'),
    Route::crud('/categories'),
    Route::crud('/posts-tags')->controller('PostsTagsController'),
    Route::crud('/posts-types')->controller('PostsTypesController')
];

$routeGroup = RouteGroup::from($routes)
                ->defaultNamespace('Gewaer\Api\Controllers')
                ->defaultPrefix('/v1');

$privateRoutesGroup = RouteGroup::from($privateRoutes)
                ->defaultNamespace('Gewaer\Api\Controllers')
                ->addMiddlewares('auth.jwt@before', 'auth.acl@before', 'cms.site@before')
                ->defaultPrefix('/v1');

return array_merge($routeGroup->toCollections(), $privateRoutesGroup->toCollections());
