@extends('parent',['meta_title'=>'Index'] )

@section('content')
    <form action="{{ url('/rezultatas') }}" method="post">
        Masė(kg): <input type="text" name="svoris"><br>
        Ūgis(cm): <input type="text" name="ugis"><br>
        <input type="radio" name="gender" value="vyras" checked> Vyras<br>
        <input type="radio" name="gender" value="moteris"> Moteris<br>
        <input type="submit" value="Skaičiuoti KMI">
    </form>
@stop

