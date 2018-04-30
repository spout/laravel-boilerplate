@extends('products.layout')

<?php
/** @var $category \App\Models\Category */
?>
@section('title', $category->title_plural)

@breadcrumb(['url' => $category->absolute_url, 'title' => $category->title_plural])

@section('content')
    @if ($category->products->isNotEmpty())
        <div class="row">
            @foreach($category->products as $product)
                @include('products.includes.list-item')
            @endforeach
        </div>
    @endif
@endsection