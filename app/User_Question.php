<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User_Question extends Model
{
    //relationship
    public function user() {                        // who this record belongs to
        return $this->belongsTo('App\User');
    }

    public function question(){                     // which question was attempted
        return $this->belongsTo('App\Question');
    }
}
