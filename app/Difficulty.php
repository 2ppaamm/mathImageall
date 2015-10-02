<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Difficulty extends Model
{
    //relationship
    public function user() {                        //who created this difficulty level
        return $this->belongsTo('App\User');
    }

    public function levels(){
        return $this->belongsToMany('App\Level');
    }
}
