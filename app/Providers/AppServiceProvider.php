<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        Gate::define('see-admin', function (User $user){
            return $user->rol === 'admin';
        });

        Gate::define('see-sales', function (User $user){
            return in_array($user->rol, ['admin', 'cajero']);
        });
    }
}
