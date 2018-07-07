$(document).ready(function () {
    Allcrm();
    var id = $('#org_id').val();
}); // end document.ready

function Allcrm() {
     $.noConflict()
    $('#tblcrm').DataTable({
        ajax: "index.php?r=organisation/allorganisation",
        "iDisplayLength": 5,
        "columns": [
            {"data": "orgname"},
            {"data": "orgtypeid"},
            {"data": "phone1"},
            {"data": "city"},
            {"data": "createdat"},
            {"data": "id",
                "render": function (data, type, full, meta) {
                    var htmlAction = '';
                    htmlAction += '<a href="index.php?r=organisation/editorganisation&amp;id=' + data + '" title="Edit" class="teal-text"  onclick="getCustomerdetails(`' + full.id + '`)" ><i  class="ti-pencil teal-text "></i></a>&nbsp;&nbsp;'
                    htmlAction += '<a href="index.php?r=organisation/employee&amp;id=' + data + '" title="User list" class="teal-text"  ><i   class="ti-user teal-text "></i></a>&nbsp;&nbsp;'
//                    htmlAction += '<a href="index.php?r=organisation/courses&amp;id=' + data + '" title="Course list" class="teal-text"  ><i   class="ti-blackboard teal-text "></i></a>&nbsp;&nbsp;'
                    htmlAction += '<a href="index.php?r=admincourse/courseassigned" title="Course assign" class="teal-text"  ><i   class="ti-pin-alt teal-text "></i></a>&nbsp;&nbsp;'
                    return htmlAction;
                }
            }
        ]
    });
}
