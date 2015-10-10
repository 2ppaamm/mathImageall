@extends('layouts._master')
@section('content')
<h1>Tracks</h1>
<button id='add-btn' type="button" class="btn-add btn btn-success btn-min" data-url="/tracks/create">New Track</button>
<hr>

@if (count($tracks))
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
 @endif
@stop