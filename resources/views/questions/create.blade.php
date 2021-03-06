@extends('layouts._master')
@section('content')
<h1>Create new question</h1>
<hr />
{!! Form::open(['url'=>'questions', 'files'=>true]) !!}
    @include('questions._questionform', ['submitButtonText'=>'Create New Question',
    'imageButtonText' => 'Select Image', 'source'=>'',
    'oldq_image'=>null,
    'image_link'=>"/js/placeholder-image.png", 'answer1_link'=>"/js/placeholder-image.png",
    'answer2_link'=>"/js/placeholder-image.png",'answer3_link'=>"/js/placeholder-image.png",
    'answer0_link'=>"/js/placeholder-image.png",
    ])
{!! Form::close() !!}
@include('layouts._formError')
@stop