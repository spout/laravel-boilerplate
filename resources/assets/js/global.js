$(function () {
    $('div.alert').not('.alert-important').delay(3000).fadeOut(350);
    $('[data-toggle="tooltip"]').tooltip();
});