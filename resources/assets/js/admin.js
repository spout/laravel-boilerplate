window.$ = window.jQuery = require('jquery');
require('bootstrap/dist/js/bootstrap.min.js');

require('../scss/admin.scss');
require('jquery-colorbox/jquery.colorbox-min.js');
require('select2/dist/js/select2.min.js');

require('./global');

$(function () {
    /**
     * Select2
     */
    $.fn.select2.defaults.set("minimumResultsForSearch", "10");
    $('select').select2();

    /**
     * Checkboxes check all
     */
    $('input[type="checkbox"][data-check-all]').change(function () {
        $($(this).data('target')).prop('checked', $(this).prop('checked'));
    });
});