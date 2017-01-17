<html>
<head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <style>
        table, th, td {
            border: 1px solid #000000;
            border-collapse: collapse;
        }
    </style>
</head>
<body>
<table>
    <thead>
    <tr>
        <th>#</th>
        <th>Baltymai</th>
        <th>Riebalai</th>
        <th>Angliavadeniai</th>
        <th>Energetinė vertė</th>
        @if($cholesterol)<th>Cholesterolis</th>@endif
    </tr>
    </thead>
    <tbody>
    @for($a=0;$a<count($diet);$a++)
        <tr>
            <th colspan="5" align="center">{{$diet[$a]['day']}}</th>
        </tr>
        @foreach($diet[$a] as $eating)
            @if(isset($eating['eating_type']))
                <tr>
                    <td>{{$eating['eating_type']}}</td>
                    <td>{{$eating['baltymai']}}</td>
                    <td>{{$eating['riebalai']}}</td>
                    <td>{{$eating['angliavandeniai']}}</td>
                    <td>{{$eating['eVerte']}}</td>
                    @if($cholesterol)<td>{{$eating['cholesterolis']}}</td>@endif
                </tr>
            @endif
        @endforeach
        <tr>
            <th>Viso už dieną:</th>
            <td>{{$dietStats[$a]['baltymai']}}</td>
            <td>{{$dietStats[$a]['riebalai']}}</td>
            <td>{{$dietStats[$a]['angliavandeniai']}}</td>
            <td>{{$dietStats[$a]['eVerte']}}</td>
            @if($cholesterol)<td>{{$dietStats[$a]['cholesterolis']}}</td>@endif
        </tr>
    @endfor
    <tr>
        <th colspan="5" align="center">Vienos dienos vidurkiai</th>
    </tr>
    @for($i=0;$i<count($diet[0]);$i++)
        @if(isset($diet[0][$i]['eating_type']))
            <tr>
                <td>{{$diet[0][$i]['eating_type']}}</td>
                <td>{{$dietStats['baltymai'][$i]}}</td>
                <td>{{$dietStats['riebalai'][$i]}}</td>
                <td>{{$dietStats['angliavandeniai'][$i]}}</td>
                <td>{{$dietStats['eVerte'][$i]}}</td>
                @if($cholesterol)<td>{{$dietStats['cholesterolis'][$i]}}</td>@endif
            </tr>
        @endif
    @endfor
    <tr>
        <th>Viso:</th>
        <td>{{$dietStats['visoBaltymu']}}</td>
        <td>{{$dietStats['visoRiebalu']}}</td>
        <td>{{$dietStats['visoAngliavandeniu']}}</td>
        <td>{{$dietStats['visoEVertes']}}</td>
        @if($cholesterol)<td>{{$dietStats['visoCholesterolio']}}</td>@endif
    </tr>
    </tbody>
    <tfoot>

    </tfoot>
</table>
</body>
</html>