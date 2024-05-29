<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

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

        // category
        Gate::define('list_category', 'App\policies\CategoryPolicy@view');
        Gate::define('add_category', 'App\policies\CategoryPolicy@create');
        Gate::define('edit_category', 'App\policies\CategoryPolicy@update');
        Gate::define('delete_category', 'App\policies\CategoryPolicy@delete');

        // Drink
        Gate::define('list_drink', 'App\policies\DrinkPolicy@view');
        Gate::define('add_drink', 'App\policies\DrinkPolicy@create');
        Gate::define('edit_drink', 'App\policies\DrinkPolicy@update');
        Gate::define('delete_drink', 'App\policies\DrinkPolicy@delete');

        // Employee
        Gate::define('list_employee', 'App\policies\EmployeePolicy@view');
        Gate::define('add_employee', 'App\policies\EmployeePolicy@create');
        Gate::define('edit_employee', 'App\policies\EmployeePolicy@update');
        Gate::define('delete_employee', 'App\policies\EmployeePolicy@delete');


        // Permission
        Gate::define('list_permission', 'App\policies\PermissionPolicy@view');
        Gate::define('add_permission', 'App\policies\PermissionPolicy@create');
        Gate::define('edit_permission', 'App\policies\PermissionPolicy@update');
        Gate::define('delete_permission', 'App\policies\PermissionPolicy@delete');

        // Permission group
        Gate::define('list_permission_group', 'App\policies\PermissionGroupPolicy@view');
        Gate::define('add_permission_group', 'App\policies\PermissionGroupPolicy@create');
        Gate::define('edit_permission_group', 'App\policies\PermissionGroupPolicy@update');
        Gate::define('delete_permission_group', 'App\policies\PermissionGroupPolicy@delete');

        // Role
        Gate::define('list_role', 'App\policies\RolePolicy@view');
        Gate::define('add_role', 'App\policies\RolePolicy@create');
        Gate::define('edit_role', 'App\policies\RolePolicy@update');
        Gate::define('delete_role', 'App\policies\RolePolicy@delete');

        // Area
        Gate::define('list_area', 'App\policies\AreaPolicy@view');
        Gate::define('add_area', 'App\policies\AreaPolicy@create');
        Gate::define('edit_area', 'App\policies\AreaPolicy@update');
        Gate::define('delete_area', 'App\policies\AreaPolicy@delete');

        // Area
        Gate::define('list_table', 'App\policies\TablePolicy@view');
        Gate::define('add_table', 'App\policies\TablePolicy@create');
        Gate::define('edit_table', 'App\policies\TablePolicy@update');
        Gate::define('delete_table', 'App\policies\TablePolicy@delete');

        // Home
        Gate::define('list_home', function ($user) {
            return $user->checkPermissionAccess('list_home');
        });
    }
}
