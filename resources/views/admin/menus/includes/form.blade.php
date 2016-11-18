{!! Form::model($object, [
    'route' => empty($object->id) ? ['admin.menus.store'] : ['admin.menus.update', $object->id],
    'method' => empty($object->id) ? 'POST' : 'PUT'
]) !!}

{!! Form::openGroup('title', __('Title')) !!}
{!! Form::text('title') !!}
{!! Form::closeGroup() !!}

{!! Form::openGroup('slug', __('Slug')) !!}
{!! Form::text('slug') !!}
{!! Form::closeGroup() !!}

@foreach($object->menuItems as $item)
    <div class="panel panel-default">
        <div class="panel-heading">
            {{ __("Menu item %d", $loop->iteration) }}
            <button type="button" class="btn btn-danger btn-xs pull-right">{{ __("Delete") }}</button>
        </div>
        <div class="panel-body">
            <?php
            $fields = [
                'association' => __("Associated page"),
                'title' => __("Title"),
                'url' => __("URL"),
                //'route' => __("Route"),
                'sort' => __("Sort order"),
            ];
            ?>
            @foreach($fields as $field => $label)
                {!! Form::openGroup(sprintf('menuItems[%d][%s]', $loop->parent->index, $field), $label) !!}
                @if ($field == 'association')
                    {!! Form::select(sprintf('menuItems[%d][%s]', $loop->parent->index, $field), $associations, sprintf('%s:%s', $item->model, $item->foreign_key), ['class' => 'form-control']) !!}
                @elseif ($field == 'route')
                    {!! Form::textarea(sprintf('menuItems[%d][%s]', $loop->parent->index, $field), null, ['class' => 'form-control', 'rows' => 3]) !!}
                @else
                    {!! Form::text(sprintf('menuItems[%d][%s]', $loop->parent->index, $field), null, ['class' => 'form-control']) !!}
                @endif
                {!! Form::closeGroup() !!}
            @endforeach
        </div>
    </div>
@endforeach

{!! Form::submit(__('Save'), ['class' => 'btn btn-primary']) !!}

{!! Form::close() !!}