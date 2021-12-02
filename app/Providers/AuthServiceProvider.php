<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        Gate::define('delete-permission','App\Policies\PostPolicy@delete');
        Gate::define('checkkaryawan','App\Policies\PostPolicy@checkkaryawan');
        Gate::define('isAdmin', function($user){
            return $user->status == 'admin' || $user->status == 'karyawan';
        });

      
        //
    }
}
