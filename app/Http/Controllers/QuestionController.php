<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Question;
use App\Http\Requests\QuestionRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use Webpatser\Uuid\Uuid;
use App\Image;
use App\ImageQuestion;

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
    public function store(QuestionRequest $request, ImageController $imageController)
    {
        $question = new Question($request->all());
        $uuid = Uuid::generate(4);
        $question['id'] = $uuid;
        $question['source']= $request->source != null ? $request->source : Auth::user()->name;
        $question['image_question'] = $request['image_question']!=null ? $imageController->store($request->file('image_question'), 'question', $question['id']):null;

        for ($i = 1; $i<5; $i++) {
            $image_field = 'answer'.$i.'_image';
            $question[$image_field] = $request[$image_field]!=null ?
                $imageController->store($request->file($image_field), 'answer'.$i, $question['id']):null;
        }
        Auth::user()->questions()->save($question);
        flash('Question created.This is how your question will look like:');
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
//        flash(is_null($question) ? 'Error in retrieving question, error 404':'A '.$question->track_id.
//           $question->level_id.$question->difficulty_id.' question fetched');

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
    public function update(Request $request, Question $question, ImageController $imageController)
    {
        // Handle Images
        $question['image_question'] = $request['image_question']!=null ? $imageController->store($request->file('image_question'), 'question', $question['id']):null;
        for ($i = 1; $i<5; $i++) {
            $image_field = 'answer'.$i.'_image';
            $question[$image_field] = $request[$image_field]!=null ?
                $imageController->store($request->file($image_field), 'answer'.$i, $question['id']):null;
        }

        $question->update();

        flash('Question '.$question->id.' has been updated. This is how your question will look like:');
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
        // delete question image
        foreach ($question->images as $image) {
            File::exists(public_path($image->url_link)) ? File::delete(public_path($image->url_link)):null;
            Image::destroy($image->id);
        }
        Question::findOrFail($question->id) ? Question::destroy($question->id):null;
        flash('Question is deleted');
        return redirect('questions');
    }
}