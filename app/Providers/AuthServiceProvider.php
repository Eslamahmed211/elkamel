<?php

namespace App\Providers;

use App\Models\role;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

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
        Gate::define('has', function ($user, $role) {
            $user_role = role::find(auth()->user()->role_id);

            if (is_null($user_role )) {
                abort(403, 'لا يوجد لديك صلاحية ');
            }




            return in_array($role, (json_decode($user_role->permissions)));
        });
    }
}
