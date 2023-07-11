<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

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
        $this->registerPolicies();

        Gate::define('access-client', function(User $user) {
            if($user->user_role != 1) {
                return Response::deny('Доступ Запрещён!');
            }
            else {
                return true;
            }
        });

        Gate::define('access-dispatcher', function(User $user) {
            if($user->user_role != 2) {
                return Response::deny('Доступ Запрещён!');
            }
            else {
                return true;
            }
        });
    }
}
