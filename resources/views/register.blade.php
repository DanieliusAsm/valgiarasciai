@extends('parent',['meta_title'=>'Vartotojo kurimas'])

@section('content')
    <form action="{{url('/user/new/result')}}" method ="post">
        Vardas <input type="text" name="first_name"/><br>
        Pavardė <input type="text" name="last_name"/><br>
        <input type="radio" name="gender" value="male" checked>Vyras</input>
        <input type ="radio" name="gender" value="female">Moteris</input><br>
        Amzius <input type="number" name="age"/><br>
        Telefono numeris <input type="text" name="phone"/><br>
        El. pastas <input type="email" name="email"/><br>
        Pritaikyta dieta <input type="text" name="diet"/><br>
        Pastabos <input type="text" name="notes"/><br>
        <input type="submit" value="Kurti vartotoja"/>
    </form>
@stop