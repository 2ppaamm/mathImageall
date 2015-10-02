<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    //relationship
    public function user() {                        //who created this level
        return $this->belongsTo('App\User');
    }

    public function tracks(){
        return $this->belongsToMany('App\Track');
    }

    public function difficulties(){
        return $this->hasMany('App\Difficulty');
    }
}
