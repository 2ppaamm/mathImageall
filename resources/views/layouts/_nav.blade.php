<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">All Gifted</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="active"><a href="/tracks">Track</a></li>
                <li><a href="/levels">Level</a></li>
                <li><a href="/difficulties">Difficulty</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Question <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="/questions">List</a></li>
                        <li><a href="/questions/create">Create</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="/questions/destroy">Delete</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#"></a>Whatever...</li>
                    </ul>
                </li>
            </ul>
            @include('layouts.loginForm')
            @include('layouts._rightnav')
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>