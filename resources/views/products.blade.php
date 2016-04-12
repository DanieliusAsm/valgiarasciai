@extends('parent', ['meta_title'=>'Produktų sąrašas'])

@section('content')
<div ng-app="ProductApp" ng-controller="ProductCtrl" >

    <a href="{{ url('/products/add') }}">Pridėti produktą</a></br>
    <input type="text"  ng-model="search"/></br>
    <ul>
        <li>
            <input type="radio" value="" ng-model="tipas"/>Rodyti viską
        </li>
        <li>
            <input type="radio" value="sriuba" ng-model="tipas"/>Sriuba
        </li>
        <li>
        <input type="radio" value="prieskoniai" ng-model="tipas"/>Prieskoniai
        </li>
        <li>
            <input type="radio" value="gėrimai" ng-model="tipas"/>Gėrimai
        </li>
        <li>
            <input type="radio" value="saldumynai" ng-model="tipas"/>Saldumynai
        </li>
        <li>
            <input type="radio" value="vaisiai_uogos" ng-model="tipas"/>Vaisiai ir Uogos
        </li>
        <li>
            <input type="radio" value="daržovės" ng-model="tipas"/>Daržovės
        </li>
        <li>
            <input type="radio" value="duona" ng-model="tipas"/>Duona
        </li>
        <li>
            <input type="radio" value="kruopos_miltai_makaronai" ng-model="tipas"/>Kruopos, miltai, makaronai
        </li>
        <li>
            <input type="radio" value="augaliniai_gyvūniniai_riebalai" ng-model="tipas"/>Augaliniai ir Gyvūniniai riebalai
        </li>
        <li>
            <input type="radio" value="žuvis" ng-model="tipas"/>Žuvis
        </li>
        <li>
            <input type="radio" value="mėsa" ng-model="tipas"/>Mėsa
        </li>
        <li>
            <input type="radio" value="kiaušiniai" ng-model="tipas"/>Kaiušiniai
        </li>
        <li>
            <input type="radio" value="pienas" ng-model="tipas"/>Pienas
        </li>
        <li>
            <input type="radio" value="padažas" ng-model="tipas"/>Padažai
        </li>
        <li>
            <input type="radio" value="bulvės" ng-model="tipas"/>Patiekalai iš bulvių
        </li>
        <li>
            <input type="radio" value="blynai" ng-model="tipas"/>Blynai
        </li>
        <li>
            <input type="radio" value="varškė" ng-model="tipas"/>Patiekalai iš varškės
        </li>
        <li>
            <input type="radio" value="makaronai" ng-model="tipas"/>Makaronai
        </li>
        <li>
            <input type="radio" value="košė" ng-model="tipas"/>Košės
        </li>
        <li>
            <input type="radio" value="vištiena" ng-model="tipas"/>Vištiena
        </li>
        <li>
            <input type="radio" value="keptos_daržovės" ng-model="tipas"/>Keptos daržovės
        </li>
        <li>
            <input type="radio" value="Salotos" ng-model="tipas"/>Salotos
        </li>
        <li>
            <input type="radio" value="kita" ng-model="tipas"/>Kita
        </li>

    </ul>


        <table width="900" ng-init="products={{ htmlspecialchars(json_encode($products)) }}">
            <tr>
                <th>Eil. Nr</th>
                <th>Pavadinimas</th>
                <th>Baltymai</th>
                <th>Riebalai</th>
                <th>Angliavandeniai</th>
                <th>Cholesterolis</th>
                <th>Energinė Verte</th>
            </tr>
            <tr ng-repeat="product in products | orderBy:id:true | filter:search | filter:tipas">
                <td ng-bind="$index+1"></td>
                <td ng-bind="product.pavadinimas"></td>
                <td ng-bind="product.baltymai"></td>
                <td ng-bind="product.riebalai"></td>
                <td ng-bind="product.angliavandeniai"></td>
                <td ng-bind="product.cholesterolis"></td>
                <td ng-bind="product.eVerte"></td>

                <td><a href="" ng-click="setRoute(product, 'edit')">Redaguoti</a></td>
                <td><a href="" ng-click="setRoute(product, 'delete')">Pašalinti</a></td>
            </tr>
        </table>
    </div>
@stop