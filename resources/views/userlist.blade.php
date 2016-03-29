@extends('parent',['meta_title'=>'Current user list'])

@section('content')
    <div class="container" ng-app="UserlistApp" ng-controller="UserlistCtrl">

        <button onclick="window.location='{{ url('/user/new') }}'">Pridėti vartotoją</button>

        <table width="900" ng-init="users={{htmlspecialchars(json_encode($users))}}">
            <tr>
                <th>Eil. Nr.</th>
                <th ng-click="sortBy('first_name')">Vardas</th>
                <th ng-click="sortBy('last_name')">Pavardė</th>
                <th>El. paštas</th>
                <th>Telefono numeris</th>
                <th>Priskirta dieta</th>
                <th>Pastabos</th>
            </tr>
            <tr ng-repeat="user in users | orderBy:sortKey:reverseOrder">
                <td ng-bind="$index+1"></td>
                <td ng-bind="checkValue(user.first_name)"></td>
                <td ng-bind="checkValue(user.last_name)"></td>
                <td ng-bind="checkValue(user.email)"></td>
                <td ng-bind="checkValue(user.phone)"></td>
                <td ng-bind="checkValue(user.diet)"></td>
                <td ng-bind="checkValue(user.notes)"></td>

                <td><button type="submit" ng-click="generateUrl('{{ url('') }}', user.id, 'edit')">Redaguoti</button></td>
                <td><button type="submit" ng-click="generateUrl('{{ url('') }}', user.id, 'delete')">Pašalinti</button></td>
            </tr>
        </table>
    </div>
@stop