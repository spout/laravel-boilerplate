window.$ = window.jQuery = require('jquery');
require('bootstrap/dist/js/bootstrap.min.js');

require('../scss/admin.scss');
require('jquery-colorbox/jquery.colorbox-min.js');
require('select2/dist/js/select2.min.js');

require('./global');

$(function () {
    $('select').select2();
});