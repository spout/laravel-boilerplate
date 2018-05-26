@include('includes.tinymce')

@foreach(config('app.locales') as $lang => $locale)
    {!! Form::openGroup("title_$lang", _i('Title (%s)', $lang)) !!}
    {!! Form::text("title_$lang") !!}
    {!! Form::closeGroup() !!}
@endforeach

<?php
if ($object instanceof \App\Models\Accordion) {
    $items = $object->accordionItems;
} else {
    $items = $moduleModelInstance->accordionItems;
}

$count = $items->count();

for($i = 0; $i < 5; $i++) {
    $items->push(new \App\Models\AccordionItem(['sort' => $i + $count]));
}
?>

<fieldset>
    <legend>{{ _i("Accordion items") }}</legend>
    <div id="items">
        @foreach($items as $k => $item)
            <div class="card mb-3 draggable">
                <div class="card-header">
                    <div class="sortable-handle pull-right" style="cursor: move;">
                        <i class="fa fa-arrows"></i>
                    </div>
                    @foreach(config('app.locales') as $lang => $locale)
                        {!! Form::openGroup("items[$k][title_$lang]", _i('Title (%s)', $lang)) !!}
                        {!! Form::text("items[$k][title_$lang]", $item["title_$lang"] ?? null) !!}
                        {!! Form::closeGroup() !!}
                    @endforeach
                </div>
                <div class="card-body p-1">
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
        @endforeach
    </div>
</fieldset>

@push('scripts')
    <script>
        $(function () {
            var $items = $('#items');

            Sortable.create($items.get(0), {
                handle: '.sortable-handle',
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