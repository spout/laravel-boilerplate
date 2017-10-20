<div class="partners">
    @foreach($items as $k => $item)
        <img src="{{ asset('files/partners') . '/' . basename($item) }}" alt="">
    @endforeach
</div>