<?php
namespace App\Providers;

use App\Difficulty;
use App\Level;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Track;
use App\Skill;
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

        view()->composer(['layouts._rightnav','layouts.loginForm','tracks.index','skills.create',
            'level.index','tracks.editForm', 'levels.editForm', 'difficulties.editForm'], function($view){
            $view->with('user', Auth::check() ? Auth::user()->firstname : null);
        });

        view()->composer(['questions._questionform', 'skills.newform', 'skills._rowform'], function($view){
            $view->with(['tracks'=> Track::lists('track','id'),
                'levels' => Level ::lists('description', 'id'),
                'difficulties' => Difficulty::lists('difficulty', 'id'),
                'skills'=>Skill::lists('short_description','id'),
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
