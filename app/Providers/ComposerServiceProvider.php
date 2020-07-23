<?php

namespace App\Providers;

use App\Channel;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('layouts.app', function ($view){
            $channels = Channel::all(['slug', 'name']);
            $view->with(compact('channels'));
        });

        view()->composer('layouts.manager', 'App\Http\views\MenuViewComposer@composer');
    }
}
