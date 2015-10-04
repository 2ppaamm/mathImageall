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
        $questions=Question::latest()->with('track')->with('difficulty')->with('images')->get();
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
        $user = Auth::user();
        $request['source']= $request->source != null ? $request->source : $user->name;
        $question = $user->questions()->create($request->all());
        $question->images()->attach(isset($request->files) ? $imageController->store($request, 'question', $question->id):null);
        flash('flash_message', 'Question created');
        return redirect('questions/'.$question->id);
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
        $question->update($request->all());
        // detach all current images
        $currentImage=DB::table('image_question')->where('question_id', '=', $question->id)->lists('image_id');
        $question->images()->detach($currentImage);

        // attach current image
        $question->images()->attach(isset($request->files) ? $imageController->store($request, 'question', $question->id):null);

        flash('Question '.$question->id.' has been updated.');
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