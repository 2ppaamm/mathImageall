@extends('layouts._master')
@section('content')
@if (!isset($user))
    @include('layouts._loginForm')
@endif
@stop