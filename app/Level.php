<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Level extends Model
{
    protected $hidden = ['user_id'];
    protected $fillable = ['level', 'description', 'age', 'lowest_maxile_level','highest_maxile_level',
        'image', 'status_id'];
    //relationship
    public function user() {                        //who created this level
        return $this->belongsTo('App\User');
    }

    public function tracks(){
        return $this->belongsToMany('App\Track')->withTimestamps();
    }

    public function questions(){
        return $this->hasManyThrough('App\Question','App\Skill');
    }

    public function difficulties(){
        return $this->hasMany('App\Difficulty');
    }

    public function skills(){
        return $this->hasMany('App\Skill');
    }

    public function status() {
        return $this->belongsTo('App\Status');
    }

    // scopes

    public function scopePublic($query){
        if (Auth::check()){
            $current_user = Auth::user();
            if ($current_user->is_admin) {
                $query->orderBy('level', 'asc');
            }
            else {
                $query->where('user_id','!=',$current_user->id)->with('status')->where('status_id', '=', '3')
                    -> orWhere('user_id', '=', $current_user->id)->orderBy('level', 'asc');
            }
        }
    }
    public function scopeMaxlevel($query,$track){
        $query->$track->levels()->orderBy('level','desc')->first();
    }

}
