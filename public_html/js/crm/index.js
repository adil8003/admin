$(document).ready(function () {
    Allcrm();
    $('#customerDetails').hide();
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
function Allcrm() {
    $.noConflict()
    $('#tblCrmCustomer').DataTable({
        ajax: "index.php?r=crm/getallcustomers",
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
}

function formattedText(text) {
    return (text == null || text == '') ? '' : text.trim();
}

function getCustomerdetails(customer_id) {
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
                html += '<div class="alert cus-data">';
                html += '<strong>Customer name:-  ' + data.data.cname + '</strong><span> <i  class="ti-trash teal-text text-danger pull-right" style="cursor:pointer" onclick="hideDetails();" id="editIcon"></i></span>';
                html += '</div>';
                html += ' <div class="row">';
                html += ' <div class="col-md-6">';
                html += '<p class="card-text"><b>Phone:-</b> ' + data.data.cphone + '</p>';
                html += '<p class="card-text"><b>Location:-</b> ' + data.data.location + '</p>';
                html += '<p class="card-text "><b>Required proprty type:-</b>     ' + data.data.ptype + '</p>';
                html += '<p class="card-text "><b>Purchase / Sell / Rent:-</b>  ' + data.data.btype + '</p>';
                html += '<p class="card-text "><b>Budget:-</b>  ' + getPriceinString(data.data.price) + '</p>';
                html += '<p class="card-text "><b>Remark:-</b> ' + formattedText(data.data.remark) + '</p>';
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
                    html += '<p class="card-text "><b>Folloing date:-</b> ' + (formattedText(data.fdateshow)) + ' </p>';

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
