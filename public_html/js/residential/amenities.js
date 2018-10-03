$(document).ready(function () {
    allAmenities();
    GetResdetailsbyid();
    var res_id = $('#res_id').val();
    $('#updateForm').hide();
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

function UpdateAmenities (id,aname) {
    $('#addForm').hide();
    $('#propertyDetails').show();
    $('#updateForm').show();
    $('#uaname').val(aname);
    $('#amenities_id').val(id);
}
function  updateAmenities() {
    var amenities_id = $('#amenities_id').val();
    var res_id = $('#res_id').val();
    if (validateFollowupupdate()) {
        alertify.confirm("Are you sure you want update this amenities?",
                function () {
                    var obj = new Object();
                    obj.residentialid = res_id;
                    obj.id = amenities_id;
                    obj.aname = $('#uaname').val();
                    $.ajax({
                        url: 'index.php?r=residential/updateamenities',
                        async: false,
                        data: obj,
                        type: 'POST',
                        success: function (data) {
                            showMessage('success', 'Update successfully.');
                            allAmenities();
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
function GetResdetailsbyid() {
    var res_id = $('#res_id').val();
    var obj = new Object();
    obj.id = res_id;
    $.ajax({
        url: "index.php?r=residential/getresdetailsbyid",
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
    var html = '';
    html += '<div class="card " style="min-height: 240px;">';
    html += '<div class="alert alert-info text-info">';
    html += '<strong> Project Name:   <a href="index.php?r=residential/edit&amp;id=' + data.data.id + '">    ' + data.data.pname + ' </a></strong>';
    html += '</div>';
    html += '<p class=" text-danger" style="font-size: 13px;padding:2px">Developer name.:- ' + data.data.dname + '</p>';
    html += '<p class="text-bold" style="font-size: 17px;padding:2px">Price. :- ' + getPriceinString(data.data.price) + '</p>';
    html += '<p class=" text-danger" style="font-size: 13px;padding:2px"> Property type:- ' + data.data.ptype + '</p>';
    html += '<p class=" text-danger" style="font-size: 13px;padding:2px">Property For:-  ' + data.data.btype + '</p>';
    html += '<p class=" text-danger" style="font-size: 13px;padding:2px">Location:-  ' + data.data.location + '</p>';
    html += '</div>';
    $('#propertyDetails').html(html);
}

function allAmenities(id) {
    var res_id = $('#res_id').val();
    var obj = new Object();
    obj.residentialid = res_id;
    obj.page = $('#listpage').val();
    $.ajax({
        url: "index.php?r=residential/getallamenities",
        async: false,
        data: obj,
        type: 'GET',
        success: function (data) {
            data = JSON.parse(data);
            if (data.data == '') {
                $('#notAvailable').html("<h5>Amenities  not available </h5>");
            } else {
                if (data.data[0].status === true) {
                    window.listCourse = data;
                    var htm = '';
                    htm = getAmenitiesCard(data);
                    $('#amenitiesList').html(htm);

                }
            }
        }
    });
}

//follow up layout-
function searchPage(page) {
    $('#listpage').val(page);
    allAmenities();
}
function getAmenitiesCard(dataAll) {
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
            html += '<div class="card shadow" >';
            html += '<div class="alert alert-info">';
            html += '<strong style="color:red">' + v.aname + '</strong><span><a class="iconPencil " href="#" onclick="UpdateAmenities(`' + v.id + '`,`' + v.aname + '`);" id="editForm"> <i  class="ti-pencil teal-text pull-right " id="editIcon"></i></a></span> ';
            html += '</div>';
//            html += '<p class="card-text text-info">' + v.aname + '</p>';
//            html += '<p class="card-text text-danger"><span><p class="text-center text-danger"></p> </span></p>';
            html += '</div>';
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



function saveAmenities() {
    var res_id = $('#res_id').val();
    if (validateFollowup()) {
//        alertify.confirm("Are you sure you want add this amenities?",
//                function () {
                    var obj = new Object();
                    obj.residentialid = res_id;
                    obj.aname = $('#aname').val();
                    $.ajax({
                        url: 'index.php?r=residential/saveamenities',
                        async: false,
                        data: obj,
                        type: 'POST',
                        success: function (data) {
                            showMessage('success', 'Amenities added successfully.');
                            allAmenities();
                            $('#aname').val(' ');
                        },
                        error: function (data) {
                            showMessage('danger', 'Please try again.');
                        }
                    });
//                });
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
    if (followupdate == '') {
        $('#err-followupdate').html('Date required');
        flag = false;
    } else {
        $('#err-followupdate').html('');
    }


    return flag;
}