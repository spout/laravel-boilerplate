$(function () {
    $('div.alert').not('.alert-important').delay(3000).fadeOut(350);
    $('[data-toggle="tooltip"]').tooltip();
});

if (!String.prototype.format) {
    String.prototype.format = function () {
        var args;
        args = arguments;
        if (args.length === 1 && args[0] !== null && typeof args[0] === 'object') {
            args = args[0];
        }
        return this.replace(/{([^}]*)}/g, function (match, key) {
            return (typeof args[key] !== "undefined" ? args[key] : match);
        });
    };
}