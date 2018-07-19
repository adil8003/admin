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
    $('#tblResidential').DataTable({
        ajax: "index.php?r=filter/getallresidential",
        "iDisplayLength": 5,
        "columns": [
            {"data": "id",
                "render": function (data, type, full, meta) {
                    var htmlAction = '';
                    return '<a href="#"><b id="res_id" onclick="getResidentialprojectDetails(`' + full.id + '`)">' + full.pname + '</b></a>';
                    return htmlAction;
                }
            },
            {"data": "ptype"},
            {"data": "location"},
            {"data": "price",
                "render": function (data, type, row, meta) {
                    return '<b>' + getPriceinString(data) + '</b>';
                }
            },
            {"data": "btype"},
            {"data": "id",
                "render": function (data, type, full, meta) {
                    var htmlAction = '';
                    htmlAction += '<a href="index.php?r=residential/edit&amp;id=' + data + '" title="Edit" class="teal-text"   ><i  class="ti-pencil teal-text "></i></a>&nbsp;&nbsp;'
                    htmlAction += '<a href="index.php?r=residential/amenities&amp;id=' + data + '" title="Amenities" class="teal-text"  ><i   class="ti-home teal-text "></i></a>&nbsp;&nbsp;'
                    htmlAction += '<a href="index.php?r=residential/keylocation&amp;id=' + data + '" title="Key location" class="teal-text"  ><i   class="ti-car teal-text "></i></a>&nbsp;&nbsp;'
                    htmlAction += '<a href="index.php?r=residential/image&amp;id=' + data + '" title="Image gallery" class="teal-text"  ><i   class="ti-gallery teal-text "></i></a>&nbsp;&nbsp;'
                    return htmlAction;
                }
            }
        ]
    });
    var oTable1 = $('#tblResidential').dataTable().yadcf([
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
                var min = parseInt($('#resmin').val(), 10);
                var max = parseInt($('#resmax').val(), 10);
                var price = (parseFloat(data[3]) || 0); // use data for the age column

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
    var table = $('#tblResidential').DataTable();
    $('#resmin, #resmax').keyup(function () {
        table.draw();
    });
    
   
});
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
        ajax: "index.php?r=filter/getallcustomers",
        "iDisplayLength": 5,
        "columns": [
            {"data": "id",
                "render": function (data, type, full, meta) {
                    var htmlAction = '';
                    return '<a href="#"><b onclick="getCustomerdetails(`' + full.id + '`)">' + full.cname + '</b></a>';
                    return htmlAction;
                }
            },
            {"data": "cphone"},
            {"data": "location"},
            {"data": "price",
                "render": function (data, type, row, meta) {
                    return '<b>' + getPriceinString(data) + '</b>';
                }
            },
            {"data": "ptype"},
            {"data": "addeddate"},
            {"data": "id",
                "render": function (data, type, full, meta) {
                    var htmlAction = '';
                    htmlAction += '<a href="index.php?r=crm/edit&amp;id=' + data + '" title="Edit" class="teal-text"  ><i  class="ti-pencil teal-text "></i></a>&nbsp;&nbsp;'
                    htmlAction += '<a href="#" title="Customer details" class="teal-text" id="customer_id" onclick="getCustomerdetails(`' + data + '`)" ><i   class="ti-user teal-text "></i></a>&nbsp;&nbsp;'
                    htmlAction += '<a href="index.php?r=crm/followup&amp;id=' + data + '" title="Follow up" class="teal-text"  ><i   class="ti-blackboard teal-text "></i></a>&nbsp;&nbsp;'
                    htmlAction += '<a href="index.php?r=crm/mail&amp;id=' + data + '" title="Mail" class="teal-text"  ><i   class="ti-email teal-text "></i></a>&nbsp;&nbsp;'
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
                var price = (parseFloat(data[3]) || 0); // use data for the age column

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


});