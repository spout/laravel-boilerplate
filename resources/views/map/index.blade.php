@extends('layouts.app')

@section('title', _i("Map"))

@section('content')
    <div class="btn-group-toggle" data-toggle="buttons">
        @foreach($categories as $category)
            <label class="btn btn-secondary active">
                <input type="checkbox" name="category_id[]" autocomplete="off" value="{{ $category->id }}" checked> {{ $category->title_plural }} <img src="{{ $category->marker_icon_url }}" alt="">
            </label>
        @endforeach
    </div>

    <div id="map_canvas" style="width: 100%; height: 500px;" class="mt-3"></div>
@endsection

@push('scripts')
    <script>
        var map;
        var markersUrl = '{{ route('map.markers') }}';
        var infowindow;
        var markers = [];

        $(function () {
            let latlng = new google.maps.LatLng(17.9, -62.83333300000004);
            let options = {
                zoom: 13,
                center: latlng,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };
            map = new google.maps.Map(document.getElementById("map_canvas"), options);
            infowindow = new google.maps.InfoWindow();

            $('input[name="category_id[]"]').on('change', function () {
                getMarkers();
            });

            getMarkers();
        });

        function getMarkers() {
            clearMarkers();

            let categories = $('input[name="category_id[]"]:checked').map(function(i, e) {
                return e.value
            }).toArray();

            $.getJSON(markersUrl, {categories: categories}, function (data) {
                $.each(data, function (i, item) {
                    let marker = createMarker(item);
                    markers.push(marker);
                })
            });
        }

        function createMarker(item) {
            let latLng = new google.maps.LatLng(item.lat, item.lng);
            let marker = new google.maps.Marker({
                position: latLng,
                map: map,
                animation: google.maps.Animation.DROP,
                icon: item.marker_icon_url
            });

            let content = '';
            content += '<div class="infowindow-content">';
            content += '<p><a href="{absolute_url}">{title}</a></p>'.format(item);
            content += '</div>';

            google.maps.event.addListener(marker, 'click', function () {
                infowindow.close();
                infowindow.setContent(content);
                infowindow.open(map, marker);
            })

            return marker;
        }

        function clearMarkers() {
            for (let i = 0, length = markers.length; i < length; i++) {
                markers[i].setMap(null);
            }
        }
    </script>
@endpush