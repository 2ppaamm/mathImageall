<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Question;

class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions=Question::select('question','answer0','answer1','answer2','answer3','correct_answer',
            'answer0_image','answer1_image','answer2_image', 'answer3_image')->get();
        $q= null;
        for ($j = 0; $j<count($questions);$j++){
            $answers=null; $images=null;
            for ($i=0; $i<4; $i++){
                $answers=array_add($answers, $i,['id'=>$i,'text'=>$questions[$j]['answer'.($i+1)],
                'image'=>$questions[$j]['answer'.($i+1).'_image']]);
            }
            $q=array_add($q, $j,['question'=>$questions[$j]->question, 'answers'=>$answers,'correct'=>$questions[$j]->correct_answer]);
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
        //
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
