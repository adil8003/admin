$(document).ready(function () {
    Allcrm();
}); // end document.ready

function Allcrm() {
    $.noConflict()
    $('#tblCrmCustomer').DataTable({
        ajax: "index.php?r=crm/getallcustomers",
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
                    return htmlAction;
                }
            }
        ]
    });
}
//function seacrhCustomer(v){
//   var location =  $('#search').val(v);
//   alert(location);
//}

function seacrhCustomer() {
    var location = $('#search').val();
    var obj = new Object();
    obj.location = location;

    $.ajax({
        url: 'index.php?r=crm/getcustomer',
        async: false,
        data: obj,
        type: 'POST',
        success: function (data) {
            showMessage('success', 'Added successfully.');
        },
        error: function (data) {
            showMessage('danger', 'Please try again.');
        }
    });
}
