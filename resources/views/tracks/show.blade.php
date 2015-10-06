@extends('layouts._master')
@section('content')
<h1>{{ $track->track }} <small>{{$track->description}}</small>
</h1>
<hr>
    <a href="/tracks/{{$track->id}}/edit"><button class="btn btn-primary col-md-12">Modify Track</button></a>
    <a href="/tracks/create"><button class="btn btn-success col-md-12">Add Similar track</button></a>
@stop