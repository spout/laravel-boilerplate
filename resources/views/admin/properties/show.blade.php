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
                $td = $object->{$column};
                switch ($column) {
                    case 'property_type_id':
                        $td = $object->propertyType->title;
                        break;

                    case 'ical_url':
                        $td = !empty($td) ? sprintf('<a href="%1$s" target="_blank">%1$s</a>', $td) : '';
                        break;

                    case 'owner_email':
                        $td = !empty($td) ? sprintf('<a href="mailto:%1$s">%1$s</a>', $td) : '';
                        break;

                    case 'capacity':
                        $td = _i("%s persons", $td);
                        break;

                    case 'surface':
                        $td = _i("%s m<sup>2</sup>", $td);
                        break;

                    case 'check_in':
                    case 'check_out':
                        $td = !empty($td) ? _i("Yes") : _i("No");
                        break;

                    case 'created_at':
                    case 'updated_at':
                        $td = $td->format('d/m/Y H:i:s');
                        break;

                    default:
                        break;
                }
                ?>
                <tr>
                    <th>{{ $label }}</th>
                    <td>{!! $td !!}</td>
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
                        <table class="table table-condensed table-striped table-bordered" id="property-bookings-table-{{ $nav }}" data-ajax="{!! route('admin.properties.bookings-datatables', ['scope' => $nav]) !!}">
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
    $('#property-bookings-table-future, #property-bookings-table-expired').DataTable({
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
      ],
      language: {!! json_encode(\App\DataTables\DataTable::getLanguage()) !!}
    });
  });
</script>
@endpush