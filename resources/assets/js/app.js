/* global $ */

window.$ = window.jQuery = require('jquery')
require('bootstrap/dist/js/bootstrap.min.js')
require('./global')
require('jquery-colorbox/jquery.colorbox-min.js')

require('../scss/app.scss')

$(function () {
  $('a.lightbox').colorbox({
    opacity: 0.5,
    rel: 'gal'
  })
})
