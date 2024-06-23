<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Gate::define('super-user', function (User $user) {
            return $user->level == 1;
        });
        Gate::define('pengendali-inventory', function (User $user) {
            return $user->level == 3;
        });
        Gate::define('kepala-unit-inventory', function (User $user) {
            return $user->level == 2;
        });;
    }
}
