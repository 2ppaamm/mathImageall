<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class QuestionRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; //change this to false the moment membership is ready
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'track_id'=>'required',
            'level_id'=> 'required',
            'difficulty_id' =>'required',
            'question' => 'required',//|unique:questions,question',
            'answer1' =>'required',
            'answer2' => 'required',
            'answer3' => 'required',
            'answer4' => 'required',
            'image_id' => 'image|between:100,20000',
            'correct_answer' => 'required'
        ];
    }
}