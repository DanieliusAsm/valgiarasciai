@extends('parent',['meta_title'=>'Kūno kompleksijos analizė'])

@section('content')
    <form action = "{{ url('/user/'.$id.'/body') }}" method="post">
        Biologinis amžius <input type="number" name="biological_age"/><br>
        Procentinė kūno skysčių išraiška <input type="text" name="body_fluid"/><br>
        Pilvo riebalų lygis <input type="text" name="abdominal_fat"/><br>
        Svoris <input type="number" name="weight"/><br>
        Procentinė riebalų išraiška <input type="text" name="fat_expression"/><br>
        Raumenų masė <input type="text" name="muscle_mass"/><br>
        Kaulų masė <input type="text" name="bone_mass"/><br>
        Kūno masės indeksas (KMI) <input type="number" name="kmi"/><br>
        Dienos kalorijų norma <input type="text" name="calorie_intake"/><br>
        <input type="submit" value="Sukurti"/>
    </form>
@stop