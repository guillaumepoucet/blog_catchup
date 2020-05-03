$(document).ready(function () {
    if ($.fn.dataTable.isDataTable('#userList')) {
        table = $('#userList').DataTable();
    } else {
        $('#userList').DataTable({
            "pagingType": "simple_numbers"
        });
        $('.dataTables_length').addClass('bs-select');
    }
});