@push('scripts')
    <script>
      window.laravel = {
        config: {
          app: {
            locales: {!! json_encode(Config::get('app.locales')) !!}
          }
        }
      };
    </script>
@endpush