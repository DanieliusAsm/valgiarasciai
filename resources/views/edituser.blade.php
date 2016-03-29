@extends('parent',['meta_title'=>'Vartotojo redagavimas'])

@section('content')
    @if($user)
    <form action="{{url('/user/'.$id.'/edit')}}" method ="post">
        Vardas <input type="text" name="first_name" value ="{{$user->first_name}}"/><br>
        Pavardė <input type="text" name="last_name" value ="{{$user->last_name}}"/><br>
        @if($user->gender == "male")
            <input type="radio" name="gender" value="male" checked>Vyras</input>
            <input type ="radio" name="gender" value="female">Moteris</input><br>
        @else
            <input type="radio" name="gender" value="male">Vyras</input>
            <input type ="radio" name="gender" value="female" checked>Moteris</input><br>
        @endif
        <input type="radio" name="gender">Vyras</input>
        <input type ="radio" name="gender">Moteris</input><br>
        Amzius <input type="number" name="age" value ="{{$user->age}}"/><br>
        Telefono numeris <input type="text" name="phone" value ="{{$user->phone}}"/><br>
        El. pastas <input type="email" name="email" value ="{{$user->email}}"/><br>
        Pritaikyta dieta <input type="text" name="diet" value ="{{$user->diet}}"/><br>
        Pastabos <input type="text" name="notes" value ="{{$user->notes}}"/><br>
        <input type="submit" value="Kurti vartotoja"/>
    </form>
    @endif
@stop