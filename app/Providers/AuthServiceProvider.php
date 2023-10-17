<?php

namespace App\Providers;

use App\Models\User;
use App\Models\Permission;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */


    public function boot()
    {
        $this->registerPolicies();

        Gate::define("admin", function (User $user) {
            return $user->hasRole("admin");
        });
        // Gate::define("manager", function (User $user) {
        //     return $user->hasRole("manager");
        // });
        // Gate::define("employe", function (User $user) {
        //     return $user->hasRole("employe");
        // });
        Gate::define("locataire", function (User $user) {
            return $user->hasRole("locataire");
        });

        // Gate::after(function (User $user) {
        //     return $user->hasRole("superadmin");
        // });
        Gate::after(function (User $user) {
            return $user->hasRole("proprietaire");
        });
    }
}
