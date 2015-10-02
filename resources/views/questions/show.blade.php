@extends('layouts._master')
@section('content')
<h1>{{ $question->question }}</h1>
<img src="{{ $question->image }}" alt="">
<hr>
    <article>
        <ol>
            <li>{{ $question->answer1 }}</li>
            <li>{{ $question->answer2 }}</li>
            <li>{{ $question->answer3 }}</li>
            <li>{{ $question->answer4 }}</li>
        </ol>
    </article>
    <a href="/questions/{{$question->id}}/edit"><button class="btn btn-primary col-md-12">Modify Question</button></a>
    <a href="/questions/create"><button class="btn btn-success col-md-12">Add Similar Question</button></a>
@stop