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

    Gate::define('edit-users',function($user){ //creating the gate and putting the curent user '$user'in the closure
        return $user->hasRole('admin'); //check if the user has the admin role
    }); // => here we are saying if the user wants to passe the 'edit-users' gate he need to have the 'admin' role

    Gate::define('delete-users',function($user){
        return $user->hasRole('admin');
    });

    Gate::define('manage-users',function($user){
        return $user->hasAnyRoles(['admin','editor','generic']);
    });

    Gate::define('posts-management',function($user){
        return $user->hasAnyRoles(['admin','editor','writer']);
    });

    Gate::define('manage-categories',function($user){
        return $user->hasAnyRoles(['admin','editor']);
    });

    }
}
