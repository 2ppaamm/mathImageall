@extends('layouts._master')
@section('content')
<h1>Tracks</h1>

@if (count($tracks))
    <button id='add-btn' type="button" class="btn-add btn btn-success" data-url="/tracks/create">New Track</button>
    <hr>
    <table class= "table table-striped" id="edit-table">
           <tr>
               <th>Image</th>
               <th>Track Name</th>
               <th>Description</th>
               <th>Lowest Maxile</th>
               <th>Highest Maxile</th>
               <th>Created by</th>
               <th>Statuses</th>
           </tr>
           @include('tracks.editForm')
           @foreach ($tracks as $track)
               @include('tracks._rowform')
           @endforeach
       </table>
   </div>
@else
    <button id='add-first' type="button" class="btn-add btn btn-success" data-url="/tracks/create">Create Track</button>
    <hr>
    <table class= "table table-striped" style="display: none" id="edit-table">
        <tr>
            <th>Image</th>
            <th>Track Name</th>
            <th>Description</th>
            <th>Lowest Maxile</th>
            <th>Highest Maxile</th>
            <th>Created by</th>
            <th>Statuses</th>
        </tr>
        @include('tracks.editForm')
    </table>
@endif
@stop