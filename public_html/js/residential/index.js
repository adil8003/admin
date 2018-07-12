$(document).ready(function () {
    AllResidential();
}); // end document.ready

function getPriceinString(digit) {
    var strReturn = digit;
    var lengthNum = digit.length;
    if (lengthNum != 0 && lengthNum != ' ') {
        switch (lengthNum) {
            case 3:
                var val = digit / 100;
                var strReturn = val + " Thundred";
                break;
            case 4:
                var val = digit / 1000;
                var strReturn = val + " Thousand";
                break;
            case 5:
                var val = digit / 1000;
                var strReturn = val + " Thousand";
                break;
            case 6:
                var val = digit / 100000;
                var strReturn = val + " Lakh";
                break;
            case 7:
                var val = digit / 100000;
                var strReturn = val + " Lakh";
                break;
            case 8:
                var val = digit / 10000000;
                var strReturn = val + " Crore";
                break;
            case 9:
                var val = digit / 10000000;
                var strReturn = val + " Crore";
                break;
        }
    }
    return strReturn;
}
function AllResidential() {
    $.noConflict()
    $('#tblResidential').DataTable({
        ajax: "index.php?r=residential/getallresidential",
        "iDisplayLength": 5,
        "columns": [
            {"data": "pname"},
            {"data": "ptype"},
            {"data": "location"},
            {"data": "price",
                "render": function (data, type, row, meta) {
                    return '<b>' + getPriceinString(data) + '</b>';
                }
            },
            {"data": "btype"},
            {"data": "addeddate"},
            {"data": "id",
                "render": function (data, type, full, meta) {
                    var htmlAction = '';
                    htmlAction += '<a href="index.php?r=residential/edit&amp;id=' + data + '" title="Edit" class="teal-text"  onclick="getCustomerdetails(`' + full.id + '`)" ><i  class="ti-pencil teal-text "></i></a>&nbsp;&nbsp;'
                    htmlAction += '<a href="index.php?r=residential/amenities&amp;id=' + data + '" title="User list" class="teal-text"  ><i   class="ti-home teal-text "></i></a>&nbsp;&nbsp;'
                    return htmlAction;
                }
            }
        ]
    });
}

