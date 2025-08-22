function customizeDataTableUI(table) {
    // Search box
    table
        .closest(".dataTables_wrapper")
        .find("#datatable_filter input")
        .addClass(
            "border rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 ml-2 mb-3"
        )
        .attr("placeholder", "Cari...");

    // Length dropdown
    table
        .closest(".dataTables_wrapper")
        .find("#datatable_length select")
        .addClass(
            "border rounded-lg px-2 py-1 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 ml-2"
        );

    // Info text
    table
        .closest(".dataTables_wrapper")
        .find("#datatable_info")
        .addClass("text-sm text-gray-600 mt-2");

    // Pagination
    table
        .closest(".dataTables_wrapper")
        .find("#datatable_paginate .paginate_button")
        .addClass("px-3 py-1 mx-1 rounded text-sm border mt-3")
        .attr("style", "border-color:#d1d5db !important;")
        .removeClass("bg-white text-gray-700");

    // Current page button
    table
        .closest(".dataTables_wrapper")
        .find("#datatable_paginate .paginate_button.current")
        .attr(
            "style",
            "background:#25a0e2 !important; color:#ffffff !important; border-color:#25a0e2 !important;"
        );

    // Hover effect
    table
        .closest(".dataTables_wrapper")
        .find("#datatable_paginate .paginate_button:not(.current)")
        .hover(
            function () {
                $(this).attr(
                    "style",
                    "background:#e9ebec !important; color:#25a0e2 !important; border-color:#e9ebec !important;"
                );
            },
            function () {
                $(this).attr(
                    "style",
                    "background:#ffffff !important; color:#374151 !important; border-color:#d1d5db !important;"
                );
            }
        );
}
