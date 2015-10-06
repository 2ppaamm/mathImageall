@extends('layouts._master')
@section('content')
<h1>Create new track</h1>
<hr />
{!! Form::open(['url'=>'tracks', 'files'=>true]) !!}
    @include('tracks._trackform', ['submitButtonText'=>'Create New Track'])
{!! Form::close() !!}
@include('layouts._formError')
@stop