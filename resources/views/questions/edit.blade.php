@extends('layouts._master')
@section('content')
<h1>Edit and existing question</h1>
<hr />
{!! Form::model($question, ['method'=>'PATCH', 'url'=>'questions/'.$question->id,'files'=>true]) !!}
    @include('questions._questionform', ['submitButtonText'=>'Modify Question',
    'imageButtonText' => 'Update Image', 'source'=>$question->source,
    'track_id'=>$question->track_id, 'level_id'=>$question->level_id, 'difficult_id'=>$question->difficulty_id,
    'image' =>$question->images->first()])
{!! Form::close() !!}
@include('layouts._formError')
@stop