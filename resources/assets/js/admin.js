window.$ = window.jQuery = require('jquery')
const $ = window.$
require('bootstrap')
require('jquery-colorbox/jquery.colorbox-min.js')
require('select2/dist/js/select2.min.js')
require('jstree')
require('./global')

require('../scss/admin.scss')

$(function () {
  /**
   * Select2
   */
  $.fn.select2.defaults.set('minimumResultsForSearch', '10')
  $('select').select2()

  /**
   * Checkboxes check all
   */
  $('input[type="checkbox"][data-check-all]').change(function () {
    $($(this).data('target')).prop('checked', $(this).prop('checked'))
  })
})
