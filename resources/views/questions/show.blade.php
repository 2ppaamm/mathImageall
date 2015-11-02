@extends('layouts._master')
@section('content')
    @if ($question->source!=null)
        <p> Source: {{ $question->source }}</p>
    @endif
    <h1>{{ $question->question }}</h1>
    <div class="col-md-12">
        @if ($question->question_image != null)
            <img src="{{ $question->question_image }}" alt="{{ $question->question }}">
        @endif
    </div>
    <hr>
    <hr>

    <div class="col-md-12">
        <h3>Click on the right answer:</h3>
        <div class="row">
            @for ($i = 0; $i < 4; $i++)
                @include('questions._showanswer', ['answer'=>'answer'.$i.'_image', 'number'=>'answer'.$i])
            @endfor
        </div>
    </div>
    <!-- Buttons below for managing question -->
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