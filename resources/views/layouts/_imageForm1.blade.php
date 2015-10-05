<!-- Question Image file -->

<div class="col-md-12 fileinput-preview thumbnail" name=$image_name data-trigger="fileinput">
        @if(isset($question) and ($question->$image_name != null))
            <img src={{$question->$image_name}} alt={{$question->$image_name}}>
        @endif
    </div>
    <div>
            <span class="btn btn-default btn-file">
                {!! Form::label($imageButtonText, null, ['class'=>'fileinput-new']) !!}
                <span class="fileinput-exists">Change</span>
                {!! Form::file($image_name, null, ['class'=>'col-md-12 form-control']) !!}
            </span>
        <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
    </div>
<!-- end: Image file -->