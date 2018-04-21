@push('scripts')
<script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_API_KEY') }}&amp;libraries=places"></script>
<script>
  'use strict';

  var map, marker, autocomplete;

  google.maps.event.addDomListener(window, 'load', initialize);

  function initialize() {
    var mapDiv = document.getElementById('map-canvas');
    var lat = $('#lat').val() || 17.898379;
    var lng = $('#lng').val() || -62.827453;
    var latLng = new google.maps.LatLng(lat, lng);

    map = new google.maps.Map(mapDiv, {
      center: latLng,
      zoom: 13
    });

    autocomplete = new google.maps.places.Autocomplete((document.getElementById('{{ $domId }}')), {types: ['geocode']});

    marker = new google.maps.Marker({
      map: map,
      position: latLng
    });

    autocomplete.addListener('place_changed', function() {
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