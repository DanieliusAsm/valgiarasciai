@extends('parent',['meta_title'=>'Valgiaraščiai'])

@section("content")
    <div ng-app="DietApp" ng-controller="DietController">
        <a href="{{route("newDiet",['id'=>$id])}}">Naujas Valgiarastis</a>
        <div class="panel-group">
            @for($a=0;$a<count($fullDiet);$a++)
                <div class="panel panel-default click">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <a class="btn-block clickable" role="button" data-toggle="collapse"
                               data-target="#collapseDiet">Valgiaraštis
                            </a>
                        </div>
                    </div>
                    <div id="collapseDiet" class="panel-collapse collapse in">
                        <div class="panel-body text-justify">
                            <ul class="nav nav-tabs">
                                @for($i=0;$i<count($fullDiet[$a]);$i++)
                                    @if($i==0)
                                        <li class="active"><a data-toggle="tab" data-target="#{{$i}}">{{$i+1}}</a></li>
                                    @else
                                        <li><a data-toggle="tab" data-target="#{{$i}}">{{$i+1}}</a></li>
                                    @endif
                                @endfor
                            </ul>
                            <div class="tab-content">
                                @for($i=0;$i<count($fullDiet[$a]);$i++)
                                    @if($i==0)
                                        <div id="{{$i}}" class="tab-pane active">
                                    @else
                                        <div id="{{$i}}" class="tab-pane">
                                    @endif
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
                                                @if($pivot[$a]['with_cholesterol'])<th class="text-center">Cholesterolis</th>@endif
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($fullDiet[$a][$i] as $eating)
                                                <?php $vanduo = ""; ?>
                                                @if($fullDiet[$a][0]==$eating)
                                                    <?php $vanduo = "Atsikėlus"; ?>
                                                @elseif($fullDiet[$a][count($fullDiet[$a])-1]==$eating)
                                                    <?php $vanduo = "Prieš miegą"; ?>
                                                @else
                                                    <?php $vanduo = "30min prieš"; ?>
                                                @endif
                                                <tr>
                                                    <td>{{$vanduo}}</td>
                                                    <td>Vanduo</td>
                                                    <td>200 ml</td>
                                                    <td>0</td>
                                                    <td>0</td>
                                                    <td>0</td>
                                                    <td>0</td>
                                                    @if($pivot[$a]['with_cholesterol'])<td>0</td>@endif
                                                </tr>
                                            <thead>
                                            <th class="text-center">{{$eating['eating_time']}}</th>
                                            <th class="text-center">{{$eating['eating_type']}}</th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            @if($pivot[$a]['with_cholesterol'])<th></th>@endif
                                            </thead>
                                            @foreach($eating['product'] as $product)
                                                <tr>
                                                    <td></td>
                                                    <td>{{$product['pavadinimas']}}</td>
                                                    <td>{{$product['pivot']['quantity']}} @if($product['tipas'] == "Gėrimai") ml @else g @endif</td>
                                                    <td>{{round(($product['baltymai'] * $product['pivot']['quantity'] / 100),2)}}</td>
                                                    <td>{{round(($product['riebalai'] * $product['pivot']['quantity'] / 100),2)}}</td>
                                                    <td>{{round(($product['angliavandeniai'] * $product['pivot']['quantity'] / 100),2)}}</td>
                                                    <td>{{round(($product['eVerte'] * $product['pivot']['quantity'] / 100),2)}}</td>
                                                    @if($pivot[$a]['with_cholesterol'])<td>{{round(($product['cholesterolis'] * $product['pivot']['quantity'] / 100),2)}}</td>@endif
                                                </tr>
                                            @endforeach
                                            <tr class="active">
                                                <td class="text-center" colspan="3">Bendra maistinė ir energinė vertė
                                                </td>
                                                <td>{{$eating['baltymai']}}</td>
                                                <td>{{$eating['riebalai']}}</td>
                                                <td>{{$eating['angliavandeniai']}}</td>
                                                <td>{{$eating['eVerte']}}</td>
                                                @if($pivot[$a]['with_cholesterol'])<td>{{$eating['cholesterolis']}}</td>@endif
                                            </tr>
                                            @endforeach
                                            </tbody>
                                            <tfoot>

                                            </tfoot>
                                        </table>
                                    </div>
                                @endfor
                            </div>
                        </div>
                            <div class="panel-footer">
                                <form id="form" style="display:inline;" action="{{route('exportDiet',['dietType'=>'diet'])}}" method="post">
                                    <input type="hidden" name="diet" value="{{json_encode([$fullDiet[$a],$pivot[$a]['with_cholesterol']],true)}}"/>
                                    <i class="glyphicon glyphicon-list-alt"></i>
                                    <a href="#" onclick="document.getElementById('form').submit()">Valgiaraštis</a>
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                </form>
                                <form id="form2" style="display:inline;" action="{{route('exportDiet',['dietType'=>'weeklyDiet'])}}" method="post">
                                    <input type="hidden" name="diet" value="{{json_encode([$fullDiet[$a],$pivot[$a]['with_cholesterol']],true)}}"/>
                                    <i class="glyphicon glyphicon-list-alt"></i>
                                    <a href="#" onclick="document.getElementById('form2').submit()">Savaitės valgiaraštis</a>
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                </form>
                                <form id="form3" style="display:inline;" action="{{route('exportDiet',['dietType'=>'energyDiet'])}}" method="post">
                                    <input type="hidden" name="diet" value="{{json_encode([$fullDiet[$a],$pivot[$a]['with_cholesterol']],true)}}"/>
                                    <i class="glyphicon glyphicon-list-alt"></i>
                                    <a href="#" onclick="document.getElementById('form3').submit()">Energetinis</a>
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                </form>
                                <div class="pull-right">
                                    <i class="glyphicon glyphicon-edit" aria-hidden="true"></i>
                                    <a href="{{route("editDiet",['id'=>$id])}}">Redaguoti</a>
                                </div>
                            </div>
                    </div>
                </div>
        </div>
            @endfor
    </div>
@stop
