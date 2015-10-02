@extends('layouts._master')
@section('content')
    <form method="POST" action="/auth/register">
        {!! csrf_field() !!}

        <div class="form-group col-md-6">
            Nick Name
            <input type="text" class="form-control col-md-6" name="name" value="{{ old('name') }}">
        </div>
        <div class="form-group col-md-6">
            First Name
            <input type="text" class="form-control col-md-6" name="firstname" value="{{ old('firstname') }}">
        </div>
        <div class="form-group col-md-6">
            Last Name
            <input type="text" class="form-control col-md-6" name="lastname" value="{{ old('lastname') }}">
        </div>

        <div class="form-group col-md-6">
            Email
            <input type="email" class="form-control col-md-6" name="email" value="{{ old('email') }}">
        </div>

        <div class="form-group col-md-6">
            Password
            <input type="password" class="form-control col-md-6" name="password">
        </div>

        <div class="form-group col-md-6">
            Confirm Password
            <input type="password" class="form-control col-md-6" name="password_confirmation">
        </div>

        <div class="form-group col-md-6">
            Date of Birth
            {!! Form:: input('date','date_of_birth', date('Y-m-d'),
            ['class'=>"form-control col-md-6"])!!}
        </div>

        <div class="form-group col-md-12">
            <button type="submit" class="col-md-12 btn btn-primary">Register</button>
        </div>
    </form>
    @include('layouts._formError')
@stop