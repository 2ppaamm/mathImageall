<!-- Delete Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Deleting Question</h4>
            </div>
            <div class="modal-body">
                <p>Once confirmed, this question <span class="alert-danger">cannot</span> be retrieved. You have other options
                    <ul>
                        <li>hide the question by making it private to yourself</li>
                        <li>make it not available for testing.</li>
                    </ul>
                </p>
                <p>Confirm delete this question?</p>

            </div>
            <div class="modal-footer">
                <!-- Delete Question Form starts -->
                {!! Form::open(['method' => 'delete','url'=>'questions/'.$question->id ]) !!}
                {!! Form::submit("Confirm Delete Question", ['class'=>"btn btn-primary"]) !!}
                    <button type="button" class="btn btn-default" data-dismiss="modal">Don't Delete</button>
                {!! Form::close() !!}
                        <!-- Delete Question Form ends -->
            </div>
        </div>
    </div>
</div>