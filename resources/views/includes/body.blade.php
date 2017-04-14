<div class="panel panel-default click">
    <div class="panel-heading">
        <div class="panel-title">
            <a class="btn-block clickable"role="button" data-toggle="collapse" data-target="#collapseBody{{isset($body) ? $body->id : ''}}" aria-expanded="true">Kūno
                kompleksijos analizė<p class="pull-right">@if(isset($body))({{$body->created}})@endif</p></a>
        </div>
    </div>
    <div id="collapseBody{{isset($body) ? $body->id : ''}}" class="panel-collapse collapse">
        <div class="panel-body text-justify">
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="biological_age">Biologinis amžius</label>
                        <input type="number" class="form-control" name="biological_age{{isset($body) ? '[]' : ''}}"
                               placeholder="27" value="@if(isset($body)){{$body->biological_age}}@endif"/>
                    </div>
                    <div class="form-group">
                        <label for="body_fluid">Procentinė kūno skysčių išraiška</label>
                        <input type="text" class="form-control" name="body_fluid{{isset($body) ? '[]' : ''}}"
                               placeholder="" value="@if(isset($body)){{$body->body_fluid}}@endif"/>
                    </div>
                    <div class="form-group">
                        <label for="abdominal_fat">Pilvo riebalų lygis</label>
                        <input type="text" class="form-control" name="abdominal_fat{{isset($body) ? '[]' : ''}}"
                               placeholder="" value="@if(isset($body)){{$body->abdominal_fat}}@endif"/>
                    </div>
                    <div class="form-group">
                        <label for="body_weight">Svoris</label>
                        <input type="number" class="form-control" name="body_weight{{isset($body) ? '[]' : ''}}" placeholder="80"
                               value="@if(isset($body)){{$body->weight}}@endif"/>
                    </div>
                    <div class="form-group">
                        <label for="fat_expression">Procentinė riebalų išraiška</label>
                        <input type="text" class="form-control" name="fat_expression{{isset($body) ? '[]' : ''}}"
                               placeholder="" value="@if(isset($body)){{$body->fat_expression}}@endif"/>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="muscle_mass">Raumenų masė</label>
                        <input type="text" class="form-control" name="muscle_mass{{isset($body) ? '[]' : ''}}"
                               placeholder="" value="@if(isset($body)){{$body->muscle_mass}}@endif"/>
                    </div>
                    <div class="form-group">
                        <label for="bone_mass">Kaulų masė</label>
                        <input type="text" class="form-control" name="bone_mass{{isset($body) ? '[]' : ''}}"
                               placeholder="" value="@if(isset($body)){{$body->bone_mass}}@endif"/>
                    </div>
                    <div class="form-group">
                        <label for="kmi">Kūno masės indeksas (KMI)</label>
                        <input type="number" class="form-control" name="kmi{{isset($body) ? '[]' : ''}}" placeholder=""
                               value="@if(isset($body)){{$body->kmi}}@endif"/>
                    </div>
                    <div class="form-group">
                        <label for="calorie_intake">Dienos kalorijų norma</label>
                        <input type="text" class="form-control" name="calorie_intake{{isset($body) ? '[]' : ''}}"
                               placeholder="" value="@if(isset($body)){{$body->calorie_intake}}@endif"/>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>