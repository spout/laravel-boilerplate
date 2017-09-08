@extends('layouts.admin')

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

    echo '<ul>';
    foreach ($object->icalUrlAsObject->VEVENT as $vevent) {
        echo "<li>{$vevent->SUMMARY}</li>";
    }
    echo '</ul>';
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

        <table class="table table-condensed table-striped table-bordered">
            <thead>
            <tr>
                <th>{{ _i("ID") }}</th>
                <th>{{ _i("Name") }}</th>
                <th>{{ _i("Arrival date") }}</th>
                <th>{{ _i("Departure date") }}</th>
                <th>{{ _i("Nights") }}</th>
                <th>{{ _i("Phone") }}</th>
                <th>{{ _i("Email") }}</th>
                <th>{{ _i("Emails send") }}</th>
                <th>{{ _i("Actions") }}</th>
            </tr>
            </thead>
            <tbody>
            @if($object->bookings->count())
                @foreach($object->bookings as $booking)
                    <tr>
                        <td>{{ $booking->id }}</td>
                        <td>{{ $booking->name }}</td>
                        <td>{{ $booking->arrival_date->format('d/m/Y') }}</td>
                        <td>{{ $booking->departure_date->format('d/m/Y') }}</td>
                        <td>{{ $booking->nights }}</td>
                        <td><a href="tel:{{ $booking->phone }}">{{ $booking->phone }}</a></td>
                        <td><a href="mailto:{{ $booking->email }}">{{ $booking->email }}</a></td>
                        <td><span class="badge">{{ $booking->emails->count() }}</span></td>
                        <td>
                            <div class="btn-group btn-group-xs">
                                <a href="{{ route('admin.properties.send-email', ['id' => $booking->id, 'type' => 'traveler']) }}" class="btn btn-primary">{{ _i("Send emails") }}</a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="9">{{ _i("No record") }}</td>
                </tr>
            @endif
            </tbody>
        </table>
    </div>
@endsection