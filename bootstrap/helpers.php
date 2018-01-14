<?php

use Illuminate\Pipeline\Pipeline;
use Illuminate\Support\Str;
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

if (! function_exists('str_possessive')) {
    /**
     * Appends an apostrophe and returns the possessive form of the given
     * subject string.
     *
     * @param string $subject
     *
     * @return string
     */
    function str_possessive($subject)
    {
        if (! Str::endsWith($subject, ['s', 'z', 'ch'])) {
            $suffix = 's';
        }

        return $subject.'\''.($suffix ?? '');
    }
}

if (! function_exists('pipe')) {
    /**
     * Send the given subject through a pipeline.
     *
     * @param mixed $subject
     *
     * @return \Illuminate\Pipeline\Pipeline
     */
    function pipe($subject)
    {
        /** @var \Illuminate\Pipeline\Pipeline $pipeline */
        $pipeline = app(Pipeline::class);

        return $pipeline->send($subject);
    }
}
