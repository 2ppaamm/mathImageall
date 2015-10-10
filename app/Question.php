<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Question extends Model
{
    protected $hidden = ['user_id'];
    protected $fillable = ['track_id', 'level_id', 'difficulty_id','question',
        'answer1', 'answer2', 'answer3', 'answer4', 'correct_answer', 'source', 'question_image'
        ,'answer1_image','answer2_image','answer3_image','answer4_image'];

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
    public function status() {
        return $this->belongsTo('App\Status');
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