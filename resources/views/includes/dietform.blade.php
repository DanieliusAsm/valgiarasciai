
<div class="col-md-12">
    <div class="form-group">
        <label for="days">Dienos</label>
        <input class="form-control" type="number" id="days" ng-model="days" ng-required="true" min="1" max="20">
    </div>
</div>
<div class="col-md-6">
    <div class="form-group">
        <label for="eating">Valgymas</label>
        <input class="form-control" ng-disabled="initialized" type="text" id="eating" ng-model="eatingInfo[0].type">
    </div>
    <div class="form-group">
        <label for="eating">Valgymas</label>
        <input class="form-control" ng-disabled="initialized" type="text" id="eating" ng-model="eatingInfo[1].type">
    </div>
    <div class="form-group">
        <label for="eating">Valgymas</label>
        <input class="form-control" ng-disabled="initialized" type="text" id="eating" ng-model="eatingInfo[2].type">
    </div>
    <div class="checkbox">
        <label>
            <input type="checkbox" ng-model="diet[0].cholesterol">
            Cholesterolis
        </label>
    </div>
</div>
<div class="col-md-6">
    <div class="form-group">
        <label for="eating">Valgymas</label>
        <input class="form-control" ng-disabled="initialized" type="text" id="eating" ng-model="eatingInfo[3].type">
    </div>
    <div class="form-group">
        <label for="eating">Valgymas</label>
        <input class="form-control" ng-disabled="initialized" type="text" id="eating" ng-model="eatingInfo[4].type">
    </div>
    <div class="form-group">
        <label for="eating">Valgymas</label>
        <input class="form-control" ng-disabled="initialized" type="text" id="eating" ng-model="eatingInfo[5].type">
    </div>
</div>
<div class="col-md-12">
    <button type="submit" class="btn btn-primary center-block" ng-click="updateDietArray()">Kurti</button>
</div>




<ul ng-show="initialized" class="nav nav-tabs">
    <li ng-repeat="tab in getNumberToArray((days)) track by $index" ng-class="$first ? 'active' :''"><a data-toggle="tab" data-target="#<@($index)@>" ng-bind="($index+1)"></a></li>
</ul>
<div ng-show="initialized" class="tab-content">
    <div class="tab-pane" ng-repeat="dieta in diet track by $index" id="<@($index)@>" ng-class="$first ? 'tab-pane active' :'tab-pane'">
        <div class="row" ng-repeat="eating in eatingInfo">
            <div ng-show="eating.enabled" class="col-md-12">
                <h4 ng-bind="eating.type"></h4>
                <table class="table table-bordered table-hover" id="diet-table">
                    <col class="col-sm-1">
                    <col class="col-sm-3">
                    <thead>
                    <tr>
                        <th class="text-center">Laikas</th>
                        <th class="text-center">Maisto produktas/gaminys</th>
                        <th class="text-center">Kiekis/Išeiga</th>
                        <th class="text-center">Baltymai</th>
                        <th class="text-center">Riebalai</th>
                        <th class="text-center">Angliavadeniai</th>
                        <th class="text-center">Energetinė vertė</th>
                        <th ng-if="diet[0].cholesterol" class="text-center">Cholesterolis</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr ng-repeat="row in diet[$parent.$index].eating_types[$index].rows track by $index">
                        <td><input ng-if="$first" class="form-control" type="text" ng-model="eating.time" name="time[]"></td>
                        <td>
                            <input class="form-control" type="text" ng-model="diet[$parent.$parent.$index].eating_types[$parent.$index].rows[$index]"
                                   uib-typeahead="product as product.pavadinimas for product in products | filter:$viewValue | limitTo:10" name="product_name[]">
                        </td>
                        <td>
                            <input class="form-control" ng-model="row.quantity" id="quantity"
                                   type="number" name="quantity[]"
                                   placeholder="100" min="0"/>
                        </td>
                        <td><input class="form-control" id="disabledInput" name="baltymai[]" placeholder="0"
                                   ng-value="calculateValue(row.quantity,row.baltymai)"
                                   disabled/>
                        <td><input class="form-control" id="disabledInput" type="number" name="riebalai" placeholder="0"
                                   ng-value="calculateValue(row.quantity,row.riebalai)"
                                   disabled/></td>
                        <td><input class="form-control" id="disabledInput" type="number" name="angliavandeniai"
                                   placeholder="0"
                                   ng-value="calculateValue(row.quantity,row.angliavandeniai)"
                                   disabled/></td>
                        <td><input class="form-control" id="disabledInput" type="number" name="eVerte" placeholder="0"
                                   ng-value="calculateValue(row.quantity,row.eVerte)"
                                   disabled/></td>
                        <td ng-if="diet[0].cholesterol"><input class="form-control" id="disabledInput" type="number" name="cholesterolis"
                                   placeholder="0"
                                   ng-value="calculateValue(row.quantity,row.cholesterolis)"
                                   disabled/></td>
                    </tr>
                    </tbody>
                    <tfoot>
                    <tr>
                        <th class="text-center" colspan="3">Bendra pusryčių maistinė ir energinė vertė</th>
                        <th>
                            <@ dieta.total_values[$index].baltymai @>
                        </th>
                        <th>
                            <@ dieta.total_values[$index].riebalai @>
                        </th>
                        <th>
                            <@ dieta.total_values[$index].angliavandeniai @>
                        </th>
                        <th>
                            <@ dieta.total_values[$index].eVerte @>
                        </th>
                        <th ng-if="diet[0].cholesterol">
                            <@ dieta.total_values[$index].cholesterolis @>
                        </th>
                    </tr>
                    </tfoot>
                </table>
                <div class="form-group pull-right">
                    <button class="add-row btn btn-primary" ng-click="dieta.eating_types[$index].rows.push({'pavadinimas':''})"><i
                                class="glyphicon glyphicon-plus"></i>
                    </button>
                    <button class="delete-row btn btn-danger" ng-click="dieta.eating_types[$index].rows.splice(dieta.eating_types[$index].rows.length-1,1)"><i
                                class="glyphicon glyphicon-minus"></i>
                    </button>
                </div>
            </div>
            <!--<p ng-if="$first" ng-bind="getProteinSum(0)"></p>-->
        </div>
    </div>
</div>

<@ diet @>
