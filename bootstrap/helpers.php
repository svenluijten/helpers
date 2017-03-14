<?php

use Illuminate\Routing\Router;

if (! function_exists('active_route')) {
    /**
     * Determine whether or not the current route has the given name.
     *
     * @param string|array $route
     * @param mixed $positive
     * @param mixed $negative
     *
     * @return mixed
     */
    function active_route($route, $positive = true, $negative = false)
    {
        $router = app(Router::class);

        return in_array($router->currentRouteName(), (array) $route) ? $positive : $negative;
    }
}
