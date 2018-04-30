<div class="col-sm-12 col-md-6 col-lg-4">
    <div class="card mb-4">
        <a href="{{ $product->absolute_url }}">
            <img src="{{ $product->featured_image_thumb }}" class="card-img-top" alt="">
        </a>
        <div class="card-body">
            <h2 class="card-title"><a href="{{ $product->absolute_url }}">{{ $product->title }}</a></h2>
            <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
        </div>
    </div>
</div>