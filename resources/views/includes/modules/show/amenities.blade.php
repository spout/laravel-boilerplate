@if ($moduleModelInstances->isNotEmpty())
    <h3>{{ _i("Amenities") }}</h3>
    <ul>
        @foreach($moduleModelInstances as $instance)
            <li>{{ $instance->amenity->name }}</li>
        @endforeach
    </ul>
@endif