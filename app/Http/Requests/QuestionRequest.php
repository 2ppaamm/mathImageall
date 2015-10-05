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
            'question' => 'required_without:question_image',//|unique:questions,question',
//            'answer1' =>'required_without:answer1_image',
//            'answer2' => 'required_without:answer2_image',
//            'answer3' => 'required_without:answer3_image',
//            'answer4' => 'required_without:answer4_image',
            'question_image' => 'image|between:50,2000|required_without:question',
            'answer1_image' => 'image|between:50,2000|required_without:answer1',
            'answer2_image' => 'image|between:50,2000|required_without:answer2',
            'answer3_image' => 'image|between:50,2000|required_without:answer3',
            'answer4_image' => 'image|between:50,2000|required_without:answer4',
            'correct_answer' => 'required'
        ];
    }
}