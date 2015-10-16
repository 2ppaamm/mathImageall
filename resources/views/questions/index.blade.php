@extends('layouts._master')
@section('content')
    <h1>Questions</h1>
    {!! Form::open(['url'=>'questions/create', 'method'=>'GET'])!!}
    {!! Form::submit('Create New Question',[
        'id'=> 'add btn',
        'class'=>"btn-add btn btn-success btn-min"
    ]) !!}
    {!! Form::close() !!}
    <hr>

    @if (count($questions))

            <table class= "table table-striped" id="edit-table">
            <tr>
                    <th>Image</th>
                    <th>Track</th>
                    <th>Skill</th>
                    <th>Level</th>
                    <th>Question</th>
                    <th>Created by</th>
                    <th>Statuses</th>
                </tr>
                @foreach ($questions as $question)
                    @include('questions._rowform')
                @endforeach
            </table>
    @endif
@stop