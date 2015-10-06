<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content={{csrf_token() }}>
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>All Gifted Adaptive Math Test</title>
    <link rel="stylesheet" href="/js/math.css">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="/bootstrap3-editable/css/bootstrap-editable.css">
</head>
<body>
    @include('layouts._nav')

    @include('flash::message')


    <div class="container">
        @yield('content')
    </div>

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script><!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="/bootstrap3-editable/js/bootstrap-editable.js"></script>
    <script src="/js/math.js"></script>
    <script>
        //turn to inline mode
        $.fn.editable.defaults.mode = 'popup';
    </script>
    <script>
        $(document).ready(function() {
            $('.edit').editable({
                ajaxOptions: {
                    beforeSend: function (request)
                    {
                        request.setRequestHeader("X-CSRF-TOKEN", $('meta[name="csrf-token"]').attr('content'));
                    },
                }
            });
            $('.btn-toggle').click(function(){
               alert($(this).data('pk'));
            });
        });
    </script>
</body>
</html>