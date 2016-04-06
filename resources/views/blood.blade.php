@extends('parent',['meta_title'=>'blood'] )
@section('content')
    <form action="{{ url('/user/'.$id.'/blood') }}" method="post">
        Arterinis kraujo spaudimas: <input type="number" name="arterija" min="0"><br>
        Pulsas: <input type="number" name="pulsas" min="0"><br>
        Bendras cholesterolis: <input type="number" name="cholesterolis" min="0"><br>
        MTL: <input type="number" name="mtl" min="0"><br>
        DTL: <input type="number" name="dtl" min="0"><br>
        Trigliceridai: <input type="number" name="trig" min="0"><br>
        Gliukozė: <input type="number" name="gliukozė" min="0"><br>
        <input type="submit" value="Patvirtinti">
    </form>
@stop