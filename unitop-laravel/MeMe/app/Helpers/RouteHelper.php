<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Route;

class RouteHelper
{
    public function isActiveRoute($routeName)
    {
        return Route::currentRouteName() === $routeName ? 'active' : '';
    }
}