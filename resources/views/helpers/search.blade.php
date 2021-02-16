<div class="col-md-3"></div>
<div class="col-md-6 pull-right">
    <form >
        <div class="form-group row">
            {!! Form::text("term", request()->term, ['class'=>'form', "placeholder"=>"Search Name"]); !!}
            <input type="submit" value="Search" class="btn btn-primary"/>
        </div>
    </form>
</div>
