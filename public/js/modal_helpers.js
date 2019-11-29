$.fn.open = function()
{
    $(this).modal('show');
}

$.fn.close = function()
{
    $(this).modal('hide');
}

$.fn.clearOnClose = function(fields)
{
    $(this).on("hidden.bs.modal", function() {
        clearModalForm($(this));
        clearErrors(fields);
    })
}

$.fn.setAutofocus = function(field)
{
    $(this).on('shown.bs.modal', function () {
        $(this).find(field).focus()
    })
}

function clearModalForm(modal)
{
    modal.find('form').trigger('reset');
}