@extends('layouts.app')

@section('title', _i("Map"))

@section('content')
    @foreach($categories as $category)
        <?php
        $id = "category-{$category->id}";
        ?>
        <div class="custom-control custom-checkbox custom-control-inline">
            <input type="checkbox" name="category_id[]" class="custom-control-input" id="{{ $id }}" value="{{ $category->id }}" checked>
            <label class="custom-control-label" for="{{ $id }}">{{ $category->title_plural }} <img src="{{ $category->marker_icon }}" alt=""></label>
        </div>
    @endforeach

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
                icon: item.marker_icon || 'https://maps.google.com/mapfiles/ms/micons/red-dot.png'
            });

            let content = '';
            content += '<div class="infowindow-content">';
            content += '<p><img src="/flags/{0}.gif" alt="">&nbsp;<a href="{1}">{2}</a></p>'.format(item.country.toLowerCase(), item.absolute_url, item.title);
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