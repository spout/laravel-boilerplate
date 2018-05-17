@if (!empty($object->template))
    <ul class="nav nav-tabs mb-2">
        <li class="nav-item">
            <a href="{{ route('admin.products.edit', ['id' => $object->id]) }}" class="nav-link {{ request()->route()->getName() === 'admin.products.edit' ? 'active' : '' }}">{{ _i("General") }}</a>
        </li>
        @foreach($object->template->modules as $module)
            @if (in_array($module->pivot->placeholder, $object->template->placeholders))
                <li class="nav-item">
                    <a href="{{ route('admin.products.edit-module', ['pk' => $object->pk, 'placeholderId' => $module->pivot->id]) }}" class="nav-link {{ isset($placeholder->id) && $module->pivot->id == $placeholder->id ? 'active' : '' }}">{{ $module->title }} ({{ $module->pivot->title ?? $module->pivot->placeholder }})</a>
                </li>
            @endif
        @endforeach
    </ul>
@endif