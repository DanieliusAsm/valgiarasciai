@extends('parent',['meta_title'=>'Vartotojo kurimas'])

@section('content')
    <form action="{{url('/user/new/result')}}" method ="post">
        <div class="panel-group">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="panel-title">
                        <a role="button" data-toggle="collapse" data-target="#collapseUser" aria-expanded="true">Vartotojas</a>
                    </div>
                </div>
                <div id="collapseUser" class="panel-collapse collapse in">
                    <div class="panel-body text-justify">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="first_name">Vardas</label>
                                    <input type="text" class="form-control" name="first_name" id="first_name" placeholder="Petras"/>
                                </div>
                                <div class="form-group">
                                    <label for="last_name">Pavardė</label>
                                    <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Petrauskas"/>
                                </div>
                                <div class="form-group">
                                    <label class="radio-inline">
                                        <input type="radio" name="gender" value="vyras" checked>Vyras</input>
                                    </label>
                                    <label class="radio-inline">
                                        <input type ="radio" name="gender" value="moteris">Moteris</input>
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label for="age">Amžius</label>
                                    <input type="number" class="form-control" name="age" id="age" placeholder="30"/>
                                </div>
                                <div class="form-group">
                                    <label for="phone">Telefono numeris</label>
                                    <input type="text" class="form-control" name="phone" id="phone" placeholder="860652656"/>
                                </div>
                                <div class="form-group">
                                    <label for="email">El. paštas</label>
                                    <input type="email" class="form-control" name="email" id="email" placeholder="petras@example.com"/>
                                </div>
                                <div class="form-group">
                                    <label for="diet">Pritaikyta dieta</label>
                                    <input type="text" class="form-control" name="diet" id="diet" placeholder="Cukrinis diabetas"/>
                                </div>
                                <div class="form-group">
                                    <label for="notes">Pastabos</label>
                                    <input type="text" class="form-control" name="notes" id="notes" placeholder="Pastaba"/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="panel-title">
                        <a role="button" data-toggle="collapse" data-target="#collapseBase" aria-expanded="true">Pagrindinė informacija</a>
                    </div>
                </div>
                <div id="collapseBase" class="panel-collapse collapse">
                    <div class="panel-body text-justify">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="height">Ugis (cm)</label>
                                    <input type="number" class="form-control" name="height" id="height" placeholder="180"/>
                                </div>
                                <div class="form-group">
                                    <label for="weight">Svoris</label>
                                    <input type="number" class="form-control" name="weight" id="weight" placeholder="80"/>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="wrist">Rieso apimtis (cm)</label>
                                    <input type="number" class="form-control" name="wrist" id="wrist" placeholder="15"/>
                                </div>
                                <div class="form-group">
                                    <label for="waist">Liemuo</label>
                                    <input type="number" class="form-control" name="waist" id="waist" placeholder="70"/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="panel-title">
                        <a role="button" data-toggle="collapse" data-target="#collapseBody" aria-expanded="true">Kūno kompleksijos analizė</a>
                    </div>
                </div>
                <div id="collapseBody" class="panel-collapse collapse">
                    <div class="panel-body text-justify">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="biological_age">Biologinis amžius</label>
                                    <input type="number" class="form-control" name="biological_age" id="biological_age" placeholder="27"/>
                                </div>
                                <div class="form-group">
                                    <label for="body_fluid">Procentinė kūno skysčių išraiška</label>
                                    <input type="text" class="form-control" name="body_fluid" id="body_fluid" placeholder=""/>
                                </div>
                                <div class="form-group">
                                    <label for="abdominal_fat">Pilvo riebalų lygis</label>
                                    <input type="text" class="form-control" name="abdominal_fat" id="abdominal_fat" placeholder=""/>
                                </div>
                                <div class="form-group">
                                    <label for="weight">Svoris</label>
                                    <input type="number" class="form-control" name="weight" id="weight" placeholder="80"/>
                                </div>
                                <div class="form-group">
                                    <label for="fat_expression">Procentinė riebalų išraiška</label>
                                    <input type="text" class="form-control" name="fat_expression" id="fat_expression" placeholder=""/>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="muscle_mass">Raumenų masė</label>
                                    <input type="text" class="form-control" name="muscle_mass" id="muscle_mass" placeholder=""/>
                                </div>
                                <div class="form-group">
                                    <label for="bone_mass">Kaulų masė</label>
                                    <input type="text" class="form-control" name="bone_mass" id="bone_mass" placeholder=""/>
                                </div>
                                <div class="form-group">
                                    <label for="kmi">Kūno masės indeksas (KMI)</label>
                                    <input type="number" class="form-control" name="kmi" id="kmi" placeholder=""/>
                                </div>
                                <div class="form-group">
                                    <label for="calorie_intake">Dienos kalorijų norma</label>
                                    <input type="text" class="form-control" name="calorie_intake" id="calorie_intake" placeholder=""/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="panel-title">
                        <a role="button" data-toggle="collapse" data-target="#collapseBlood" aria-expanded="true">Kraujo tyrimas</a>
                    </div>
                </div>
                <div id="collapseBlood" class="panel-collapse collapse">
                    <div class="panel-body text-justify">
                        <div class="row">
                            <div class="col-sm-4">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary center-block">Kurti vartotoją</button>
    </form>
@stop