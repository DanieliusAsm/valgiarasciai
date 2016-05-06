@extends('parent', ['meta_title'=>'Produkto pridėjimas'])

@section('content')
    <form action="{{ url('/products/add/submit') }}" method="post" >
    <div class="row">
        <div class="col-sm-4">
            <form action="{{ url('/products/add/submit') }}" method="post" >
                <div class="form-group @if($errors->has('pavadinimas')) has-error @endif">
                    <label class="control-label" for="pavadinimas">Pavadinimas</label>
                    <input type="text" class="form-control" id="pavadinimas" name="pavadinimas" placeholder="Pavadinimas" value="{{old('pavadinimas')}}">
                    @if($errors->has('pavadinimas')) <p class="help-block">{{$errors->first('pavadinimas')}}</p>@endif
                </div>
                <div class="form-group @if($errors->has('baltymai')) has-error @endif">
                    <label class="control-label" for="baltymai">Baltymai</label>
                    <input type="number" class="form-control" id="baltymai" name="baltymai" placeholder="Baltymai" value="{{old('baltymai')}}">
                    @if($errors->has('baltymai')) <p class="help-block">{{$errors->first('baltymai')}}</p>@endif
                </div>
                <div class="form-group @if($errors->has('riebalai')) has-error @endif">
                    <label class="control-label" for="riebalai">Riebalai</label>
                    <input type="number" class="form-control" id="riebalai" name="riebalai" placeholder="Riebalai" value="{{old('riebalai')}}">
                    @if($errors->has('riebalai')) <p class="help-block">{{$errors->first('riebalai')}}</p>@endif
                </div>
                <div class ="form-group @if($errors->has('angliavandeniai')) has-error @endif">
                    <label class="control-label" for="angliavandeniai">Angliavandeniai</label>
                    <input type="number" class="form-control" id="angliavandeniai" name="angliavandeniai" placeholder="Angliavandeniai" value="{{old('angliavandeniai')}}">
                    @if($errors->has('angliavandeniai')) <p class="help-block">{{$errors->first('angliavandeniai')}}</p>@endif
                </div>
                <div class="form-group @if($errors->has('cholesterolis')) has-error @endif">
                    <label class="control-label" for="Cholesterolis">Cholesterolis</label>
                    <input type="number" class="form-control" id="Cholesterolis" name="cholesterolis" placeholder="Cholesterolis" value="{{old('cholesterolis')}}">
                    @if($errors->has('cholesterolis')) <p class="help-block">{{$errors->first('cholesterolis')}}</p>@endif
                </div>
                <div class="form-group @if($errors->has('eVerte')) has-error @endif">
                    <label class="control-label" for="everte">Energetinė vertė</label>
                    <input type="number" class="form-control" id="everte" name="eVerte" placeholder="Energetinė vertė" value="{{old('eVerte')}}">
                    @if($errors->has('eVerte')) <p class="help-block">{{$errors->first('eVerte')}}</p>@endif
                </div>
                <div class="form-group @if($errors->has('tipas')) has-error @endif">
                    <label class="control-label" for="produktogrupe">Produkto grupė</label>
                    <input list="tipas" name="tipas" id="produktogrupe" name="tipas" class="form-control" placeholder="Produkto grupė" value="{{old('tipas')}}">
                    @if($errors->has('tipas')) <p class="help-block">{{$errors->first('tipas')}}</p>@endif
                    <datalist id="tipas" >
                        @foreach($tipas as $type)
                            <label>
                                <option value="{{$type->tipas}}"></option>
                            </label><br>
                        @endforeach
                    </datalist>
                </div>
                <button class="btn btn-primary" type="submit">Pridėti produktą</button>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
            </form>
        </div>
    </div>
@stop