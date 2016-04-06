@extends('parent',['meta_title'=>'Login'])

@section('content')
<div class="row">
    <div class="col-md-6">
        <h3>Sign Up</h3>
        <form action="{{ route('signup') }}" method="post">
            <div class="form-group">
                <label for="email">Your e-mail</label>
                <input class="form-control" type="text" name="email" id="email">
            </div>
            <div class="form-group">
                <label for="password">Your Username</label>
                <input class="form-control" type="text" name="username" id="username">
            </div>
            <div class="form-group">
                <label for="email">Your password</label>
                <input class="form-control" type="password" name="password" id="password">
            </div>
            <button type="submit" class="btn btn-primary">Register</button>
            <input type="hidden" name="_token" value="{{ Session::token() }}">
        </form>
    </div>
    <div class="col-md-6">
        <h3>Sign In</h3>
        <form action="{{ route('signin') }}" method="post">
            <div class="form-group">
                <label for="email">Your e-mail</label>
                <input class="form-control" type="text" name="email" id="email">
            </div>
            <div class="form-group">
                <label for="password">Your password</label>
                <input class="form-control" type="password" name="password" id="password">
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
            <input type="hidden" name="_token" value="{{ Session::token() }}">
        </form>
    </div>

</div>
@endsection