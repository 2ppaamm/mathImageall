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
            $q=array_add($q, $j,['question'=>$questions[$j]->question, 'answers'=>$answers,'correct'=>$questions[$j]->correct_answer]);
        }
        $q=array_add($q, 'test_id',$test_id);
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
