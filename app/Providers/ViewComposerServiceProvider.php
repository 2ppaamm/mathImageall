<?php
namespace App\Providers;

use App\Difficulty;
use App\Level;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Track;
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

        view()->composer(['questions._questionform'], function($view){
            $view->with(['tracks'=> Track::lists('track','id'),
                'levels' => Level ::lists('description', 'id'),
                'difficulties' => Difficulty::lists('description', 'id'),
                'user' => Auth::user()
            ]);
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
