{!! Form::model($object, [
    'route' => empty($object->id) ? ['admin.menus.store'] : ['admin.menus.update', $object->id],
    'method' => empty($object->id) ? 'POST' : 'PUT'
]) !!}

{!! Form::openGroup('title', _i('Title')) !!}
{!! Form::text('title') !!}
{!! Form::closeGroup() !!}

{!! Form::openGroup('slug', _i('Slug')) !!}
{!! Form::text('slug') !!}
{!! Form::closeGroup() !!}

@foreach($object->menuItems as $item)
    <div class="panel panel-default">
        <div class="panel-heading">
            {{ _i("Menu item %d", $loop->iteration) }}
        </div>
        <div class="panel-body">
            {!! Form::hidden("menuItems[{$loop->index}][id]") !!}
            <?php
            $fields = [
                'association' => _i("Associated page"),
                'title' => _i("Title"),
                'url' => _i("URL"),
                'route' => _i("Route"),
                'sort' => _i("Sort order"),
                'delete' => _i("Delete ?")
            ];
            ?>
            @foreach($fields as $field => $label)
                {!! Form::openGroup("menuItems[{$loop->parent->index}][$field]", $label) !!}
                @if ($field == 'association')
                    {!! Form::select("menuItems[{$loop->parent->index}][$field]", $associations, "{$item->model}.{$item->foreign_key}") !!}
                @elseif ($field == 'route')
                    {!! Form::textarea("menuItems[{$loop->parent->index}][$field]", null, ['rows' => 3]) !!}
                @elseif ($field == 'sort')
                    {!! Form::number("menuItems[{$loop->parent->index}][$field]") !!}
                @elseif ($field == 'delete')
                    {!! Form::checkbox("menuItems[{$loop->parent->index}][$field]") !!}
                @else
                    {!! Form::text("menuItems[{$loop->parent->index}][$field]") !!}
                @endif
                {!! Form::closeGroup() !!}
            @endforeach
        </div>
    </div>
@endforeach

{!! Form::submit(_i('Save'), ['class' => 'btn btn-primary']) !!}

{!! Form::close() !!}