<?php

namespace App\Providers;

use App\Models\User;
use Gate;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
       Gate::define('is_admin',function (User $user){
            return $user->is_admin;
       });

       Gate::define('show-cart',function (User $user,$id){
            return $user->id == $id;
       });

       Model::unguard();
    }
}
