$(document).ready(function () {
    $('#customerDetails').hide();
    Getempcount();
      var userid = $('#userid').val();
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
    var userid =  $('#userid').val();
//    var obj = new Object();
//    obj.id =  $('#userid').val();
    $('#tblCom').DataTable({
        ajax: "index.php?r=users/getallcommercial&id=" + userid + "",
//        async: false,
//        data: obj,
//        type: 'GET',
        "iDisplayLength": 5,
        "columns": [
            {"data": "id",
                "render": function (data, type, full, meta) {
                    var htmlAction = '';
                    return '<a href="index.php?r=users/edit&amp;id=' + full.uid + '"><b class="scroll" id="customer_id" onclick="getCustomerdetails(`' + full.uid + '`)">' + full.username + '</b></a>';
                    return htmlAction;
                }
            },
//            {"data": "ptype"},
//            {"data": "location"},
//            {"data": "cphone"},
             {"data": "id",
                "render": function (data, type, full, meta) {
                    var htmlAction = '';
                    return '<a href="index.php?r=residential/edit&amp;id=' + full.id + '"><b class="scroll" id="customer_id" onclick="getCustomerdetails(`' + full.id + '`)">' + full.cname + '</b></a>';
                    return htmlAction;
                }
            },
//            {"data": "price",
//                "render": function (data, type, row, meta) {
//                    return '<b>' + getPriceinString(data) + '</b>';
//                }
//            },
//            {"data": "id",
//                "render": function (data, type, full, meta) {
//                    var htmlAction = '';
//                    htmlAction += '<a href="index.php?r=crm/edit&amp;id=' + userid + '" title="Edit" class="teal-text"  ><i  class="ti-pencil teal-text "></i></a>&nbsp;&nbsp;'
////                    htmlAction += '<a href="#" title="Customer details" class="teal-text" id="customer_id" onclick="getCustomerdetails(`' + data + '`)" ><i   class="ti-user teal-text "></i></a>&nbsp;&nbsp;'
////                    htmlAction += '<a href="index.php?r=crm/followup&amp;id=' + data + '" title="Follow up" class="teal-text"  ><i   class="ti-blackboard teal-text "></i></a>&nbsp;&nbsp;'
////                    htmlAction += '<a href="index.php?r=crm/mail&amp;id=' + data + '" title="Mail" class="teal-text"  ><i   class="ti-email teal-text "></i></a>&nbsp;&nbsp;'
////                    htmlAction += '<a href="#"  title="Mail" class="teal-text"  ><i onclick="inactive(' + data + ')" id="crmid"  class="ti-trash teal-text "></i></a>&nbsp;&nbsp;'
////                    htmlAction += '<a href="index.php?r=crm/mail&amp;id=' + data + '" title="Mail" class="teal-text"  ><i   class="ti-comments-smiley teal-text "></i></a>&nbsp;&nbsp;'
//                    return htmlAction;
//                }
//            }
        ]
    });
    $('#tblRes').DataTable({
        ajax: "index.php?r=users/getallresidential&id=" + userid + "",
//        async: false,
//        data: obj,
//        type: 'GET',
        "iDisplayLength": 5,
        "columns": [
            {"data": "id",
                "render": function (data, type, full, meta) {
                    var htmlAction = '';
                    return '<a href="index.php?r=users/edit&amp;id=' + full.uid + '"><b class="scroll" id="customer_id" onclick="getCustomerdetails(`' + full.uid + '`)">' + full.username + '</b></a>';
                    return htmlAction;
                }
            },
//            {"data": "ptype"},
//            {"data": "location"},
//            {"data": "cphone"},
             {"data": "id",
                "render": function (data, type, full, meta) {
                    var htmlAction = '';
                    return '<a href="index.php?r=residential/edit&amp;id=' + full.id + '"><b class="scroll" id="customer_id" onclick="getCustomerdetails(`' + full.id + '`)">' + full.pname + '</b></a>';
                    return htmlAction;
                }
            },
//            {"data": "price",
//                "render": function (data, type, row, meta) {
//                    return '<b>' + getPriceinString(data) + '</b>';
//                }
//            },
//            {"data": "id",
//                "render": function (data, type, full, meta) {
//                    var htmlAction = '';
//                    htmlAction += '<a href="index.php?r=crm/edit&amp;id=' + userid + '" title="Edit" class="teal-text"  ><i  class="ti-pencil teal-text "></i></a>&nbsp;&nbsp;'
////                    htmlAction += '<a href="#" title="Customer details" class="teal-text" id="customer_id" onclick="getCustomerdetails(`' + data + '`)" ><i   class="ti-user teal-text "></i></a>&nbsp;&nbsp;'
////                    htmlAction += '<a href="index.php?r=crm/followup&amp;id=' + data + '" title="Follow up" class="teal-text"  ><i   class="ti-blackboard teal-text "></i></a>&nbsp;&nbsp;'
////                    htmlAction += '<a href="index.php?r=crm/mail&amp;id=' + data + '" title="Mail" class="teal-text"  ><i   class="ti-email teal-text "></i></a>&nbsp;&nbsp;'
////                    htmlAction += '<a href="#"  title="Mail" class="teal-text"  ><i onclick="inactive(' + data + ')" id="crmid"  class="ti-trash teal-text "></i></a>&nbsp;&nbsp;'
////                    htmlAction += '<a href="index.php?r=crm/mail&amp;id=' + data + '" title="Mail" class="teal-text"  ><i   class="ti-comments-smiley teal-text "></i></a>&nbsp;&nbsp;'
//                    return htmlAction;
//                }
//            }
        ]
    });
    $('#tblUsers').DataTable({
        ajax: "index.php?r=users/getallcustomersbyuserid&id=" + userid + "",
//        async: false,
//        data: obj,
//        type: 'GET',
        "iDisplayLength": 5,
        "columns": [
            {"data": "id",
                "render": function (data, type, full, meta) {
                    var htmlAction = '';
                    return '<a href="index.php?r=users/edit&amp;id=' + full.uid + '"><b class="scroll" id="customer_id" onclick="getCustomerdetails(`' + full.id + '`)">' + full.cname + '</b></a>';
                    return htmlAction;
                }
            },
//            {"data": "ptype"},
//            {"data": "location"},
//            {"data": "cphone"},
             {"data": "id",
                "render": function (data, type, full, meta) {
                    var htmlAction = '';
                    return '<a href="index.php?r=crm/edit&amp;id=' + full.id + '"><b class="scroll" id="customer_id" onclick="getCustomerdetails(`' + full.id + '`)">' + full.username + '</b></a>';
                    return htmlAction;
                }
            },
//            {"data": "price",
//                "render": function (data, type, row, meta) {
//                    return '<b>' + getPriceinString(data) + '</b>';
//                }
//            },
            {"data": "id",
                "render": function (data, type, full, meta) {
                    var htmlAction = '';
//                    htmlAction += '<a href="index.php?r=crm/edit&amp;id=' + userid + '" title="Edit" class="teal-text"  ><i  class="ti-pencil teal-text "></i></a>&nbsp;&nbsp;'
//                    htmlAction += '<a href="#" title="Customer details" class="teal-text" id="customer_id" onclick="getCustomerdetails(`' + data + '`)" ><i   class="ti-user teal-text "></i></a>&nbsp;&nbsp;'
                    htmlAction += '<a href="index.php?r=crm/followup&amp;id=' + data + '" title="Follow up" class="teal-text"  ><i   class="ti-blackboard teal-text "></i></a>&nbsp;&nbsp;'
//                    htmlAction += '<a href="index.php?r=crm/mail&amp;id=' + data + '" title="Mail" class="teal-text"  ><i   class="ti-email teal-text "></i></a>&nbsp;&nbsp;'
//                    htmlAction += '<a href="#"  title="Mail" class="teal-text"  ><i onclick="inactive(' + data + ')" id="crmid"  class="ti-trash teal-text "></i></a>&nbsp;&nbsp;'
//                    htmlAction += '<a href="index.php?r=crm/mail&amp;id=' + data + '" title="Mail" class="teal-text"  ><i   class="ti-comments-smiley teal-text "></i></a>&nbsp;&nbsp;'
                    return htmlAction;
                }
            }
        ]
    });
    var oTable1 = $('#tblUsers').dataTable().yadcf([
        {column_number: 0,
            filter_type: "multi_select",
            select_type: 'select2',
            filter_default_label: 'name ',
            select_type_options: {
                width: '150px',
                minimumResultsForSearch: -1 // remove search box
            }
        },
        {column_number: 1,
            filter_type: "multi_select",
            select_type: 'select2',
            filter_default_label: 'emp',
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
    var table = $('#tblUsers').DataTable();
    $('#cusmin, #cusmax').keyup(function () {
        table.draw();
    });
}); // end document.ready
function inactive(tid) {
    $('#crmid').val(tid);
    var obj = new Object();
    obj.id = $('#crmid').val();
    alertify.confirm("Are you sure you want to delete?",
            function () {
                $.ajax({
                    url: 'index.php?r=crm/inactivecus',
                    async: false,
                    data: obj,
                    type: 'POST',
                    success: function (data) {
                        data = JSON.parse(data);
                        if (data.status == false) {

                        } else if (data.status == true) {
                            showMessage('success', 'Successfully deleted');
                            var mytbl = $("#tblCrmCustomer").datatable();
                            mytbl.ajax.reload;
                        }
                    },
                    error: function (data) {
                        showMessage('danger', 'Please try again.');
                    }

                });
            });
}
function formattedText(text) {
    return (text == null || text == '') ? '' : text.trim();
}

function getCustomerdetails(customer_id) {

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
    $('#customerDetails').show();
    $('#customer_id').val(customer_id);
    var obj = new Object();
    obj.id = $('#customer_id').val();
    $.ajax({
        url: 'index.php?r=crm/getcustomerdetailsbyid',
        async: false,
        data: obj,
        type: 'GET',
        success: function (data) {
            data = JSON.parse(data);
            if (data.status == true) {
//                  $('html, body').animate({
//        scrollTop: $("#featured").offset()
//    }, 2000);
                scrollTop: $("#featured").offset();
//            ($("#featured").scrollTop());
                var today = new Date();
                var dd = today.getDate();
                var mm = today.getMonth() + 1; //January is 0!
                var yyyy = today.getFullYear();
                if (dd < 10) {
                    dd = '0' + dd
                }
                if (mm < 10) {
                    mm = '0' + mm
                }
                today = mm + '-' + dd + '-' + yyyy;


                var html = '';
                html += '<div class="alert cus-data" id="featured">';
                html += '<strong>Customer name:-  ' + data.data.cname + '</strong><span> <i  class="ti-trash teal-text text-danger pull-right" style="cursor:pointer" onclick="hideDetails();" id="editIcon"></i></span>';
                html += '</div>';
                html += ' <div class="row">';
                html += ' <div class="col-md-6">';
                html += '<p class="card-text"><b>Phone:-</b> ' + data.data.cphone + '</p>';
                html += '<p class="card-text"><b>Location:-</b> ' + data.data.location + '</p>';



                html += '<p class="card-text "><b>Required proprty type:-</b>';

                html += '<span style="display:inline">';
                $.each(data.ptypename, function (k, v) {
                    html += '<p class="" style="display:inline"> ' + v.name + ' </p>';
                });
                html += '</span> </p>';

                html += '<p class="card-text "><b>Purchase / Sell / Rent:-</b>  ' + data.data.btype + '</p>';
                html += '<p class="card-text "><b>Budget:-</b>  ' + getPriceinString(data.data.price) + '</p>';
                html += '<p class="card-text "><b>Post remark:-</b> ' + formattedText(data.data.postremark) + '</p>';
                html += '<p class="card-text "><b>Follow up remark:-</b> ' + formattedText(data.data.remark) + '</p>';
                html += '</div>';
                html += '<div class="col-md-6">';
                html += '<p class="card-text"><b>Email:-</b> ' + data.data.cemail + '</p>';
                html += '<p class="card-text"><b>Merting place:-</b> ' + data.data.mtype + '</p>';
                html += '<p class="card-text "><b>Meeting status:-</b>     ' + data.data.meetingstatus + '</p>';
                html += '<p class="card-text "><b>Final status:-</b>  ' + formattedText(data.data.finalstatus) + '</p>';
                html += '<p class="card-text "><b>Refrence from:-</b>  ' + formattedText(data.data.reffrom) + '</p>';
                if (data.fdateshow === 'Jan-01,1970') {
                    var text = '';
                    html += '<p class="card-text "><b>Following date:-</b> ' + text + '</p>';
                } else {
//                    if (data.fdate < today ) {
//                          var Expired = ' Follow up expired m';
//                        html += '<p class="card-text "><b>Folloing date:-</b> ' + Expired + '</p>';
//                    } else {
//                         if (data.fdate === today) {
//                              var callCustomer = 'Cull this customer <i class="ti-bell teal-text"></i>';
//                        html += '<p class="card-text "><b>Folloing date:-</b> ' + (formattedText(data.fdateshow)) + ' '+ callCustomer+ '</p>';
//                         }else{
                    html += '<p class="card-text "><b>Following date:-</b> ' + (formattedText(data.fdateshow)) + ' </p>';

//                         }

//                    }
                }
                html += '</div>';
                html += '</div>';
                $('#customerDetails').html(html);

            }
        },
        error: function (data) {
            showMessage('danger', 'Please try again.');
        }

    });
}
function hideDetails() {
    $('#customerDetails').fadeOut('slow');
}

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
function Getempcount() {
    var userid = $('#userid').val();
     var userid = $('#userid').val();
    var obj = new Object();
    obj.userid = userid;
    $.ajax({
        url: 'index.php?r=users/getempcount',
        async: false,
        data: obj,
        type: 'GET',
        success: function (data) {
             data = JSON.parse(data);
                if (data.status === true) {
                    $('#crmcout').text(' Total Emp: '+ data.data +'');
                } else if (data.length === 0) {
                    $('#crmcout').text(' Total Emp:  NA ');
                }
        },
        error: function (data) {
            showMessage('danger', 'Please try again.');
        }
    });
}