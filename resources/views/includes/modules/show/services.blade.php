@if ($moduleModelInstances->isNotEmpty())
    <h3>{{ _i("Services") }}</h3>
    <ul>
        @foreach($moduleModelInstances as $instance)
            <li>{{ $instance->module->name }}</li>
        @endforeach
    </ul>
@endif