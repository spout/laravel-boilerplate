@if ($moduleModelInstances->isNotEmpty())
    <h3>{{ _i("Related products") }}</h3>
    <ul>
        @foreach($moduleModelInstances as $instance)
            <li><a href="{{ $instance->module->absolute_url }}">{{ $instance->module->title }}</a></li>
        @endforeach
    </ul>
@endif