<ul class="nav nav-tabs mb-2">
    <li class="nav-item">
        <a href="{{ route('admin.products.edit', ['id' => $object->id]) }}" class="nav-link">{{ _i("General") }}</a>
    </li>
    @foreach($object->template->modules as $module)
        <li class="nav-item">
            <a href="{{ route('admin.products.edit-module', ['pk' => $object->pk, 'placeholderId' => $module->pivot->id]) }}" class="nav-link {{ isset($placeholderId) && $module->pivot->id == $placeholderId ? 'active' : '' }}">{{ $module->title }} ({{ $module->pivot->placeholder }})</a>
        </li>
    @endforeach
</ul>