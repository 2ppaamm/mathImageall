<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use Illuminate\Support\Facades\Auth;

class Track extends Model
{
    protected $hidden = ['user_id'];
    protected $fillable = ['track', 'description', 'lowest_maxile_level','highest_maxile_level',
        'image', 'status'];

    //relationship
    public function user() {                        //who created this track
        return $this->belongsTo('App\User');
    }

    public function levels(){
        return $this->belongsToMany('App\Level')->withTimestamps();
    }

    public function status() {
        return $this->belongsTo('App\Status');
    }

    public function skills(){
        return $this->hasMany('App\Skill');
    }

    public function questions(){
        return $this->hasManyThrough('App\Question','App\Skill');
    }

    public function testers(){
        return $this->belongsToMany('App\User')->withTimestamps()->withPivot('difficulty_id','skill_id','level_id','maxile');
    }
    // scope: to use ->current()
    public function scopePublic($query){
        if (Auth::check()){
            $current_user = Auth::user();
            if ($current_user->is_admin) {
                $query->latest();
            }
            else {
                $query->where('user_id','!=',$current_user->id)->with('status')->where('status_id', '=', '3')
                    -> orWhere('user_id', '=', $current_user->id)->latest();
            }
        }
    }
    public function scopeMaxlevel($query,$track,$level){
        $query->find($track)->levels()->where('level','>',$level)->orderBy('level','desc')->first();
    }
}