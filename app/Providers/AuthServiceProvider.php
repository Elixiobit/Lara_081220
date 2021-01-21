<?php

namespace App\Providers;

use App\Abilities;
use App\Models\News;
use App\Models\User;
use App\Policies\NewsPolice;
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
        News::class => NewsPolice::class
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define(Abilities::IS_ADMIN, function (User $user){
           return $user->is_admin;
        });

        Gate::define('happy_ny', function (User $user) {
           return date('Y-m-d') > '2020-12-31';
        });
    }
}
