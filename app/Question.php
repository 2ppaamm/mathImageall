<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Question extends Model
{
    protected $hidden = ['user_id'];
    protected $fillable = ['track_id', 'level_id', 'question',
    'answer1', 'answer2', 'answer3', 'answer4', 'correct_answer'];

    //relationship
    public function user() {                        //who created this question
        return $this->belongsTo('App\User');
    }

    public function track(){
        return $this->belongsTo('App\Track');
    }

    public function level(){
        return $this->belongsTo('App\Level');
    }

    public function difficulty(){
        return $this->belongsTo('App\Difficulty');
    }

    // scope: to use ->public()
    public function scopePublic($query){
        $query->where('is_private','=', FALSE);
    }

    public function scopePrivate($query){
        $query->where('is_private','=', TRUE)->where('user_id', '=', Auth::user()->id);
    }

    public function scopePublished($query){
        $query->where('is_hidden','=',FALSE);
    }

    public function scopeUnpublished($query){
        $query->where('is_hidden','=',TRUE);
    }
}
