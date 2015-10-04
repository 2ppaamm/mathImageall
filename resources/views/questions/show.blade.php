@extends('layouts._master')
@section('content')
    <h1>{{ $question->question }}</h1>
    @if ($question->source!=null)
        <p> Source: {{ $question->source }}</p>
    @endif
<div class="row">
    <div class="col-md-6">
        @foreach($question->images as $image)
            <img src="{{ $image->url_link }}" alt="">
        @endforeach
    </div>

    <div class="col-md-6">
        <hr>
            <article>
                <ol>
                    <li>{{ $question->answer1 }}</li>
                    <li>{{ $question->answer2 }}</li>
                    <li>{{ $question->answer3 }}</li>
                    <li>{{ $question->answer4 }}</li>
                </ol>
            </article>
    </div>
</div>
    <div>
        <a href="/questions/{{$question->id}}/edit"><button class="btn btn-primary col-md-4">Modify Question</button></a>
        <a href="/questions/create"><button class="btn btn-success col-md-4">Add Similar Question</button></a>
        @include('questions.delete')
    </div>
@stop