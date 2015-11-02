<?php

namespace App\Http\Controllers;

use App\Difficulty;
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
use Illuminate\Support\Facades\DB;

class QuizController extends Controller
{
    public function __construct(){
//        $this->middleware('auth');
    }
    /**
     * Format and sends a list of question to be displayed for a quiz.
     *
     * @return $q list of questions
     */
    public function index()
    {
        $user = Auth::user();
        if ($current_test=$user->tests()->current()->first()) {
            $questions = $current_test->questions()->quiz()->get();
            $test_id = $current_test->id;
        } else {
            $questions = Question::diagnostic()->get();
            $current_test = $user->tests()->create([]);
            $current_test->questions()->sync($questions, ['answered'=>FALSE]);
            $test_id = $current_test->id;
        }

        $q= []; $i = 0;
        for ($j = 0; $j<count($questions);$j++){
            if (!isset($questions[$j]->pivot->answered) or !$questions[$j]->pivot->answered){
                $q = array_add($q, $i,$this->formatQuiz($questions[$j],$test_id));
                $i += 1;
            }
        }
        return $q;
    }

    public function formatQuiz(Question $question, $test_id){
        $answers=null; $images=null;
        for ($i=0; $i<4; $i++){
            $answers=array_add($answers, $i,['id'=>$i,'text'=>$question['answer'.$i],
                'image'=>$question['answer'.$i.'_image']]);
        }
        return ['question'=>$question->question, 'question_image'=>$question->question_image, 'answers'=>$answers, 'question_id'=>$question->id,
        'test_id'=>$test_id, 'answered'=>is_null($question->pivot) ? false: $question->pivot->answered];
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
        $user = Auth::user();
        $question = Question::with('skill')->with('difficulty')->with('skill.level')->with('skill.track')->find($request->question_id);
        // log
        $question->tests()->updateExistingPivot($request->test_id, ['answered' => TRUE], false);

        $error_limit = Config::get('mathtest.error_test');
        $success_limit = Config::get('mathtest.success_test');
        $difficulty = $question->difficulty_id;
        $skill = $question->skill;
        $level = $skill->level;
        $track = $skill->track;
        $test = $request->test_id;

        // track if user has done questions of the same skill and difficulty
        $test_record = Test::find($test)->questions()
            ->selectRaw('question_test.question_id as id')
            ->lists('id');

        $total_correct = $user->numberCorrect()
            ->where('questions.difficulty_id', '=', $difficulty)
            ->where('questions.skill_id', '=', $skill->id)
            ->take(max($error_limit, $success_limit))
            ->first()->total_correct;

        $new_question = new Question;

        if ($correctness = $question->correct_answer == $request->answer) {              //if answer is correct
//            dd($correctness);
//                dd($total_correct.'success_limit->'.$success_limit);
            if ($total_correct < $success_limit - 1) { //cleared this difficulty
                if ($new_question = Question::similar($difficulty, $skill->id)
                    ->whereNotIn('id', $test_record)// not the questions answered
                    ->first()
                ) {
//                    return 'similar question?';
                }
                // upgrade if more than success_limit
            } elseif ($difficulty < Difficulty::max('difficulty')) {
                $new_question = Question::harder($difficulty, $skill->id)
                    ->whereNotIn('id', $test_record)// not the questions answered
                    ->first();
                //              return 'move next difficulty question found';
            } elseif ($new_question = Question::whereNotIn('id', $test_record)// not the questions answered
                        ->upskill($skill, $track->id, $level->id)->first()) {

            } else {
                $maxile = $level->start_maxile_level + 0; // have to think of how to calculate
                if ($new_question = Question::uptrack(Track::nexttrack($user, $level->id))) {
                } elseif ($level < Level::max('level')) {  //cleared level, uplevel
                    $new_question = Question::whereNotIn('id', $test_record)// not the questions answered
                        ->uplevel($track->id, $level->id)->first();
                    //return 'move to next level found';
                } else {
                    return 'You have reached the maximum level and difficulty for all skills in this track.';
                }
            }
        // if answer is wrong
        } elseif ($test_record->count() > $error_limit - 2) {
                if ($test_record->sum('pivot_correct') > $error_limit - 2) {                     //cleared this difficulty
                    if ($new_question = Question::easier($difficulty, $skill->id)->first()) {
                    } elseif ($new_question = Question::downSkill($skill->id, $track->id)->first()) {  //cleared skill, upskill
                    } elseif ($new_question = Question::downlevel($track->id, $level->id)->first()) {  //cleared level, uplevel

                    } else {
                        //find a new track
                    }
                }
            }
//        dd($new_question);
        $user->tested_questions()->attach($request->question_id, ['correct' => $correctness]);

        if ($new_question != null) {
            $new_question->tests()->attach($request->test_id, ['answered'=>FALSE]);
            return $this->formatQuiz($new_question, $request->test_id);
        } else {
            $user->track_results()->attach($question->track, ['difficulty_id'=>$question->difficulty_id,
                'skill_id'=>$question->skill_id, 'level_id'=>$question->skill->level->id,
                'track_id'=>$question->skill->track->id, 'maxile'=>$maxile = $level->starting_maxile_level + $difficulty * Difficulty::max('difficulty')/100]);
            return 'Your maxile reached for this test is '.$maxile;
        }
    }

    /**
     * Calculates maxile.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function maxile($id)
    {
        //
    }
}