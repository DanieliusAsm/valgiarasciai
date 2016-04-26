@extends('parent',['meta_title'=>'recipe'] )
@section('content')
    <form action="{{ url('/recipe/'.$id.'/add') }}" method="post" enctype="multipart/form-data">
        Receptas: <textarea rows="4" cols="50" name="recipe"></textarea><br>
        Nuotruka:
        <input type="file" name="file" id="file">
        <input type="hidden" value="{{ csrf_token() }}" name="_token">
        <input type="submit" value="Patvirtinti">
    </form>

@stop