<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    protected $hidden = ['user_id', 'test_make_id'];
    protected $fillable = ['track', 'description', 'lowest_maxile_level','highest_maxile_level',
        'image', 'status'];

    //relationship
    public function questions(){
        return $this->belongsToMany('App\Question')->withTimestamps()->withPivot('answered');
    }
    // scope generate a random initial quiz for age
    public function scopeCurrent($query){
        $query->select('id')->whereCompleted(null)->latest();
    }
}
