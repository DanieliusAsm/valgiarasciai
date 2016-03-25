@extends('base',['meta_title'=>'Vartotojo kurimas'])

@section('content')
    <form action="{{url('/user/new/result')}}" method ="post">
        Vardas <input type="text" name="first_name"/><br>
        Pavardė <input type="text" name="last_name"/><br>
        <input type="radio" name="gender">Vyras</input>
        <input type ="radio" name="gender">Moteris</input><br>
        Amzius <input type="text" name="age"/><br>
        Telefono numeris <input type="text" name="phone"/><br>
        El. pastas <input type="text" name="email"/><br>
        <input type="submit" value="Kurti vartotoja"/>
    </form>
@stop