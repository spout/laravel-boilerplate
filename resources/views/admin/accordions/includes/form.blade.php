@include('includes.tinymce')

{!! Form::model($object, [
    'route' => empty($object->pk) ? ['admin.accordions.store'] : ['admin.accordions.update', $object->pk],
    'method' => empty($object->pk) ? 'POST' : 'PUT'
]) !!}

@include('includes.form-locales-tabs')

<div class="tab-content">
    @foreach(config('app.locales') as $lang => $locale)
        <div role="tabpanel" class="tab-pane{{ $lang == \LaravelLocalization::getCurrentLocale() ? ' active' : '' }}" id="lang-{{ $lang }}">
            {!! Form::openGroup("title_$lang", _i('Title (%s)', $lang)) !!}
            {!! Form::text("title_$lang") !!}
            {!! Form::closeGroup() !!}
        </div>
    @endforeach
</div>

<?php
$items = $object->accordionItems;
$count = $items->count();

for($i = 0; $i < 5; $i++) {
    $items->push(new \App\Models\AccordionItem(['sort' => $i + $count]));
}
?>

<div id="items">
    @foreach($items as $k => $item)
        <div class="card mb-3 draggable" style="cursor: move;">
            <div class="card-header">
                <div class="row">
                    @foreach(config('app.locales') as $lang => $locale)
                        <div class="col">
                            {!! Form::openGroup("items[$k][title_$lang]", _i('Title (%s)', $lang)) !!}
                            {!! Form::text("items[$k][title_$lang]", $item["title_$lang"] ?? null) !!}
                            {!! Form::closeGroup() !!}
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    @foreach(config('app.locales') as $lang => $locale)
                        <div class="col">
                            {!! Form::openGroup("items[$k][content_$lang]", _i('Content (%s)', $lang)) !!}
                            {!! Form::textarea("items[$k][content_$lang]", $item["content_$lang"] ?? null, ['class' => 'wysiwyg', 'style' => 'height: 100px']) !!}
                            {!! Form::closeGroup() !!}
                        </div>
                    @endforeach
                    {!! Form::hidden("items[$k][sort]", $item['sort'], ['class' => 'sort']) !!}
                </div>
            </div>
        </div>
    @endforeach
</div>

{!! Form::submit(_i('Save'), ['class' => 'btn btn-primary']) !!}

{!! Form::close() !!}

@push('scripts')
    <script>
        $(function () {
            var $items = $('#items');

            Sortable.create($items.get(0), {
                draggable: '.draggable',
                animation: 150,
                onEnd: function () {
                    $items.find('input.sort').each(function (index) {
                        $(this).val(index);
                    });
                }
            });
        });
    </script>
@endpush