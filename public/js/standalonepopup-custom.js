$(document).on('click','.popup_selector',function (event) {
    event.preventDefault();
    var updateID = $(this).attr('data-inputid'); // Btn id clicked
    var elfinderUrl = '/elfinder/popup-custom/';

    // trigger the reveal modal with elfinder inside
    var triggerUrl = elfinderUrl + updateID;

    var query = {};
    if ($(this).data('options-callback')) {
        query['optionsCallback'] = $(this).data('options-callback');
    }

    if ($(this).data('theme')) {
        query['theme'] = $(this).data('theme');
    }

    if (Object.keys(query).length) {
        triggerUrl += '?' + $.param(query);
    }

    $.colorbox({
        href: triggerUrl,
        fastIframe: true,
        iframe: true,
        width: '90%',
        height: '60%'
    });

});
// function to update the file selected by elfinder
function processSelectedFile(filePath, requestingField) {
    $('#' + requestingField).val(filePath).trigger('change');
}
