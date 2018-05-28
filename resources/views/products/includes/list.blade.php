@if ($products->isNotEmpty())
    <div class="row">
        @foreach($products as $product)
            @include('products.includes.list-item')
        @endforeach
    </div>
@else
    <div class="alert alert-warning">{{ _i("No results matching your search.") }}</div>
@endif