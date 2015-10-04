<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    //relationship
    public function user(){
        $this->belongsTo('App\User');
    }

    public function questions(){
        $this->belongsToMany('App\Question')->withTimestamps();
    }
}
