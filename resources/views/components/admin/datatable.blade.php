<div class="card card-body border-gray-300 card-shadow px-0 mb-4">
    <table class="table hover mt-2 admin-table text-sm" cellspacing="0" width="100%"
        id="{{ 'table'.$records }}">

        <thead class="bg-gray-100 text-gray-700 text-xs uppercase">
            <th>
                <label class="checkbox-container">
                    <input type="checkbox" id="{{ 'checkAll'.$records }}">
                </label>
            </th>

            {{ $slot }}
        </thead>

        <tbody></tbody>
    </table>
</div>
