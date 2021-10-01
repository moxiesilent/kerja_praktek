<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Auth\Access\Response;

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
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('mahasiswa',function($user){
            return ($user->sebagai=='mahasiswa'
                ? Response::allow()
                : Response::deny('Hanya mahasiswa yang dapat memasuki halaman ini')
            );
        });
        Gate::define('admin',function($user){
            return ($user->sebagai=='admin'
                ? Response::allow()
                : Response::deny('Hanya admin yang dapat memasuki halaman ini')
            );
        });
        Gate::define('dosen',function($user){
            return ($user->sebagai=='dosen'
                ? Response::allow()
                : Response::deny('Hanya dosen yang dapat memasuki halaman ini')
            );
        });
    }
}
