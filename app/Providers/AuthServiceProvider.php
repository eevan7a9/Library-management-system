<?php

namespace App\Providers;

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
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        /**Create a Gate that will not allow standard users to access */
        Gate::define('notStandard', function($user){
            return $user->user_type > 0;
        });

        /**Create a Gate to allow only Admin */
        Gate::define('isAdmin', function($user){
            return $user->user_type == 2;
        });
        Gate::define('isLibrarian', function($user){
            return $user->user_type == 1;
        });

        Gate::define('isLogin', function(){
            return Auth::check();
        });
    }
}
