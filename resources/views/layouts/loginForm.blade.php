@if (!isset($user))
        <!-- Start Login Form -->
            <form class ="navbar-form navbar-left" method="POST" action="/auth/login">
                {!! csrf_field() !!}
                <div class="form-group">
                    <input type="email" class="form-control" name="email" placeholder="Email" value="{{ old('email') }}">
                </div>
                <div class="form-group">
                    <input type="password"  class="form-control" name="password" password="Password" id="password">
                </div>
                <div class="form-group">
                    <input type="checkbox" name="remember" style="display:none" checked>
                </div>
                <button type="submit" class="btn btn-default">Login</button>
            </form>
            <!-- End Login Form -->
@else
    <form class="navbar-form navbar-left" role="search">
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
    </form>
@endif