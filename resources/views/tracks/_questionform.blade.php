<!--  form input -->
<!-- Track form input track-->
<div class="form-group  col-md-4">
    {!! Form::label('track', 'Topic Track:') !!}
    {!! Form::select('track_id', $tracks, $track_id,['class'=>'form-control']) !!}
</div>
<!-- end: Select input from database for Track -->

<!-- Level form input level-->
<div class="form-group col-md-4">
    {!! Form::label('level_id', 'Level:') !!}
    {!! Form::select('level_id', $levels, $level_id,['class'=>'form-control']) !!}
</div>
<!-- end: Select input from database for Track -->

<!-- Level form input difficulty-->
<div class="form-group col-md-4">
    {!! Form::label('difficulty_id', 'Difficulty:') !!}
    {!! Form::select('difficulty_id', $difficulties, $difficult_id,['class'=>'form-control']) !!}
</div>
<!-- end: Select input from database for Track -->
<div class="form-group">
    {!! Form::textarea('question', null,[
    'class' => 'form-control',
    'id' => 'question',
    'placeholder' => 'Question Text',
    'rows' => '5'
    ]) !!}
</div>
<!--  form input -->
<div class="form-group col-md-3">
    <div class="input-group-addon">
        {!! Form::radio('correct_answer', 1, false) !!}
        Correct answer
    </div>
    {!! Form::textarea('answer1', null,[
    'class' => 'form-control',
    'id' => 'answer1',
    'placeholder' => 'answer1',
    'rows' => '2'
    ]) !!}
</div>
<!-- end: text input  -->
<!--  form input -->
<div class="form-group col-md-3">
    <div class="input-group-addon">
        {!! Form::radio('correct_answer', 2, false) !!}
        Correct answer
    </div>
    {!! Form::textarea('answer2', null,[
    'class' => 'form-control',
    'id' => 'answer2',
    'placeholder' => 'answer2',
    'rows' => '2'
    ]) !!}
</div>
<!-- end: text input  -->
<!--  form input -->
<div class="form-group col-md-3">
    <div class="input-group-addon">
        {!! Form::radio('correct_answer', 3) !!}
        Correct answer
    </div>
    {!! Form::textarea('answer3', null,[
    'class' => 'form-control',
    'id' => 'answer3',
    'placeholder' => 'answer3',
    'rows' => '2'
    ]) !!}
</div>
<!-- end: text input  -->
<!--  form input -->
<div class="form-group col-md-3">
    <div class="input-group-addon">
        {!! Form::radio('correct_answer', 4) !!}
        Correct answer
    </div>
    {!! Form::textarea('answer4', null,[
    'class' => 'form-control',
    'id' => 'answer4',
    'placeholder' => 'answer4',
    'rows' => '2'
    ]) !!}
</div>
<!-- end: text input  -->
<!-- Is_private form input -->
<div class="form-group col-md-6">
    {!! Form::radio('is_private', false,['class'=>'form-control input-group-addon']) !!}
    Make Private/Do not share with others
</div>
<!-- end: Radio input Is_private -->
<!-- Is_hidden form input -->
<div class="form-group col-md-6">
    {!! Form::radio('is_hidden', false, ['class'=>'form-control input-group-addon']) !!}
    Do not use this question for testing
</div>
<!-- end: Radio input Is_hidden -->

<!-- Save Question button -->
<div class="form-group col-md-12">
    {!! Form::submit($submitButtonText,['class'=>'btn btn-primary col-md-12']) !!}
</div>
<!-- end: submit button -->

