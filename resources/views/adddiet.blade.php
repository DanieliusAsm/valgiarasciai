@extends('parent',['meta_title'=>'Valgiaraščio kūrimas'])

@section('content')
    <div id="DietController" ng-app="DietApp" ng-controller="DietController"
         ng-init="products = {{htmlspecialchars(json_encode($products))}};">
        @include('includes.dietform', [
        'eatingTypes'=>json_encode(array('Pusryčiai','Priešpiečiai','Pietūs','Pavakariai','Vakarienė','Naktipiečiai')),
        'eatingTimes'=>json_encode(array('8:00','11:00','13:00','16:00','18:00','21:00'))
        ])
    </div>
@stop


