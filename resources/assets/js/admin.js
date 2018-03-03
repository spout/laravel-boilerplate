window.$ = window.jQuery = require('jquery')
const $ = window.$
require('bootstrap')
require('jquery-colorbox/jquery.colorbox-min.js')
require('select2/dist/js/select2.min.js')
require('jstree')
require('./global')
window.Sortable = require('sortablejs')

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


/**
 * @link https://stackoverflow.com/a/35689636/1656355
 * @returns {{}}
 */
$.fn.serializeControls = function () {
    var data = {};

    function buildInputObject(arr, val) {
        if (arr.length < 1)
            return val;
        var objkey = arr[0];
        if (objkey.slice(-1) == "]") {
            objkey = objkey.slice(0, -1);
        }
        var result = {};
        if (arr.length == 1) {
            result[objkey] = val;
        } else {
            arr.shift();
            var nestedVal = buildInputObject(arr, val);
            result[objkey] = nestedVal;
        }
        return result;
    }

    $.each(this.serializeArray(), function () {
        var val = this.value;
        var c = this.name.split("[");
        var a = buildInputObject(c, val);
        $.extend(true, data, a);
    });

    return data;
}