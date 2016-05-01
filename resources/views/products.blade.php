@extends('parent', ['meta_title'=>'Produktų sąrašas'])

@section('content')
    <div class="row" xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html">
        <div ng-app="ProductApp" ng-controller="ProductCtrl">
            <!--Navigation bar-->
            <div class="col-md-3">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Filtravimas</h3>
                    </div>
                    <div class="panel-body">
                        <label>
                            <input type="radio" name="toggle" value="" ng-model="product_type">Rodyti viską
                        </label><br>
                        @foreach($productoTipas as $type)
                            <label>
                                <input type="radio" name="toggle" value="{{$type->tipas}}"
                                       ng-model="product_type">{{$type->tipas}}
                            </label><br>
                        @endforeach
                    </div>
                </div>
            </div>
            <!--Search-->
            <div class="col-md-9">
                <div id="usersearch" class="search-container">
                    <div class="input-group">
                <span class="input-group-addon">
                    <i class="glyphicon glyphicon-search"></i>
                </span>
                        <input type="text" class="form-control" ng-model="search"/></br>
                <span class="input-group-btn">
                    <a href="{{ url('/products/add') }}" class="btn btn-primary">Pridėti produktą</a></br>
                </span>
                    </div>
                </div>

                <!--Product List-->
                <table class="table" ng-init="products={{ htmlspecialchars(json_encode($products)) }}">
                    <tr>
                        <th>Eil. Nr</th>
                        <th>Pavadinimas</th>
                        <th>Baltymai</th>
                        <th>Riebalai</th>
                        <th>Angliavandeniai</th>
                        <th>Cholesterolis</th>
                        <th>Energinė Verte</th>
                        <th>Veiksmai</th>
                    </tr>

                    <tr ng-repeat="product in products | orderBy:id:true | filter:search | filter:product_type">
                        <td ng-bind="$index+1"></td>
                        <td ng-bind="product.pavadinimas"></td>
                        <td ng-bind="product.baltymai"></td>
                        <td ng-bind="product.riebalai"></td>
                        <td ng-bind="product.angliavandeniai"></td>
                        <td ng-bind="product.cholesterolis"></td>
                        <td ng-bind="product.eVerte"></td>

                        <td>
                            <div class="text-center">
                                <a href="" ng-click="setRoute(product, 'edit')" style="text-decoration: none">
                                    <i class="glyphicon glyphicon-edit" aria-label="Redaguoti"></i>
                                </a>
                                <a href="" ng-click="confirmAction(product)" style="text-decoration: none">
                                    <i class="glyphicon glyphicon-trash" aria-label="Pašalinti"></i>
                                </a>
                                <a ng-click="showReceptas(product)" data-toggle="modal" data-target="#myModal" href="" ng-if="product.recipe"
                                   style="text-decoration: none">
                                    <i class="glyphicon glyphicon-list-alt" aria-label="Pašalinti"></i>
                                </a>
                                <a href="" ng-if="product.recipe == null" ng-click="setRoute(product, 'addrecipe')"
                                   style="text-decoration: none">
                                    <i class="glyphicon glyphicon-plus" aria-label="Pašalinti"></i>
                                </a>

                            </div>
                        </td>
                        <div class="modal fade" id="myModal" role="dialog">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title"></h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <img src="" width="100%" heigh="">
                                            </div>
                                            <div class="col-sm-8">
                                                <pre>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Uždaryti
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </tr>
                </table>
            </div>
            </div>
        </div>
    </div>
@stop

