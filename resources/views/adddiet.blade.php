@extends('parent',['meta_title'=>'Valgiaraščio kūrimas'])

@section('content')
    <div id="DietController" ng-app="DietApp" ng-controller="DietController" ng-init="products = {{htmlspecialchars(json_encode($products))}}">
        <div class="row">
            <div class="col-sm-10">
                <h4>Pusryčiai</h4>
                <table class="table table-bordered table-hover" id="diet-table">
                    <col class="col-sm-1">
                    <col class="col-sm-3">
                    <col class="col-sm-1">
                    <col class="col-sm-1">
                    <col class="col-sm-1">
                    <col class="col-sm-1">
                    <col class="col-sm-1">
                    <col class="col-sm-1">
                    <thead>
                    <tr>
                        <th class="text-center">Laikas</th>
                        <th class="text-center">Maisto produktas/gaminys</th>
                        <th class="text-center">Kiekis/Išeiga</th>
                        <th class="text-center">Baltymai</th>
                        <th class="text-center">Riebalai</th>
                        <th class="text-center">Angliavadeniai</th>
                        <th class="text-center">Energetinė vertė</th>
                        <th class="text-center">Cholesterolis</th> <!-- Paslepti priklausant nuo zmogaus .. -->
                    </tr>
                    </thead>
                    <tbody>
                    <tr ng-repeat="row in rows">
                        <td><p ng-if="$first">9:00</p></td>
                        <td>
                            <input class="form-control" type="text" ng-model="selected" uib-typeahead="product as product.pavadinimas for product in products | filter:$viewValue | limitTo:10">
                        </td>
                        <td>
                            <input class="form-control" ng-model="quantity" id="quantity" type="number" name="quantity[]" placeholder="100"/>
                        </td>
                        <td><input class="form-control" id="disabledInput" name="baltymai" placeholder="0" ng-value="calculateValue(quantity,selected.baltymai)"
                                   disabled/></td>
                        <td><input class="form-control" id="disabledInput" type="number" name="riebalai" placeholder="0" ng-value="calculateValue(quantity,selected.riebalai)"
                                   disabled/></td>
                        <td><input class="form-control" id="disabledInput" type="number" name="angliavandeniai" placeholder="0" ng-value="calculateValue(quantity,selected.angliavandeniai)"
                            disabled/></td>
                        <td><input class="form-control" id="disabledInput" type="number" name="eVerte" placeholder="0" ng-value="calculateValue(quantity,selected.eVerte)"
                                   disabled/></td>
                        <td><input class="form-control" id="disabledInput" type="number" name="cholesterolis" placeholder="0" ng-value="calculateValue(quantity,selected.cholesterolis)"
                            disabled/></td>
                    </tr>
                    </tbody>
                    <tfoot>
                    <tr>
                        <th class="text-center" colspan="3">Bendra pusryčių maistinė ir energinė vertė</th>
                        <th>0</th>
                        <th>0</th>
                        <th>0</th>
                        <th>0</th>
                        <th>0</th>
                    </tr>
                    </tfoot>
                </table>
                <button class="add-row btn btn-primary" ng-click="rows.push({})"><i class="glyphicon glyphicon-plus"></i></button>
                <button class="delete-row btn btn-danger" ng-click="rows.splice(rows.length-1,1)"><i class="glyphicon glyphicon-minus"></i></button>
            </div>
        </div>
    </div>
@stop


