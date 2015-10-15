@extends('layouts._master')
@section('content')
<h1>Skills on the System</h1>

@if (count($skills))
    <button id='add-btn' type="button" class="btn-add btn btn-success btn-min" data-url="/skills/create">Add New Skill</button>
    <hr>
       <table class= "table table-striped" id="edit-table">
           <tr>
               <th>Image</th>
               <th>Skill</th>
               <th>Short Description</th>
               <th>Description</th>
               <th>Track</th>
               <th>Level</th>
               <th>Created by</th>
               <th>Statuses</th>
           </tr>
           @include('skills.newform')
           @foreach ($skills as $skill)
               @include('skills._rowform')
           @endforeach
       </table>
   </div>
@else
    <button id='add-first' type="button" class="btn-add btn btn-success btn-min" data-url="/skills/create">Create first skill level</button>
    <hr>
    <table class= "table table-striped" style="display: none" id="edit-table">
        <tr>
            <th>Image</th>
            <th>Skill</th>
            <th>Short Description</th>
            <th>Description</th>
            <th>Track</th>
            <th>Level</th>
            <th>Created by</th>
            <th>Statuses</th>
        </tr>
        @include('skills.newform')
    </table>
@endif
@stop