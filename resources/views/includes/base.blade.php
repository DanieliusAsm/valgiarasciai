<div class="panel panel-default click">
    <div class="panel-heading">
        <div class="panel-title">
            <a class="btn-block clickable" role="button" data-toggle="collapse" data-target="#collapseBase{{isset($base) ? $base->id : ''}}" aria-expanded="true">Papildoma
                informacija
                <p class="pull-right">@if(isset($base))({{$base->created}})@endif</p></a>
        </div>
    </div>
    <div id="collapseBase{{isset($base) ? $base->id : ''}}" class="panel-collapse collapse">
        <div class="panel-body text-justify">
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="height">Ugis (cm)</label>
                        <input type="number" class="form-control" name="height{{isset($base) ? '[]' : ''}}"
                               placeholder="180" value="@if(isset($base)){{$base->height}}@endif"/>
                    </div>
                    <div class="form-group">
                        <label for="weight">Svoris</label>
                        <input type="number" class="form-control" name="weight{{isset($base) ? '[]' : ''}}" placeholder="80"
                               value="@if(isset($base)){{$base->weight}}@endif"/>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="wrist">Rieso apimtis (cm)</label>
                        <input type="number" class="form-control" name="wrist{{isset($base) ? '[]' : ''}}" placeholder="15"
                               value="@if(isset($base)){{$base->wrist}}@endif"/>
                    </div>
                    <div class="form-group">
                        <label for="waist">Liemuo</label>
                        <input type="number" class="form-control" name="waist{{isset($base) ? '[]' : ''}}" placeholder="70"
                               value="@if(isset($base)){{$base->waist}}@endif"/>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>