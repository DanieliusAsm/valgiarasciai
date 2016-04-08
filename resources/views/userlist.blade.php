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
                        <p>Pritaikytos dietos sąrašas:</p>
                        <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" data-target="<@ setContentId($index, 'contacts') @>">Bendri duomenys</a></li>
                            <li><a data-toggle="tab" data-target="<@ setContentId($index, 'body') @>">Kūno kompleksijos analizė</a></li>
                            <li><a data-toggle="tab" data-target="<@ setContentId($index, 'blood') @>">Kraujo tyrimai</a></li>
                        </ul>
                        <div class="tab-content">
                            <div id="<@ getContentId($index, 'contacts') @>" class="tab-pane active">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <p>Lytis:</p>
                                        <p>Amžius:</p>
                                    </div>
                                    <div class="col-sm-4">
                                        <p>Ūgis:</p>
                                        <p>Svoris:</p>
                                    </div>
                                    <div class="col-sm-4">
                                        <p>Riešo apimtis:</p>
                                        <p>Liemuo:</p>
                                    </div>
                                </div>
                            </div>
                            <div id="<@ getContentId($index, 'body') @>" class="tab-pane">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <p>Biologinis amžius:</p>
                                        <p>Procentinė kūno skysčių išraiška:</p>
                                        <p>Pilvo riebalų lygis:</p>
                                    </div>
                                    <div class="col-sm-4">
                                        <p>Procentinė riebalų išraiška:</p>
                                        <p>Raumenų masė:</p>
                                        <p>Kaulų masė:</p>
                                    </div>
                                    <div class="col-sm-4">
                                        <p>Kūno masės indeksas:</p>
                                        <p>Dienos kalorijų norma:</p>
                                    </div>
                                </div>
                            </div>
                            <div id="<@ getContentId($index, 'blood') @>" class="tab-pane">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <p>Arterinis kraujo spaudimas:</p>
                                        <p>Pulsas:</p>
                                        <p>Bendras cholesterolis:</p>
                                    </div>
                                    <div class="col-sm-4">
                                        <p>Mažo tankio lipoproteinai:</p>
                                        <p>Didelio tankio lipoproteinai:</p>
                                    </div>
                                    <div class="col-sm-4">
                                        <p>Trigliceridai:</p>
                                        <p>Gliukozė:</p>
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