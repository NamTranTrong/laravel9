<?php

namespace App\Services;
use Gate;

class PermissionGateAndPolicyAccess{
    
    public function setGateAndPolicyAccess(){
        Gate::define('category-index', 'App\Policies\CategoryPolicy@view');
        Gate::define('category-add', 'App\Policies\CategoryPolicy@create');
        Gate::define('category-edit', 'App\Policies\CategoryPolicy@edit');
    }
}