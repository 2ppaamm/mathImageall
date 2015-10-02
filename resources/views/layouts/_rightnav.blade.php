@if (!isset($user))
    <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Login help <span class="caret"></span></a>
            <ul class="dropdown-menu">
                <li><a href="/password/email">Forgot my password</a></li>
                <li><a href="/auth/register">Create a new account</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="#">Another action</a></li>
            </ul>
        </li>
    </ul>
@else
    <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ $user }} <span class="caret"></span></a>
            <ul class="dropdown-menu">
                <li><a href="/auth/register">Create another account</a></li>
                <li><a href="#">Something else here</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="/auth/logout">Logout</a></li>
            </ul>
        </li>
    </ul>
@endif
