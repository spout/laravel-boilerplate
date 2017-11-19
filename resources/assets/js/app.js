/* global $ */

window.$ = window.jQuery = require('jquery')
require('bootstrap/dist/js/bootstrap.min.js')
require('./global')
require('jquery-colorbox/jquery.colorbox-min.js')
require('slick-carousel')
require('../scss/app.scss')

$(function () {
  $('a.lightbox').colorbox({
    opacity: 0.5,
    rel: 'gal'
  })

  $('[data-edit-target]').on('mouseover', function () {
    $($(this).data('edit-target')).addClass('edit-highlight')
  }).on('mouseout', function () {
    $($(this).data('edit-target')).removeClass('edit-highlight')
  })

  $('a[href^="#"]').on('click', function (e) {
    e.preventDefault()
    let scrollTo = $($(this).attr('href'))
    $('html, body').animate({scrollTop: scrollTo.offset().top}, 'slow')
  })

  $('[data-slick]').slick()
})
