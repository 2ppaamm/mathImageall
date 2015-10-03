<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Question;
use App\Http\Requests\QuestionRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use Webpatser\Uuid\Uuid;
use Intervention\Image;

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

        flash(isset($questions) ? 'Listing all the questions available on the system' :
            'Error in retrieving questions');
        return view('questions.index', compact('questions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('questions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  QuestionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(QuestionRequest $request)
    {
        $question = new Question($request->all());
        $uuid = Uuid::generate(4);                      // generate a unique number of question id
        $question['id'] = $uuid;
        $question['image'] = (isset($request->files) ? $question['image']=$this->storeImage($request, $uuid):null);
        Auth::user()->questions()->save($question);
        flash('flash_message', 'Question created');
        return redirect('questions/'.$uuid);
    }

    /**
     * Display the specified resource.
     *
     * @param  Question $question
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {
       flash(is_null($question) ? 'Error in retrieving question, error 404':'A '.$question->track_id.
           $question->level_id.$question->difficulty_id.' question fetched');
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
        return view('questions.edit', compact('question'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  QuestionRequest  $request
     * @param  Question $question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Question $question)
    {
        $request['image'] = (($request->file('image')!=null) ? $this->storeImage($request, $question->id):null);
        $request['user_id']=Auth::user()->id;
        dd($request->image);
        $question->update($request->all());
        flash('Question '.$question->question.' has been updated.');
        return redirect('questions/'.$question->id);
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

    /**
     * @param $request input request
     * @param $uuid
     * @return string image location and name to be stored
     */
    public function storeImage($request, $uuid){
        $image_loc = '/images/questions/Grade'.$request->level_id.'/';
        $image_name = $uuid. '.' .$request->file('image')->getClientOriginalExtension();

        File::exists(public_path($image_loc.$image_name)) ? File::delete(public_path($image_loc.$image_name)):null;
        //resize here
        Image\Facades\Image::make($request->file('image'))->resize(400, 300)->save(public_path($image_loc.$image_name));
        return $image_loc.$image_name;
    }
}