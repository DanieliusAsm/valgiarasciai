@extends('parent', ['meta_title'=>'Produktų sąrašas'])

@section('content')
<div class="container" ng-app="UserlistApp" ng-controller="UserlistCtrl">

    <a href="{{ url('/products/add') }}">Pridėti produktą</a>

        <table width="900" ng-init="products={{htmlspecialchars(json_encode($products))}}">
            <tr>
                <th>Eil. Nr</th>
                <th>Pavadinimas</th>
                <th>Baltymai</th>
                <th>Riebalai</th>
                <th>Angliavandeniai</th>
                <th>Cholesterolis</th>
                <th>Energinė Verte</th>
                <th>Tipas</th>
            </tr>
            <tr ng-repeat="product in products">
                <td ng-bind="$index+1"></td>
                <td ng-bind="checkValue(product.pavadinimas)"></td>
                <td ng-bind="checkValue(product.baltymai)"></td>
                <td ng-bind="checkValue(product.riebalai)"></td>
                <td ng-bind="checkValue(product.angliavandeniai)"></td>
                <td ng-bind="checkValue(product.cholesterolis)"></td>
                <td ng-bind="checkValue(product.eVerte)"></td>
                <td ng-bind="checkValue(product.tipas)"></td>

                <td><a href="" ng-click="redirect(product.id, 'edit')">Redaguoti</a></td>
                <td><a href="" ng-click="redirect(product.id, 'delete')">Pašalinti</a></td>
            </tr>
          <!--@foreach($products as $product)
            <tr>
                <td>{{$product->id}}</td>
                <td>{{$product->pavadinimas}}</td>
                <td>{{$product->baltymai}}</td>
                <td>{{$product->riebalai}}</td>
                <td>{{$product->angliavandeniai}}</td>
                <td>{{$product->cholesterolis}}</td>
                <td>{{$product->eVerte}}</td>
                <td>{{$product->tipas}}</td>

            </tr>
            @endforeach-->
        </table>
    </div>
@stop