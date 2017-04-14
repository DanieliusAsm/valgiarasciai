<div class="panel panel-default click">
    <div class="panel-heading">
        <div class="panel-title">
            <a class="btn-block clickable" role="button" data-toggle="collapse" data-target="#collapseBlood{{isset($blood) ? $blood->id : ''}}" aria-expanded="true">Kraujo
                tyrimas<p class="pull-right">@if(isset($blood))({{$blood->created}})@endif</p></a>
        </div>
    </div>
    <div id="collapseBlood{{isset($blood) ? $blood->id : ''}}" class="panel-collapse collapse">
        <div class="panel-body text-justify">
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="blood_pressure">Arterinis kraujo spaudimas</label>
                        <input type="number" class="form-control" name="blood_pressure{{isset($blood) ? '[]' : ''}}" id="blood_pressure"
                               placeholder="" value="@if(isset($blood)){{$blood->blood_pressure}}@endif"/>
                    </div>
                    <div class="form-group">
                        <label for="">Pulsas</label>
                        <input type="number" class="form-control" name="pulse{{isset($blood) ? '[]' : ''}}" id="pulse" placeholder=""
                               value="@if(isset($blood)){{$blood->pulse}}@endif"/>
                    </div>
                    <div class="form-group">
                        <label for="cholesterol">Bendras cholesterolis</label>
                        <input type="number" class="form-control" name="cholesterol{{isset($blood) ? '[]' : ''}}" id="cholesterol"
                               placeholder="" value="@if(isset($blood)){{$blood->cholesterol}}@endif"/>
                    </div>
                    <div class="form-group">
                        <label for="mtl">MTL</label>
                        <input type="number" class="form-control" name="mtl{{isset($blood) ? '[]' : ''}}" id="mtl" placeholder=""
                               value="@if(isset($blood)){{$blood->mtl}}@endif"/>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="dtl">DTL</label>
                        <input type="number" class="form-control" name="dtl{{isset($blood) ? '[]' : ''}}" id="dtl" placeholder=""
                               value="@if(isset($blood)){{$blood->dtl}}@endif"/>
                    </div>
                    <div class="form-group">
                        <label for="triglycerides">Trigliceridai</label>
                        <input type="number" class="form-control" name="triglycerides{{isset($blood) ? '[]' : ''}}" id="triglycerides"
                               placeholder="" value="@if(isset($blood)){{$blood->triglycerides}}@endif"/>
                    </div>
                    <div class="form-group">
                        <label for="glucose">Gliukozė</label>
                        <input type="number" class="form-control" name="glucose{{isset($blood) ? '[]' : ''}}" id="glucose" placeholder=""
                               value="@if(isset($blood)){{$blood->glucose}}@endif"/>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>