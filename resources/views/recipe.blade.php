@extends('parent',['meta_title'=>'recipe'] )
@section('content')
    <div class="row">
    <div class="col-sm-4">
        <form action="{{ url('/products/'.$id.'/addrecipe') }}" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="Nuotrauka">Receptas:</label>
                <textarea class="form-control" id="Nuotrauka" rows="4" name="recipe"></textarea>
            </div>
            <div class="form-group">
                <label for="Nuotrauka">Nuotrauka:</label>
                <input class="form-control" id="Nuotrauka" type="file" name="file" id="file">
            </div>
            <input type="hidden" value="{{ csrf_token() }}" name="_token">
            <button type="submit" class="btn btn-primary">Patvirtinti</button>
        </form>
    </div>
    </div>
@stop