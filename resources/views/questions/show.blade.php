@extends('layouts._master')
@section('content')
    <h1>{{ $question->question }}</h1>
    @if ($question->source!=null)
        <p> Source: {{ $question->source }}</p>
    @endif
    <div class="col-md-12">
        <img src="{{ $question->question_image }}" alt="">
    </div>
    <hr>

    <div class="col-md-12">
        <h3>Click on the right answer:</h3>
        <div class="row">
            <div class="col-xs-6 col-md-3">
                <a href="#" class="thumbnail">
                    {{$question->answer1}}
                    @if ($question->answer1_image!=null)
                        <img src="{{ $question->answer1_image }}" alt="$question->answer1">
                    @endif
                </a>
            </div>
            <div class="col-xs-6 col-md-3">
                <a href="#" class="thumbnail">
                    {{ $question->answer2 }}
                    @if ($question->answer2_image!=null)
                        <img src="{{ $question->answer2_image }}" alt="$question->answer2">
                    @endif
                </a>
            </div>
            <div class="col-xs-6 col-md-3">
                <a href="#" class="thumbnail">
                    {{ $question->answer3 }}
                    @if ($question->answer3_image!=null)
                        <img src="{{ $question->answer3_image }}" alt="$question->answer3">
                    @endif
                </a>
            </div>
            <div class="col-xs-6 col-md-3">
                <a href="#" class="thumbnail">
                    {{ $question->answer4 }}
                    @if ($question->answer4_image!=null)
                        <img src="{{ $question->answer4_image }}" alt="$question->answer4">
                    @endif
                </a>
            </div>
        </div>
    </div>
    <div>
        <a href="/questions/{{$question->id}}/edit"><button class="btn btn-primary col-md-4">Modify Question</button></a>
        <a href="/questions/create"><button class="btn btn-success col-md-4">Add Similar Question</button></a>
        @include('questions.delete')
    </div>
@stop