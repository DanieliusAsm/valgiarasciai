@extends('parent',['meta_title'=>'Valgiaraščiai'])

@section("content")
    <div ng-app="DietApp" ng-controller="DietController">
        <a href="{{route("newDiet",['id'=>$id])}}">Naujas Valgiarastis</a>
        <div class="panel-group">
            @for($a=0;$a<count($diets);$a++)
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
                                @for($i=0;$i<$diets[$a]['total_days'];$i++)
                                    <li class="@if($i==0) active @endif"><a data-toggle="tab" data-target="#{{$i}}">{{$i+1}}</a></li>
                                @endfor
                            </ul>
                            <div class="tab-content">
                                @for($i=0;$i<$diets[$a]['total_days'];$i++)
                                    <div id="{{$i}}" class="tab-pane @if($i==0) active @endif">
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
                                                @if($diets[$a]['with_cholesterol'])<th class="text-center">Cholesterolis</th>@endif
                                            </tr>
                                            </thead>

                                            @for($b=($diets[$a]['total_eating']*$i);$b<($diets[$a]['total_eating']*($i+1));$b++)
                                                <?php $vanduo = ""; ?>
                                                @if($b == ($diets[$a]['total_eating']*$i))
                                                    <?php $vanduo = "Atsikėlus"; ?>
                                                @elseif($b == ($diets[$a]['total_eating']*($i+1)-1))
                                                    <?php $vanduo = "Prieš miegą"; ?>
                                                @else
                                                    <?php $vanduo = "30min prieš"; ?>
                                                @endif
                                                <tbody>
                                                <tr>
                                                    <td>{{$vanduo}}</td>
                                                    <td>Vanduo</td>
                                                    <td>200 ml</td>
                                                    <td>0</td>
                                                    <td>0</td>
                                                    <td>0</td>
                                                    <td>0</td>
                                                    @if($diets[$a]['with_cholesterol'])<td>0</td>@endif
                                                </tr></tbody>
                                                <thead>
                                                    <th class="text-center">{{$diets[$a]['eatings'][$b]['eating_time']}}</th>
                                                    <th class="text-center">{{$diets[$a]['eatings'][$b]['eating_type']}}</th>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                    @if($diets[$a]['with_cholesterol'])<th></th>@endif
                                                </thead>
                                                <tbody>
                                                @foreach($diets[$a]['eatings'][$b]['products'] as $product)
                                                    <tr>
                                                        <td></td>
                                                        <td>{{$product['product_name']}}</td>
                                                        <td>{{$product['pivot']['quantity']}} @if($product['product_type'] == "Gėrimai") ml @else g @endif</td>
                                                        <td>{{$product['pivot']['protein']}}</td>
                                                        <td>{{$product['pivot']['fat']}}</td>
                                                        <td>{{$product['pivot']['carbs']}}</td>
                                                        <td>{{$product['pivot']['energy_value']}}</td>
                                                        @if($diets[$a]['with_cholesterol'])<td>{{$product['pivot']['cholesterol']}}</td>@endif
                                                    </tr>
                                                @endforeach

                                                    <tr class="active">
                                                        <td class="text-center" colspan="3">Bendra maistinė ir energinė vertė
                                                        </td>
                                                        <td>{{$diets[$a]['eatings'][$b]['protein']}}</td>
                                                        <td>{{$diets[$a]['eatings'][$b]['fat']}}</td>
                                                        <td>{{$diets[$a]['eatings'][$b]['carbs']}}</td>
                                                        <td>{{$diets[$a]['eatings'][$b]['energy_value']}}</td>
                                                        @if($diets[$a]['with_cholesterol'])<td>{{$diets[$a]['eatings'][$b]['cholesterol']}}</td>@endif
                                                    </tr>
                                                @endfor
                                                </tbody>
                                            <thead><tr><th class="text-center" colspan = "@if($diets[$a]['with_cholesterol']) 8 @else 7 @endif">Viso</th></tr></thead>
                                            <tbody>
                                            <tr>
                                                <td class="text-center" colspan="3">Viso per dieną</td>
                                                <td>{{$diets[$a]['day_stats'][$i]['protein']}}</td>
                                                <td>{{$diets[$a]['day_stats'][$i]['fat']}}</td>
                                                <td>{{$diets[$a]['day_stats'][$i]['carbs']}}</td>
                                                <td>{{$diets[$a]['day_stats'][$i]['energy_value']}}</td>
                                                @if($diets[$a]['with_cholesterol'])<td>{{$diets[$a]['day_stats'][$i]['cholesterol']}}</td>@endif
                                            </tr>
                                            <tr>
                                                <td class="text-center" colspan="3">Viso per dietą</td>
                                                <td>{{$diets[$a]['protein']}}</td>
                                                <td>{{$diets[$a]['fat']}}</td>
                                                <td>{{$diets[$a]['carbs']}}</td>
                                                <td>{{$diets[$a]['energy_value']}}</td>
                                                @if($diets[$a]['with_cholesterol'])<td>{{$diets[$a]['cholesterol']}}</td>@endif
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                @endfor
                            </div>
                        </div>
                            <div class="panel-footer">
                                <form id="form" style="display:inline;" action="{{route('exportDiet',['dietType'=>'diet'])}}" method="post">
                                    <input type="hidden" name="diet" value="{{json_encode($diets[$a],true)}}"/>
                                    <i class="glyphicon glyphicon-list-alt"></i>
                                    <a href="#" onclick="document.getElementById('form').submit()">Valgiaraštis</a>
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                </form>
                                <form id="form2" style="display:inline;" action="{{route('exportDiet',['dietType'=>'weeklyDiet'])}}" method="post">
                                    <input type="hidden" name="diet" value="{{json_encode($diets[$a],true)}}"/>
                                    <i class="glyphicon glyphicon-list-alt"></i>
                                    <a href="#" onclick="document.getElementById('form2').submit()">Savaitės valgiaraštis</a>
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                </form>
                                <form id="form3" style="display:inline;" action="{{route('exportDiet',['dietType'=>'energyDiet'])}}" method="post">
                                    <input type="hidden" name="diet" value="{{json_encode($diets[$a],true)}}"/>
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
