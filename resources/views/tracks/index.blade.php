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
               <th>Statuses</th>
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
                               <a href="#" id="status_id" class="status btn-min btn btn-info" data-type="select" data-pk="{{$track->id}}" data-url="/tracks/{{$track->id}}" data-title="Status?">{{ $track->status->status }}</a>
                               <button type="button" class="btn-copy btn btn-warning btn-min">Copy</button>
                           </div>
                       </div>
                   </td>
               </tr>
           @endforeach
           <tr>
               <td></td>
               <td><a href="#" class='edit' data-type="text" data-pk="" id='track' data-url="/tracks" data-title="Enter new track name"></a></td>
               <td><a href="#" class='edit' data-type="textarea" data-pk="" id='description' data-url="/tracks" data-title="Enter new track description"></a></td>
               <td><a href="#" class='edit' data-type="text" data-pk='' id='lowest_maxile_level' data-url="/tracks" data-title="Enter lowest maxile level"></a></td>
               <td><a href="#" class='edit' data-type="text" data-pk='' id='highest_maxile_level' data-url="/tracks" data-title="Enter highest maxile level"></a></td>
               <td>{{ $user }}</td>
               <td>
                   <div class="btn-group-vertical" role="group" aria-label="">
                       <div class="btn-group" role="group">
                           <a href="#" id="status_id" class="btn-min btn btn-success" data-type="select" data-pk="{{$track->id}}" data-url="/tracks" data-title="Status?">Create</a>
                       </div>
                   </div>
               </td>
           </tr>
       </table>
   </div>
 @endif
@stop