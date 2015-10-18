<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Question extends Model
{
    protected $hidden = ['user_id'];
    protected $fillable = ['track_id', 'level_id', 'difficulty_id','question', 'status_id',
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
    public function skill() {
        return $this->belongsTo('App\Skill');
    }
    public function status() {
        return $this->belongsTo('App\Status');
    }

    // quizzes and tests
    public function tests(){
        return $this->belongsToMany('App\Test');
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

    public function scopeLearn($query){
        $query->select('id','question','answer0','answer1','answer2','answer3','correct_answer',
            'answer0_image','answer1_image','answer2_image', 'answer3_image');
    }

    public function scopeQuiz($query){
        $query->select('id','question','answer0','answer1','answer2','answer3',
            'answer0_image','answer1_image','answer2_image', 'answer3_image');
    }

    public function scopeMaiden($query){
        $query->whereSkillId(Skill::whereLevelId(Level::whereAge(Auth::user()->date_of_birth->age)->first()->id)->first()->id);
    }
}