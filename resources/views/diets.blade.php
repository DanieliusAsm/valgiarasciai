@extends('parent',['meta_title'=>'Valgiaraščiai'])

@section("content")
    <div class="row">
        <div class="col-sm-4">
            <a href="{{route("newDiet",['id'=>$id])}}">Naujas Valgiarastis</a>
        </div>
    </div>
@stop
