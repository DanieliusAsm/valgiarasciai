@extends('base',['meta_title'=>'Index'] )

@section('content')

    <form action="{{ url('/rezultatas') }}" method="post">
        Masė(kg): <input type="text" name="svoris"><br>
        Ūgis(cm): <input type="text" name="ugis"><br>
        Amžius: <input type="text" name="amzius"><br>
        <input type="radio" name="gender" value="vyras" checked> Vyras<br>
        <input type="radio" name="gender" value="moteris"> Moteris<br>
        <input type="radio" name="veiksnys1" value="palaikymas" checked> Svorio palaikymui<br>
        <input type="radio" name="veiksnys1" value="prieaugis"> Svorio prieaugiui<br>
        <input type="submit" value="Skaičiuoti KMI">
    </form>
   @stop