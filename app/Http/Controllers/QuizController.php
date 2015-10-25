<?php

namespace App\Http\Controllers;

use App\Test;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Question;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Level;
use App\Skill;
use Illuminate\Support\Facades\Config;

class QuizController extends Controller
{
    /**
     * Format and sends a list of question to be displayed for a quiz.
     *
     * @return $q list of questions
     */
    public function index()
    {
        if ($current_test=Auth::user()->tests()->current()->first()) {
            $questions = $current_test->questions()->quiz()->get();
            $test_id = $current_test->id;
        } else {
            $questions = Question::quiz()->maiden()->get();
            $current_test = Auth::user()->tests()->create([]);
            $current_test->questions()->sync($questions);
            $test_id = $current_test->id;
        }
        $q= [];
        for ($j = 0; $j<count($questions);$j++){
            $answers=null; $images=null;
            for ($i=0; $i<4; $i++){
                $answers=array_add($answers, $i,['id'=>$i,'text'=>$questions[$j]['answer'.$i],
                'image'=>$questions[$j]['answer'.$i.'_image']]);
            }
            $q=array_add($q, $j,['question'=>$questions[$j]->question, 'answers'=>$answers,
                'test_id'=>$test_id, 'question_id'=>$questions[$j]->id]);
        }
        return $q;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Receive answer from test and format next question and test
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // log into question_user the answer and date, increment right or wrong
        //dd($maxile = Auth::user()->tested_questions()->where('correct','=',true)
          //  ->distinct()->get());       //average the level for all skills, then add highest difficulty achieved for each skill
        $question = Question::with('skill')->with('difficulty')->with('skill.level')->with('skill.track')->find($request->question);
        $error_limit = Config::get('mathtest.error_test');
        $success_limit = Config::get('mathtest.success_test');
        $difficulty = $question->difficulty_id;
        $skill = $question->skill;
        $level = $skill->level;
        $track = $skill->track;
        // track if user has done questions of the same skill and difficulty
        $record = Auth::user()->tested_questions()->where('questions.difficulty_id','=',$difficulty)
            ->where('questions.skill_id','=',$skill->id)->latest()->take(max($error_limit,$success_limit) - 1)
            ->distinct()->where('questions.id','!=',$question->id)->get();
        $new_question = new Question;
        //return $question->correct_answer.'=>'.$request->answer;
        if ($correctness = $question->correct_answer == $request->answer) {              //if answer is correct
          //  return $record->sum('pivot_correct');
            if ($record->sum('pivot_correct') < $success_limit - 1) {                     //cleared this difficulty
                $new_question = Question::similar($difficulty, $skill->id)->first();
            } elseif ($new_question = Question::harder($difficulty, $skill->id)->first()) {
                return 'move next difficulty question found';
                } elseif ($new_question = Question::upSkill($skill->id, $track->id)->first()) {  //cleared skill, upskill
                return 'move to next skill found';
                } elseif ($new_question = Question::uplevel($track->id, $level->id)->first()) {  //cleared level, uplevel
                return 'move to next level found';
                } else {
                    return 'find a new track';
                }
            } elseif ($record->count() > $error_limit - 2) {
                if ($record->sum('pivot_correct') > $error_limit - 2) {                     //cleared this difficulty
                    if ($new_question = Question::easier($difficulty, $skill->id)->first()) {
                    } elseif ($new_question = Question::downSkill($skill->id, $track->id)->first()) {  //cleared skill, upskill
                    } elseif ($new_question = Question::downlevel($track->id, $level->id)->first()) {  //cleared level, uplevel

                    } else {
                        //find a new track
                    }
                }
            }
//        return $maxile = 0;
        // calculate maxile for track, log result
        dd($maxile = Auth::user()->tested_questions()->where('correct','=',true)
            ->distinct()->get());       //highest level for track, then add highest difficulty achieved for each skill
        Auth::user()->tested_questions()->attach($request->question, ['correct' => $correctness]);
        return ($new_question);
        Auth::user()->track_results()->attach($new_question->skill->track_id,['difficulty_id'=>$new_question->difficulty_id,
        'skill_id'=>$new_question->skill_id, 'level_id'=>$new_question->level->id,
        'track_id'=>$new_question->skill->track->track, 'maxile'=>$maxile]);
        return $id;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}