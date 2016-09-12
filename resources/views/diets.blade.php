@extends('parent',['meta_title'=>'Valgiaraščiai'])

@section("content")
    {{var_dump($eatings)}}
    <div ng-app="DietApp" ng-controller="DietController">
        <a href="{{route("newDiet",['id'=>$id])}}">Naujas Valgiarastis</a>
        <div class="panel-group">
            @foreach($eatings as $diet)
                <div class="panel panel-default click">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <a class="btn-block clickable" role="button" data-toggle="collapse"
                               data-target="#collapseDiet">Valgiaraštis (data)</a>
                        </div>
                    </div>
                    <div id="collapseDiet" class="panel-collapse collapse in">
                        <div class="panel-body text-justify">
                            <ul class="nav nav-tabs">
                                <li class="active"><a data-toggle="tab" data-target="">1</a></li>
                                <li ng-repeat=""><a data-toggle="tab" data-target="">2</a></li>
                            </ul>
                            <div class="tab-content">
                                <table class="table table-condensed table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th class="text-center">Laikas</th>
                                        <th class="text-center">Maisto produktas/gaminys</th>
                                        <th class="text-center">Kiekis/Išeiga</th>
                                        <th class="text-center">Baltymai</th>
                                        <th class="text-center">Riebalai</th>
                                        <th class="text-center">Angliavadeniai</th>
                                        <th class="text-center">Energetinė vertė</th>
                                        <th class="text-center">Cholesterolis</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($diet as $eating)
                                        <tr>
                                            <td>Atsikelus</td>
                                            <td>Vanduo</td>
                                            <td>Vanduo</td>
                                            <td>Vanduo</td>
                                            <td>Vanduo</td>
                                            <td>Vanduo</td>
                                            <td>Vanduo</td>
                                            <td>Vanduo</td>
                                        </tr>
                                        <thead>
                                        <th class="text-center">{{$eating['eating_time']}}</th>
                                        <th class="text-center">{{$eating['eating_type']}}</th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        </thead>
                                        @foreach($eating['product'] as $product)
                                            <tr>
                                                <td></td>
                                                <td>{{$product['pavadinimas']}}</td>
                                                <td>{{$product['pivot']['quantity']}}</td>
                                                <td>{{$product['baltymai']}}</td>
                                                <td>{{$product['riebalai']}}</td>
                                                <td>{{$product['angliavandeniai']}}</td>
                                                <td>{{$product['eVerte']}}</td>
                                                <td>{{$product['cholesterolis']}}</td>
                                            </tr>
                                        @endforeach
                                        <tr class="active">
                                            <td class="text-center" colspan="3">Bendra maistinė ir energinė vertė
                                            </td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>

                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
        </div>
    </div>
@stop
