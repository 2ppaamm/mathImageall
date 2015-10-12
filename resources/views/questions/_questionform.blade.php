<!-- Track form input track-->
<div class="form-group  col-md-4">
    {!! Form::label('track', 'Topic Track:') !!}
    {!! Form::select('track_id', $tracks, null,['class'=>'form-control', 'value'=>'Select Track']) !!}
</div>
<!-- end: Select input from database for Track -->

<!-- Level form input level-->
<div class="form-group col-md-4">
    {!! Form::label('level_id', 'Level:') !!}
    {!! Form::select('level_id', $levels, null,['class'=>'form-control']) !!}
</div>
<!-- end: Select input from database for Track -->

<!-- Level form input difficulty-->
<div class="form-group col-md-4">
    {!! Form::label('difficulty_id', 'Difficulty:') !!}
    {!! Form::select('difficulty_id', $difficulties, null,['class'=>'form-control']) !!}
</div>
<!-- end: Select input from database for Track -->
<div class="form-group col-md-8">
    {!! Form::textarea('question', null,[
    'class' => 'form-control',
    'id' => 'question',
    'placeholder' => 'Question Text',
    'rows' => '8'
    ]) !!}
</div>
<div class="form-group col-md-4 thumbnail">
    @include('layouts._imageForm', ['image_name'=>'image_question', 'image_link'=>$image_link])
</div>
<!--  form input for answers -->
@for ($i = 1; $i < 5; $i++)
    <div class="form-group col-md-3 thumbnail">
        <div class="input-group-addon">
            {!! Form::radio('correct_answer', $i, false) !!}
            Correct answer
        </div>
            {!! Form::textarea('answer'.$i, null,[
            'class' => 'form-control fileinput-preview',
            'id' => 'answer'.$i,
            'placeholder' => 'answer'.$i,
            'rows' => '2'
            ]) !!}
            <div class="form-group">
                <p style="display: none">{{ $answer_link = 'answer'.$i.'_link' }}</p>
                @include('layouts._imageForm', ['image_name'=>'answer'.$i.'_image',
                'image_link'=>$$answer_link
                ])
            </div>
    </div>
@endfor
<!-- end: text input  -->
<!--  form input -->
<div class="form-group col-md-12">
    {!! Form::text('source', null,[
        'class' => 'form-control',
        'id'=> 'source',
        'placeholder' => 'Please give credit where it is due. Quote source.'
        ]) !!}
</div>
<!-- end: text input  -->
<!-- Is_private form input -->
<div class="form-group col-md-6">
    <div class="input-group-addon alert-primary">
        {!! Form::radio('is_private', false) !!}
        Make Private/Do not share with others
    </div>
</div>
<!-- end: Radio input Is_private -->
<!-- Is_hidden form input -->
<div class="form-group col-md-6">
    <div class="input-group-addon alert-info">
    {!! Form::radio('is_hidden', false) !!}
    Do not use this question for testing
    </div>
</div>
<!-- end: Radio input Is_hidden -->

<!-- Save Question button -->
<div class="form-group col-md-12">
    {!! Form::submit($submitButtonText,['class'=>'btn btn-primary col-md-12']) !!}
</div>
<!-- end: submit button -->