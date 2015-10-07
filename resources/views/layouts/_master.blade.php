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
@include('layouts._footer')
</body>
</html>