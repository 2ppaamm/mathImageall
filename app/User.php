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
    public function questions() {
        return $this->hasMany('App\Question');
    }

    public function difficulties() {
        return $this->hasMany('App\Difficulty');
    }

    public function levels() {
        return $this->hasMany('App\Level');
    }

    public function tracks() {
        return $this->hasMany('App\Track');
    }

    public function track_results() {                       //result for each track
        return$this->hasMany('App\User_Track');
    }

    public function user_questions() {                       //result for each question attempted
        return$this->hasMany('App\User_Question');
    }

    public function user_reports() {                       //reports generated user
        return$this->hasMany('App\User_Report');
    }

    // scope: to use ->current()
    public function scopeCurrent($query){
        $query->where('id','=',Auth::user()->id);
    }
}
