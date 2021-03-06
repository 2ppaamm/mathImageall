@extends('layouts._master')
@section('content')
<h1>Edit and existing question</h1>
<hr />
{!! Form::model($question, ['method'=>'PATCH', 'url'=>'questions/'.$question->id]) !!}
    @include('questions._questionform', ['submitButtonText'=>'Modify Question',
    'track_id'=>$question->track_id, 'level_id'=>$question->level_id, 'difficult_id'=>$question->difficulty_id])
{!! Form::close() !!}
@include('layouts._formError')
@stop