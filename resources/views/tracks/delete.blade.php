<!-- Delete Button trigger modal -->
<button type="button" class="btn-danger btn-block" data-toggle="modal" data-target="#myModal">
    Delete
</button>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Deleting Track</h4>
            </div>
            <div class="modal-body">
                <p>Once confirmed, this whole track, the levels and the difficulties<span class="alert-danger">cannot</span> be retrieved. You have other options
                    <ul>
                        <li>hide the track by making it private to yourself</li>
                        <li>make it not available for testing.</li>
                    </ul>
                </p>
                <p>Confirm delete this track?</p>

            </div>
            <div class="modal-footer">
                <!-- Delete Question Form starts -->
                {!! Form::open(['method' => 'delete','url'=>'tracks/'.$track->id, 'id'=>'delete-form'.$track->id ]) !!}
                {!! Form::submit("Confirm Delete Track", ['class'=>"btn btn-primary", 'id' => 'destroy']) !!}
                    <button type="button" class="btn btn-default" data-dismiss="modal">Don't Delete</button>
                {!! Form::close() !!}
                        <!-- Delete Question Form ends -->
            </div>
        </div>
    </div>
</div>