<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Gate;
use App\Policies\CategoryPolicy;
// use App\Models\User;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        //
        $this->registerPolicies();

        Gate::define('list-category',[CategoryPolicy::class,'view']);
        Gate::define('add-category',[CategoryPolicy::class,'create']);
        Gate::define('edit-category',[CategoryPolicy::class,'update']);
        Gate::define('delete-category',[CategoryPolicy::class,'delete']);

    }
}
