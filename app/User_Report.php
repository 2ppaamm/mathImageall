<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User_Report extends Model
{
    //relationship
    public function user() {                        // who this report belongs to
        return $this->belongsTo('App\User');
    }
}
