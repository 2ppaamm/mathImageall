@extends('layouts._master')
@section('content')
<h1>Create new question</h1>
<hr />
{!! Form::open(['url'=>'questions', 'files'=>true]) !!}
    @include('questions._questionform', ['submitButtonText'=>'Create New Question',
    'track_id'=>null, 'level_id'=>null, 'difficult_id'=>null, 'image'=>null])
{!! Form::close() !!}
@include('layouts._formError')
@stop