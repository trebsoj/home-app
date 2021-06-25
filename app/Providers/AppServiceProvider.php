<?php

namespace App\Providers;

use App\Models\Group;
use Illuminate\Support\Facades\Schema;
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
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
//        if (Schema::hasTable('groups')) {
//            $groups = Group::orderBy('name', 'asc')->get();
//            view()->share('groups', $groups);
//        }
    }
}
