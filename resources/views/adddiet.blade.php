@extends('parent',['meta_title'=>'Valgiaraščio kūrimas'])

@section('content')
    <div id="DietController" ng-app="DietApp" ng-controller="DietController"
         ng-init="products = {{htmlspecialchars(json_encode($products))}};">
        <form method="post">
            @include('includes.dietform')
            <button ng-if="initialized == true" type="submit" class="btn btn-primary" ng-click="sendDiet('{{route('saveDiet',['id'=>$id])}}','{{route('diets',['id'=>$id])}}')">Kurti</button>
        </form>
    </div>
@stop


