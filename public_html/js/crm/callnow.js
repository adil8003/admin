$(document).ready(function () {
    AllCallCustomer();

}); // end document.ready

function AllCallCustomer() {
    $.noConflict()
     $('#tblAllcalllist').DataTable({
        ajax: "index.php?r=crm/getalltodaycallcustomerlist",
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
