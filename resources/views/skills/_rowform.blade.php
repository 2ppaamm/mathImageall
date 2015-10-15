<tr>
    @if ($skill->image != null)
        <td><img src={{ $skill->image }} alt={{$skill->skill}}\></td>
    @else
        <td>{{$skill->skill}}</td>
    @endif
    <td><a href="#" name="skill" class='edit' data-type="text" data-pk={{$skill->id}} id='skill' data-url="/skills/{{$skill->id}}" data-title="Enter new skill name">{{$skill->skill}}</a></td>
    <td><a href="#" class='edit' data-type="text" data-pk="{{$skill->id}}" id='short_description' data-url="/skills/{{$skill->id}}" data-title="Enter typical age">{{ $skill->short_description }}</a></td>
    <td><a href="#" class='edit' data-type="textarea" data-pk="{{$skill->id}}" id='description' data-url="/skills/{{$skill->id}}" data-title="Enter new skill description">{{$skill->description}}</a></td>
    <td><a href="#" class="editable-click selection">{{$skill->track->track}}</a>
        {!! Form::select('track_id', $tracks, $skill->track_id,['style'=>'display:none','data-pk'=>$skill->id,'data-url'=>'/skills/'.$skill->id,'data-type'=>'select','class'=>'selection-list form-control','value'=>'Select Track']) !!}</td>
    <td><a href="#" class="editable-click selection">{{$skill->level->description}}</a>
        {!! Form::select('level_id', $levels, $skill->level_id,['style'=>'display:none','data-pk'=>$skill->id,'data-url'=>'/skills/'.$skill->id,'data-type'=>'select','class'=>'selection-list form-control','value'=>'Select Level']) !!}</td>
    <td>{{ $skill->user->firstname }}</td>
    <td>
        <div class="btn-group-vertical" role="group" aria-label="">
            <div class="btn-group" role="group">
                <a href="#" id="status_id" class="edit btn-min btn btn-info" data-type="select" data-pk="{{$skill->id}}" data-url="/skills/{{$skill->id}}" data-title="Status?">{{ $skill->status->status }}</a>
                <button type="button" class="btn-copy btn btn-warning btn-min" style="display: none">Copy</button>
                {!! Form::open(['method'=>'DELETE','class'=>'delete-form', 'url'=>'skills/'.$skill->id]) !!}
                {!! Form::submit("Delete", ['class'=>"btn-danger btn-block"]) !!}
                {!! Form::close() !!}
            </div>
        </div>
</tr>
</td>