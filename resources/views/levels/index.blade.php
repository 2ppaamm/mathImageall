@extends('layouts._master')
@section('content')
<h1>Levels on the System</h1>

@if (count($levels))
    <button id='add-btn' type="button" class="btn-add btn btn-success btn-min" data-url="/levels/create">New Level</button>
    <hr>
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
@else
    <button id='add-first' type="button" class="btn-add btn btn-success btn-min" data-url="/levels/create">Create First Level</button>
    <hr>
    <table class= "table table-striped" style="display: none" id="edit-table">
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
    </table>
@endif
@stop