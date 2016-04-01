@extends('parent',['meta_title'=>'calculator'] )

@section('content')
    <form action="{{ url('/calculator') }}" method="post">
        Masė(kg): <input type="number" name="svoris" min="0"><br>
        Ūgis(cm): <input type="number" name="ugis" min="0"><br>
        Amžius: <input type="number" name="amzius" min="0" max="130"><br>
        <input type="radio" name="gender" value="vyras" checked> Vyras<br>
        <input type="radio" name="gender" value="moteris"> Moteris<br>
        <input type="radio" name="veiksnys1" value="palaikymas" checked> Svorio palaikymui<br>
        <input type="radio" name="veiksnys1" value="prieaugis"> Svorio prieaugiui<br>
        <input type="submit" value="Skaičiuoti KMI">
    </form>
    @if(!empty($kmi))
        {{$kmi}}(kg/m²)<br>
        {{$salyga}}<br>
        {{$pma}} PMA(kcal)<br>
        {{$fag}}<br>
    @endif
@stop
