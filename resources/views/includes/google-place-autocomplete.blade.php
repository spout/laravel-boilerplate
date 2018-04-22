@push('scripts')
    <script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_API_KEY') }}&amp;libraries=places"></script>
    <script>
        'use strict';

        var map, marker, geocoder, autocomplete;

        google.maps.event.addDomListener(window, 'load', initialize);

        function initialize() {
            var mapDiv = document.getElementById('map-canvas');
            var lat = $('#lat').val() || 17.898379;
            var lng = $('#lng').val() || -62.827453;
            var latLng = new google.maps.LatLng(lat, lng);

            map = new google.maps.Map(mapDiv, {
                center: latLng,
                zoom: 13,
                mapTypeControlOptions: {
                    position: google.maps.ControlPosition.TOP_RIGHT
                }
            });
            geocoder = new google.maps.Geocoder();
            autocomplete = new google.maps.places.Autocomplete((document.getElementById('{{ $domId }}')), {types: ['geocode']});

            marker = new google.maps.Marker({
                map: map,
                position: latLng,
                draggable: true,
                cursor: 'move',
                animation: google.maps.Animation.DROP
            });

            google.maps.event.addListener(marker, 'drag', function () {
                geocoder.geocode({'latLng': marker.getPosition()}, function (results, status) {
                    if (status === google.maps.GeocoderStatus.OK) {
                        if (results[0]) {
                            updateLocationFields(marker.getPosition().lat(), marker.getPosition().lng(), results[0].address_components);
                        }
                    }
                });
            });

            google.maps.event.addListener(marker, 'dragend', function () {
                map.setCenter(marker.getPosition());
                map.setZoom(16);
            });

            autocomplete.addListener('place_changed', function () {
                marker.setVisible(false);
                var place = autocomplete.getPlace();
                if (!place.geometry) {
                    window.alert("Autocomplete's returned place contains no geometry");
                    return;
                }

                if (place.geometry.viewport) {
                    map.fitBounds(place.geometry.viewport);
                } else {
                    map.setCenter(place.geometry.location);
                    map.setZoom(17);
                }
                marker.setPosition(place.geometry.location);
                marker.setVisible(true);

                updateLocationFields(place.geometry.location.lat(), place.geometry.location.lng(), place.address_components);
            });
        }

        function addressComponent(address_components, addressType, nameType) {
            nameType = nameType || 'long_name';

            for (var i = 0; i < address_components.length; i++) {
                for (var j = 0; j < address_components[i].types.length; j++) {
                    if (address_components[i].types[j] === addressType) {
                        if (address_components[i][nameType]) {
                            return address_components[i][nameType];
                        }
                    }
                }
            }
        }

        function updateLocationFields(lat, lng, address_components) {
            var route = addressComponent(address_components, 'route');
            var street_number = addressComponent(address_components, 'street_number', 'short_name');
            var address = street_number ? '{0} {1}'.format(route, street_number) : route;
            var sublocality = addressComponent(address_components, 'sublocality');
            var locality = addressComponent(address_components, 'locality');
            var city = sublocality || locality;
            var postcode = addressComponent(address_components, 'postal_code', 'short_name');
            var country = addressComponent(address_components, 'country', 'short_name').toUpperCase();

            $('#lat').val(lat);
            $('#lng').val(lng);
            $('#address').val(address);
            $('#city').val(city);
            $('#postcode').val(postcode);
            $('#country').val(country).trigger('change');
        }
    </script>
@endpush

<div style="position: relative;" class="mb-2">
    <div id="map-canvas" style="width: 100%; height: 300px; position: relative;"></div>

    {!! Form::openGroup('location', null, ['style' => 'position: absolute; top: 5px; left: 5px; z-index: 100; width: 50%;']) !!}
    {!! Form::text('location', null, ['id' => $domId]) !!}
    {!! Form::closeGroup() !!}
</div>