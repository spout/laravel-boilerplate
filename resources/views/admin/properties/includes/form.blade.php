@include('includes.google-place-autocomplete', ['domId' => 'address'])
@include('includes.elfinder-standalonepopup')

{!! Form::model($object, [
    'route' => empty($object->id) ? ['admin.properties.store'] : ['admin.properties.update', $object->id],
    'method' => empty($object->id) ? 'POST' : 'PUT'
]) !!}

{!! Form::openGroup('name', _i('Property name')) !!}
{!! Form::text('name') !!}
{!! Form::closeGroup() !!}

{!! Form::openGroup('ical_url', _i('iCal URL')) !!}
{!! Form::url('ical_url') !!}
{!! Form::closeGroup() !!}

{!! Form::openGroup('property_type_id', _i('Type')) !!}
{!! Form::select('property_type_id', $propertyTypeList) !!}
{!! Form::closeGroup() !!}

{!! Form::openGroup('address', _i('Address')) !!}
{!! Form::text('address') !!}
{!! Form::closeGroup() !!}

<div id="map-canvas"></div>

<div class="row">
    <div class="col-sm-6">
        {!! Form::openGroup('lat', _i('Latitude')) !!}
        {!! Form::number('lat', null, ['step' => 'any', 'readonly' => true]) !!}
        {!! Form::closeGroup() !!}
    </div>
    <div class="col-sm-6">
        {!! Form::openGroup('lng', _i('Longitude')) !!}
        {!! Form::number('lng', null, ['step' => 'any', 'readonly' => true]) !!}
        {!! Form::closeGroup() !!}
    </div>
</div>

<div class="row">
    <div class="col-sm-4">
        {!! Form::openGroup('owner_name', _i('Owner name')) !!}
        {!! Form::text('owner_name') !!}
        {!! Form::closeGroup() !!}
    </div>
    <div class="col-sm-4">
        {!! Form::openGroup('owner_phone', _i('Owner phone')) !!}
        {!! Form::text('owner_phone') !!}
        {!! Form::closeGroup() !!}
    </div>
    <div class="col-sm-4">
        {!! Form::openGroup('owner_email', _i('Owner email')) !!}
        {!! Form::email('owner_email') !!}
        {!! Form::closeGroup() !!}
    </div>
</div>

<div class="row">
    <div class="col-sm-6">
        {!! Form::openGroup('beds_double', _i('Number of double beds')) !!}
        {!! Form::number('beds_double') !!}
        {!! Form::closeGroup() !!}
    </div>
    <div class="col-sm-6">
        {!! Form::openGroup('beds_single', _i('Number of single beds')) !!}
        {!! Form::number('beds_single') !!}
        {!! Form::closeGroup() !!}
    </div>
</div>

{!! Form::openGroup('bathrooms', _i('Number of bathrooms')) !!}
{!! Form::number('bathrooms') !!}
{!! Form::closeGroup() !!}

{!! Form::openGroup('capacity', _i('Maximum capacity')) !!}
{!! Form::number('capacity') !!}
{!! Form::closeGroup() !!}

{!! Form::openGroup('surface', _i('Surface')) !!}
{!! Form::number('surface') !!}
{!! Form::closeGroup() !!}

{!! Form::openGroup('check_in', _i('Needs check-in?')) !!}
{!! Form::checkbox('check_in') !!}
{!! Form::closeGroup() !!}

{!! Form::openGroup('check_out', _i('Needs check-out?')) !!}
{!! Form::checkbox('check_out') !!}
{!! Form::closeGroup() !!}

{!! Form::openGroup('household_hours', _i('Household hours')) !!}
{!! Form::time('household_hours', null, ['step' => 30 * 60, 'min' => '00:30']) !!}
{!! Form::closeGroup() !!}

{!! Form::openGroup('keys', _i('Number of keys')) !!}
{!! Form::number('keys') !!}
{!! Form::closeGroup() !!}

{!! Form::openGroup('keys_photo', _i('Keys photo')) !!}
<div class="input-group">
    {!! Form::text('keys_photo') !!}
    <div class="input-group-addon">
        <a href="#" class="popup_selector" data-inputid="keys_photo">{{ _i("Select photo") }}</a>
    </div>
</div>
{!! Form::closeGroup() !!}

<fieldset>
    <legend>{{ _i("Custom fields") }}</legend>
    <?php
    $customFields = $object->custom_fields;
    if (!is_array($customFields)) {
        $customFields = [];
    }
    $customFields = array_merge($customFields, array_fill(0, 1, ['name' => '', 'value' => '']));
    ?>
    <div class="row" id="custom-fields" data-count="{{ count($customFields) }}">
        @foreach($customFields as $k => $customField)
            @include('admin.properties.includes.custom-fields-inputs', compact('k', 'customField'))
        @endforeach
    </div>
    <div id="custom-fields-empty-form" class="hidden">
        <?php
        $k = '__index__'
        ?>
        @include('admin.properties.includes.custom-fields-inputs', compact('k', 'customField'))
    </div>
    <p>
        <button type="button" class="btn btn-default btn-sm" id="custom-field-add">{{ _i("Add custom field") }}</button>
    </p>
</fieldset>

{!! Form::submit(_i('Save'), ['class' => 'btn btn-primary']) !!}

{!! Form::close() !!}

@push('scripts')
    <script>
        $(function () {
          $('#custom-field-add').on('click', function (e) {
            var $customFields = $('#custom-fields');
            var formIndex = parseInt($customFields.attr('data-count'));
            $customFields.append($('#custom-fields-empty-form').html().replace(/__index__/g, formIndex));
            $customFields.attr('data-count', formIndex + 1);
          });
        });
    </script>
@endpush