@extends('parent', ['meta_title'=>'Produktų sąrašas'])

@section('content')
<div class="content">
    <div ng-app="ProductApp" ng-controller="ProductCtrl">
    <!--Navigation bar-->
        <div id="product-navigation">

            <label class="yellow"><input type="radio" name="toggle" value="" ng-model="product_type"><span>Rodyti viską</span></label>
            @foreach($tipas as $type)
            <label class="yellow"><input type="radio" name="toggle" value="{{$type->tipas}}" ng-model="product_type"><span>{{$type->tipas}}</span></label>
            @endforeach
        </div>
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

                <td class="pull-right">
                    <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                    <a href="" ng-click="setRoute(product, 'edit')">Redaguoti</a>
                    <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    <a href="" ng-click="setRoute(product, 'delete')">Pašalinti</a>
                </td>
            </tr>
        </table>
    </div>
    @endsection

