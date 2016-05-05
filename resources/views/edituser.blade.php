@extends('parent',['meta_title'=>'Vartotojo kurimas'])

@section('content')
    <form action="{{url('/user/'.$id.'/edit')}}" method="post">
        <div class="panel-group">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="panel-title">
                        <a class="btn-block clickable" role="button" data-toggle="collapse" data-target="#collapseUser" aria-expanded="true">Vartotojas</a>
                    </div>
                </div>
                <div id="collapseUser" class="panel-collapse collapse in">
                    <div class="panel-body text-justify">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group @if($errors->has('first_name')) has-error @endif">
                                    <label class="control-label" for="first_name">*Vardas</label>
                                    <input type="text" class="form-control" name="first_name" id="first_name"
                                           placeholder="Petras" value="@if($errors->has('first_name')){{old('first_name')}}@else{{$user->first_name}}@endif"/>
                                    @if($errors->has('first_name')) <p class="help-block">{
                                        {$errors->first('first_name')}}</p>@endif
                                </div>
                                <div class="form-group @if($errors->has('last_name')) has-error @endif">
                                    <label class="control-label" for="last_name">*Pavardė</label>
                                    <input type="text" class="form-control" name="last_name" id="last_name"
                                           placeholder="Petrauskas" value="@if($errors->has('last_name')){{old('last_name')}}@else{{$user->last_name}}@endif"/>
                                    @if($errors->has('last_name')) <p
                                            class="help-block">{{$errors->first('last_name')}}</p>@endif
                                </div>
                                <div class="form-group">
                                    <label for="gender">Lytis</label><br/>
                                    <label class="radio-inline" id="gender">
                                        <input type="radio" name="gender" value="vyras" checked>Vyras
                                    </label>
                                    <label class="radio-inline" id="gender">
                                        <input type="radio" name="gender" value="moteris">Moteris
                                    </label>
                                </div>
                                <div class="form-group @if($errors->has('age')) has-error @endif">
                                    <label class="control-label" for="age">*Amžius</label>
                                    <input type="number" class="form-control" name="age" id="age" placeholder="30"
                                           value="@if($errors->has('age')){{old('age')}}@else{{$user->age}}@endif"/>
                                    @if($errors->has('age')) <p class="help-block">{{$errors->first('age')}}</p>@endif
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group @if($errors->has('phone')) has-error @endif">
                                    <label class="control-label" for="phone">*Telefono numeris</label>
                                    <input type="text" class="form-control" name="phone" id="phone"
                                           placeholder="860652656" value="@if($errors->has('phone')){{old('phone')}}@else{{$user->phone}}@endif"/>
                                    @if($errors->has('phone')) <p
                                            class="help-block">{{$errors->first('phone')}}</p>@endif
                                </div>
                                <div class="form-group @if($errors->has('email')) has-error @endif">
                                    <label class="control-label" for="email">*El. paštas</label>
                                    <input type="email" class="form-control" name="email" id="email"
                                           placeholder="petras@example.com" value="@if($errors->has('email')){{old('email')}}@else{{$user->email}}@endif"/>
                                    @if($errors->has('email')) <p
                                            class="help-block">{{$errors->first('email')}}</p>@endif
                                </div>
                                <div class="form-group">
                                    <label for="diet">Pritaikyta dieta</label>
                                    <input type="text" class="form-control" name="diet" id="diet"
                                           placeholder="Cukrinis diabetas" value="@if($errors->has('diet')){{old('diet')}}@else{{$user->diet}}@endif"/>
                                </div>
                                <div class="form-group">
                                    <label for="notes">Pastabos</label>
                                    <input type="text" class="form-control" name="notes" id="notes"
                                           placeholder="Pastaba" value="@if($errors->has('notes')){{old('notes')}}@else{{$user->notes}}@endif"/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @foreach($user->base as $base)
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="panel-title">
                        <a class="btn-block clickable" role="button" data-toggle="collapse" data-target="#collapseBase" aria-expanded="true">Papildoma
                            informacija
                            <p class="pull-right">({{$base->created}})</p></a>
                    </div>
                </div>
                <div id="collapseBase" class="panel-collapse collapse">
                    <div class="panel-body text-justify">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="height">Ugis (cm)</label>
                                    <input type="number" class="form-control" name="height[]" id="height"
                                           placeholder="180" value="{{$base->height}}"/>
                                </div>
                                <div class="form-group">
                                    <label for="weight">Svoris</label>
                                    <input type="number" class="form-control" name="weight[]" id="weight" placeholder="80"
                                           value="{{$base->weight}}"/>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="wrist">Rieso apimtis (cm)</label>
                                    <input type="number" class="form-control" name="wrist[]" id="wrist" placeholder="15"
                                           value="{{$base->wrist}}"/>
                                </div>
                                <div class="form-group">
                                    <label for="waist">Liemuo</label>
                                    <input type="number" class="form-control" name="waist[]" id="waist" placeholder="70"
                                           value="{{$base->waist}}"/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            @foreach($user->body as $body)
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="panel-title">
                        <a class="btn-block clickable"role="button" data-toggle="collapse" data-target="#collapseBody" aria-expanded="true">Kūno
                            kompleksijos analizė<p class="pull-right">({{$body->created}})</p></a>
                    </div>
                </div>
                <div id="collapseBody" class="panel-collapse collapse">
                    <div class="panel-body text-justify">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="biological_age">Biologinis amžius</label>
                                    <input type="number" class="form-control" name="biological_age[]" id="biological_age"
                                           placeholder="27" value="{{$body->biological_age}}"/>
                                </div>
                                <div class="form-group">
                                    <label for="body_fluid">Procentinė kūno skysčių išraiška</label>
                                    <input type="text" class="form-control" name="body_fluid[]" id="body_fluid"
                                           placeholder="" value="{{$body->body_fluid}}"/>
                                </div>
                                <div class="form-group">
                                    <label for="abdominal_fat">Pilvo riebalų lygis</label>
                                    <input type="text" class="form-control" name="abdominal_fat[]" id="abdominal_fat"
                                           placeholder="" value="{{$body->abdominal_fat}}"/>
                                </div>
                                <div class="form-group">
                                    <label for="weight">Svoris</label>
                                    <input type="number" class="form-control" name="weight[]" id="weight" placeholder="80"
                                           value="{{$body->weight}}"/>
                                </div>
                                <div class="form-group">
                                    <label for="fat_expression">Procentinė riebalų išraiška</label>
                                    <input type="text" class="form-control" name="fat_expression[]" id="fat_expression"
                                           placeholder="" value="{{$body->fat_expression}}"/>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="muscle_mass">Raumenų masė</label>
                                    <input type="text" class="form-control" name="muscle_mass[]" id="muscle_mass"
                                           placeholder="" value="{{$body->muscle_mass}}"/>
                                </div>
                                <div class="form-group">
                                    <label for="bone_mass">Kaulų masė</label>
                                    <input type="text" class="form-control" name="bone_mass[]" id="bone_mass"
                                           placeholder="" value="{{$body->bone_mass}}"/>
                                </div>
                                <div class="form-group">
                                    <label for="kmi">Kūno masės indeksas (KMI)</label>
                                    <input type="number" class="form-control" name="kmi[]" id="kmi" placeholder=""
                                           value="{{$body->kmi}}"/>
                                </div>
                                <div class="form-group">
                                    <label for="calorie_intake">Dienos kalorijų norma</label>
                                    <input type="text" class="form-control" name="calorie_intake[]" id="calorie_intake"
                                           placeholder="" value="{{$body->calorie_intake}}"/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            @foreach($user->blood as $blood)
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="panel-title">
                        <a class="btn-block clickable" role="button" data-toggle="collapse" data-target="#collapseBlood" aria-expanded="true">Kraujo
                            tyrimas<p class="pull-right">({{$blood->created}})</p></a>
                    </div>
                </div>
                <div id="collapseBlood" class="panel-collapse collapse">
                    <div class="panel-body text-justify">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="blood_pressure">Arterinis kraujo spaudimas</label>
                                    <input type="number" class="form-control" name="blood_pressure[]" id="blood_pressure"
                                           placeholder="" value="{{$blood->blood_pressure}}"/>
                                </div>
                                <div class="form-group">
                                    <label for="">Pulsas</label>
                                    <input type="number" class="form-control" name="pulse[]" id="pulse" placeholder=""
                                           value="{{$blood->pulse}}"/>
                                </div>
                                <div class="form-group">
                                    <label for="cholesterol">Bendras cholesterolis</label>
                                    <input type="number" class="form-control" name="cholesterol[]" id="cholesterol"
                                           placeholder="" value="{{$blood->cholesterol}}"/>
                                </div>
                                <div class="form-group">
                                    <label for="mtl">MTL</label>
                                    <input type="number" class="form-control" name="mtl[]" id="mtl" placeholder=""
                                           value="{{$blood->mtl}}"/>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="dtl">DTL</label>
                                    <input type="number" class="form-control" name="dtl[]" id="dtl" placeholder=""
                                           value="{{$blood->dtl}}"/>
                                </div>
                                <div class="form-group">
                                    <label for="triglycerides">Trigliceridai</label>
                                    <input type="number" class="form-control" name="triglycerides[]" id="triglycerides"
                                           placeholder="" value="{{$blood->triglycerides}}"/>
                                </div>
                                <div class="form-group">
                                    <label for="glucose">Gliukozė</label>
                                    <input type="number" class="form-control" name="glucose[]" id="glucose" placeholder=""
                                           value="{{$blood->glucose}}"/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <button type="submit" class="btn btn-primary center-block">Sukurti</button>
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
    </form>
@stop