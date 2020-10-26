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
    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('create_newsItems', function($user) {
            return $user->role_id == 1; // for admin
        });

        $this->registerPolicies();

        Gate::define('like_newsItems', function($user) {
            return $user->role_id == 2; // for users
        });

        $this->registerPolicies();

        Gate::define('delete_newsItems', function($user) {
            return $user->role_id == 1; // for admin
        });

        $this->registerPolicies();

        Gate::define('edit_newsItems', function($user) {
            return $user->role_id == 1; // for admin
        });

        $this->registerPolicies();

        Gate::define('toggle_newsItems', function($user) {
            return $user->role_id == 1; // for admin
        });

        $this->registerPolicies();

        Gate::define('comment_newsItems', function($user) {
            return $user->role_id == 2; // for user
        });



        $this->registerPolicies();

        Gate::define('hasEnoughLikes', function ($user) {
            $totalLikes = count($user->likes);
            if ($totalLikes > 4) {
                return true;

            }


        });


        $this->registerPolicies();

        Gate::define('message_hasEnoughLikes', function($user) {
            $totalLikes = count($user->likes);
            if ($totalLikes < 5 && $user->role_id ==2){
                return true;
            }

        });

    }
}
