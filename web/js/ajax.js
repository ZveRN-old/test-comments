$(document).on('click', 'input[name=\"activ\"]', function () {
    var checked = $(this).attr('checked');
    var id = $(this).attr('model-id');
    var activ = 0;

    if (typeof checked !== typeof undefined && checked !== false) {
        $(this).removeAttr('checked');
        activ = 0;
    }
    else {
        $(this).attr('checked', 'checked');
        activ = 1;
    }

    $.post('/admin/ajax',
        {
            id: id,
            activ: activ
        },
        onAjaxParserSuccess
    );
    function onAjaxParserSuccess(data) {
//            alert(data);
    }
});