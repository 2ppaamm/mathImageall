<tr>
    @if ($level->image != null)
        <td><img class="img-thumbnail" src={{ $level->image }} alt={{$level->level}}\></td>
    @else
        <td>{{$level->name}}</td>
    @endif
    <td><a href="#" name="level" class='edit' data-type="text" data-pk={{$level->id}} id='level' data-url="/levels/{{$level->id}}" data-title="Enter new level name">{{$level->level}}</a></td>
    <td><a href="#" class='edit' data-type="textarea" data-pk={{$level->id}} id='description' data-url="/levels/{{$level->id}}" data-title="Enter new level description">{{$level->description}}</a></td>
    <td><a href="#" class='edit' data-type="text" data-pk={{$level->id}} id='age' data-url="/levels/{{$level->id}}" data-title="Enter typical age">{{ $level->age }}</a></td>
    <td><a href="#" class='edit' data-type="text" data-pk={{$level->id}} id='lowest_maxile_level' data-url="/levels/{{$level->id}}" data-title="Enter lowest maxile level">{{ $level->lowest_maxile_level }}</a></td>
    <td><a href="#" class='edit' data-type="text" data-pk={{$level->id}} id='highest_maxile_level' data-url="/levels/{{$level->id}}" data-title="Enter highest maxile level">{{ $level->highest_maxile_level }}</a></td>
    <td>{{ $level->user->firstname }}</td>
    <td>
        <div class="btn-group" role="group" aria-label="">
            <div class="btn-group" role="group">
                <a href="#" id="status_id" class="btn edit btn-min btn-block btn-info" data-type="select" data-pk="{{$level->id}}" data-url="levels/{{$level->id}}" data-title="Status?">{{ $level->status->status }}</a>
                <button type="button" class="btn-warning btn-block" style="display: none">Copy</button>
                <!-- Delete Question Form starts -->
                {!! Form::open(['method'=>'DELETE','class'=>'delete-form', 'url'=>'levels/'.$level->id]) !!}
                {!! Form::submit("Delete", ['class'=>"btn-danger btn-block"]) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </td>
</tr>