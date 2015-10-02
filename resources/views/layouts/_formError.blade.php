@if ($errors->any())
    <div class = "col-md-12 alert alert-danger">
        <h3>Please correct errors in filling up the form:</h3>
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif