@extends('parent', ['meta_title'=>'Produkto redagavimas'])

@section('content')
    @if($products)
    <form action="{{ url('/products/'.$id.'/edit') }}" method="post" >
        Pavadinimas <input type="text" name="pavadinimas" value="{{$products->pavadinimas}}"/><br>
        Baltymai <input type="text" name="baltymai" value="{{$products->baltymai}}"/><br>
        Riebalai <input type="text" name="riebalai" value="{{$products->riebalai}}"/><br>
        Angliavandeniai <input type="text" name="angliavandeniai" value="{{$products->angliavandeniai}}"/><br>
        Cholesterolis <input type="text" name="cholesterolis" value="{{$products->cholesterolis}}"/><br>
        Energinė Vertė <input type="text" name="eVerte" value="{{$products->eVerte}}"/><br>
        Produkto grupė <input list="tipas" name="tipas" value="{{$products->tipas}}"/>
        <datalist id="tipas" >
            @foreach($tipas as $type)
            <label>
                <option value="{{$type->tipas}}"></option>
            </label><br>
            @endforeach
        </datalist><br>
        <input type="submit" value="Išsaugoti pakeitimus"/>
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
    </form>
    @endif
@stop