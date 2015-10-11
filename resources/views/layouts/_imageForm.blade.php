    <div class="fileinput fileinput-new" data-provides="fileinput">
        <div class="fileinput-new thumbnail" style="width: 15em; height: 12em;">
            <img data-src= {{$image_link}} src={{$image_link}} alt={{$image_name}} id={{$image_name}}_link>
        </div>
        <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 350px; max-height: 250px;"></div>
        <div>
        <span class="btn btn-default btn-file"><span class="fileinput-new">Select image</span><span class="fileinput-exists">Change</span>
            {!! Form::file($image_name,['class' => 'form-control','id' => $image_name]) !!}
        </span>
            <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Reset</a>
            <a href="#" class="btn btn-default file-remove" data-file={{$image_name}} data-dismiss="fileinput">Remove</a>
        </div>
    </div>

