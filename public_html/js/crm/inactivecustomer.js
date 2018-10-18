$(document).ready(function () {
    AllCallCustomer();

}); // end document.ready

function AllCallCustomer() {
    $.noConflict()
    $('#tblInactiveCustomer').DataTable({
        ajax: "index.php?r=crm/getallinactivecustomer",
        "iDisplayLength": 5,
        "columns": [
            {"data": "cname"},
            {"data": "cphone"},
            {"data": "location"},
            {"data": "price"},
            {"data": "ptype"},
            {"data": "addeddate"},
            {"data": "id",
                "render": function (data, type, full, meta) {
                    var htmlAction = '';
                    htmlAction += '<a href="index.php?r=crm/edit&amp;id=' + data + '" title="Edit" class="teal-text"  onclick="getCustomerdetails(`' + full.id + '`)" ><i  class="ti-pencil teal-text "></i></a>&nbsp;&nbsp;'
                    htmlAction += '<a href="index.php?r=crm/edit&amp;id=' + data + '" title="User list" class="teal-text"  ><i   class="ti-user teal-text "></i></a>&nbsp;&nbsp;'
                    htmlAction += '<a href="index.php?r=crm/followup&amp;id=' + data + '" title="Course list" class="teal-text"  ><i   class="ti-blackboard teal-text "></i></a>&nbsp;&nbsp;'
                    htmlAction += '<a href="#"  title="Inactive" class="teal-text"  ><i onclick="active(' + data + ')" id="crmid"  class="ti-thumb-up teal-text "></i></a>&nbsp;&nbsp;'
                    return htmlAction;
                }
            }
        ]
    });
}
function active(tid) {
    $('#crmid').val(tid);
    var obj = new Object();
    obj.id = $('#crmid').val();
    alertify.confirm("Are you sure you want to delete?",
            function () {
                $.ajax({
                    url: 'index.php?r=crm/activecustomer',
                    async: false,
                    data: obj,
                    type: 'POST',
                    success: function (data) {
                        data = JSON.parse(data);
                        if (data.status == false) {

                        } else if (data.status == true) {
                            showMessage('success', 'Successfully deleted');
                         AllCallCustomer();
                        }
                    },
                    error: function (data) {
                        showMessage('danger', 'Please try again.');
                    }

                });
            });
}