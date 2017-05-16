<?php

namespace Corp\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;


class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'Corp\Article' => 'Corp\Policies\ArticlePolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('view_admin', function($user){
            return $user->canDo(['view_admin', 'add_articles'], false);
        });
        Gate::define('view_admin_articles', function($user){
            return $user->canDo('view_admin_articles');
        });

         Gate::define('edit_users', function($user){
            return $user->canDo('edit_users');
        });
         
    }
}
