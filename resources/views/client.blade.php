@extends('parent',['meta_title'=>'Vartotojo kurimas'])

@section('content')

    <form action="
    @if(Route::is("createUser")){{route('saveUser')}}
    @elseif(Route::is("editUser")){{route('saveEditedUser',['id'=>$id])}}
    @elseif(Route::is("addUserData")){{route('saveUserData',['id'=>$id])}}
    @endif" method="post">
        <div class="panel-group">
            @if(!Route::is("addUserData"))
                @include("includes.client_form")
            @endif
            @if(Route::is("editUser"))
                @foreach($user->base as $base)
                    @include("includes.base", ["base"=>$base])
                @endforeach
                @foreach($user->body as $body)
                    @include("includes.body", ["body"=>$body])
                @endforeach
                @foreach($user->blood as $blood)
                    @include("includes.blood", ["blood"=>$blood])
                @endforeach
            @else
                    @include("includes.base")
                    @include("includes.body")
                    @include("includes.blood")
            @endif
        </div>

        @if(Route::is("addUserData"))<button type="submit" class="btn btn-primary center-block">Pridėti</button>
        @elseif(Route::is("editUser"))<button type="submit" class="btn btn-primary center-block">Redaguoti</button>
        @else <button type="submit" class="btn btn-primary center-block">Kurti</button>
        @endif
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
    </form>
@stop