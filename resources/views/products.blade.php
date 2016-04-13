@extends('parent', ['meta_title'=>'Produktų sąrašas'])

@section('content')



<div ng-app="ProductApp" ng-controller="ProductCtrl" >
    <!--Navigation bar-->
    <nav class="navbar navbar-default" role="navigation" >
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" >
                <span class="sr-only">Toggle</span>
                <span class="icon-bar"></span>

            </button>
            <a class="navbar-brand" href="#">Produktų grupės</a>
            <div class="collapse navbar-collapse navbar-ex1-collapse" >
                <div ng-init="tipai={{ htmlspecialchars(json_encode($tipas)) }}">

                    <ul>
                        <li ng-repeat="tipas in tipai" >
                            <input type="radio" ng-bind="tipas.tipas" ng-model="tipas" value="gg" />
                        </li>
                    </ul>
                </div>
                <!--ul class="nav navbar-nav" ng-repeat="tipas in tipai" >




                    <li ng-bind="tipas.tipas" ><input type="radio" value="@{{tipas.tipas}}" ng-model="tipas"/>@{{tipas.tipas}}</li>

                </ul-->
            </div>
        </div>
    </nav>
    <!--Search-->
    <div id="usersearch" class="search-container">
        <div class="input-group">
            <span class="input-group-addon">
                <i class="glyphicon glyphicon-search"></i>
            </span>
                <input type="text" class="form-control"  ng-model="search"/></br>
                    <span class="input-group-btn">
                        <a href="{{ url('/products/add') }}" class="btn btn-primary">Pridėti produktą</a></br>
                    </span>
        </div>
    </div>
    <ul>
        <li>
            <input type="radio" value="" ng-model="tipas"/>Rodyti viską
        </li>
        <li>
            <input type="radio" value="sriuba" ng-model="tipas"/>Sriuba
        </li>

    </ul>

       <!-- @foreach ($tipas as $type)
                {{$type}}
        @endforeach-->
    <!--Product List-->
        <table width="900" ng-init="products={{ htmlspecialchars(json_encode($products)) }}">
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
            <tr ng-repeat="product in products | orderBy:id:true | filter:search | filter:tipas">
                <td ng-bind="$index+1"></td>
                <td ng-bind="product.pavadinimas"></td>
                <td ng-bind="product.baltymai"></td>
                <td ng-bind="product.riebalai"></td>
                <td ng-bind="product.angliavandeniai"></td>
                <td ng-bind="product.cholesterolis"></td>
                <td ng-bind="product.eVerte"></td>

                <td class="pull-right">
                    <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                    <a href="" ng-click="setRoute(product, 'edit')">Redaguoti</a>
                    <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    <a href="" ng-click="setRoute(product, 'delete')">Pašalinti</a>
                </td>
            </tr>
        </table>
    </div>
@stop