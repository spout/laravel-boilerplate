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
        <div class="row">
            <div class="col-sm-3">
                <ul class="list-unstyled">
                    @foreach($categories as $category)
                        <li class="border-top py-2">
                            <a href="{{ route('products.category', ['category_slug_plural' => $category->slug_plural]) }}" class="h4">{{ $category->title_plural }}</a>
                            <ul class="list-unstyled ml-2 mt-2">
                                @foreach($category->criterias as $criteria)
                                    <li>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="criteria-{{ $criteria->id }}" name="criterias[]" value="{{ $criteria->id }}">
                                            <label class="custom-control-label" for="criteria-{{ $criteria->id }}">{{ $criteria->name }}</label>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="col-sm-9" id="products-list">
                @include('products.includes.list')
            </div>
        </div>
    @endif
@endsection

@push('scripts')
<script>
    $(function () {
        $('input[name="criterias[]"]').on('change', function () {
            loadList();
        });
    });

    function loadList() {
        let data = {};

        data.criterias = $('input[name="criterias[]"]:checked').map(function(i, e) {
            return e.value
        }).toArray();

        $('#products-list').load('{{ route('products.index') }}', data);
    }
</script>
@endpush