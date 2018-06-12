@if ($products->isNotEmpty())
    <div class="row">
        @foreach($products as $product)
            @include('products.includes.list-item')
        @endforeach
    </div>

    {{ $products->links('vendor.pagination.bootstrap-4') }}
@else
    <div class="alert alert-warning alert-important">{{ _i("No results matching your search.") }}</div>
@endif