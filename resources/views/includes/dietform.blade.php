<div class="form" ng-init="eatingTypes = {{$eatingTypes}};eatingTimes={{$eatingTimes}}; rows = [[{}],[{}],[{}],[{}],[{}],[{}]];"></div>
<div class="row" ng-repeat="eatingType in eatingTypes">
    <div class="col-md-12">
        <h4 ng-bind="eatingTypes[$index]"></h4>
        <table class="table table-bordered table-hover" id="diet-table" ng-init="">
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
            <tr ng-repeat="row in rows[$index]">
                <td><p ng-if="$first" ng-bind="eatingTimes[$parent.$parent.$index]"></p></td>
                <td>
                    <input class="form-control" type="text" ng-model="produktas[$index].product"
                           uib-typeahead="product as product.pavadinimas for product in products | filter:$viewValue | limitTo:10">
                </td>
                <td>
                    <input class="form-control" ng-model="produktas[$index].quantity" id="quantity" type="number" name="quantity[]"
                           placeholder="100" min="0"/>
                </td>
                <td><input class="form-control" ng-model="produktas[$index].baltymai" id="disabledInput" name="baltymai[]" placeholder="0"
                           ng-value="calculateValue(produktas[$index].quantity,produktas[$index].product.baltymai)"
                           disabled/></td>
                <td><input class="form-control" id="disabledInput" type="number" name="riebalai" placeholder="0"
                           ng-value="calculateValue(produktas[$index].quantity,produktas[$index].product.riebalai)"
                           disabled/></td>
                <td><input class="form-control" id="disabledInput" type="number" name="angliavandeniai" placeholder="0"
                           ng-value="calculateValue(produktas[$index].quantity,produktas[$index].product.angliavandeniai)"
                           disabled/></td>
                <td><input class="form-control" id="disabledInput" type="number" name="eVerte" placeholder="0"
                           ng-value="calculateValue(produktas[$index].quantity,produktas[$index].product.eVerte)"
                           disabled/></td>
                <td><input class="form-control" id="disabledInput" type="number" name="cholesterolis" placeholder="0"
                           ng-value="calculateValue(produktas[$index].quantity,produktas[$index].product.cholesterolis)"
                           disabled/></td>
                <td><@ produktas @></td>
            </tr>
            </tbody>
            <tfoot>
            <tr>
                <th class="text-center" colspan="3">Bendra pusryčių maistinė ir energinė vertė</th>
                <th></th>
                <th>0</th>
                <th>0</th>
                <th>0</th>
                <th>0</th>
            </tr>
            </tfoot>
        </table>
        <div class="form-group pull-right">
            <button class="add-row btn btn-primary" ng-click="rows[$index].push({})"><i
                        class="glyphicon glyphicon-plus"></i>
            </button>
            <button class="delete-row btn btn-danger" ng-click="rows[$index].splice(rows[$index].length-1,1)"><i
                        class="glyphicon glyphicon-minus"></i>
            </button>
        </div>
    </div>
    <!--<p ng-if="$first" ng-bind="getProteinSum(0)"></p>-->
</div>