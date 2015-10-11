@extends('layouts._master')
@section('content')
<h1>Difficulties on the System</h1>

@if (count($difficulties))
    <button id='add-btn' type="button" class="btn-add btn btn-success btn-min" data-url="/difficulties/create">Add New Difficulty</button>
    <hr>
       <table class= "table table-striped" id="edit-table">
           <tr>
               <th>Image</th>
               <th>Difficulty</th>
               <th>Short Description</th>
               <th>Description</th>
               <th>Created by</th>
               <th>Statuses</th>
           </tr>
           @include('difficulties.editForm')
           @foreach ($difficulties as $difficulty)
               @include('difficulties._rowform')
           @endforeach
       </table>
   </div>
@else
    <button id='add-first' type="button" class="btn-add btn btn-success btn-min" data-url="/difficulties/create">Create first difficulty level</button>
    <hr>
    <table class= "table table-striped" style="display: none" id="edit-table">
        <tr>
            <th>Image</th>
            <th>Difficulty</th>
            <th>Short Description</th>
            <th>Description</th>
            <th>Created by</th>
            <th>Statuses</th>
        </tr>
        @include('difficulties.editForm')
    </table>
@endif
@stop