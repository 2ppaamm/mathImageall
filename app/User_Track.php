<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class User_Track extends Model
{
    // mutator to use:
    public function setDateAttainedCurrentAttribute($date){
     $this->attributes['date_attained_current']= Carbon::createFromTimestamp('Y-m-d',$date);
    }

    //relationship
    public function user() {                        // who this track record belongs to
        return $this->belongsTo('App\User');
    }

    public function track(){                     // which track is this recording
        return $this->belongsTo('App\Track');
    }
}
