@extends('layouts._master')
@section('content')
<h1>Tracks</h1>
<hr>
 @if (count($tracks))
   <h3>
     The list of tracks:
   </h3>
    <ul>
        @foreach ($tracks as $track)
          <article>
              <p>
                   <a href="{{ url('/tracks', ($track->id)) }}">
                       <h3>
                           {{ $track->track }} by {{ $track->user->firstname }}
                       </h3>
                  {{ $track->description}}
                  </a>
              </p>
          </article>
        @endforeach
     </ul>
 @endif
@stop