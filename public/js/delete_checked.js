function deleteSingleRecord(records, datatable)
{
    $(document).on('click', deleteSingle(records), function() {

        var record = $(this).attr('data-record');

        $.ajax({
            type: 'DELETE',
            url: deleteUrl(records, record),
            success: function(response) {
                handleSuccessResponse(records, datatable);
            },
            error: function(response) {
                displayErrors(response.responseJSON.errors, 'div.');
                reloadDataTable(datatable);
            }
        });
    });
}

function deleteManyRecords(records, datatable)
{
    $(document).on('click', deleteMany(records), function() {

        var checkbox = records.toLowerCase();

        $.ajax({
            type: 'DELETE',
            url: deleteUrl(records),
            data: {
                ids: getCheckedValues(checkbox)
            },
            success: function(response) {
                handleSuccessResponse(records, datatable);
            },
            error: function(response) {
                displayErrors(response.responseJSON.errors, 'div.');
                handleResponse(records, datatable);
            }
        });
    });
}

function markCheckboxes(records)
{
    var singleCheckbox = '.checkitem'+records;
    var checkbox = records.toLowerCase();

    table(records).on('click', checkAll(records), function () {

        $(singleCheckbox).prop('checked', $(this).prop("checked"));
        deleteButton(records).show();

        if(isNotChecked($(this))) {
            deleteButton(records).hide();
        }
    });

    table(records).on('click', singleCheckbox, function () {

        if(isChecked($(this))) {
            deleteButton(records).show();
        }

        if(isNotChecked($(this))) {
            uncheck($(checkAll(records)))
        }

        if(allChecked(singleCheckbox)) {
            check($(checkAll(records)))
        }

        if(noneChecked(checkbox)) {
            deleteButton(records).hide();
        }
    });
}

function checkAll(records)
{
    return '#checkAll'+records;
}

$.fn.rowsCount = function() {
    return $(this).data().count();
};

$.fn.columnCount = function() {
    return $('th', $(this).find('thead')).length;
};

$.fn.columnIndex = function(index = 1) {
    return $(this).columnCount() - index;
};


function table(records)
{
    return $('#table'+records);
}

function resourceUrl(records, parentRecords = null, parentId = null)
{
    return parentId
        ? '/admin/' + parentRecords + '/' + parentId + '/' + records.toLowerCase() + '/list'
        : '/admin/' + records.toLowerCase() + '/list';
}

function deleteButton(records)
{
    return $('#delete'+records);
}

function deleteUrl(records, record = null)
{
    return record ? '/admin/' + records.toLowerCase() + '/' + record
        : '/admin/'+ records.toLowerCase();
}

function deleteMany(records)
{
    return '#delete'+records;
}

function deleteSingle(records)
{
    return '#delete'+pluralize.singular(records);
}

function getLocation(records, id='#card')
{
    return id+records;
}

function handleSuccessResponse(records, datatable)
{
    reloadLocation(getLocation(records));
    handleResponse(records, datatable);
    removeErrorField();
}

function removeErrorField()
{
    $('div.invalid-feedback').empty().hide();
}

function handleResponse(records, datatable)
{
    reloadDataTable(datatable);
    deleteButton(records).hide();
    uncheck($(checkAll(records)));
}
