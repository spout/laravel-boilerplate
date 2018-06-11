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
    <?php
    //dump($product->tags->toArray());
    //dump($product->relatedProducts->toArray());
    dump($product->region);
    ?>

    <?php
    $replacements = [];
    foreach ($product->template->placeholders as $placeholder) {
        $replacement = '';

        $module = $product->template->modules->first(function ($value, $key) use ($placeholder) {
            return $value->pivot->placeholder === $placeholder;
        });

        if (!empty($module)) {
            /** @var \App\Models\Module $module */
            $moduleModelInstances = $module->getProductAssociatedModelInstances($product->id);
            $moduleModelInstance = $moduleModelInstances->first();

            $replacement = view("includes.modules.show.{$module->slug}", compact('module', 'moduleModelInstances', 'moduleModelInstance'));
        }

        $replacements["{% {$placeholder} %}"] = $replacement;
    }

    $content = str_replace(array_keys($replacements), array_values($replacements), $product->template->template_content);

    echo $content;
    ?>
@endsection