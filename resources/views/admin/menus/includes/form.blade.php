{!! Form::model($object, [
    'route' => empty($object->id) ? ['admin.menus.store'] : ['admin.menus.update', $object->id],
    'method' => empty($object->id) ? 'POST' : 'PUT'
]) !!}

<div class="form-group">
    {!! Form::label('title', __('Title'), ['class' => 'control-label']) !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

@foreach($object->menuItems as $item)
    <fieldset>
        <legend>{{ __("Menu item %d", $loop->iteration) }}</legend>
        <?php
        $fields = [
            'association' => __("Associated page"),
            'title' => __("Title"),
            'url' => __("URL"),
            'route' => __("Route"),
            'sort' => __("Sort order"),
        ];
        ?>
        @foreach($fields as $field => $label)
            <div class="form-group">
                {!! Form::label(sprintf('menuItems[%d][%s]', $loop->parent->index, $field), $label, ['class' => 'control-label']) !!}
                @if ($field == 'association')
                    {!! Form::select(sprintf('menuItems[%d][%s]', $loop->parent->index, $field), $associations, sprintf('%s:%s', $item->model, $item->foreign_key), ['class' => 'form-control']) !!}
                @elseif ($field == 'route')
                    {!! Form::textarea(sprintf('menuItems[%d][%s]', $loop->parent->index, $field), null, ['class' => 'form-control', 'rows' => 3]) !!}
                @else
                    {!! Form::text(sprintf('menuItems[%d][%s]', $loop->parent->index, $field), null, ['class' => 'form-control']) !!}
                @endif
            </div>
        @endforeach
        <div class="checkbox">
            <label>{!! Form::checkbox(sprintf('menuItems[%d][delete]', $loop->index), true) !!} {{ __("Delete") }}</label>
        </div>
    </fieldset>
@endforeach

{!! Form::submit(__('Save'), ['class' => 'btn btn-primary']) !!}

{!! Form::close() !!}