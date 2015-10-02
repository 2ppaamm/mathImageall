<?php
namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;
use App\User;
class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        // always returns $user whether logged in or not, null if not

        view()->composer(['layouts._rightnav','layouts._loginForm'], function($view){
            $view->with('user', Auth::check() ? Auth::user()->firstname : null);
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
