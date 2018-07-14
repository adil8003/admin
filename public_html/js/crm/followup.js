$(document).ready(function () {
    allFollowup();
    getFollowbycustomerdetaisbyid();
    var crmid = $('#crm_id').val();
    var follow_id = $('#follow_id').val();
    $('#followupdate').datetimepicker({
        format: 'Y-m-d H:i',
        step: 15
    });
    $('#updateForm').hide();
}); // end document.ready

function Updateform(id, remark, followupdate) {
    $('#ufollowupdate').datetimepicker({
        format: 'Y-m-d H:i',
        step: 15
    });
    $('#addForm').hide();
    $('#customerDetails').show();
    $('#updateForm').show();
    $('#uremark').val(remark);
    $('#ufollowupdate').val(followupdate);
    $('#follow_id').val(id);
}
function  updateFollowup() {
    var follow_id = $('#follow_id').val();
    var crmid = $('#crm_id').val();
    if (validateFollowupupdate()) {
        alertify.confirm("Are you sure you want update this follow up?",
                function () {
                    var obj = new Object();
                    obj.crm_id = crmid;
                    obj.id = follow_id;
                    obj.remark = $('#uremark').val();
                    obj.followupdate = $('#ufollowupdate').val();

                    $.ajax({
                        url: 'index.php?r=crm/updatefollowup',
                        async: false,
                        data: obj,
                        type: 'POST',
                        success: function (data) {
                            showMessage('success', 'Update successfully.');
                            allFollowup();
                            $('#addForm').show();
                            $('#updateForm').hide();
                        },
                        error: function (data) {
                            showMessage('danger', 'Please try again.');
                        }
                    });
                });
    }
}
function getFollowbycustomerdetaisbyid() {
    var crmid = $('#crm_id').val();
    var obj = new Object();
    obj.id = crmid;
    $.ajax({
        url: "index.php?r=crm/getcustomerdetailsbyid",
        async: false,
        data: obj,
        type: 'GET',
        success: function (data) {
            var data = JSON.parse(data);
            console.log(data);
            if (data.status == true) {
                createHTML(data);

            }
        }
    });
}
function createHTML(data) {
    var id = $('#org_id').val();
    var html = '';
    html += '<div class="card " style="min-height: 240px;">';
    html += '<div class="alert alert-info text-info">';
    html += '<strong> Customer Name:   <a href="index.php?r=crm/edit&amp;id=' + data.data.id + '">    ' + data.data.cname + ' </a></strong>';
    html += '</div>';
    html += '<p class=" text-danger" style="font-size: 13px;padding:2px">Phone no.:- ' + data.data.cphone + '</p>';
    html += '<p class=" text-danger" style="font-size: 13px;padding:2px"> Property type:- ' + data.data.ptype + '</p>';
    html += '<p class=" text-danger" style="font-size: 13px;padding:2px">Buy/Rent/REsale:-  ' + data.data.btype + '</p>';
    html += '<p class=" text-danger" style="font-size: 13px;padding:2px"> Detals of property:-  ' + data.data.detailsofproperty + '</p>';
    html += '<p class=" text-danger" style="font-size: 13px;padding:2px">Status:-  ' + data.data.finalstatus + '</p>';
    html += '</div>';
    $('#customerDetails').html(html);
}

function allFollowup(id) {
    var crmid = $('#crm_id').val();
    var obj = new Object();
    obj.id = crmid;
    obj.page = $('#listpage').val();
    $.ajax({
        url: "index.php?r=crm/getallfollowup",
        async: false,
        data: obj,
        type: 'GET',
        success: function (data) {
            data = JSON.parse(data);
            if (data.data == '') {
                $('#notAvailable').html("<h5>Follow up not available </h5>");
            } else {
                if (data.data[0].status == true) {
                    window.listCourse = data;
                    var htm = '';
                    htm = getCourseHorizontalCard(data);
                    $('#followuplist').html(htm);

                }
            }
        }
    });
}

//follow up layout-
function searchPage(page) {
    $('#listpage').val(page);
    allFollowup();
}
function getCourseHorizontalCard(dataAll) {
    dataAll = window.listCourse;
    var intRecords = dataAll.data.length;
    var intRecordsPerpage = 5;
    var intRecordsMaxpage = Math.ceil(dataAll.data.length / intRecordsPerpage);
    var intCurrPage = $('#listpage').val();
    var html = '';

    $.each(dataAll.data, function (k, v) {
        var url = window.location.href;
        var startRecord = (intCurrPage - 1) * intRecordsPerpage;
        var endRecord = intCurrPage * intRecordsPerpage;
        if (startRecord <= k && k < endRecord) {

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
            if (v.date < today) {

                var Expired = ' Follow up expired';

                html += '<div class="card shadow" >';
                html += '<div class="alert alert-info">';
                html += '<strong style="color:red">' + v.followupdate + '</strong><span><a class="iconPencil hide" href="#" onclick="Updateform(`' + v.id + '`,`' + v.remark + '`,`' + v.followupdate + '`);" id="editForm"> <i  class="ti-pencil teal-text pull-right " id="editIcon"></i></a></span> ';
                html += '</div>';
                html += '<p class="card-text text-info">' + v.remark + '</p>';
                html += '<p class="card-text text-danger"><span><p class="text-center text-danger">' + Expired + '</p> </span></p>';
                html += '</div>';
                $('#editIcon').hide();

            } else {
                if (v.date === today) {
                    var callCustomer = 'Cull this customer <i class="ti-bell teal-text"></i>';
                    html += '<div class="card shadow">';
                    html += '<div class="alert alert-info">';
                    html += '<strong>' + v.followupdate + '</strong> <span>\n\
                             <a href="#" onclick="Updateform(`' + v.id + '`,`' + v.remark + '`,`' + v.followupdate + '`);" id="editForm">\n\
                            <span class="pull-right blink text-danger">' + callCustomer + '</span> \n\
                            <i  class="ti-pencil teal-text pull-right ">&nbsp;</i></a></span> ';
                    html += '</div>';
                    html += '<p class="card-text text-info">' + v.remark + '</p>';
                    html += '</div>';
                } else {
                    html += '<div class="card shadow">';
                    html += '<div class="alert alert-info">';
                    html += '<strong>' + v.followupdate + '</strong> \n\
                             <span><a href="#" onclick="Updateform(`' + v.id + '`,`' + v.remark + '`,`' + v.followupdate + '`);" id="editForm">\n\
                            <span class="pull-right blink text-danger"></span> \n\
                            <i  class="ti-pencil teal-text pull-right ">&nbsp;</i></a></span> ';
                    html += '</div>';
                    html += '<p class="card-text text-info">' + v.remark + '</p>';
                    html += '</div>';
                }
                function blink_text() {
                    $('.blink').fadeOut(500);
                    $('.blink').fadeIn(500);
                }
                setInterval(blink_text, 1000);
            }
        }
    });

    html += '<div id="pagination">';
    html += '<span class="all-pages">Page ' + intCurrPage + ' of ' + intRecordsMaxpage + '</span>';
    for (var i = 1; i <= intRecordsMaxpage; i++) {
        if (i != intCurrPage) {
            html += '<span onclick="searchPage(' + i + ');" class="page-num">' + i + '</span>';
        } else {
            html += '<span class="current page-num">' + i + '</span>';
        }
    }
    html += '</div><br>';
    return html;
}



function saveFollowup() {
    var crmid = $('#crm_id').val();
    if (validateFollowup()) {
        alertify.confirm("Are you sure you want add this follow up?",
                function () {
                    var obj = new Object();
                    obj.crm_id = crmid;
                    obj.remark = $('#remark').val();
                    obj.followupdate = $('#followupdate').val();

                    $.ajax({
                        url: 'index.php?r=crm/savefollowup',
                        async: false,
                        data: obj,
                        type: 'POST',
                        success: function (data) {
                            showMessage('success', 'Added successfully.');
                            allFollowup();
                            $('#remark').val(' ');
                            $('#followupdate').val(' ');
                        },
                        error: function (data) {
                            showMessage('danger', 'Please try again.');
                        }
                    });
                });
    }
}
function validateFollowupupdate() {
    var flag = true;
    var remark = $('#uremark').val();
    var followupdate = $('#ufollowupdate').val();



    if (remark == '') {
        $('#err-uremark').html('Remark required');
        flag = false;
    } else {
        $('#err-uremark').html('');
    }
      $('#uremark').keypress(function (e) {
        var regex = new RegExp("^[a-zA-Z]+$");
        var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
        if (regex.test(str)) {
            return true;
        } else
        {
            e.preventDefault();
            $('#err-uremark').html(' Please Enter Alphabate');
            return false;
        }
    });
    if (followupdate == '') {
        $('#err-ufollowupdate').html('Date required');
        flag = false;
    } else {
        $('#err-ufollowupdate').html('');
    }
   


    return flag;
}
function validateFollowup() {
    var flag = true;
    var remark = $('#remark').val();
    var followupdate = $('#followupdate').val();



    if (remark == '') {
        $('#err-remark').html('Remark required');
        flag = false;
    } else {
        $('#err-remark').html('');
    }
      $('#remark').keypress(function (e) {
        var regex = new RegExp("^[a-zA-Z]+$");
        var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
        if (regex.test(str)) {
            return true;
        } else
        {
            e.preventDefault();
            $('#err-remark').html(' Please Enter Alphabate');
            return false;
        }
    });
    if (followupdate == '') {
        $('#err-followupdate').html('Date required');
        flag = false;
    } else {
        $('#err-followupdate').html('');
    }
    


    return flag;
}