<x-admin-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <div class="rounded-lg mb-4">
        <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
            <div class="w-full md:w-1/2">
                <button onclick="addUser()" type="button"
                    class="w-full md:w-auto flex items-center justify-center py-2 px-4 text-sm font-medium text-white bg-blue-500 rounded hover:bg-blue-600">
                    <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"
                        aria-hidden="true">
                        <path clip-rule="evenodd" fill-rule="evenodd"
                            d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                    </svg>
                    Add User
                </button>
            </div>
        </div>
        <div class="mb-3 bg-white dark:bg-primary-800 relative shadow-md sm:rounded-lg overflow-hidden">
            <div class="overflow-x-auto p-3">
                <table id="datatable" class="min-w-full border border-gray-200 divide-y divide-gray-200">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-4 py-2 border border-gray-200 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">#</th>
                            <th class="px-4 py-2 border border-gray-200 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">Username</th>
                            <th class="px-4 py-2 border border-gray-200 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">Fullname</th>
                            <th class="px-4 py-2 border border-gray-200 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">Email</th>
                            <th class="px-4 py-2 border border-gray-200 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">Role</th>
                            <th class="px-4 py-2 border border-gray-200 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">Status</th>
                            <th class="px-4 py-2 border border-gray-200 text-center text-xs font-medium text-gray-600 uppercase tracking-wider">Action</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        <!-- Data dari DataTables -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-admin-layout>

<script type="text/javascript">
    let datatable;
        $(document).ready(function () {
            loadDatatable();
        })

        loadDatatable = () => {
            datatable = $('#datatable').DataTable({
                "responsive": true,
                "destroy": true,
                "processing": true,
                "serverSide": true,
                "async": true,
                "order": [],
                "ajax": {
                    "url": `/api/admin/master/user-management`,
                    "type": "GET",
                },
                "columns": [
                    {
                        data: null,
                        render: function (data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        },
                        className: "text-center border border-gray-200", // biar rapi di tengah
                    },
                    { "data": "fullname", className: "border border-gray-200" },
                    { "data": "username", className: "border border-gray-200" },
                    { "data": "email", className: "border border-gray-200" },
                    { "data": "role.name", className: "border border-gray-200" },
                    {
                        data: "status",
                        render: function (data, type, row) {
                            if (data == "1") {
                                return `<span class="inline-flex items-center px-2 py-1 text-xs font-medium text-green-800 bg-green-100 rounded-full">
                                            Active
                                        </span>`;
                            } else {
                                return `<span class="inline-flex items-center px-2 py-1 text-xs font-medium text-red-800 bg-red-100 rounded-full">
                                            Inactive
                                        </span>`;
                            }
                        },
                        className: "text-center border border-gray-200"
                    },
                    {
                        data: null,
                        render: function (data, type, row) {
                            return `
                                    <div class="text-center">
                                        <button onclick="viewUser('${row.id}')"
                                            class="px-3 py-1 text-xs font-medium text-white bg-blue-500 rounded hover:bg-blue-600">
                                            View
                                        </button>
                                        <button onclick="editUser('${row.id}')"
                                            class="px-3 py-1 text-xs font-medium text-white bg-yellow-500 rounded hover:bg-yellow-600">
                                            Edit
                                        </button>
                                        <button onclick="deleteUser('${row.id}')"
                                            class="px-3 py-1 text-xs font-medium text-white bg-red-500 rounded hover:bg-red-600">
                                            Delete
                                        </button>
                                    </div>
                                `;
                        },
                        orderable: false,
                        searchable: false,
                        className: "text-center border border-gray-200"
                    }
                ],
                drawCallback: function () {
                    customizeDataTableUI($('#datatable'));
                }
            });
        }

        const addUser = () => {
            window.location.href = '/admin/master/user-management/create';
        }
</script>
