function toggleHidden(radioName, radioValue, hiddenInput, hiddenError, hiddenElement = null)
{
    radioInput(radioName).change(function() {

        if(isCheckedRadioValue(radioName, radioValue.val())) {
            hiddenElement ? hiddenElement.show() : hiddenInput.show()
        } else {
            hiddenElement ? hiddenElement.hide() : hiddenInput.hide()
            resetInput(hiddenInput)
            emptyElement(hiddenError)
        }
    });

    if (! isEmptyElement( hiddenError )) {
        hiddenElement ? hiddenElement.show() : hiddenInput.show()
        check($('input[value="'+ radioValue +'"]'));
    }
}

function isCheckedRadioValue(name, value)
{
    return getCheckedRadioValue(name) == value;
}

function getCheckedRadioValue(name)
{
    return $(radio(name)+':checked').val();
}

function checkRadioDefault(name)
{
    return radioInput(name).prop("checked", true);
}

function radioInput(name)
{
    return $(radio(name));
}

function radio(name)
{
    return 'input[name="' + name + '"]';
}

function radioName(form)
{
    return form.find(inputType('radio')).attr('name');
}

function check(el)
{
    return el.prop("checked", true);
}