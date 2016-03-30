@extends('parent',['meta_title'=>'Current user list'])

@section('content')

    <a class="btn btn-primary" href="{{ url('user/new') }}">Pridėti vartotoją</a>

    <div id="userlist" class="panel-group" ng-app="UserlistApp" ng-controller="UserlistCtrl" ng-init="users={{ htmlspecialchars(json_encode($users)) }}">

        <div class="panel panel-default" ng-repeat="user in users">
            <div class="panel-heading">
                <div class="panel-title">
                    <a class="collapsed" data-toggle="collapse" data-target="% setContentId($index) %" ng-bind="setHeading($index, user)"></a>
                    <div class="pull-right">Vartotojas sukurtas: 2016-03-30 17:36:27</div>
                </div>
            </div>
            <div id="% getContentId($index) %" class="panel-collapse collapse">
                <div class="panel-body text-justify">
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#1">Kontaktinė informacija</a></li>
                        <li><a data-toggle="tab" href="#2">Kūno kompleksijos analizė</a></li>
                        <li><a data-toggle="tab" href="#3">Kraujo tyrimai</a></li>
                    </ul>
                    <div class="tab-content">
                        <div id="1" class="tab-pane active">
                            <p>El. paštas: noname.noname667@gmail.com</p>
                            <p>Telefono numeris: 860135976</p>
                            <p>Sudarytos dietos sąrašas:</p>
                        </div>
                        <div id="2" class="tab-pane">
                            <p>Kūno komplekcijos analizės informacija</p>
                            <p>Kūno komplekcijos analizės informacija</p>
                        </div>
                        <div id="3" class="tab-pane">
                            <p>Kraujo tyrimu informacija</p>
                        </div>
                    </div>
                    <h4>Priskirtos pastabos</h4>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                </div>
                <div class="panel-footer">
                    <div class="pull-right">
                        <a ng-click="redirect(user, 'edit')">Redaguoti</a>
                        <a ng-click="redirect(user, 'delete')">Pašalinti</a>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <p class="text-center" ng-hide="users.length">Vartotojų sąrašas tuščias. Norėdami pridėti vartotoją spauskite <b>Pridėti vartotoją</b> mygtuką.</p>
    </div>
@stop