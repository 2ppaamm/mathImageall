@extends('layouts._master')
@section('content')
@if (!isset($user))
    @include('layouts.loginForm')
@endif
@stop