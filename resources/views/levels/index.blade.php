@extends('layouts._master')
@section('content')
<h1>Levels on the System</h1>
<button id='add-btn' type="button" class="btn-add btn btn-success btn-min" data-url="/levels/create">New Level</button>
<hr>

@if (count($levels))
       <table class= "table table-striped" id="edit-table">
           <tr>
               <th>Image</th>
               <th>Level Name</th>
               <th>Description</th>
               <th>Typical Age</th>
               <th>Lowest Maxile</th>
               <th>Highest Maxile</th>
               <th>Created by</th>
               <th>Statuses</th>
           </tr>
           @include('levels.editForm')
           @foreach ($levels as $level)
               @include('levels._rowform')
           @endforeach
       </table>
@endif
@stop