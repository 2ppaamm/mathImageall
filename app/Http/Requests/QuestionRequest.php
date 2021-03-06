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
            'skill_id'=> 'required',
            'difficulty_id' =>'required',
            'question' => 'required',//|unique:questions,question',
            'question_image' => 'image|max:1000',
            'answer0_image' => 'image|max:1000|required_without:answer0',
            'answer1_image' => 'image|max:1000|required_without:answer1',
            'answer2_image' => 'image|max:1000|required_without:answer2',
            'answer3_image' => 'image|max:1000|required_without:answer3',
            'correct_answer' => 'required'
        ];
    }
}