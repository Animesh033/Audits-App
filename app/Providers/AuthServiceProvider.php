<?php

namespace App\Providers;

use App\Models\Admin\Admin;//added
use App\Policies\PostPolicy;//added

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    // protected $policies = [
    //     'App\Model' => 'App\Policies\ModelPolicy',
    // ];//commented by animesh
    protected $policies = [ //added
        Admin::class => AdminPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        Gate::define('is-super-admin', 'App\Policies\AdminPolicy@isSuperAdmin');//added
        Gate::resource('admins', 'App\Policies\AdminPolicy');//added

        //
    }
}
