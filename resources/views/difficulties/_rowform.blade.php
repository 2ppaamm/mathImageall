<tr>
    @if ($difficulty->image != null)
        <td><img src={{ $difficulty->image }} alt={{$difficulty->difficulty}}\></td>
    @else
        <td>{{$difficulty->difficulty}}</td>
    @endif
    <td><a href="#" name="difficulty" class='edit' data-type="text" data-pk={{$difficulty->id}} id='difficulty' data-url="/difficulties/{{$difficulty->id}}" data-title="Enter new difficulty name">{{$difficulty->difficulty}}</a></td>
    <td><a href="#" class='edit' data-type="text" data-pk={{$difficulty->id}} id='short_description' data-url="/difficulties/{{$difficulty->id}}" data-title="Enter typical age">{{ $difficulty->short_description }}</a></td>
    <td><a href="#" class='edit' data-type="textarea" data-pk={{$difficulty->id}} id='description' data-url="/difficulties/{{$difficulty->id}}" data-title="Enter new difficulty description">{{$difficulty->description}}</a></td>
    <td>{{ $difficulty->user->firstname }}</td>
    <td>
        <div class="btn-group-vertical" role="group" aria-label="">
            <div class="btn-group" role="group">
                <a href="#" id="status_id" class="edit btn-min btn btn-info" data-type="select" data-pk="{{$difficulty->id}}" data-url="/difficulties/{{$difficulty->id}}" data-title="Status?">{{ $difficulty->status->status }}</a>
                <button type="button" class="btn-copy btn btn-warning btn-min" style="display: none">Copy</button>
                {!! Form::open(['method'=>'DELETE','class'=>'delete-form', 'url'=>'difficulties/'.$difficulty->id]) !!}
                {!! Form::submit("Delete", ['class'=>"btn-danger btn-block"]) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </td>
</tr>