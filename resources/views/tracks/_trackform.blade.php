<!--  form input -->
<div class="form-group col-xs-12 col-md-6">
    {!! Form::text('track', null,[
    'class' => 'form-control',
    'id' => 'track',
    'placeholder' => 'Track Name'
    ]) !!}
</div>
<div class="form-group col-xs-12 col-md-6">
    {!! Form::text('description', null,[
    'class' => 'form-control col-xs-12 col-md-6',
    'id' => 'description',
    'placeholder' => 'Track Description'
    ]) !!}
</div>
<div class="form-group col-md-6 thumbnail">
        {!! Form::label('Track Image', 'Track Image:') !!}
        {!! Form::file('image',[
            'class' => 'form-control fileinput-preview',
            'id' => 'image',
        ]) !!}
</div>
<div class="form-group col-xs-12 col-md-6">
    {!! Form::number('lowest_maxile_level', null,[
    'class' => 'form-control',
    'id' => 'lowest_maxile_level',
    'placeholder' => 'Lowest Starting Level'
    ]) !!}
</div>
<div class="form-group col-xs-12 col-md-6">
    {!! Form::number('highest_maxile_level', null,[
    'class' => 'form-control',
    'id' => 'highest_maxile_level',
    'placeholder' => 'Highest Level'
    ]) !!}
</div>
<!-- Is_private form input -->
<div class="form-group col-md-6">

    {!! Form::checkbox('is_private', FALSE,['class'=>'form-control input-group-addon']) !!}
    Make Private/Do not share with others
</div>
<!-- end: Radio input Is_private -->
<!-- Is_hidden form input -->
<div class="form-group col-md-6">
    {!! Form::checkbox('is_hidden', false, ['class'=>'form-control input-group-addon']) !!}
    Do not use this question for testing
</div>
<!-- end: Radio input Is_hidden -->

<!-- Save Question button -->
<div class="form-group col-md-12">
    {!! Form::submit($submitButtonText,['class'=>'btn btn-primary col-md-12']) !!}
</div>
<!-- end: submit button -->