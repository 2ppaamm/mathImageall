<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Question extends Model
{
    protected $hidden = ['user_id'];
    protected $fillable = ['user_id','skill_id','difficulty_id','question', 'type_id','status_id', 'answer0',
        'answer1', 'answer2', 'answer3', 'answer4', 'correct_answer', 'source', 'question_image'
        ,'answer_image','answer1_image','answer2_image','answer3_image','answer4_image'];

    //relationship
    public function user() {                        //who created this question
        return $this->belongsTo('App\User');
    }

    public function difficulty(){
        return $this->belongsTo('App\Difficulty');
    }
    public function skill() {
        return $this->belongsTo('App\Skill');
    }

    public function getTrackAttribute(){
        return $this->skill->track;
    }

    public function status() {
        return $this->belongsTo('App\Status');
    }

    // quizzes and tests
    public function tests(){
        return $this->belongsToMany('App\Test')->withTimestamps()->withPivot('answered');
    }

    public function tested_users(){
        return $this->belongsToMany('App\User')->selectRaw('sum(question_user.correct) as total_correct')
            ->withTimestamps()->withPivot('correct');
    }

    public function question_user(){
        return $this->belongsToMany('App\User')->withTimestamps()->withPivot('correct');
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

    public function scopeNorepeat($query){

    }
    // scopes for quiz
    public function scopeQuiz($query){
        $query->select('id','question','question_image','answer0','answer1','answer2','answer3',
            'answer0_image','answer1_image','answer2_image', 'answer3_image');
    }

    public function scopeDiagnostic($query){
        $query->quiz()->whereDifficultyId(1)
            ->wherein('skill_id',Skill::select('id')
                ->whereLevelId(Level::whereAge(Auth::user()->date_of_birth->age)->select('id')->first()->id)
                ->groupBy('track_id')
                ->get())
            ->groupBy('skill_id')
            ->get();
    }

    public function scopeSimilar($query, $difficulty,$skill){
        $query->whereDifficultyId($difficulty)->whereSkillId($skill)
            ->orderByRaw("RAND()");
    }

    public function scopeHarder($query,$difficulty,$skill){
        $query->whereDifficultyId(Difficulty::where('difficulty','>',$difficulty)
            ->orderBy('difficulty','asc')->first()->id)->whereSkillId($skill)
            ->orderByRaw("RAND()");
    }

    public function scopeEasier($query,$difficulty,$skill){
        $query->whereDifficultyId(Difficulty::where('difficulty','<',$difficulty)->orderBy('difficulty','desc')->first()->id)->whereSkillId($skill)->orderByRaw("RAND()");
    }

    public function scopeUpskill($query,$skill, $track, $level){
        if ($next_skill = count(Skill::whereTrackId($track)->whereLevelId($level)
                ->orderBy('skill','asc')->where('skill','>',$skill->skill)->first()->id) > 0) {
            Question::whereSkillId($next_skill)
                ->whereDifficultyId(Difficulty::min('difficulty'))
                ->orderByRaw("RAND()")->first();
        }
    }

    public function scopeDownskill($query,$skill,$track){
        $query->whereSkillId(Skill::where('skill','<',$skill)->whereTrackId($track)->orderBy('skill','desc')->first()->id)
            ->orderByRaw("RAND()");
    }

    public function scopeUptrack($query, $track){
        $query->question_user()->whereSkillId(Skill::whereTrackId($track))->latest();
    }

    public function scopeUplevel($query,$track,$level){
        $query->whereDifficultyId(Difficulty::orderBy('difficulty','asc')->first()->id)
        ->whereSkillId(Skill::whereTrackId($track)->where('level_id','>',$level)->orderBy('level_id','asc')->orderByRaw("RAND()")->first()->id);
    }

    public function scopeDownlevel($query,$track,$level){
        $query->whereDifficultyId(Difficulty::orderBy('difficulty','desc')->first()->id)
            ->whereSkillId(Skill::whereTrackId($track)->where('level_id','<',$level)->orderBy('level_id','desc')->orderByRaw("RAND()")->first()->id);
    }

}