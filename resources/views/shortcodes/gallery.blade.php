@if(!empty($gallery) && $gallery->photos->isNotEmpty())
    <div class="d-flex flex-wrap lightgallery">
        @foreach($gallery->photos as $photo)
            <a href="{{ asset($photo->path) }}" class="p-2" data-sub-html=".caption">
                <img src="{{ route('imagecache', ['template' => $template, 'filename' => $photo->path]) }}" alt="" class="img-thumbnail">
                <div class="caption d-none">
                    {{ $photo->caption }}
                </div>
            </a>
        @endforeach
    </div>
@endif