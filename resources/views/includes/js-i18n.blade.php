@push('scripts')
    <script>
      jQuery.extend(jQuery.colorbox.settings, {
        current: "{{ _i("image {current} of {total}") }}",
        previous: "{{ _i("previous") }}",
        next: "{{ _i("next") }}",
        close: "{{ _i("close") }}",
        xhrError: "{{ _i("This content failed to load.") }}",
        imgError: "{{ _i("This image failed to load.") }}",
        slideshowStart: "{{ _i("start slideshow") }}",
        slideshowStop: "{{ _i("stop slideshow") }}"
      });
    </script>
@endpush