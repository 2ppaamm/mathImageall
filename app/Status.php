<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    public function tracks(){
        return $this->hasMany('App\Tracks');
    }
}
