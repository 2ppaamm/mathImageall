<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use Request;
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
        $questions=Question::latest()->with('track')->with('level')->with('difficulty')->with('status')->with('user')->get();
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
        $question['image_question'] = $request->image_question!=null ? $imageController->store(Input::file('image_question'), 'question', $question['id']):null;

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
        if (Request::ajax()) {
            if (null==(Request::all())) {
                return response()->json(['response' => 'error in question update', 404], 404);
            } else {
                $question = Question::findOrFail(Request::get('pk'));
                $question[Request::get('name')] = Request::get('value');
                $question->update();
                return response()->json(['question' => $question, 200], 200);
            }
        }
        else {
        // Handle Images
//            dd(Request::file('image_question'));
            for ($i = 1; $i<5; $i++) {
                $image_field = 'answer'.$i.'_image';

                $question[$image_field] = Input::file($image_field) ?
                    $imageController->store(Input::file($image_field), 'answer'.$i, $question['id'])
                    :$question[$image_field];
                $question->update();
            }

            flash('Question '.$question->id.' has been updated. This is how your question will look like:');
            return redirect('questions/'.$question->id);
        }
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
        File::exists(public_path($question->image_question)) ? File::delete(public_path($question->image_question)):null;
        File::exists(public_path($question->answer1_image)) ? File::delete(public_path($question->answer1_image)):null;
        File::exists(public_path($question->answer2_image)) ? File::delete(public_path($question->answer2_image)):null;
        File::exists(public_path($question->answer3_image)) ? File::delete(public_path($question->answer3_image)):null;
        File::exists(public_path($question->answer4_image)) ? File::delete(public_path($question->answer4_image)):null;
        Question::findOrFail($question->id) ? Question::destroy($question->id):null;
        flash('Question is deleted');
        return redirect('questions');
    }
}