<div class="col-xs-6 col-md-3">
    <a href="#" class="thumbnail">
        @if ($question->$answer !=null)
            <img src="{{ $question->$answer }}" alt="">
        @endif
        {{$question->$number}}
    </a>
</div>
