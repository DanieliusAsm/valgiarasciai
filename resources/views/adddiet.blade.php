@extends('parent',['meta_title'=>'Valgiaraščio kūrimas'])

@section('content')
    <div id="DietController" ng-app="DietApp" ng-controller="DietController" @if(isset($dietId)) ng-init="getEditableDiet('{{route('getDietById',['dietId'=>$dietId])}}');" @endif>
        <form method="post">
            @include('includes.dietform')
            <button ng-if="initialized == true" type="submit" class="btn btn-primary" @if(!isset($dietId)) ng-click="sendDiet('{{route('saveDiet',['id'=>$id])}}','{{route('diets',['id'=>$id])}}')"
            @else ng-click="sendDiet('{{route('saveEditedDiet',['id'=>$id,'dietId'=>$dietId])}}','{{route('diets',['id'=>$id])}}')" @endif>Kurti</button>
        </form>
    </div>
@stop


