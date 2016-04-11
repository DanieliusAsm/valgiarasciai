@extends('parent', ['meta_title'=>'Produkto pridėjimas'])

@section('content')
    
    <form action="{{ url('/products/add/submit') }}" method="post" >
        Pavadinimas <input type="text" name="pavadinimas"/><br>
        Baltymai <input type="text" name="baltymai"/><br>
        Riebalai <input type="text" name="riebalai"/><br>
        Angliavandeniai <input type="text" name="angliavandeniai"/><br>
        Cholesterolis <input type="text" name="cholesterolis"/><br>
        Energinė Vertė <input type="text" name="eVerte"/><br>
        Produkto grupė <input list="tipas" name="tipas"/>
        <datalist id="tipas" >
            <option value="Mėsa">Mėsa</option>
            <option value="pienas">Pienas</option>
            <option value="kiaušiniai">Kiaušiniai</option>
            <option value="žuvis">Žuvis</option>
        </datalist><br>
        <input type="submit" value="Pridėti produktą"/>
    </form>
@stop