$(document).ready(function () {
    if ($.fn.dataTable.isDataTable('#postList')) {
        table = $('#postList').DataTable();
    } else {
        $('#postList').DataTable({
            "pagingType": "simple_numbers"
        });
        $('.dataTables_length').addClass('bs-select');
    }
});