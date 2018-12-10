$(document).ready(function () {
    'use strict';
    $.noConflict()
    $('#tblusers').DataTable({
        ajax: "index.php?r=users/allusers",
        "iDisplayLength": 5,
        "columns": [
            {"data": "username"},
            {"data": "email"},
            {"data": "phone"},
            {"data": "roles"},
            {"data": "status"},
            {"data": "reg_date"},
            {"data": "id",
                "render": function (data, type, full, meta) {
                    var htmlAction = '';
                    htmlAction += '<a href="index.php?r=users/edit&amp;id=' + data + '" title="Edit" class="teal-text"  ><i  class="ti-pencil teal-text "></i></a>&nbsp;&nbsp;'
                    htmlAction += '<a href="index.php?r=users/details&amp;id=' + data + '" title="Details" class="teal-text"  ><i  class="ti-eye teal-text "></i></a>&nbsp;&nbsp;'
                    return htmlAction;
                }
            }
        ]
    });

}); // end document.ready