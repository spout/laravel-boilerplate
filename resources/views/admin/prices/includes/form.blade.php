{!! Form::model($object, [
    'route' => empty($object->pk) ? ['admin.prices.store'] : ['admin.prices.update', $object->pk],
    'method' => empty($object->pk) ? 'POST' : 'PUT'
]) !!}

{!! Form::openGroup('product_id', _i('Product')) !!}
{!! Form::select('product_id', $productList->prepend('-', '')) !!}
{!! Form::closeGroup() !!}

{!! Form::openGroup('currency_code', _i('Currency')) !!}
{!! Form::select('currency_code', $currencyList->prepend('-', '')) !!}
{!! Form::closeGroup() !!}

<?php
$categories = range(1, 3);

$prices = [
    [
        'category' => [
            'fr' => 'Titre FR',
            'en' => 'Title EN',
        ],
        'items' => [
            [
                'title' => 'Title FR',
                'price' => '42',
                'date_start' => '',
                'date_end' => '',
            ]
        ]
    ]
];
?>

@foreach($categories as $k => $category)
    <fieldset>
        <div class="row">
            @foreach(config('app.locales') as $lang => $locale)
                <div class="col">
                    {!! Form::openGroup("prices[{$k}][category][{$lang}]", _i('Category (%s)', $lang)) !!}
                    {!! Form::text("prices[{$k}][category][{$lang}]") !!}
                    {!! Form::closeGroup() !!}
                </div>
            @endforeach
        </div>

        @foreach(range(1, 3) as $i)
        <div class="row">
            @foreach(config('app.locales') as $lang => $locale)
                <div class="col-md">
                    {!! Form::openGroup("prices[{$k}][items][title][{$lang}]", _i('Title (%s)', $lang)) !!}
                    {!! Form::text("prices[{$k}][items][title][{$lang}]") !!}
                    {!! Form::closeGroup() !!}
                </div>
            @endforeach
            <div class="col-md">
                {!! Form::openGroup("prices[{$k}][items][price]", _i('Price')) !!}
                {!! Form::number("prices[{$k}][items][price]") !!}
                {!! Form::closeGroup() !!}
            </div>
            <div class="col-md">
                {!! Form::openGroup("prices[{$k}][items][date_start]", _i('Start date')) !!}
                {!! Form::date("prices[{$k}][items][date_start]") !!}
                {!! Form::closeGroup() !!}
            </div>
            <div class="col-md">
                {!! Form::openGroup("prices[{$k}][items][date_end]", _i('End date')) !!}
                {!! Form::date("prices[{$k}][items][date_end]") !!}
                {!! Form::closeGroup() !!}
            </div>
        </div>
        @endforeach

    </fieldset>
@endforeach

{!! Form::submit(_i('Save'), ['class' => 'btn btn-primary']) !!}

{!! Form::close() !!}