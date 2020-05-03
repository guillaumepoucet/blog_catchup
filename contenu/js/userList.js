$(document).ready(function () {
    if ($.fn.dataTable.isDataTable('#userList')) {
        table = $('#userList').DataTable();
    } else {
        $('#userList').DataTable({
            "pagingType": "simple_numbers",
            "order": [[ 1, "asc" ]]
        });
        $('.dataTables_length').addClass('bs-select');
    }
});