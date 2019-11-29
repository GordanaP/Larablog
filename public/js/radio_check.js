function toggleHiddenElement(radioName, radioValue, hiddenElement, hiddenError)
{
    radioInput(radioName).change(function() {

        if(isCheckedRadioValue(radioName, radioValue)) {
            showElement(hiddenElement)
        }
        else
        {
            hideElement(hiddenElement)
            resetInput(hiddenElement)
            emptyElement(hiddenError)
        }
    });

    if (! isEmptyElement( hiddenError )) {
        showElement(hiddenElement);
        checkRadioDefault(radioName);
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

