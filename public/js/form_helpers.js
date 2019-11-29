function clearErrorOnNewInput()
{
    $("input, textarea").on('keydown', function () {
        clearError(errorBox($(this).attr('name')));
        clearError(errorBox($(this).attr('name'), 'p.'));
    });
}

function displayErrors(errors, htmlEl = 'span.')
{
    for (error in errors) {
        var errorMessage = errors[error][0];
        displayError(errorBox(error, htmlEl), errorMessage);
    }
}

function clearErrors(fields)
{
    $.each(fields, function(index, name) {
        clearError(errorBox(name))
    });
}

function displayError(field, message)
{
    field.show().text(message);
}

function clearError(field)
{
    field.hide().text('');
}

function reloadLocation(location)
{
    $(location).load(' '+location );
}

function reloadDataTable(datatable)
{
    datatable.ajax.reload();
}

function errorBox(name, htmlEl)
{
    return $(htmlEl+name);
}

function clearForm()
{
    $("form").trigger('reset');
}

function redirectTo(url)
{
    location.href = url;
}

function showElement(el)
{
    el.removeClass('hidden')
}

function hideElement(el)
{
    el.addClass('hidden')
}

function resetInput(input)
{
    input.val('');
}

function emptyElement(el)
{
    el.empty();
}

function isEmptyInput( input )
{
    return input.val() == '';
}

function isEmptyElement( el )
{
    return ! $.trim(el.html());
}

function inputType(type)
{
    return $("input:"+type);
}

function optionValue(option)
{
    return option.val();
}