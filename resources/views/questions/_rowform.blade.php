<tr>
    @if ($question->image != null)
        <td><img src={{ $question->image }} alt={{$question->question}}\></td>
    @else
        <td></td>
    @endif
    <td><a href="#" data-pk={{$question->id}} name="track">{{$question->track['track']}}</a></td>
    <td><a href="#" data-pk={{$question->id}} name="level">{{$question->level['level']}}</a></td>
    <td><a href="#" class='edit' data-type="text" data-pk={{$question->id}} id='question' data-url="/questions/{{$question->id}}" data-title="Enter question text">{{ $question->question }}</a></td>
    <td>{{ $question->user->firstname }}</td>
    <td>
        <div class="btn-group-vertical" role="group" aria-label="">
            <div class="btn-group" role="group">
                <a href="questions/{{$question->id}}" id="viewquestion{{$question->id}}" class="btn-min btn btn-primary" >View Details</a>
                <a href="#" id="status_id" class="edit btn-min btn btn-info" data-type="select" data-pk="{{$question->id}}" data-url="/questions/{{$question->id}}" data-title="Status?">{{ $question->status->status }}</a>
                <button type="button" class="btn-copy btn btn-warning btn-min" style="display: none">Copy</button>
                {!! Form::open(['method'=>'DELETE','class'=>'delete-form', 'url'=>'questions/'.$question->id]) !!}
                {!! Form::submit("Delete", ['class'=>"btn-danger btn-block"]) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </td>
</tr>