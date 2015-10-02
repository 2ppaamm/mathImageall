@extends('layouts._master')
@section('content')
<h1>Difficulties</h1>
<hr>
 @if (count($difficulties))
   <h3>
     The list of Challenges or Difficulties:
   </h3>
    <ul>
        @foreach ($difficulties as $difficulty)
          <article>
              <p>
                   <a href="{{ url('/difficulties', ($difficulty->id)) }}">
                       <h3>
                           Objective {{ $difficulty->difficulty  }} {{$difficulty->short_description}}
                       </h3>
                       <span>{{ $difficulty->description }}</span>
                  {{ $difficulty->description}}
                  </a>
              </p>
          </article>
        @endforeach
     </ul>
 @endif
@stop