@extends('layouts._master')
@section('content')
<h1>Questions</h1>
<hr>
 @if (count($questions))
   <h3>
     The list of questions:
   </h3>
    <ul>
        @foreach ($questions as $question)
          <article>
              <p>
                   <a href="{{ url('/questions', ($question->id)) }}">
                       <h3>
                           Year {{ $question->level_id }} {{ $question->track->track }} Difficulty: {{$question->difficulty->difficulty}}
                       </h3>
                  {{ $question->question }}
                  </a>
              </p>
          </article>
        @endforeach
     </ul>
 @endif
@stop