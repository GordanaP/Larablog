function isChecked(name)
{
    return name.prop("checked") == true;
}

function isNotChecked(name)
{
    return name.prop("checked") == false;
}

function check(name)
{
    return name.prop('checked', true);
}

function uncheck(name)
{
    return name.prop('checked', false);
}

function getCheckedValues(name)
{
    var values = [];

    onlyChecked(name).each(function() {
       values.push($(this).val());
    });

    return values;
}

function allChecked(name)
{
    return $(name+":checked").length == $(name).length
}

function noneChecked(name)
{
    return countChecked(name) == 0
}

function countChecked(name)
{
    return onlyChecked(name).length;
}

function onlyChecked(name)
{
    return $(checkbox(name)+':checked');
}

function checkbox(name)
{
    return 'input[name*="' + name + '"]';
}

