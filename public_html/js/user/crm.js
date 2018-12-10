$(document).ready(function () {
    'use strict';
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
    $.noConflict()
    $('#tblCrmCustomer').DataTable({
        ajax: "index.php?r=users/getallcustomers",
        "iDisplayLength": 10,
        "columns": [
            {"data": "id",
                "render": function (data, type, full, meta) {
                    var htmlAction = '';
                    return '<a href="#"><b class="scroll" id="customer_id" onclick="getCustomerdetails(`' + full.id + '`)">' + full.cname + '</b></a>';
                    return htmlAction;
                }
            },
            {"data": "ptype"},
            {"data": "location"},
            {"data": "cphone"},
            {"data": "price",
                "render": function (data, type, row, meta) {
                    return '<b>' + getPriceinString(data) + '</b>';
                }
            },
            {"data": "id",
                "render": function (data, type, full, meta) {
                    var htmlAction = '';
                    htmlAction += '<a href="index.php?r=users/crmedit&amp;id=' + data + '" title="Edit" class="teal-text"  ><i  class="ti-pencil teal-text "></i></a>&nbsp;&nbsp;'
//                    htmlAction += '<a href="#" title="Customer details" class="teal-text" id="customer_id" onclick="getCustomerdetails(`' + data + '`)" ><i   class="ti-user teal-text "></i></a>&nbsp;&nbsp;'
                    htmlAction += '<a href="index.php?r=crm/followup&amp;id=' + data + '" title="Follow up" class="teal-text"  ><i   class="ti-blackboard teal-text "></i></a>&nbsp;&nbsp;'
//                    htmlAction += '<a href="index.php?r=crm/mail&amp;id=' + data + '" title="Mail" class="teal-text"  ><i   class="ti-email teal-text "></i></a>&nbsp;&nbsp;'
                    htmlAction += '<a href="#"  title="Mail" class="teal-text"  ><i onclick="inactive(' + data + ')" id="crmid"  class="ti-trash teal-text "></i></a>&nbsp;&nbsp;'
//                    htmlAction += '<a href="index.php?r=crm/mail&amp;id=' + data + '" title="Mail" class="teal-text"  ><i   class="ti-comments-smiley teal-text "></i></a>&nbsp;&nbsp;'
                    return htmlAction;
                }
            }
        ]
    });
    var oTable1 = $('#tblCrmCustomer').dataTable().yadcf([
        {column_number: 2,
            filter_type: "multi_select",
            select_type: 'select2',
            filter_default_label: 'Location',
            select_type_options: {
                width: '150px',
                minimumResultsForSearch: -1 // remove search box
            }
        },
        {column_number: 1,
            filter_type: "multi_select",
            select_type: 'select2',
            filter_default_label: 'Type',
            select_type_options: {
                width: '150px',
                minimumResultsForSearch: -1 // remove search box
            }
        }
    ]);

    $.fn.dataTable.ext.search.push(
            function (settings, data, dataIndex) {
                var min = parseInt($('#cusmin').val(), 10);
                var max = parseInt($('#cusmax').val(), 10);
                var price = (parseFloat(data[4]) || 0); // use data for the age column

                if ((isNaN(min) && isNaN(max)) ||
                        (isNaN(min) && price <= max) ||
                        (min <= price && isNaN(max)) ||
                        (min <= price && price <= max))
                {
                    return true;
                }
                return false;
            }
    );


    // Event listener to the two range filtering inputs to redraw on input
    var table = $('#tblCrmCustomer').DataTable();
    $('#cusmin, #cusmax').keyup(function () {
        table.draw();
    });
}); // end document.ready