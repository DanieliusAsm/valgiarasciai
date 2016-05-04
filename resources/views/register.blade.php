@extends('parent',['meta_title'=>'Vartotojo kurimas'])

@section('content')
    @if(Request::is('*/edit'))
        edit
        <form action="{{url('/user/'.$id.'/edit')}}" method ="post">
    @elseif(Request::is('*/data'))
        data
        <form action="{{url('/user/'.$id.'/data')}}" method ="post">
    @else
        user
        <form action="{{url('/user/new')}}" method ="post">
    @endif
        <div class="panel-group">
            <div class="panel panel-default @if(Request::is('*/data')) hidden @endif">
                <div class="panel-heading">
                    <div class="panel-title">
                        <a role="button" data-toggle="collapse" data-target="#collapseUser" aria-expanded="true">Vartotojas</a>
                    </div>
                </div>
                <div id="collapseUser" class="panel-collapse collapse in">
                    <div class="panel-body text-justify">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group @if($errors->has('first_name')) has-error @endif">
                                    <label class="control-label" for="first_name">*Vardas</label>
                                    <input type="text" class="form-control" name="first_name" id="first_name" placeholder="Petras" value="@if(Request::is('*/edit')) {{$user->first_name}} @else {{old('first_name')}} @endif"/>
                                    @if($errors->has('first_name')) <p class="help-block">{{$errors->first('first_name')}}</p>@endif
                                </div>
                                <div class="form-group @if($errors->has('last_name')) has-error @endif">
                                    <label class="control-label" for="last_name">*Pavardė</label>
                                    <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Petrauskas" value="@if(Request::is('*/edit')) {{$user->last_name}} @else {{old('last_name')}} @endif"/>
                                    @if($errors->has('last_name')) <p class="help-block">{{$errors->first('last_name')}}</p>@endif
                                </div>
                                <div class="form-group">
                                    <label for="gender">Lytis</label><br/>
                                    <label class="radio-inline" id="gender">
                                        <input type="radio" name="gender" value="vyras" checked>Vyras
                                    </label>
                                    <label class="radio-inline" id="gender">
                                        <input type ="radio" name="gender" value="moteris">Moteris
                                    </label>
                                </div>
                                <div class="form-group @if($errors->has('age')) has-error @endif">
                                    <label class="control-label" for="age">*Amžius</label>
                                    <input type="number" class="form-control" name="age" id="age" placeholder="30"  value="@if(Request::is('*/edit')) {{$user->age}} @else {{old('age')}} @endif"/>
                                    @if($errors->has('age')) <p class="help-block">{{$errors->first('age')}}</p>@endif
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group @if($errors->has('phone')) has-error @endif">
                                    <label class="control-label" for="phone">*Telefono numeris</label>
                                    <input type="text" class="form-control" name="phone" id="phone" placeholder="860652656" value="@if(Request::is('*/edit')) {{$user->phone}} @else {{old('phone')}} @endif"/>
                                    @if($errors->has('phone')) <p class="help-block">{{$errors->first('phone')}}</p>@endif
                                </div>
                                <div class="form-group @if($errors->has('email')) has-error @endif">
                                    <label class="control-label" for="email">*El. paštas</label>
                                    <input type="email" class="form-control" name="email" id="email" placeholder="petras@example.com" value="@if(Request::is('*/edit')) {{$user->email}} @else {{old('email')}} @endif"/>
                                    @if($errors->has('email')) <p class="help-block">{{$errors->first('email')}}</p>@endif
                                </div>
                                <div class="form-group">
                                    <label for="diet">Pritaikyta dieta</label>
                                    <input type="text" class="form-control" name="diet" id="diet" placeholder="Cukrinis diabetas" value ="@if(Request::is('*/edit')) {{$user->diet}} @else {{old('diet')}} @endif"/>
                                </div>
                                <div class="form-group">
                                    <label for="notes">Pastabos</label>
                                    <input type="text" class="form-control" name="notes" id="notes" placeholder="Pastaba" value="@if(Request::is('*/edit')) {{$user->notes}} @else {{old('notes')}} @endif"/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel panel-default @if(Request::is('*/edit') && $user.base == null) hidden @endif">
                <div class="panel-heading">
                    <div class="panel-title">
                        <a role="button" data-toggle="collapse" data-target="#collapseBase" aria-expanded="true">Papildoma informacija</a>
                    </div>
                </div>
                <div id="collapseBase" class="panel-collapse collapse">
                    <div class="panel-body text-justify">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="height">Ugis (cm)</label>
                                    <input type="number" class="form-control" name="height" id="height" placeholder="180" value="@if(Request::is('*/edit')) {{$user->base->height}} @else {{old('height')}} @endif"/>
                                </div>
                                <div class="form-group">
                                    <label for="weight">Svoris</label>
                                    <input type="number" class="form-control" name="weight" id="weight" placeholder="80" value="@if(Request::is('*/edit')) {{$user->base->weight}} @else {{old('weight')}} @endif"/>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="wrist">Rieso apimtis (cm)</label>
                                    <input type="number" class="form-control" name="wrist" id="wrist" placeholder="15" value="@if(Request::is('*/edit')) {{$user->base->wrist}} @else {{old('wrist')}} @endif"/>
                                </div>
                                <div class="form-group">
                                    <label for="waist">Liemuo</label>
                                    <input type="number" class="form-control" name="waist" id="waist" placeholder="70" value="@if(Request::is('*/edit')) {{$user->base->waist}} @else {{old('waist')}} @endif"/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel panel-default @if(Request::is('*/edit') && $user.body == null) hidden @endif">
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
                                    <input type="number" class="form-control" name="biological_age" id="biological_age" placeholder="27" value="@if(Request::is('*/edit')) {{$user->body->biological_age}} @else {{old('biological_age')}} @endif"/>
                                </div>
                                <div class="form-group">
                                    <label for="body_fluid">Procentinė kūno skysčių išraiška</label>
                                    <input type="text" class="form-control" name="body_fluid" id="body_fluid" placeholder="" value="@if(Request::is('*/edit')) {{$user->body->body_fluid}} @else {{old('body_fluid')}} @endif"/>
                                </div>
                                <div class="form-group">
                                    <label for="abdominal_fat">Pilvo riebalų lygis</label>
                                    <input type="text" class="form-control" name="abdominal_fat" id="abdominal_fat" placeholder="" value="@if(Request::is('*/edit')) {{$user->body->abdominal_fat}} @else {{old('abdominal_fat')}} @endif"/>
                                </div>
                                <div class="form-group">
                                    <label for="weight">Svoris</label>
                                    <input type="number" class="form-control" name="weight" id="weight" placeholder="80" value="@if(Request::is('*/edit')) {{$user->body->weight}} @else {{old('weight')}} @endif"/>
                                </div>
                                <div class="form-group">
                                    <label for="fat_expression">Procentinė riebalų išraiška</label>
                                    <input type="text" class="form-control" name="fat_expression" id="fat_expression" placeholder="" value="@if(Request::is('*/edit')) {{$user->body->fat_expression}} @else {{old('fat_expression')}} @endif"/>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="muscle_mass">Raumenų masė</label>
                                    <input type="text" class="form-control" name="muscle_mass" id="muscle_mass" placeholder="" value="@if(Request::is('*/edit')) {{$user->body->muscle_mass}} @else {{old('muscle_mass')}} @endif"/>
                                </div>
                                <div class="form-group">
                                    <label for="bone_mass">Kaulų masė</label>
                                    <input type="text" class="form-control" name="bone_mass" id="bone_mass" placeholder="" value="@if(Request::is('*/edit')) {{$user->body->bone_mass}} @else {{old('bone_mass')}} @endif"/>
                                </div>
                                <div class="form-group">
                                    <label for="kmi">Kūno masės indeksas (KMI)</label>
                                    <input type="number" class="form-control" name="kmi" id="kmi" placeholder="" value="@if(Request::is('*/edit')) {{$user->body->kmi}} @else {{old('kmi')}} @endif"/>
                                </div>
                                <div class="form-group">
                                    <label for="calorie_intake">Dienos kalorijų norma</label>
                                    <input type="text" class="form-control" name="calorie_intake" id="calorie_intake" placeholder="" value="@if(Request::is('*/edit')) {{$user->body->calorie_intake}} @else {{old('calorie_intake')}} @endif"/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel panel-default  @if(Request::is('*/edit') && $user.blood == null) hidden @endif">
                <div class="panel-heading">
                    <div class="panel-title">
                        <a role="button" data-toggle="collapse" data-target="#collapseBlood" aria-expanded="true">Kraujo tyrimas</a>
                    </div>
                </div>
                <div id="collapseBlood" class="panel-collapse collapse">
                    <div class="panel-body text-justify">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="blood_pressure">Arterinis kraujo spaudimas</label>
                                    <input type="number" class="form-control" name="blood_pressure" id="blood_pressure" placeholder="" value="@if(Request::is('*/edit')) {{$user->blood->blood_pressure}} @else {{old('blood_pressure')}} @endif"/>
                                </div>
                                <div class="form-group">
                                    <label for="">Pulsas</label>
                                    <input type="number" class="form-control" name="pulse" id="pulse" placeholder="" value="@if(Request::is('*/edit')) {{$user->blood->pulse}} @else {{old('pulse')}} @endif"/>
                                </div>
                                <div class="form-group">
                                    <label for="cholesterol">Bendras cholesterolis</label>
                                    <input type="number" class="form-control" name="cholesterol" id="cholesterol" placeholder="" value="@if(Request::is('*/edit')) {{$user->blood->cholesterol}} @else {{old('cholesterol')}} @endif"/>
                                </div>
                                <div class="form-group">
                                    <label for="mtl">MTL</label>
                                    <input type="number" class="form-control" name="mtl" id="mtl" placeholder="" value="@if(Request::is('*/edit')) {{$user->blood->mtl}} @else {{old('mtl')}} @endif"/>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="dtl">DTL</label>
                                    <input type="number" class="form-control" name="dtl" id="dtl" placeholder="" value="@if(Request::is('*/edit')) {{$user->blood->dtl}} @else {{old('dtl')}} @endif"/>
                                </div>
                                <div class="form-group">
                                    <label for="triglycerides">Trigliceridai</label>
                                    <input type="number" class="form-control" name="triglycerides" id="triglycerides" placeholder="" value="@if(Request::is('*/edit')) {{$user->blood->triglycerides}} @else {{old('triglycerides')}} @endif"/>
                                </div>
                                <div class="form-group">
                                    <label for="glucose">Gliukozė</label>
                                    <input type="number" class="form-control" name="glucose" id="glucose" placeholder="" value="@if(Request::is('*/edit')) {{$user->blood->glucose}} @else {{old('glucose')}} @endif"/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary center-block">Kurti vartotoją</button>
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
    </form>
@stop