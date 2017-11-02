<fieldset>
    <legend>{{ _i("Professional details") }}</legend>

    {!! Form::openGroup('professional_customer_name', _i("Professional customer name"), ['class' => 'required']) !!}
    {!! Form::text('professional_customer_name', null, ['required' => 'required']) !!}
    {!! Form::closeGroup() !!}

    {!! Form::openGroup('provider', _i("Provider"), ['class' => 'required']) !!}
    @foreach(setting('after-sales-services.providers', []) as $key => $value)
        {!! Form::radio('provider', $key, $value) !!}
    @endforeach
    {!! Form::closeGroup() !!}

    {!! Form::openGroup('type', _i("Frame type"), ['class' => 'required']) !!}
    @foreach(setting('after-sales-services.types', []) as $key => $value)
        {!! Form::radio('type', $key, $value) !!}
    @endforeach
    {!! Form::closeGroup() !!}

    {!! Form::openGroup('order_number', _i("Initial order number"), ['class' => 'required']) !!}
    {!! Form::text('order_number', null, ['required' => 'required']) !!}
    {!! Form::closeGroup() !!}
</fieldset>

<fieldset>
    <legend>{{ _i("Professional responsible of the construction site") }}</legend>

    {!! Form::openGroup('professional_name', _i("Name")) !!}
    {!! Form::text('professional_name') !!}
    {!! Form::closeGroup() !!}

    {!! Form::openGroup('professional_phone', _i("Phone")) !!}
    {!! Form::text('professional_phone') !!}
    {!! Form::closeGroup() !!}

    {!! Form::openGroup('professional_email', _i("Email")) !!}
    {!! Form::email('professional_email') !!}
    {!! Form::closeGroup() !!}
</fieldset>

<fieldset>
    <legend>{{ _i("Final customer details") }}</legend>

    {!! Form::openGroup('customer_name', _i("Name"), ['class' => 'required']) !!}
    {!! Form::text('customer_name', null, ['required' => 'required']) !!}
    {!! Form::closeGroup() !!}

    {!! Form::openGroup('customer_phone', _i("Phone"), ['class' => 'required']) !!}
    {!! Form::text('customer_phone', null, ['required' => 'required']) !!}
    {!! Form::closeGroup() !!}

    {!! Form::openGroup('customer_email', _i("Email")) !!}
    {!! Form::email('customer_email') !!}
    {!! Form::closeGroup() !!}

    {!! Form::openGroup('construction_site_address', _i("Construction site address"), ['class' => 'required']) !!}
    {!! Form::textarea('construction_site_address', null, ['required' => 'required', 'rows' => 2]) !!}
    {!! Form::closeGroup() !!}
</fieldset>

<fieldset>
    <legend>{{ _i("Problem details") }}</legend>

    {!! Form::openGroup('position', _i("Frame position")) !!}
    {!! Form::text('position') !!}
    {!! Form::closeGroup() !!}

    {!! Form::openGroup('description', _i("Problem description"), ['class' => 'required']) !!}
    {!! Form::textarea('description', null, ['required' => 'required', 'rows' => 4]) !!}
    {!! Form::closeGroup() !!}

    {!! Form::openGroup('photo', _i("Photo"), ['class' => 'required']) !!}
    {!! Form::file('photo') !!}
    {!! Form::closeGroup() !!}
</fieldset>