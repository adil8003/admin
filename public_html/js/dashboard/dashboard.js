$(document).ready(function () {
// $('.js-example-basic-multiple').select2({
//        placeholder: "Select "
//    });
    getUserassignDataCount();
    getbuilders();
    getUsers();
    getAllCountStats();
    todayAllCallList();
    $("#panel").hide();
    'use strict';

    $.noConflict()
    $('#tblVoiceCustomer').DataTable({
        ajax: "index.php?r=dashboard/getallcustomers",
//        "iDisplayLength": 5,
        "columns": [
//            {"data": "name"},
            {"data": "mobile"},
//            {"data": "email"},
            {"data": "uemail"},
            {"data": "bname"},

            {"data": "id",
                "render": function (data, type, full, meta) {
                    var htmlAction = '';
                    htmlAction += '<a href="index.php?r=voicecall/edit&amp;id=' + data + '" title="Edit" class="teal-text"  ><i  class="ti-pencil teal-text "></i></a>&nbsp;&nbsp;'
//                    htmlAction += '<a href="#" title="Customer details" class="teal-text" id="customer_id" onclick="getCustomerdetails(`' + data + '`)" ><i   class="ti-user teal-text "></i></a>&nbsp;&nbsp;'
                    htmlAction += '<a href="index.php?r=voicecall/followup&amp;id=' + data + '" title="Follow up" class="teal-text"  ><i   class="ti-blackboard teal-text "></i></a>&nbsp;&nbsp;'
                    htmlAction += '<a href="index.php?r=voicecall/mail&amp;id=' + data + '" title="Mail" class="teal-text"  ><i   class="ti-email teal-text "></i></a>&nbsp;&nbsp;'
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
$("#flip").click(function () {
    $("#panel").slideToggle("slow");
});
var slider = document.getElementById("myRange");
var output = document.getElementById("demo");
output.innerHTML = slider.value;

slider.oninput = function () {
    output.innerHTML = this.value;
}
function getAllCountStats() {
    $.ajax({
        url: 'index.php?r=dashboard/getallprojectandcustomercount',
        async: false,
        type: 'GET',
        success: function (data) {
            data = JSON.parse(data)
            if (data.data[0].status == true) {
                $('#rescount').html('<p id="rescount">' + data.data[0].rescount + '</p>')
                $('#resalecount').html('<p id="resalecount">' + data.data[0].resalecount + '</p>')
                $('#cusCount').html('<p id="cusCount">' + data.data[0].crmcount + '</p>')
                $('#resMostPopular').html('<p id="resMostPopular">' + data.data[0].mostpopular + '</p>')
                $('#resMostvaluable').html('<p id="resMostvaluable">' + data.data[0].mostvaluable + '</p>')
                $('#feturedprojects').html('<p id="feturedprojects">' + data.data[0].feturedprojects + '</p>')

//                $('#resactive').html('<i id="resactive" class="fa fa-circle text-success"></i>Active ' + data.data[0].resactive + '');
//                $('#resinactive').html('<i id="resactive" class="fa fa-circle text-danger"></i>Inactive ' + data.data[0].resinactive + '');

                $('#resaleactive').html('<i id="resaleactive" class="fa fa-circle text-success"></i>Active ' + data.data[0].resaleactive + '');
                $('#resaleinactive').html('<i id="resaleinactive" class="fa fa-circle text-danger"></i>Inactive ' + data.data[0].resaleinactive + '');

                $('#cusactive').html('<i id="cusactive" class="fa fa-circle text-success"></i>Active ' + data.data[0].crmactive + '');
                $('#cusinactive').html('<i id="cusinactive" class="fa fa-circle text-danger"></i>Inactive ' + data.data[0].crminactive + '');
//                $('#resMostPopular').html('<i id="cusactive" class="fa fa-circle text-success"></i>Active ' + data.data[0].mostpopular + '');
//                $('#resMostvaluable').html('<i id="cusinactive" class="fa fa-circle text-danger"></i>Inactive ' + data.data[0].crminactive + '');
            }
        },
        error: function (data) {
            showMessage('danger', 'Please try again.');
        }
    });
}
function todayAllCallList() {
    $.ajax({
        url: 'index.php?r=dashboard/getalltodaycallcustomerlist',
        async: false,
        type: 'GET',
        success: function (data) {
            data = JSON.parse(data)
            if (data.data[0].status == true) {

                $.each(data, function (k, v) {
                    var count = v.length;
//                     console.log(count);
                    $('#custCount').html('<a href=""> <p id="custCount">' + count + '</p> </a>');
                    $('#callList').html('<a href="index.php?r=crm/callnow"> <i class="ti-eye "></i> </a>');

                });
//                $.each(data.data, function (k, v) {
//                    var html = '';
//                    html += '<div class="card shadow">';
//                    html += '<div class="alert alert-info" style="background-color: #b2bec1;">';
//                    html += '<strong style="color:red">' + v.cname + '</strong><span><a class="iconPencil hide" href="#"  id="editForm"> <i  class="ti-pencil teal-text pull-right " id="editIcon"></i></a></span>';
//                    html += '</div>';
//                    html += '<p class="card-text text-info">' + v.cphone + '</p>';
//                    html += '</div>';
//                    $('#customerCallList').html(html)
//                });


            }
        },
        error: function (data) {
            showMessage('danger', 'Please try again.');
        }
    });
}

function getbuilders(id) {
    var obj = new Object();
    obj.id = id;
    $.ajax({
        url: 'index.php?r=voicecall/getbuilders',
        async: false,
        data: obj,
        type: 'POST',
        success: function (data) {
            var data = JSON.parse(data);
            if (data.data.length === 0) {

            } else {
                var html = '';
                $.each(data.data, function (k, v) {
                    html += '<option value=' + v.id + ' >' + v.name + '</option>>';
                });
                $('#builderid').html(html);
            }
        }
    });
}
function getUsers(id) {
    var obj = new Object();
    obj.id = id;
    $.ajax({
        url: 'index.php?r=voicecall/getusers',
        async: false,
        data: obj,
        type: 'POST',
        success: function (data) {
            var data = JSON.parse(data);
            if (data.data.length === 0) {
            } else {
//                console.log(data);
//                 var html = '';
//                $.each(data.data, function (k, v) {
//                    html += '<li value=' + v.id + '><li><p>' + v.email + '</p></li>' + v.email + '</li>';
//                    html += '<li value=' + v.id + '><li><p>' + v.email + '</p></li>' + v.email + '</li>';
//                });
//                $('#usersList').html(html);

                var html = '';
                $.each(data.data, function (k, v) {
                    html += '<option value=' + v.id + ' >' + v.email + '</option>>';
                });
                $('#userid').html(html);
                var html = '';
                $.each(data.data, function (k, v) {
                    if (v.role_id == 2) {
                        html += '<option value=' + v.id + ' >' + v.email + '</option>>';
                    }
                });
                $('#internaluserid').html(html);
            }
        }
    });
}
function saveVoiceCallData() {
    var formData = new FormData();
    formData.append('file', $('#file1')[0].files[0]);
    alertify.confirm("Are you sure you want add this?",
            function () {
                $.ajax({
                    url: "index.php?r=voicecall/bulkuploadcustomers",
                    async: false,
                    type: 'POST',
                    data: formData,
                    processData: false, // tell jQuery not to process the data
                    contentType: false, // tell jQuery not to set contentType
                    success: function (data) {
                        data = JSON.parse(data);
                        if (data.status == true) {
                        }
                    },
                    error: function (data) {
                        showMessage('danger', 'Please try again.');
                    }
                });
            });
}
function saveGetComData() {
//    if (validateBuilders()) {
    var obj = new Object();
    obj.builderid = $('#builderid').val();
    obj.userid = $('#userid').val();
    obj.max = $('#max').val();
    obj.min = $('#min').val();
    $.ajax({
        url: 'index.php?r=voicecall/savecomdata',
        async: false,
        data: obj,
        type: 'POST',
        success: function (data) {
            showMessage('success', 'Customer added successfully.');
            $('#bname').val(' ');
        },
        error: function (data) {
            showMessage('danger', 'Please try again.');
        }
    });
//    }
}
function validateBuilders() {
    var flag = true;
    var bname = $('#bname').val();

    if (bname == '') {
        $('#err-bname').html('Name required');
        flag = false;
    } else {
        $('#err-bname').html('');
    }

    return flag;
}
function getUserassignDataCount() {
    $.ajax({
        url: 'index.php?r=dashboard/getallcustomerscontbyuserid',
        async: false,
        type: 'POST',
        success: function (data) {
            data = JSON.parse(data);
//            if (data.status == true) {
//            console.log(data.data);
//            }
            var html = '';
//            $.each(data.data, function (k, v) {
//                console.log(v);
            html += '<li><p>user1@admin.com:- <spam> ' + data.data[0].c1 + '</spam></p></li>';
            html += '<li><p>user2@admin.com:- <spam> ' + data.data[0].c2 + '</spam> </p></li>';
            html += '<li><p>user3@admin.com:- <spam> ' + data.data[0].c2 + '</spam>  </p></li>';
            html += '<li><p>user4@admin.com:- <spam> ' + data.data[0].c3 + '</spam> </p></li>';
            html += '<li><p>user5@admin.com:- <spam> ' + data.data[0].c4 + '</spam> </p></li>';
//            });
            $('#usersList').html(html);
        },
        error: function (data) {

        }
    });
}
function saveBuilders() {
    if (validateBuilders()) {
        var obj = new Object();
        obj.bname = $('#bname').val();
        $.ajax({
            url: 'index.php?r=dashboard/savebuilder',
            async: false,
            data: obj,
            type: 'POST',
            success: function (data) {
                showMessage('success', 'Builder added successfully.');
                $('#bname').val(' ');
            },
            error: function (data) {
                showMessage('danger', 'Please try again.');
            }
        });
    }
}
function validateBuilders() {
    var flag = true;
    var bname = $('#bname').val();

    if (bname == '') {
        $('#err-bname').html('Name required');
        flag = false;
    } else {
        $('#err-bname').html('');
    }

    return flag;
}
function dataAssigntoemp() {
    if (validateBuilders()) {
        var obj = new Object();
        obj.min = $('#internalmin').val();
        obj.max = $('#internalmax').val();
        obj.limit = $('#limitnum').val();
        obj.userid = $('#internaluserid').val();
        $.ajax({
            url: 'index.php?r=dashboard/savedataassigntoemp',
            async: false,
            data: obj,
            type: 'POST',
            success: function (data) {
                showMessage('success', 'Builder added successfully.');
                $('#CountData').html('Data assigned successfully.');
                 setTimeout(function () {
                    $('#CountData').hide();
                }, 5000);
            },
            error: function (data) {
                showMessage('danger', 'Please try again.');
            }
        });
    }
}
function getData() {
    if (validateBuilders()) {
        var obj = new Object();
        obj.min = $('#internalmin').val();
        obj.max = $('#internalmax').val();
        $.ajax({
            url: 'index.php?r=dashboard/savelistofdata',
            async: false,
            data: obj,
            type: 'POST',
            success: function (data) {
                data = JSON.parse(data);
                showMessage('success', 'Builder added successfully.');
                if (data.status === true) {
                    $('#CountData').html(data.data);
                } else if (data.length === 0) {
                    $('#CountData').html('try again');
                }
            },
            error: function (data) {
                showMessage('danger', 'Please try again.');
            }
        });
    }
}
function validateBuilders() {
    var flag = true;
    var internalmin = $('#internalmin').val();
    var internalmax = $('#internalmax').val();

    if (internalmin == '') {
        $('#err-internalmin').html('Required field');
        flag = false;
    } else {
        $('#err-internalmin').html('');
    }
    if (internalmax == '') {
        $('#err-internalmax').html('Required field');
        flag = false;
    } else {
        $('#err-internalmax').html('');
    }

    return flag;
}