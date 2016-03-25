@extends('base',['meta_title'=>'Index'] )

@section('content')
    <form action="{{ url('/rezultatas') }}" method="post">
        Svoris: <input type="text" name="svoris"><br>
        Ūgis: <input type="text" name="ugis"><br>
        <input type="submit" value="Skaičiuoti KMI">
    </form>
@stop
