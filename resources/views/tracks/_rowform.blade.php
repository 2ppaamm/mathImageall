<tr>
    @if ($track->image != null)
        <td><img src={{ $track->image }} alt={{$track->track}}\></td>
    @else
        <td>{{$track->name}}</td>
    @endif
    <td><a href="#" name="track" class='edit' data-type="text" data-pk={{$track->id}} id='track' data-url="/tracks/{{$track->id}}" data-title="Enter new track name">{{$track->track}}</a></td>
    <td><a href="#" class='edit' data-type="textarea" data-pk={{$track->id}} id='description' data-url="/tracks/{{$track->id}}" data-title="Enter new track description">{{$track->description}}</a></td>
    <td><a href="#" class='edit' data-type="text" data-pk={{$track->id}} id='lowest_maxile_level' data-url="/tracks/{{$track->id}}" data-title="Enter lowest maxile level">{{ $track->lowest_maxile_level }}</a></td>
    <td><a href="#" class='edit' data-type="text" data-pk={{$track->id}} id='highest_maxile_level' data-url="/tracks/{{$track->id}}" data-title="Enter highest maxile level">{{ $track->highest_maxile_level }}</a></td>
    <td>{{ $track->user->firstname }}</td>
    <td>
        <div class="btn-group" role="group" aria-label="">
            <div class="btn-group" role="group">
                <a href="#" id="status_id" class="btn edit btn-min btn-block btn-info" data-type="select" data-pk="{{$track->id}}" data-url="levels/{{$track->id}}" data-title="Status?">{{ $track->status->status }}</a>
                <button type="button" class="btn-warning btn-block" style="display: none">Copy</button>
                <!-- Delete Question Form starts -->
                {!! Form::open(['method'=>'DELETE','class'=>'delete-form', 'url'=>'tracks/'.$track->id]) !!}
                {!! Form::submit("Delete", ['class'=>"btn-danger btn-block"]) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </td>
</tr>