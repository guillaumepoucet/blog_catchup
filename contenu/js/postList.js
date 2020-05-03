$(document).ready(function () {
    if ($.fn.dataTable.isDataTable('#postList')) {
        table = $('#postList').DataTable();
    } else {
        $('#postList').DataTable({
            "pagingType": "simple_numbers",
            "order": [[ 3, "asc" ]]
        });
        $('.dataTables_length').addClass('bs-select');
    }
});