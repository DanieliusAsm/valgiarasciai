@extends('parent',['meta_title'=>'blood'] )
@section('content')
    <form action="{{ url('/user/'.$id.'/blood') }}" method="post">
        Arterinis kraujo spaudimas: <input type="number" name="blood_pressure" min="0"><br>
        Pulsas: <input type="number" name="pulse" min="0"><br>
        Bendras cholesterolis: <input type="number" name="cholesterol" min="0"><br>
        MTL: <input type="number" name="mtl" min="0"><br>
        DTL: <input type="number" name="dtl" min="0"><br>
        Trigliceridai: <input type="number" name="triglycerides" min="0"><br>
        Gliukozė: <input type="number" name="glucose" min="0"><br>
        <input type="submit" value="Patvirtinti">
    </form>
@stop