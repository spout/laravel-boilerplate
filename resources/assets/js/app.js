/* global $ */

window.$ = window.jQuery = require('jquery');
require('bootstrap');
require('./global');
require('jquery-colorbox/jquery.colorbox-min.js');
require('slick-carousel');
// require('tilt.js');
require('lightgallery');
require('lg-thumbnail');
require('../scss/app.scss');

$(function () {
    var navbarHeight = 71;

    window.geocoder = new google.maps.Geocoder();

    $('a.lightbox').colorbox({
        opacity: 0.5,
        rel: 'gal'
    });

    $('.lightgallery').lightGallery({
        subHtmlSelectorRelative: true,
        download: false
    });

    $('[data-edit-target]').on('mouseover', function () {
        $($(this).data('edit-target')).addClass('edit-highlight');
    }).on('mouseout', function () {
        $($(this).data('edit-target')).removeClass('edit-highlight');
    });

    $('a[href^="#"]').on('click', function (e) {
        e.preventDefault();
        var scrollTo = $($(this).attr('href'));
        $('html, body').animate({scrollTop: scrollTo.offset().top - navbarHeight}, 'slow');
    })

    $('[data-slick]').slick();

    $('.google-map').each(function () {
        var lat = $(this).data('lat') || -34.397;
        var lng = $(this).data('lng') || 150.644;
        var latlng = new google.maps.LatLng(lat, lng);
        var zoom = $(this).data('zoom') || 8;
        var mapType = $(this).data('map-type') || 'ROADMAP';
        var mapOptions = {
            zoom: zoom,
            center: latlng,
            mapTypeId: google.maps.MapTypeId[mapType]
        };
        var map = new google.maps.Map($(this).get(0), mapOptions);

        if ($(this).data('address')) {
            geocodeAddress(map, $(this).data('address'));
        }
    })
})

function geocodeAddress(map, address) {
    window.geocoder.geocode({'address': address}, function (results, status) {
        if (status === 'OK') {
            map.setCenter(results[0].geometry.location);
            var marker = new google.maps.Marker({
                map: map,
                position: results[0].geometry.location
            });
        } else {
            //alert('Geocode was not successful for the following reason: ' + status);
        }
    });
}
