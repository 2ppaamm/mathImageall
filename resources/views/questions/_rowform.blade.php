<tr>
    <td>
    <div class = "thumbnail" style="width: 15em; height: 12em;">
        @if ($question->image_question != null)
            <img src={{ $question->image_question }} alt={{$question->question}}\>
        @else
            <img src="/js/placeholder-image.png" alt={{$question->question}}\>
        @endif
    </div>
    </td>
    <td><a href="#" data-pk={{$question->id}} name="track">{{$question->track['track']}}</a></td>
    <td><a href="#" data-pk={{$question->id}} name="skill">{{$question->skill['skill']}}</a></td>
    <td><a href="#" data-pk={{$question->id}} name="level">{{$question->level['level']}}</a></td>
    <td><a href="#" class='edit' data-type="textarea" data-pk={{$question->id}} id='question' data-url="/questions/{{$question->id}}" data-title="Enter question text">{{ $question->question }}</a></td>
    <td>{{ $question->user->firstname }}</td>
    <td>
        <div class="btn-group-vertical" role="group" aria-label="...">
            <a href="questions/{{$question->id}}" id="viewquestion{{$question->id}}" class="btn-min btn btn-primary" >View Details</a>
            <a href="questions/{{$question->id}}/edit" id="editquestion{{$question->id}}" class="btn-min btn btn-warning" >Edit</a>
            <a href="#" id="status_id" class="edit btn-min btn btn-info" data-type="select" data-pk="{{$question->id}}" data-url="/questions/{{$question->id}}" data-title="Status?">{{ $question->status->status }}</a>
            <button type="button" class="btn-copy btn btn-warning btn-min" style="display: none">Copy</button>
            <!-- Delete Question Form starts -->
            {!! Form::open(['method'=>'DELETE','class'=>'delete-form', 'url'=>'questions/'.$question->id]) !!}
            {!! Form::submit("Delete", ['class'=>"btn-danger btn-block"]) !!}
            {!! Form::close() !!}
        </div>
    </td>
</tr>