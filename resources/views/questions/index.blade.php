@extends('layouts._master')
@section('content')
    <h1>Questions</h1>
    <hr>

    @if (count($questions))
        <div class="panel panel-default">
            <!-- Default panel contents -->
            <div class="panel-heading">List of questions
                <button id='add-btn' type="button" class="btn-add btn btn-success btn-min"><a href="/questions/create">Add New Question</a></button>
            </div>

            <table class= "table table-striped" id="edit-table">
            <tr>
                    <th>Image</th>
                    <th>Track</th>
                    <th>Level</th>
                    <th>Question</th>
                    <th>Created by</th>
                    <th>Statuses</th>
                </tr>
                @foreach ($questions as $question)
                    @include('questions._rowform')
                @endforeach
            </table>
        </div>
    @endif
@stop