<div class="col-sm-3">
    {!! Form::openGroup("custom_fields[$k][name]", _i('Name')) !!}
    {!! Form::text("custom_fields[$k][name]", $customField['name']) !!}
    {!! Form::closeGroup() !!}
</div>
<div class="col-sm-9">
    {!! Form::openGroup("custom_fields[$k][value]", _i('Value')) !!}
    {!! Form::textarea("custom_fields[$k][value]", $customField['value'], ['rows' => 3]) !!}
    {!! Form::closeGroup() !!}
</div>