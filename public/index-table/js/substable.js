// 1
$(document).ready(function () {
    $("#order-record-table").DataTable({
        dom: "Bfrtip",
        buttons: [
            {
                extend: "csvHtml5",
                text: '<i class="far fa-file-alt"></i>  CSV',
                titleAttr: "CSV",
                title: "Restaurant Sales Record",
                exportOptions: {
                    columns: ":not(:last-child)",
                },
            },
        ],
    });
});

// 2
$(document).ready(function () {
    $("#detail-order-record-table").DataTable({
        dom: "Bfrtip",
        buttons: [
            {
                extend: "csvHtml5",
                text: '<i class="far fa-file-alt"></i>  CSV',
                titleAttr: "CSV",
                title: "Detail Sales Record",
                exportOptions: {
                    columns: ":not(:last-child)",
                },
            },
        ],
    });
});

// 2
$(document).ready(function () {
    $("#invoice-csv-download").DataTable({
        dom: "Bfrtip",
        buttons: [
            {
                extend: "csvHtml5",
                text: '<i class="far fa-file-alt"></i>  CSV',
                titleAttr: "CSV",
                title: "Invoice Order",
                exportOptions: {
                    columns: ":not(:last-child)",
                },
            },
        ],
    });
});

// 3
$(document).ready(function () {
    $("#detail-sales-record").DataTable({
        dom: "Bfrtip",
        buttons: [
            {
                extend: "csvHtml5",
                text: '<i class="far fa-file-alt"></i>  CSV',
                titleAttr: "CSV",
                title: "Invoice Sales Record",
                exportOptions: {
                    columns: ":not(:last-child)",
                },
            },
        ],
    });
});
