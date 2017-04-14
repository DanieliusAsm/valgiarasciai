<div class="panel panel-default click">
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
                               placeholder="Petras" value="@if($errors->has('first_name')){{old('first_name')}}@elseif(isset($user)){{$user->first_name}}@endif"/>
                        @if($errors->has('first_name')) <p class="help-block">{
                            {$errors->first('first_name')}}</p>@endif
                    </div>
                    <div class="form-group @if($errors->has('last_name')) has-error @endif">
                        <label class="control-label" for="last_name">*Pavardė</label>
                        <input type="text" class="form-control" name="last_name" id="last_name"
                               placeholder="Petrauskas" value="@if($errors->has('last_name')){{old('last_name')}}@elseif(isset($user)){{$user->last_name}}@endif"/>
                        @if($errors->has('last_name')) <p
                                class="help-block">{{$errors->first('last_name')}}</p>@endif
                    </div>
                    <div class="form-group">
                        <label for="gender">Lytis</label><br/>
                        <label class="radio-inline" id="gender">
                            <input type="radio" name="gender" value="vyras" @if(isset($user) && $user->gender == "vyras")checked @endif>Vyras
                        </label>
                        <label class="radio-inline" id="gender">
                            <input type="radio" name="gender" value="moteris" @if(isset($user) && $user->gender == "moteris")checked @endif>Moteris
                        </label>
                    </div>
                    <div class="form-group @if($errors->has('age')) has-error @endif">
                        <label class="control-label" for="age">*Amžius</label>
                        <input type="number" class="form-control" name="age" id="age" placeholder="30"
                               value="@if($errors->has('age')){{old('age')}}@elseif(isset($user)){{$user->age}}@endif"/>
                        @if($errors->has('age')) <p class="help-block">{{$errors->first('age')}}</p>@endif
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group @if($errors->has('phone')) has-error @endif">
                        <label class="control-label" for="phone">*Telefono numeris</label>
                        <input type="text" class="form-control" name="phone" id="phone"
                               placeholder="860652656" value="@if($errors->has('phone')){{old('phone')}}@elseif(isset($user)){{$user->phone}}@endif"/>
                        @if($errors->has('phone')) <p
                                class="help-block">{{$errors->first('phone')}}</p>@endif
                    </div>
                    <div class="form-group @if($errors->has('email')) has-error @endif">
                        <label class="control-label" for="email">*El. paštas</label>
                        <input type="email" class="form-control" name="email" id="email"
                               placeholder="petras@example.com" value="@if($errors->has('email')){{old('email')}}@elseif(isset($user)){{$user->email}}@endif"/>
                        @if($errors->has('email')) <p
                                class="help-block">{{$errors->first('email')}}</p>@endif
                    </div>
                    <div class="form-group">
                        <label for="diet">Pritaikyta dieta</label>
                        <input type="text" class="form-control" name="diet" id="diet"
                               placeholder="Cukrinis diabetas" value="@if($errors->has('diet')){{old('diet')}}@elseif(isset($user)){{$user->diet}}@endif"/>
                    </div>
                    <div class="form-group">
                        <label for="notes">Pastabos</label>
                        <input type="text" class="form-control" name="notes" id="notes"
                               placeholder="Pastaba" value="@if($errors->has('notes')){{old('notes')}}@elseif(isset($user)){{$user->notes}}@endif"/>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>