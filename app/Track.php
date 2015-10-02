<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Track extends Model
{
    //relationship
    public function user() {                        //who created this track
        return $this->belongsTo('App\User');
    }

    public function levels(){
        return $this->hasMany('App\Level');
    }

    public function questions(){
        return $this->hasMany('App\Question');
    }
}
