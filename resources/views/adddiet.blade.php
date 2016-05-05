@extends('parent',['meta_title'=>'Valgiaraščio kūrimas'])

@section('content')
    <div class="row">
        <div class="col-sm-10">
            <h4>Pusryčiai</h4>
            <table class="table table-bordered table-hover">
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
                        <th class="text-center">kcal</th>
                        <th class="text-center">Cholesterolis</th> <!-- Paslepti priklausant nuo zmogaus .. -->
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>9:00</td>
                        <td>
                            <input class="form-control" list="product" name="product" style="width:100%" placeholder="Pavadinimas"/>
                            <datalist id = "product">
                                <label>
                                    <option value="Morka"></option>
                                </label><br/>
                            </datalist>
                        </td>
                        <td>
                            <input class="form-control" type="number" name="quantity" placeholder="10"/>
                        </td>
                        <td><input class="form-control" id="disabledInput" type="number" name="" placeholder="0" disabled/></td>
                        <td><input class="form-control" id="disabledInput" type="number" name="" placeholder="0" disabled/></td>
                        <td><input class="form-control" id="disabledInput" type="number" name="" placeholder="0" disabled/></td>
                        <td><input class="form-control" id="disabledInput" type="number" name="" placeholder="0" disabled/></td>
                        <td><input class="form-control" id="disabledInput" type="number" name="" placeholder="0" disabled/></td>
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
            <button class ="btn btn-primary"><i class="glyphicon glyphicon-plus"></i></button>
            <button class ="btn btn-danger"><i class="glyphicon glyphicon-minus"></i></button>
        </div>
    </div>
@stop

