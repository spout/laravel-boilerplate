@extends('layouts.app')

@section('title', _i("Map"))

@section('content')
    {!! Form::openGroup('category_id', _i("Category")) !!}
    {!! Form::select('category_id', $categoryList) !!}
    {!! Form::closeGroup() !!}

    <div id="map_canvas" style="width: 100%; height: 500px;"></div>
@endsection

@push('scripts')
    <script>
        $(function () {
            let latlng = new google.maps.LatLng(17.9, -62.83333300000004);
            let options = {
                zoom: 13,
                center: latlng,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };
            let map = new google.maps.Map(document.getElementById("map_canvas"), options);

            // let infowindow = new google.maps.InfoWindow({
            //     content: ""
            // });
            //
            // let marker = new google.maps.Marker({
            //     position: myLatlng,
            //     map: map,
            //     title: ""
            // });
            //
            // google.maps.event.addListener(marker, 'click', function() {
            //     infowindow.open(map,marker);
            // });
        });
    </script>
@endpush