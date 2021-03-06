@extends(request()->isXmlHttpRequest() ? 'layouts.ajax' : 'products.layout')

<?php
/** @var $category \App\Models\Category */
?>
@section('title', !empty($category) ? $category->title_plural : _i("Products"))

@breadcrumb(['url' => route('products.index'), 'title' => _i("Products")])
@if (!empty($category))
    @breadcrumb(['url' => $category->absolute_url, 'title' => $category->title_plural])
@endif

@section('content')
    @if (request()->isXmlHttpRequest())
        @include('products.includes.list')
    @else
        <div class="sticky-top bg-white py-2" id="filters">
            <ul class="nav nav-pills">
                @if (!empty($categories))
                    <li class="nav-item dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" data-toggle="dropdown">
                            {{ _i("Categories") }}
                        </button>
                        <div class="dropdown-menu">
                            @foreach($categories as $cat)
                                <a href="{{ route('products.category', ['category_slug_plural' => $cat->slug_plural]) }}" class="dropdown-item">{{ $cat->title_plural }}</a>
                            @endforeach
                        </div>
                    </li>
                @endif

                @if (!empty($category))
                    <li class="nav-item dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" data-toggle="dropdown">
                            {{ _i("Tags") }}
                        </button>
                        <div class="dropdown-menu">
                            <div class="px-2">
                                @foreach($category->tags as $tag)
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="tag-{{ $tag->id }}" name="tags[]" value="{{ $tag->id }}">
                                        <label class="custom-control-label" for="tag-{{ $tag->id }}">{{ $tag->name }}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </li>

                    <li class="nav-item dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" data-toggle="dropdown">
                            {{ _i("Neighborhoods") }}
                        </button>
                        <div class="dropdown-menu">
                            <div class="px-2">
                                @foreach($neighborhoods as $neighborhood)
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="neighborhood-{{ $neighborhood->id }}" name="neighborhoods[]" value="{{ $neighborhood->id }}">
                                        <label class="custom-control-label" for="neighborhood-{{ $neighborhood->id }}">{{ $neighborhood->name }}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </li>

                    <li class="nav-item pt-2" id="filters-buttons">
                        <button type="submit" class="btn btn-primary btn-sm">{{ _i("Go") }}</button>
                        <button type="reset" class="btn btn-warning btn-sm">{{ _i("Reset") }}</button>
                    </li>
                @endif
            </ul>
        </div>

        <div id="loading" class="d-none mb-2"><i class="fa fa-spinner fa-pulse fa-2x fa-fw"></i></div>
        <div id="products-list">
            @include('products.includes.list')
        </div>
    @endif
@endsection

@push('scripts')
<script>
    var productsIndexUrl = '{{ route('products.index') }}';

    $(function () {
        $('#filters-buttons button').on('click', function (e) {
            e.preventDefault();

            if ($(this).attr('type') === 'reset') {
                $('#filters input').prop('checked', false);
            }

            loadList();
        });

        $(document).on('click', '#products-list .pagination a', function (e) {
            e.preventDefault();

            let params = (new URL($(this).attr('href'))).searchParams;
            let page = params.get('page');

            loadList(page);
        });

        $('#filters .dropdown-menu').on('click', function (e) {
            e.stopPropagation();
        });
    });

    function loadList(page) {
        page = page || 1;

        let tags = $('input[name="tags[]"]:checked').map(function(i, e) {
            return e.value
        }).toArray();

        let neighborhoods = $('input[name="neighborhoods[]"]:checked').map(function(i, e) {
            return e.value
        }).toArray();

        $('#products-list').load(productsIndexUrl, {
            page: page,
            tags: tags,
            neighborhoods: neighborhoods
        });
    }

    $(document).ajaxStart(function () {
        $('#loading').removeClass('d-none');
    }).ajaxStop(function () {
        $('#loading').addClass('d-none');
    });
</script>
@endpush