@extends('parent',['meta_title'=>'Vartotojų sąrašas'])

@section('content')
    <div ng-app="UserlistApp" ng-controller="UserlistCtrl">
        <!-- Search -->
        <div id="usersearch" class="search-container">
            <div class="input-group">
            <span class="input-group-addon">
                <i class="glyphicon glyphicon-search"></i>
            </span>
                <input type="text" class="form-control" placeholder="Įveskite vartotojo vardą arba pavardę kurio ieškote..." ng-model="search">
            <span class="input-group-btn">
                <a href="{{ url('user/new') }}" class="btn btn-primary" type="button">Pridėti naują vartotoją</a>
            </span>
            </div>
        </div>
        <!-- Userlist -->
        <div id="userlist" class="panel-group" ng-init="users={{ htmlspecialchars(json_encode($users)) }}; bloods={{htmlspecialchars(json_encode($blood))}}; bodies={{htmlspecialchars(json_encode($body))}}">
            <div class="panel panel-default" ng-repeat="user in users | filter:search">
                <!-- User panel heading -->
                <div class="panel-heading">
                    <div class="panel-title">
                        <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                        <a class="collapsed" data-toggle="collapse" data-target="<@ setContentId($index) @>" ng-bind="setPanelHeading($index, user)"></a>
                        <div class="pull-right" ng-bind="user.created"></div>
                    </div>
                </div>
                <!-- User panel content section -->
                <div id="<@ getContentId($index) @>" class="panel-collapse collapse">
                    <div class="panel-body text-justify">
                        <p>Pritaikyta dieta:</p>
                        <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" data-target="<@ setContentId($index, 'contacts') @>">Bendri duomenys</a></li>
                            <li><a data-toggle="tab" data-target="<@ setContentId($index, 'body') @>">Kūno kompleksijos analizė</a></li>
                            <li><a data-toggle="tab" data-target="<@ setContentId($index, 'blood') @>">Kraujo tyrimai</a></li>
                        </ul>
                        <div class="tab-content">
                            <div id="<@ getContentId($index, 'contacts') @>" class="tab-pane active">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <p>Lytis: <@ user.gender @></p>
                                        <p>Amžius: <@ user.age @></p>
                                    </div>
                                    <div class="col-sm-4">
                                        <p>Ūgis: <@ user.height @> </p>
                                        <p>Svoris:<@ user.weight @></p>
                                    </div>
                                    <div class="col-sm-4">
                                        <p>Riešo apimtis: <@ user.wrist @></p>
                                        <p>Liemuo: <@ user.waist @></p>
                                    </div>
                                </div>
                            </div>
                            <div id="<@ getContentId($index, 'body') @>" class="tab-pane" ng-init="body = getItemById(bodies,user.id)">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <p>Biologinis amžius: <@ body.biological_age @></p>
                                        <p>Procentinė kūno skysčių išraiška: <@ body.body_fluid @></p>
                                        <p>Pilvo riebalų lygis: <@ body.abdominal_fat @></p>
                                    </div>
                                    <div class="col-sm-4">
                                        <p>Svoris: <@ body.weight @></p>
                                        <p>Procentinė riebalų išraiška: <@ body.fat_expression @></p>
                                        <p>Raumenų masė: <@ body.muscle_mass @></p>
                                    </div>
                                    <div class="col-sm-4">
                                        <p>Kaulų masė: <@ body.bone_mass @></p>
                                        <p>Kūno masės indeksas: <@ body.kmi @></p>
                                        <p>Dienos kalorijų norma: <@ body.calorie_intake @></p>
                                    </div>
                                </div>
                            </div>
                            <div id="<@ getContentId($index, 'blood') @>" class="tab-pane" ng-init="blood = getItemById(bloods,user.id)">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <p>Arterinis kraujo spaudimas: <@ blood.blood_pressure @></p>
                                        <p>Pulsas: <@ blood.pulse @></p>
                                        <p>Bendras cholesterolis: <@ blood.cholesterol @></p>
                                    </div>
                                    <div class="col-sm-4">
                                        <p>Mažo tankio lipoproteinai: <@ blood.mtl @></p>
                                        <p>Didelio tankio lipoproteinai: <@ blood.dtl @></p>
                                    </div>
                                    <div class="col-sm-4">
                                        <p>Trigliceridai: <@ blood.triglycerides @></p>
                                        <p>Gliukozė: <@ blood.glucose @></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-container">
                            <h4>Kontaktinė informacija</h4>
                            <p>El. paštas: <@ user.email @> </p>
                            <p>Telefono numeris: <@ user.phone @></p>
                        </div>
                        <div class="text-container">
                            <h4>Priskirtos pastabos</h4>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                        </div>
                    </div>
                    <div class="panel-footer">
                        <div class="pull-right">
                            <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                            <a ng-click="setRoute(user, 'edit')">Redaguoti</a>
                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                            <a ng-click="setRoute(user, 'delete')">Pašalinti</a>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <p class="text-center" ng-hide="users.length">Vartotojų sąrašas tuščias. Norėdami pridėti vartotoją spauskite <b>Pridėti vartotoją</b> mygtuką.</p>
        </div>
    </div>
@stop