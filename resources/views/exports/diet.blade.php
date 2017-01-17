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
            <th>LaikasėęįčėįėįčŠŠŠŠŠŠŠŠŠŠšššššššš</th>
            <th>Maisto produktas/gaminys</th>
            <th>Kiekis/Išeiga</th>
            <th>Baltymai</th>
            <th>Riebalai</th>
            <th>Angliavadeniai</th>
            <th>Energetinė vertė</th>
            @if($cholesterol)<th>Cholesterolis</th>@endif
        </tr>
        </thead>
        <tbody>
        @foreach($diet as $eating)
            <?php $vanduo = ""; ?>
            @if($diet[0]==$eating)
                <?php $vanduo = "Atsikėlus"; ?>
            @elseif($diet[count($diet)-1]==$eating)
                <?php $vanduo = "Prieš miegą"; ?>
            @else
                <?php $vanduo = "30min prieš"; ?>
            @endif
            <tr>
                <td>{{$vanduo}}</td>
                <td>Vanduo</td>
                <td>200</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                @if($cholesterol)<td>0</td>@endif
            </tr>
        <tr>
            <th>{{$eating['eating_time']}}</th>
            <th>{{$eating['eating_type']}}</th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            @if($cholesterol)<th></th>@endif
        </tr>
        @foreach($eating['product'] as $product)
            <tr>
                <td></td>
                <td>{{$product['pavadinimas']}}</td>
                <td>{{$product['pivot']['quantity']}} @if($product['tipas'] == "Gėrimai") ml @else g @endif</td>
                <td>{{round(($product['baltymai'] * $product['pivot']['quantity'] / 100),2)}}</td>
                <td>{{round(($product['riebalai'] * $product['pivot']['quantity'] / 100),2)}}</td>
                <td>{{round(($product['angliavandeniai'] * $product['pivot']['quantity'] / 100),2)}}</td>
                <td>{{round(($product['eVerte'] * $product['pivot']['quantity'] / 100),2)}}</td>
                @if($cholesterol)<td>{{round(($product['cholesterolis'] * $product['pivot']['quantity'] / 100),2)}}</td>@endif
            </tr>
        @endforeach
        <tr class="active">
            <td colspan="3" style="background-color:#f5f5f5;">Bendra maistinė ir energinė vertė
            </td>
            <td>{{$eating['baltymai']}}</td>
            <td>{{$eating['riebalai']}}</td>
            <td>{{$eating['angliavandeniai']}}</td>
            <td>{{$eating['eVerte']}}</td>
            @if($cholesterol)<td>{{$eating['cholesterolis']}}</td>@endif
        </tr>
        @endforeach
        </tbody>
        <tfoot>

        </tfoot>
    </table>
</body>
</html>