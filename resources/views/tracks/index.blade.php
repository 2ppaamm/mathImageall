@extends('layouts._master')
@section('content')
<h1>Tracks</h1>
@foreach ($errors->all() as $error)
    <p class="error">{{ $error }}</p>
    @endforeach
            <!-- test Form starts -->
    {!! Form::open([
        'url' => '/test',
        'id' => 'test',
        'name'=>'test'
    ]) !!}
    {!! Form::close() !!}
            <!-- test Form ends -->
    <hr>

 @if (count($tracks))
   <div class="panel panel-default">
       <!-- Default panel contents -->
       <div class="panel-heading">List of tracks</div>

       <table class="table">
           <tr>
               <th>Image</th>
               <th>Track Name</th>
               <th>Description</th>
               <th>Lowest Maxile</th>
               <th>Highest Maxile</th>
               <th>Created by</th>
               <th>Click to change Status</th>
           </tr>
           @foreach ($tracks as $track)
               <tr>
                   @if ($track->image != null)
                       <td><img src={{ $track->image }} alt={{$track->track}}\></td>
                   @else
                       <td>{{$track->name}}</td>
                   @endif
                   <td><a href="#" class='edit' data-type="text" data-pk={{$track->id}} id='track' data-url="/tracks/{{$track->id}}" data-title="Enter new track name">{{$track->track}}</a></td>
                   <td><a href="#" class='edit' data-type="textarea" data-pk={{$track->id}} id='description' data-url="/tracks/{{$track->id}}" data-title="Enter new track description">{{$track->description}}</a></td>
                   <td><a href="#" class='edit' data-type="text" data-pk={{$track->id}} id='lowest_maxile_level' data-url="/tracks/{{$track->id}}" data-title="Enter lowest maxile level">{{ $track->lowest_maxile_level }}</a></td>
                   <td><a href="#" class='edit' data-type="text" data-pk={{$track->id}} id='highest_maxile_level' data-url="/tracks/{{$track->id}}" data-title="Enter highest maxile level">{{ $track->highest_maxile_level }}</a></td>
                   <td>{{ $track->user->firstname }}</td>
                   <td>
                       <div class="btn-group-vertical" role="group" aria-label="">
                           <div class="btn-group" role="group">
                               @if ($track->is_private)
                                   <button type="button" class="btn-toggle btn-min btn btn-danger" data-toggle=TRUE data-pk="{{$track->id}}" id='is_private' data-url="/tracks/{{$track->id}}" data-title="Click to make public">Make Public</button>
                               @else
                                   <button type="button" class="btn-toggle btn-min btn btn-primary" data-toggle=FALSE data-pk="{{$track->id}}" id='is_private' data-url="/tracks/{{$track->id}}" data-title="Click to make public">Make Public</button>
                               @endif
                               </div>
                           <div class="btn-group" role="group">
                               @if ($track->is_hidden)
                                   <button type="button" class="btn-toggle btn-min btn btn-danger" data-toggle=TRUE data-pk="{{$track->id}}" id='is_hidden' data-url="/tracks/{{$track->id}}" data-title="Click to use for testing">Use for tests</button>
                               @else
                                   <button type="button" class="btn-toggle btn-min btn btn-danger" data-id="is_hidden" data-toggle=FALSE data-pk={{$track->id}} data-id='is_hidden' data-url="/tracks/{{$track->id}}" data-title="Click to hide from testing">Hide from tests</button>
                               @endif
                            </div>
                           <div class="btn-group" role="group">
                               <button type="button" class="btn-copy btn btn-info btn-min">Copy</button>
                           </div>
                       </div>
                   </td>
               </tr>
           @endforeach
       </table>
   </div>
 @endif
@stop