<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Difficulty extends Model
{
    protected $hidden = ['user_id'];
    protected $fillable = ['difficulty', 'description', 'short_description',
        'image', 'status'];
    //relationship
    public function user() {                        //who created this difficulty level
        return $this->belongsTo('App\User');
    }

    public function levels(){
        return $this->belongsToMany('App\Level');
    }
    public function status() {
        return $this->belongsTo('App\Status');
    }

    //scope
    public function scopePublic($query){
        if (Auth::check()){
            $current_user = Auth::user();
            if ($current_user->is_admin) {
                $query->orderBy('difficulty', 'asc');
            }
            else {
                $query->where('user_id','!=',$current_user->id)->with('status')->where('status_id', '=', '3')
                    -> orWhere('user_id', '=', $current_user->id)->orderBy('difficulty', 'asc');
            }
        }
    }
}
