@extends('base',['meta_title'=>'Current user list'])

@section('content')
    <div class="container" ng-app="UserlistApp" ng-controller="UserlistCtrl">
        <button type="submit">Pridėti vartotoją</button>
        <table width="900">
            <tr>
                <th>Eil. Nr.</th>
                <th class="clickable" ng-click="sortBy('name')">Vardas</th>
                <th class="clickable" ng-click="sortBy('lastname')">Pavardė</th>
                <th>El. paštas</th>
                <th>Telefono numeris</th>
                <th>Priskirta dieta</th>
                <th>Pastabos</th>
            </tr>
            <tr ng-repeat="user in users | orderBy:sortType:reverseOrder">
                <td>0</td>
                <td ng-bind="user.name"></td>
                <td ng-bind="user.lastname"></td>
                <td>N/A</td>
                <td>N/A</td>
                <td>N/A</td>
                <td>N/A</td>
                <td><button type="submit">Redaguoti</button></td>
                <td><button type="submit">Pašalinti</button></td>
            </tr>
        </table>
    </div>
@stop