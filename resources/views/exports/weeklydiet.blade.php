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
@foreach($diet as $dietDay)
<table>
    <thead>
    <tr>
        <th>{{$dietDay['day']}}</th>
    </tr>
    </thead>
    <tbody>
    @foreach($dietDay as $eating)
        @if(isset($eating['eating_type']))
            <tr>
                <th>{{$eating['eating_type']}}</th>
                <th>IŠEIGA</th>
            </tr>
            @foreach($eating['product'] as $product)
                <tr>
                    <td>{{$product['pavadinimas']}}</td>
                    <td>{{$product['pivot']['quantity']}} @if($product['tipas'] == "Gėrimai") ml @else g @endif</td>
                </tr>
            @endforeach
        @endif
    @endforeach
    </tbody>
</table>
    @endforeach
</body>
</html>