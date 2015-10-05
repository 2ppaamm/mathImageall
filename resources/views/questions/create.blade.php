@extends('layouts._master')
@section('content')
<h1>Create new question</h1>
<hr />
{!! Form::open(['url'=>'questions', 'files'=>true]) !!}
    @include('questions._questionform', ['submitButtonText'=>'Create New Question',
    'imageButtonText' => 'Select Image', 'source'=>'',
    'track_id'=>null, 'level_id'=>null, 'difficult_id'=>null, 'oldq_image'=>null
    ])
{!! Form::close() !!}
@include('layouts._formError')
@stop