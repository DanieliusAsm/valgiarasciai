@extends('parent',['meta_title'=>'Current user list'])

@section('content')

    <a class="btn btn-primary" href="{{ url('user/new') }}">Pridėti vartotoją</a>

    <div id="userlist" class="panel-group" ng-app="UserlistApp" ng-controller="UserlistCtrl" ng-init="users={{ htmlspecialchars(json_encode($users)) }}">

        <div class="panel panel-default" ng-repeat="user in users">
            <div class="panel-heading">
                <div class="panel-title">
                    <a class="collapsed" data-toggle="collapse" data-target="% setContentId($index) %" ng-bind="setHeading($index, user)"></a>
                    <div ng-bind="user.created" class="pull-right"></div>
                </div>
            </div>
            <div id="% getContentId($index) %" class="panel-collapse collapse">
                <div class="panel-body text-justify">
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" data-target="% setContentId($index, 'contacts') %">Kontaktinė informacija</a></li>
                        <li><a data-toggle="tab" data-target="% setContentId($index, 'body') %">Kūno kompleksijos analizė</a></li>
                        <li><a data-toggle="tab" data-target="% setContentId($index, 'blood') %">Kraujo tyrimai</a></li>
                    </ul>
                    <div class="tab-content">
                        <div id="% getContentId($index, 'contacts') %" class="tab-pane active">
                            <p>El. paštas: % user.email %</p>
                            <p>Telefono numeris: % user.phone %</p>
                            <p>Sudarytas valgiaraštis:</p>
                        </div>
                        <div id="% getContentId($index, 'body') %" class="tab-pane">
                            <p></p>
                        </div>
                        <div id="% getContentId($index, 'blood') %" class="tab-pane">
                            <p></p>
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