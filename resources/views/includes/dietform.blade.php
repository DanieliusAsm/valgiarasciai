
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
            <input type="checkbox" ng-model="diet.with_cholesterol">
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
    <li ng-repeat="tab in getNumberToArray(diet.total_days) track by $index" ng-class="$first ? 'active' :''"><a data-toggle="tab" data-target="#<@($index)@>" ng-bind="($index+1)"></a></li>
</ul>
<div ng-show="initialized" class="tab-content">
    <div class="tab-pane" ng-repeat="dieta in getNumberToArray(diet.total_days) track by $index" id="<@($index)@>" ng-class="$first ? 'tab-pane active' :'tab-pane'">
        <div class="row" ng-repeat="eating in getEatingsInDay($index)">
            <div class="col-md-12">
                <h4 ng-bind="eating.eating_type"></h4>
                <@ eating @>
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
                        <th ng-if="diet.with_cholesterol" class="text-center">Cholesterolis</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr ng-repeat="row in eating.products track by $index">
                        <td><input ng-if="$first" class="form-control" type="text" ng-model="eating.eating_time" name="time[]"></td>
                        <td>
                            <input class="form-control" type="text" ng-model="day[$parent.$parent.$index].eating[$parent.$index].products[$index]"
                                   uib-typeahead="product as product.product_name for product in products | filter:$viewValue | limitTo:10"
                                   typeahead-on-select="onProductSelected($item,$parent.$parent.$index,$parent.$index,$index)" name="product_name[]">
                        </td>
                        <td>
                            <input class="form-control" ng-model="row.pivot.quantity" type="number" placeholder="100" min="0"/>
                        </td>
                        <td><input class="form-control" id="disabledInput" ng-model="row.pivot.protein" type="number" name="baltymai[]" placeholder="0"
                                   ng-value="calculateRowValues(row)"
                                   disabled/>

                        </td>
                        <td><input class="form-control" id="disabledInput" type="number" ng-model="row.pivot.fat" name="riebalai" placeholder="0"
                                   disabled/></td>
                        <td><input class="form-control" id="disabledInput" type="number" ng-model="row.pivot.carbs" name="angliavandeniai"
                                   placeholder="0" disabled/></td>
                        <td><input class="form-control" id="disabledInput" type="number" ng-model="row.pivot.energy_value" name="eVerte" placeholder="0"
                                   disabled/></td>
                        <td ng-if="diet.with_cholesterol"><input class="form-control" id="disabledInput" type="number" ng-model="row.pivot.cholesterol" name="cholesterolis"
                                   placeholder="0" disabled/></td>
                    </tr>
                    </tbody>
                    <tfoot>
                    <tr>
                        <th class="text-center" colspan="3">Bendra pusryčių maistinė ir energinė vertė</th>
                        <th ng-value="calculateEatingValues(eating)">
                            <@ eating.protein @>
                        </th>
                        <th>
                            <@ eating.fat @>
                        </th>
                        <th>
                            <@ eating.carbs @>
                        </th>
                        <th>
                            <@ eating.energy_value @>
                        </th>
                        <th ng-if="diet.with_cholesterol">
                            <@ eating.cholesterol @>
                        </th>
                    </tr>
                    </tfoot>
                </table>
                <div class="form-group pull-right">
                    <button class="add-row btn btn-primary" ng-click="eating.products.push({'product_name':'','pivot':{}})"><i
                                class="glyphicon glyphicon-plus"></i>
                    </button>
                    <button class="delete-row btn btn-danger" ng-click="eating.products.splice(eating.products.length-1,1)"><i
                                class="glyphicon glyphicon-minus"></i>
                    </button>
                </div>
            </div>
            <!--<p ng-if="$first" ng-bind="getProteinSum(0)"></p>-->
        </div>
        <h4>Bendra maistinė ir energinė vertė</h4>
        <@ diet.day_stats @>
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th></th>
                    <th class="text-center">Baltymai</th>
                    <th class="text-center">Riebalai</th>
                    <th class="text-center">Angliavadeniai</th>
                    <th class="text-center">Energetinė vertė</th>
                    <th ng-if="diet.with_cholesterol" class="text-center">Cholesterolis</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th>Per šią dieną</th>
                    <td ng-value="calculateTotalValues($index)"> <@ diet.day_stats[$index].protein @> </td>
                    <td> <@ diet.day_stats[$index].fat @> </td>
                    <td> <@ diet.day_stats[$index].carbs @> </td>
                    <td> <@ diet.day_stats[$index].energy_value @> </td>
                    <td ng-if="diet.with_cholesterol"> <@ diet.day_stats[$index].cholesterol @> </td>
                </tr>
                <tr>
                    <th>Per visa dietą</th>
                    <td> <@ diet.protein @> </td>
                    <td> <@ diet.fat @> </td>
                    <td> <@ diet.carbs @> </td>
                    <td> <@ diet.energy_value @> </td>
                    <td ng-if="diet.with_cholesterol"> <@ diet.cholesterol @> </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<@ diet @>
