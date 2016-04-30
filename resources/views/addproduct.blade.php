@extends('parent', ['meta_title'=>'Produkto pridėjimas'])

@section('content')

    <form action="{{ url('/products/add/submit') }}" method="post" >
        Pavadinimas <input type="text" name="pavadinimas" /><br>
        Baltymai <input type="text" name="baltymai"/><br>
        Riebalai <input type="text" name="riebalai"/><br>
        Angliavandeniai <input type="text" name="angliavandeniai" /><br>
        Cholesterolis <input type="text" name="cholesterolis"/><br>
        Energinė Vertė <input type="text" name="eVerte"/><br>
        Produkto grupė <input list="tipas" name="tipas"/>
        <datalist id="tipas" >
            @foreach($tipas as $type)
            <label>
                <option value="{{$type->tipas}}"></option>
            </label><br>
            @endforeach
        </datalist><br>
        <input type="submit" value="Pridėti produktą"/>
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
    </form>
@stop