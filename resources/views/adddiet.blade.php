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
                    <tr id="row0">
                        <td>9:00</td>
                        <td>
                            <input type="text" class="form-control" list="product" name="product[]" ng-model="productName" ng-change="onProductSelected($event)" style="width:100%"
                                   placeholder="Pavadinimas"/>
                            <datalist id="product" ng-model="datalist" ng-change="onDatalist(datalist)">
                                @foreach($products as $product)
                                    <label>
                                        <option id="{{$product->id}}"
                                                value="{{$product->pavadinimas}}">{{$product->tipas}}</option>
                                    </label><br/>
                                @endforeach
                            </datalist>
                        </td>
                        <td>
                            <input class="form-control" id="quantity" type="number" name="quantity[]" placeholder="100" ng-bind="productName" ng-model="quantity" ng-change="onQuantityChanged()"/>
                        </td>
                        <td><input class="form-control" id="disabledInput" type="number" name="baltymai" placeholder="0"
                                   disabled/></td>
                        <td><input class="form-control" id="disabledInput" type="number" name="riebalai" placeholder="0"
                                   disabled/></td>
                        <td><input class="form-control" id="disabledInput" type="number" name="angliavandeniai"
                                   placeholder="0" disabled/></td>
                        <td><input class="form-control" id="disabledInput" type="number" name="eVerte" placeholder="0"
                                   disabled/></td>
                        <td><input class="form-control" id="disabledInput" type="number" name="cholesterolis"
                                   placeholder="0" disabled/></td>
                    </tr>
                    <tr id="row1"></tr>
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
                <button class="add-row btn btn-primary"><i class="glyphicon glyphicon-plus"></i></button>
                <button class="delete-row btn btn-danger"><i class="glyphicon glyphicon-minus"></i></button>
            </div>
        </div>
    </div>
@stop


