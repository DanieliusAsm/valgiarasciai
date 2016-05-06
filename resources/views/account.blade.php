@extends('parent',['meta_title'=>'Account'])

@section('content')
@if(count($errors) > 0)
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            @foreach($errors->all() as $error)
                <div class="alert alert-danger alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <strong>Klaida!</strong> {{$error}}
                </div>
            @endforeach
        </div>
    </div>
@endif
	<section class="row new-post">
        <div class="col-md-6 col-md-offset-3">
            <form action="{{ route('account.save') }}" method="post" enctype="multipart/form-data">
                <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                    <label for="email">El. paštas:</label>
                    <input type="text" name="email" class="form-control" value="{{ $admin->email }}" id="email">
                </div>
                <div class="form-group {{ $errors->has('username') ? 'has-error' : '' }}">
                    <label for="username">Vartotojo vardas:</label>
                    <input type="text" name="username" class="form-control" value="{{ $admin->username }}" id="username">
                </div>
                <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                    <label for="username">Naujas slaptažodis:</label>
                    <input type="password" name="password" class="form-control" id="password">
                </div>
                <button type="submit" class="btn btn-primary center-block">Išsaugoti</button>
                <input type="hidden" value="{{ Session::token() }}" name="_token">
            </form>
        </div>
    </section>
@endsection