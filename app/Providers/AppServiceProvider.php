<?php

namespace App\Providers;

use App\Models\Group;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Prophecy\Exception\Exception;

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
        if (! $this->app->runningInConsole()) {
            // App is not running in CLI context
            // Do HTTP-specific stuff here
            $groups = Group::orderBy('name', 'asc')->get();
            view()->share('groups', $groups);
        }
    }
}
