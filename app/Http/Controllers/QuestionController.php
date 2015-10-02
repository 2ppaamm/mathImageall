<?php

namespace App\Http\Controllers;

use App\Difficulty;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Question;
use App\Track;
use App\Level;
use App\Http\Requests\QuestionRequest;
use Illuminate\Support\Facades\Auth;

class QuestionController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions=Question::latest()->with('track')->with('difficulty')->get();
        $flash_message = isset($questions) ? 'Listing all the questions available on the system' :
            'Error in retrieving questions';
        session()->flash('flash_message', $flash_message);
        return view('questions.index', compact('questions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tracks = Track::lists('track','id');
        $levels = Level::lists('description', 'id');
        $difficulties = Difficulty::lists('short_description','id');
        return view('questions.create', compact('tracks','levels','difficulties'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(QuestionRequest $request)
    {
//        return $request;
        $question = new Question($request->all());
        $question['difficulty_id']=$request->difficulty_id;
        Auth::user()->questions()->save($question);
        session()->flash('flash_message', 'Question created');

        return redirect('questions');
    }

    /**
     * Display the specified resource.
     *
     * @param  Question $question
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {
        $flash_message = is_null($question) ? 'Question fetched' :
            'Error in retrieving question, error 404';
        return view('questions.show', compact('question'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Question $question
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {
        $tracks = Track::lists('track','id');
        $levels = Level::lists('description', 'id');
        $difficulties = Difficulty::lists('description', 'id');
        return view('questions.edit', compact('question','tracks', 'levels', 'difficulties'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Question $question
     * @return \Illuminate\Http\Response
     */
    public function update(QuestionRequest $request, Question $question)
    {
        $question->update($request->all());
        session()->flash('flash_message', 'Question '.$question->question.' has been updated.');
        return redirect('questions');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Question $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        //
    }
}