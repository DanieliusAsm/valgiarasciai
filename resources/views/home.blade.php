@extends('parent',['meta_title'=>'Home'])

@section('content')
<div class="row center">
  <div class="col-md-6">
    <div class="input-group">
      <span class="input-group-btn">
        <button class="btn btn-primary" type="button">Ieškoti</button>
      </span>
      <input type="text" class="form-control" placeholder="Ieškoti...">
    </div><!-- /input-group -->
  </div><!-- /.col-lg-6 -->
</div><!-- /.row -->
@endsection


