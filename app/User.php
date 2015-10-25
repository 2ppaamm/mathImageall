<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['firstname', 'lastname', 'email', 'password'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    // make dates carbon so that carbon google that out
    protected $dates = ['date_of_birth', 'last_test_date', 'next_test_date'];

    // relationships
    public function questions() {                        // question setter
        return $this->hasMany('App\Question');
    }

    public function difficulties() {
        return $this->hasMany('App\Difficulty');
    }

    public function levels() {
        return $this->hasMany('App\Level');                // owns many levels
    }

    public function tracks() {
        return $this->hasMany('App\Track');
    }

    public function track_results() {                       //result for each track
        return $this->belongsToMany('App\User_Track')->withTimestamps()
            ->withPivot('difficulty_id','skill_id','level_id','maxile');
    }

    public function user_reports() {                       //reports generated user
        return $this->hasMany('App\User_Report');
    }

    public function reports(){
        return $this->hasMany('App\Report');
    }

    public function skills(){
        return $this->hasMany('App\Skill');              //originator of skills
    }

    public function tests(){
        return $this->hasMany('App\Test');
    }

    public function tested_questions(){                  // questions answered
        return $this->belongsToMany('App\Question')->withTimestamps()->withPivot('correct');
    }

    // scope: to use ->current()
    public function scopeCurrent($query){
        $query->where('id','=',Auth::user()->id);
    }
}
