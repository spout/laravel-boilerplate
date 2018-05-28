@extends(request()->isXmlHttpRequest() ? 'layouts.ajax' : 'products.layout')

<?php
/** @var $category \App\Models\Category */
?>
@section('title', !empty($category) ? $category->title_plural : _i("Products"))

@breadcrumb(!empty($category) ? ['url' => $category->absolute_url, 'title' => $category->title_plural] : ['url' => route('products.index'), 'title' => _i("Products")])

@section('content')
    @if (request()->isXmlHttpRequest())
        @include('products.includes.list')
    @else
        <div class="sticky-top bg-white">
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
                            {{ _i("Criterias") }}
                        </button>
                        <div class="dropdown-menu">
                            <div class="px-2">
                                @foreach($category->criterias as $criteria)
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="criteria-{{ $criteria->id }}" name="criterias[]" value="{{ $criteria->id }}">
                                        <label class="custom-control-label" for="criteria-{{ $criteria->id }}">{{ $criteria->name }}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </li>
                @endif

                @if (!empty($category))
                    <li class="nav-item dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" data-toggle="dropdown">
                            {{ _i("Filter 1") }}
                        </button>
                        <div class="dropdown-menu">
                            <div class="px-2">
                                @foreach($category->criterias as $criteria)
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="criteria-{{ $criteria->id }}" name="criterias[]" value="{{ $criteria->id }}">
                                        <label class="custom-control-label" for="criteria-{{ $criteria->id }}">{{ $criteria->name }}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </li>
                @endif

                @if (!empty($category))
                    <li class="nav-item dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" data-toggle="dropdown">
                            {{ _i("Filter 2") }}
                        </button>
                        <div class="dropdown-menu">
                            <div class="px-2">
                                @foreach($category->criterias as $criteria)
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="criteria-{{ $criteria->id }}" name="criterias[]" value="{{ $criteria->id }}">
                                        <label class="custom-control-label" for="criteria-{{ $criteria->id }}">{{ $criteria->name }}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
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
        $('input[name="criterias[]"]').on('change', function () {
            loadList();
        });

        // $(window).bind("popstate", function(e) {
        //     //var initialPop = !popped && location.href == initialURL;
        //     //popped = true;
        //     //if (initialPop) return;
        //     loadList(window.location.href);
        // });
    });

    $(document).ajaxStart(function () {
        $('#loading').removeClass('d-none');
    }).ajaxStop(function () {
        $('#loading').addClass('d-none');
    });

    function loadList() {
        let data = {};

        data.criterias = $('input[name="criterias[]"]:checked').map(function(i, e) {
            return e.value
        }).toArray();

        $('#products-list').load(productsIndexUrl, data, function () {
            // window.history.pushState({}, null, productsIndexUrl + '?' + $.param(data));
        });
    }
</script>
@endpush