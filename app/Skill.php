<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;


class Skill extends Model
{
    protected $hidden = ['user_id'];
    protected $fillable = ['skill', 'description', 'short_description', 'track_id','level_id',
        'image', 'status_id'];
    // Relationships
    public function user(){
        return $this->belongsTo('App\User');
    }
    public function track(){
        return $this->belongsTo('App\Track');
    }
    public function level(){
        return $this->belongsTo('App\Level');
    }

    public function questions(){
        return $this->hasMany('App\Question');
    }
    public function status() {
        return $this->belongsTo('App\Status');
    }
    // scope public
    public function scopePublic($query){
        if (Auth::check()){
            $current_user = Auth::user();
            if ($current_user->is_admin) {
                $query->orderBy('level_id', 'asc');
            }
            else {
                $query->where('user_id','!=',$current_user->id)->with('status')->where('status_id', '=', '3')
                    -> orWhere('user_id', '=', $current_user->id)->orderBy('level_id', 'asc');
            }
        }
    }

    public function scopeMaxskill($query,$track){
        $query->whereTrackId($track)->orderBy('skill','desc')->first();
    }

    public function scopeNextskill($query,$track,$skill){
        $query->whereTrackId($track)->where('skill','>',$skill)->orderBy('skill','asc')->first();
    }

}
