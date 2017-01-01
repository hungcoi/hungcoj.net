<?php

if (!function_exists('activeClass')) {
    function activeClass($routes = [])
    {
        return  in_array(Route::currentRouteName(), $routes) ? 'active' : '';
    }
}
