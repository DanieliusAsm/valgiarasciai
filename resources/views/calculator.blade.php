@extends('parent',['meta_title'=>'Skaičiuoklė'] )

@section('content')
    <div class="row" ng-app="DietApp" ng-controller="DietController">
        <div class="col-sm-3" ng-init="activities=[{'name':'Lengvas darbas','rate':'1.5'},{'name':'Vidutinis darbas','rate':'1.7'},{'name':'Sunkus darbas','rate':'2'},{'name':'Labai sunkus darbas','rate':'2.2'}]; calcData = {};">
            <div class="form-group">
                <label for="mass">Masė(kg)</label>
                <input class="form-control" type="number" id="mass" ng-model="mass" min="0">
            </div>
            <div class="form-group">
                <label for="height">Ūgis(cm)</label>
                <input class="form-control" type="number" id="height" ng-model="height" min="0">
            </div>
            <div class="form-group">
                <label for="age">Amžius</label>
                <input class="form-control" type="number" id="age" ng-model="age" min="0" max="130">
            </div>
            <div class="form-group">
                <label for="gender">Lytis</label><br/>
                <label class="radio-inline" id="gender">
                    <input type="radio" value="vyras" ng-model="gender" checked>Vyras
                </label>
                <label class="radio-inline" id="gender">
                    <input type="radio" value="moteris" ng-model="gender">Moteris
                </label>
            </div>
            <div class="form-group">
                <label for="activity">Fizinis aktyvumas</label>
                <select class="form-control" id="activity" ng-model="selected" ng-options="activity.name for activity in activities | filter: $viewValue"></select>
            </div>
            <button class="btn btn-primary center-block" ng-click="calculate()">Skaičiuoti</button>
        </div>
        <div class="col-sm-9">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title text-center">Rezultatas</h3>
                </div>
                <div class="panel-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>KMI</th>
                                <th>Būsena</th>
                                <th>PMA (kcal)</th>
                                <th>Idealus svoris (kg)</th>
                                <th>Idealus PMA (kcal)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td ng-bind="calcData.kmi"></td>
                                <td ng-bind="calcData.salyga"></td>
                                <td ng-bind="calcData.pma"></td>
                                <td ng-bind="calcData.idealusSvoris"></td>
                                <td ng-bind="calcData.idealusPMA"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop
