{!! Form::open() !!}

<div class="row">
    <div class="col-sm-6">
        {!! Form::openGroup('lastname', _i('Lastname'), ['class' => 'required']) !!}
        {!! Form::text('lastname', null, ['required' => 'required']) !!}
        {!! Form::closeGroup() !!}
    </div>
    <div class="col-sm-6">
        {!! Form::openGroup('firstname', _i('Firstname'), ['class' => 'required']) !!}
        {!! Form::text('firstname', null, ['required' => 'required']) !!}
        {!! Form::closeGroup() !!}
    </div>
    <div class="col-sm-6">
        {!! Form::openGroup('company', _i('Company')) !!}
        {!! Form::text('company') !!}
        {!! Form::closeGroup() !!}
    </div>
    <div class="col-sm-6">
        {!! Form::openGroup('function', _i('Function')) !!}
        {!! Form::text('function') !!}
        {!! Form::closeGroup() !!}
    </div>
    <div class="col-sm-6">
        {!! Form::openGroup('email', _i('Email'), ['class' => 'required']) !!}
        {!! Form::email('email', null, ['required' => 'required']) !!}
        {!! Form::closeGroup() !!}
    </div>
    <div class="col-sm-6">
        {!! Form::openGroup('phone', _i('Phone'), ['class' => 'required']) !!}
        {!! Form::text('phone', null, ['required' => 'required']) !!}
        {!! Form::closeGroup() !!}
    </div>
</div>

{{--{!! Form::openGroup('subject', _i('Subject')) !!}--}}
{{--{!! Form::text('subject') !!}--}}
{{--{!! Form::closeGroup() !!}--}}

{!! Form::openGroup('message', _i('Message'), ['class' => 'required']) !!}
{!! Form::textarea('message', null, ['rows' => 5, 'required' => 'required']) !!}
{!! Form::closeGroup() !!}

{!! Form::button(_i('Send'), ['type' => 'submit', 'class' => 'btn btn-primary']) !!}

{!! Form::close() !!}