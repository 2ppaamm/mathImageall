@extends('layouts._master')
@section('content')
<h1>Edit and existing question</h1>
<hr />
{!! Form::model($question, ['method'=>'PATCH', 'url'=>'questions/'.$question->id,'files'=>true]) !!}
    @include('questions._questionform', ['submitButtonText'=>'Save Changes',
        'imageButtonText' => 'Update Image',
        'image_link'=>$question->image_question, 'answer0_link'=>$question->answer0_image
        , 'answer1_link'=>$question->answer1_image
        , 'answer2_link'=>$question->answer2_image
        , 'answer3_link'=>$question->answer3_image
    ])
{!! Form::close() !!}
@include('layouts._formError')
@stop