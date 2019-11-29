var datatable = table(records).DataTable({
    @include('partials.datatables._dom'),
    buttons: [
        @include('partials.datatables._default_buttons'),
        {
            text: '<i class="fas faw fa-trash text-white"></i>',
            className: 'delete-checked',
            attr:  {
                id: 'delete'+records
            },
        }
    ],
    "ajax": {
        "url": resourceUrl(records),
        "type": "GET"
    },
    "deferRender": true,
    "columns": [
        {
            render: function(data, type, row, meta) {
              return '<div class="checkbox"><label class="checkbox-container"><input type="checkbox" class="checkitem'+records+'" name="'+records.toLowerCase()+'[]" value="' + row.id + '"></label></div>'
            },
            searchable: false,
            sortable: false,
        },
        {
            data: 'id',
        },
        {
            data: 'name',
        },
        {
            render: function(data, type, row, meta) {
                return '<a href="' + row.link.show +'">Accounts ('+ row.users_count +')</a>'
            },
            searchable: false,
            sortable: false,
        },
        {
            render: function(data, type, row, meta) {
                return '<a href="' + row.link.show + '"><svg class="fill-current text-gray-500 hover:text-gray-700 inline-block h-6 w-9 mr-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M.2 10a11 11 0 0 1 19.6 0A11 11 0 0 1 .2 10zm9.8 4a4 4 0 1 0 0-8 4 4 0 0 0 0 8zm0-2a2 2 0 1 1 0-4 2 2 0 0 1 0 4z"/></svg></a><a href="' + row.link.edit + '"><svg class="fill-current text-gray-500 hover:text-gray-700 inline-block h-5 w-5 mr-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2 4v14h14v-6l2-2v10H0V2h10L8 4H2zm10.3-.3l4 4L8 16H4v-4l8.3-8.3zm1.4-1.4L16 0l4 4-2.3 2.3-4-4z"/></svg></a><button href="#" id="delete'+pluralize.singular(records)+'" data-record="' + row.slug + '"><svg class="fill-current text-gray-500 hover:text-gray-700 inline-block h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M6 2l2-2h4l2 2h4v2H2V2h4zM3 6h14l-1 14H4L3 6zm5 2v10h1V8H8zm3 0v10h1V8h-1z"/></svg></a>'
            },
            searchable: false,
            sortable: false,
        },
    ],
    responsive: true,
    columnDefs: [
        { responsivePriority: 1, targets: 0 },
        { responsivePriority: 2, targets: 1 },
        { responsivePriority: 3, targets: 2 },
        {
            targets: table(records).columnIndex(),
            className: 'dt-body-right'
        },
    ],
    "order": [
        [ 1, "desc" ]
    ],
});