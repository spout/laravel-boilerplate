@extends('products.layout')

@section('title', $product->title)

@push('head')
    @if (!empty($product->meta_description))
        <meta name="description" content="{{ $product->meta_description }}">
    @endif
    <meta property="og:image" content="{{ $product->featured_image_thumb }}">
@endpush

@breadcrumb(['url' => $product->category->absolute_url, 'title' => $product->category->title_plural])
@breadcrumb(['url' => $product->absolute_url, 'title' => $product->title])

@section('content')
    <h1>{{ $product->h1 ?? $product->title }}</h1>
    <div>
        {!! $product->content !!}
    </div>

    <ul>
        @foreach($product->category->modules as $module)
            <li>{{ $module->slug }}</li>
        @endforeach
    </ul>
@endsection