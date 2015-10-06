@extends('layouts._master')
@section('content')
    <h1>{{ $question->question }}</h1>
    @if ($question->source!=null)
        <p> Source: {{ $question->source }}</p>
    @endif
    <div class="col-md-12">
        <img src="{{ $question->image_question }}" alt="{{ $question->question }}">
    </div>
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
    <div>
        <a href="/questions/{{$question->id}}/edit"><button class="btn btn-primary col-md-4">Modify Question</button></a>
        <a href="/questions/create"><button class="btn btn-success col-md-4">Add Similar Question</button></a>
        @include('questions.delete')
    </div>
@stop