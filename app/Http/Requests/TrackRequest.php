<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class TrackRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'track'=>'required|size:255',
            'description'=>'required|size:255',
            'image' => 'image|between:50,2000',
            'lowest_maxile_level' => 'numeric|min:0|max:1200',
            'highest_maxile_level' => 'numeric|min:100|max:1300'
        ];
    }
}
