<div class="form"></div>
<div id="form-group">
    <label class="control-label" for="days">Dienos</label>
    <input class="form-control" type="number" id="days" ng-model="days" ng-change="updateDietArray()" min="1">
</div>

<ul class="nav nav-tabs">
    <li ng-repeat="tab in getNumberToArray((days)) track by $index" ng-class="$first ? 'active' :''"><a data-toggle="tab" data-target="#<@($index)@>" ng-bind="($index+1)"></a></li>
</ul>
<div class="tab-content">
    <div class="tab-pane" ng-repeat="dieta in diet track by $index" id="<@($index)@>" ng-class="$first ? 'tab-pane active' :'tab-pane'">
        <div class="row" ng-repeat="eating in eatingInfo">
            <div class="col-md-12">
                <h4 ng-bind="eating.type"></h4>
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
                        <th class="text-center">Cholesterolis</th>
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
                        <td><input class="form-control" id="disabledInput" type="number" name="cholesterolis"
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
                        <th>
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

<@ diet @></br>
<@ eatingInfo @>