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
        <div id="userlist" class="panel-group" ng-init="users={{ htmlspecialchars(json_encode($users)) }}">
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
                                <table class="table table-hover table-condensed">
                                    <thead>
                                        <tr>
                                            <th>Antraštė</th>
                                            <th ng-repeat="base in user.base" ng-bind="base.created"></th>
                                        </tr>
                                    </thead>
                                    <tr>
                                        <td>Lytis</td>
                                        <td ng-bind="user.gender"></td>
                                    </tr>
                                    <tr>
                                        <td>Amžius</td>
                                        <td ng-bind="user.age"></td>
                                    </tr>
                                    <tr>
                                        <td>Ūgis</td>
                                        <td ng-repeat="base in user.base" ng-bind="base.height"></td>
                                    </tr>
                                    <tr>
                                        <td>Svoris</td>
                                        <td ng-repeat="base in user.base" ng-bind="base.weight"></td>
                                    </tr>
                                    <tr>
                                        <td>Riešo apimtis</td>
                                        <td ng-repeat="base in user.base" ng-bind="base.wrist"></td>
                                    </tr>
                                    <tr>
                                        <td>Liemuo</td>
                                        <td ng-repeat="base in user.base" ng-bind="base.waist"></td>
                                    </tr>
                                </table>
                            </div>
                            <div id="<@ getContentId($index, 'body') @>" class="tab-pane">
                                <table class="table table-hover table-condensed">
                                    <thead>
                                        <tr>
                                            <th>Antraštė</th>
                                            <th ng-repeat="body in user.body" ng-bind="body.created"></th>
                                        </tr>
                                    </thead>
                                    <tr>
                                        <td>Biologinis amžius</td>
                                        <td ng-repeat="body in user.body" ng-bind="body.biological_age"></td>
                                    </tr>
                                    <tr>
                                        <td>Procentinė kūno skysčių išraiška</td>
                                        <td ng-repeat="body in user.body" ng-bind="body.body_fluid"></td>
                                    </tr>
                                    <tr>
                                        <td>Pilvo riebalų lygis</td>
                                        <td ng-repeat="body in user.body" ng-bind="body.abdominal_fat"></td>
                                    </tr>
                                    <tr>
                                        <td>Svoris</td>
                                        <td ng-repeat="body in user.body" ng-bind="body.weight"></td>
                                    </tr>
                                    <tr>
                                        <td>Procentinė riebalų išraiška</td>
                                        <td ng-repeat="body in user.body" ng-bind="body.fat_expression"></td>
                                    </tr>
                                    <tr>
                                        <td>Raumenų masė</td>
                                        <td ng-repeat="body in user.body" ng-bind="body.muscle_mass"></td>
                                    </tr>
                                    <tr>
                                        <td>Kaulų masė</td>
                                        <td ng-repeat="body in user.body" ng-bind="body.bone_mass"></td>
                                    </tr>
                                    <tr>
                                        <td>Kūno masės indeksas</td>
                                        <td ng-repeat="body in user.body" ng-bind="body.kmi"></td>
                                    </tr>
                                    <tr>
                                        <td>Dienos kalorijų norma</td>
                                        <td ng-repeat="body in user.body" ng-bind="body.calorie_intake"></td>
                                    </tr>
                                </table>
                            </div>
                            <div id="<@ getContentId($index, 'blood') @>" class="tab-pane">
                                <table class="table table-hover table-condensed">
                                    <thead>
                                        <tr>
                                            <th>Antraštė</th>
                                            <th ng-repeat="blood in user.blood" ng-bind="blood.created"></th>
                                        </tr>
                                    </thead>
                                    <tr>
                                        <td>Arterinis kraujo spaudimas</td>
                                        <td ng-repeat="blood in user.blood" ng-bind="blood.blood_pressure"></td>
                                    </tr>
                                    <tr>
                                        <td>Pulsas</td>
                                        <td ng-repeat="blood in user.blood" ng-bind="blood.pulse"></td>
                                    </tr>
                                    <tr>
                                        <td>Bendras cholesterolis</td>
                                        <td ng-repeat="blood in user.blood" ng-bind="blood.cholesterol"></td>
                                    </tr>
                                    <tr>
                                        <td>Mažo tankio lipoproteinai</td>
                                        <td ng-repeat="blood in user.blood" ng-bind="blood.mtl"></td>
                                    </tr>
                                    <tr>
                                        <td>Didelio tankio lipoproteinai</td>
                                        <td ng-repeat="blood in user.blood" ng-bind="blood.dtl"></td>
                                    </tr>
                                    <tr>
                                        <td>Trigliceridai</td>
                                        <td ng-repeat="blood in user.blood" ng-bind="blood.triglycerides"></td>
                                    </tr>
                                    <tr>
                                        <td>Gliukozė</td>
                                        <td ng-repeat="blood in user.blood" ng-bind="blood.glucose"></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="text-container">
                            <h4>Kontaktinė informacija</h4>
                            <table class="table table-hover table-condensed">
                                <tr>
                                    <td>El. paštas</td>
                                    <td ng-bind="user.email"></td>
                                </tr>
                                <tr>
                                    <td>Telefono numeris</td>
                                    <td ng-bind="user.phone"></td>
                                </tr>
                            </table>
                        </div>
                        <div class="text-container">
                            <h4>Priskirtos pastabos</h4>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                        </div>
                    </div>
                    <div class="panel-footer">
                        <div class="pull-right">
                            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                            <a ng-click="setRoute(user, 'data')">Prideti duomenų</a>
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