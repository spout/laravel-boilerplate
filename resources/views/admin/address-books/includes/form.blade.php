{!! Form::model($object, [
    'route' => empty($object->pk) ? ['admin.address-books.store'] : ['admin.address-books.update', $object->pk],
    'method' => empty($object->pk) ? 'POST' : 'PUT'
]) !!}

{!! Form::openGroup('address_bookable', _i('Association')) !!}
{!! Form::select('address_bookable', $addressBookableList, $object->pk ? get_class($object->addressBookable) . '.' . $object->pk : null) !!}
{!! Form::closeGroup() !!}

{!! Form::openGroup('company', _i('Company')) !!}
{!! Form::text('company') !!}
{!! Form::closeGroup() !!}

<div class="row">
    <div class="col">
        {!! Form::openGroup('firstname', _i('Firstname')) !!}
        {!! Form::text('firstname') !!}
        {!! Form::closeGroup() !!}
    </div>
    <div class="col">
        {!! Form::openGroup('lastname', _i('Lastname')) !!}
        {!! Form::text('lastname') !!}
        {!! Form::closeGroup() !!}
    </div>
</div>

{!! Form::openGroup('email', _i('Email')) !!}
{!! Form::email('email') !!}
{!! Form::closeGroup() !!}

<div class="row">
    <div class="col">
        {!! Form::openGroup('phone', _i('Phone')) !!}
        {!! Form::tel('phone') !!}
        {!! Form::closeGroup() !!}
    </div>
    <div class="col">
        {!! Form::openGroup('mobile', _i('Mobile')) !!}
        {!! Form::tel('mobile') !!}
        {!! Form::closeGroup() !!}
    </div>
    <div class="col">
        {!! Form::openGroup('fax', _i('Fax')) !!}
        {!! Form::tel('fax') !!}
        {!! Form::closeGroup() !!}
    </div>
</div>

@include('includes.google-place-autocomplete', ['domId' => 'location'])

<div class="row">
    <div class="col">
        {!! Form::openGroup('lat', _i('Latitude')) !!}
        {!! Form::number('lat', null, ['step' => 'any']) !!}
        {!! Form::closeGroup() !!}
    </div>
    <div class="col">
        {!! Form::openGroup('lng', _i('Longitude')) !!}
        {!! Form::number('lng', null, ['step' => 'any']) !!}
        {!! Form::closeGroup() !!}
    </div>
</div>

{!! Form::openGroup('country', _i('Country')) !!}
{!! Form::select('country', $countryList) !!}
{!! Form::closeGroup() !!}

<div class="row">
    <div class="col-4">
        {!! Form::openGroup('postcode', _i('Postcode')) !!}
        {!! Form::text('postcode') !!}
        {!! Form::closeGroup() !!}
    </div>
    <div class="col-8">
        {!! Form::openGroup('city', _i('City')) !!}
        {!! Form::text('city') !!}
        {!! Form::closeGroup() !!}
    </div>
</div>

{!! Form::openGroup('address', _i('Address')) !!}
{!! Form::text('address') !!}
{!! Form::closeGroup() !!}

{!! Form::submit(_i('Save'), ['class' => 'btn btn-primary']) !!}

{!! Form::close() !!}