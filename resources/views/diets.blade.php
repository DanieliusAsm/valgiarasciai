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
                                            <td>0</td>
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
                                                <td>{{round(($product['baltymai'] * $product['pivot']['quantity'] / 100),2)}}</td>
                                                <td>{{round(($product['riebalai'] * $product['pivot']['quantity'] / 100),2)}}</td>
                                                <td>{{round(($product['angliavandeniai'] * $product['pivot']['quantity'] / 100),2)}}</td>
                                                <td>{{round(($product['eVerte'] * $product['pivot']['quantity'] / 100),2)}}</td>
                                                <td>{{round(($product['cholesterolis'] * $product['pivot']['quantity'] / 100),2)}}</td>
                                            </tr>
                                        @endforeach
                                        <tr class="active">
                                            <td class="text-center" colspan="3">Bendra maistinė ir energinė vertė
                                            </td>
                                            <td>{{$eating['baltymai']}}</td>
                                            <td>{{$eating['riebalai']}}</td>
                                            <td>{{$eating['angliavandeniai']}}</td>
                                            <td>{{$eating['eVerte']}}</td>
                                            <td>{{$eating['cholesterolis']}}</td>
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
