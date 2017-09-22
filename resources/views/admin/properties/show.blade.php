@extends('layouts.admin')

@include('includes.datatables.assets')

@section('title', $object)

@section('content')
    <?php
    $columns = [
        'id' => _i("ID"),
        'name' => _i("Name"),
        'address' => _i("Address"),
        'property_type_id' => _i("Type"),
        'ical_url' => _i("iCal URL"),
        'owner_name' => _i("Owner name"),
        'owner_email' => _i("Owner email"),
        'beds_single' => _i("Number of single beds"),
        'beds_double' => _i("Number of double beds"),
        'bathrooms' => _i("Number of bathrooms"),
        'capacity' => _i("Maximum capacity"),
        'surface' => _i("Surface"),
        'check_in' => _i("Needs check-in?"),
        'check_out' => _i("Needs check-out?"),
        'household_hours' => _i("Household hours"),
        'keys' => _i("Number of keys"),
        'keys_photo' => _i("Keys photo"),
        'custom_fields_html' => _i("Custom fields"),
        'created_at' => _i("Created"),
        'updated_at' => _i("Updated"),
    ];
    ?>

    <div class="panel panel-default">
        <div class="panel-heading">
            <h1 class="panel-title">{{ $object->name }}</h1>
        </div>

        <table class="table table-condensed table-bordered">
            <tbody>
            @foreach($columns as $column => $label)
                <?php
                $value = $object->{$column};
                switch ($column) {
                    case 'property_type_id':
                        $value = $object->propertyType->title;
                        break;

                    case 'ical_url':
                        $value = !empty($value) ? sprintf('<a href="%1$s" target="_blank">%1$s</a>', $value) : '';
                        break;

                    case 'owner_email':
                        $value = !empty($value) ? sprintf('<a href="mailto:%1$s">%1$s</a>', $value) : '';
                        break;

                    case 'capacity':
                        $value = _i("%s persons", $value);
                        break;

                    case 'surface':
                        $value = _i("%s m<sup>2</sup>", $value);
                        break;

                    case 'check_in':
                    case 'check_out':
                        $value = !empty($value) ? _i("Yes") : _i("No");
                        break;

                    case 'keys_photo':
                        if (!empty($value)) {
                            $value = sprintf('<a href="%s"><img src="%s" alt=""></a>', url($value), route('imagecache', ['template' => 'small', 'filename' => $value]));
                        }
                        break;

                    case 'created_at':
                    case 'updated_at':
                        $value = $value->format('d/m/Y H:i:s');
                        break;

                    default:
                        break;
                }
                ?>
                <tr>
                    <th>{{ $label }}</th>
                    <td>{!! $value !!}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading">
            <h2 class="panel-title">{{ _i("Bookings") }}</h2>
        </div>

        <div class="panel-body">
            <?php
            $navs = [
                'future' => _i("Future"),
                'expired' => _i("Expired"),
            ];
            ?>
            <ul class="nav nav-tabs" role="tablist">
                @foreach($navs as $nav => $title)
                    <li class="{{ $loop->first ? 'active' : '' }}"><a href="#{{ $nav }}" data-toggle="tab">{{ $title }}</a></li>
                @endforeach
            </ul>

            <div class="tab-content">
                @foreach($navs as $nav => $title)
                    <div class="{{ $loop->first ? 'tab-pane active' : 'tab-pane' }}" id="{{ $nav }}">
                        <table class="table table-condensed table-striped table-bordered property-bookings-table" data-ajax="{!! route('admin.properties.booking-datatables', ['id' => $object->id, 'scope' => $nav]) !!}" style="width: 100%">
                            <thead>
                            <tr>
                                <th>{{ _i("ID") }}</th>
                                <th>{{ _i("Name") }}</th>
                                <th>{{ _i("Arrival date") }}</th>
                                <th>{{ _i("Departure date") }}</th>
                                <th>{{ _i("Nights") }}</th>
                                <th>{{ _i("Phone") }}</th>
                                <th>{{ _i("Email") }}</th>
                                <th>{{ _i("Sent") }}</th>
                                <th>{{ _i("Send email") }}</th>
                                <th>{{ _i("Action") }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
  $(function() {
    $('.property-bookings-table').DataTable({
      processing: true,
      serverSide: true,
      columns: [
        {data: 'id', name: 'id'},
        {data: 'name', name: 'name'},
        {data: 'arrival_date', name: 'arrival_date'},
        {data: 'departure_date', name: 'departure_date'},
        {data: 'nights', name: 'nights'},
        {data: 'phone', name: 'phone'},
        {data: 'email', name: 'email'},
        {data: 'sent', name: 'sent'},
        {data: 'send', name: 'send'},
        {data: 'action', name: 'action'}
      ],
      language: {!! json_encode(\App\DataTables\DataTable::getLanguage()) !!}
    });
  });
</script>
@endpush