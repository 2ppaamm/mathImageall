@extends('layouts._master')
@section('content')
    @if ($question->source!=null)
        <p> Source: {{ $question->source }}</p>
    @endif
    <h1>{{ $question->question }}</h1>
    <div class="col-md-12">
        @if ($question->image_question != null)
            <img src="{{ $question->image_question }}" alt="{{ $question->question }}">
        @endif
    </div>
    <hr>
    <hr>

    <div class="col-md-12">
        <h3>Click on the right answer:</h3>
        <div class="row">
            @include('questions._showanswer', ['answer'=>'answer1_image', 'number'=>'answer1'])
            @include('questions._showanswer', ['answer'=>'answer2_image', 'number'=>'answer2'])
            @include('questions._showanswer', ['answer'=>'answer3_image', 'number'=>'answer3'])
            @include('questions._showanswer', ['answer'=>'answer4_image', 'number'=>'answer4'])
        </div>
    </div>
    <div class="btn-group btn-group-justified" role="group" aria-label="...">
        <div class="btn-group" role="group">
            <a href="/questions/{{$question->id}}/edit"><button class="btn-lg btn btn-primary">Modify Question</button></a>
        </div>
        <div class="btn-group" role="group">
            <a href="/questions/create"><button class="btn btn-lg btn-warning">Add Similar Question</button></a>
        </div>
        <div class="btn-group" role="group">
            <a href="/questions"><button class="btn btn-lg btn-success">Question List</button></a>
        </div>
        <div class="btn-group" role="group">
            <button type="button" class="btn btn-lg btn-danger" data-toggle="modal" data-target="#myModal">Delete Question</button>
        </div>
    </div>
        @include('questions.delete')
@stop