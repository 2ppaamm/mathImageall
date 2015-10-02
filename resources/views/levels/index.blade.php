@extends('layouts._master')
@section('content')
<h1>Levels</h1>
<hr>
 @if (count($levels))
   <h3>
     The list of levels:
   </h3>
    <ul>
        @foreach ($levels as $level)
          <article>
              <p>
                   <a href="{{ url('/levels', ($level->id)) }}">
                       <h3>
                           {{ $level->description }}
                       </h3>
                  {{ $level->description}}
                  </a>
              </p>
          </article>
        @endforeach
     </ul>
 @endif
@stop