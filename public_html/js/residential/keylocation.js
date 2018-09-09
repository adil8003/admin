$(document).ready(function () {
    allKeyLocation();
    GetResdetailsbyid();
    var res_id = $('#res_id').val();
    var keylocation_id = $('#keylocation_id').val();
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
function Updateform(id, kname, distance) {
    $('#addForm').hide();
    $('#customerDetails').show();
    $('#updateForm').show();
    $('#ukname').val(kname);
    $('#udistance').val(distance);
    $('#keylocation_id').val(id);
}

function  updateLocation() {
    var keylocation_id = $('#keylocation_id').val();
    var res_id = $('#res_id').val();
    if (validateUpdateLocation()) {
        alertify.confirm("Are you sure you want update this follow up?",
                function () {
                    var obj = new Object();
                    obj.residentialid = res_id;
                    obj.id = keylocation_id;
                    obj.kname = $('#ukname').val();
                    obj.distance = $('#udistance').val();

                    $.ajax({
                        url: 'index.php?r=residential/updatekeylocation',
                        async: false,
                        data: obj,
                        type: 'POST',
                        success: function (data) {
                            showMessage('success', 'Update successfully.');
                            allKeyLocation();
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
    html += '<div class="alert alert-info" style="#DD0330">';
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
function allKeyLocation(id) {
    var res_id = $('#res_id').val();
    var obj = new Object();
    obj.residentialid = res_id;
    obj.page = $('#listpage').val();
    $.ajax({
        url: "index.php?r=residential/getallkeylocation",
        async: false,
        data: obj,
        type: 'GET',
        success: function (data) {
            data = JSON.parse(data);
            if (data.data.length === 0) {
                $('#notAvailable').html("<h5>Key location not available </h5>");
            } else {
                if (data.data[0].status === true) {
                    window.listKeylocation = data;
                    var htm = '';
                    htm = getkeylocationHtmlCard(data);
                    $('#keylocationlist').html(htm);

                }
            }
        }
    });
}

//follow up layout-
function searchPage(page) {
    $('#listpage').val(page);
    allKeyLocation();
}
function getkeylocationHtmlCard(dataAll) {
    dataAll = window.listKeylocation;
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
            html += '<div class="card shadow" style="    width: 298px;" >';
            html += '<div class="alert alert-info">';
            html += '<span>'+ v.distance +' KM </span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>' + v.kname + '</strong><span><a class="iconPencil " href="#" onclick="Updateform(`' + v.id + '`,`' + v.kname + '`,`' + v.distance + '`);" id="editForm"> <i  class="ti-pencil teal-text pull-right " id="editIcon"></i></a></span> ';
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



function saveLocation() {
    var res_id = $('#res_id').val();
    if (validateLocation()) {
        alertify.confirm("Are you sure you want add this key location?",
                function () {
                    var obj = new Object();
                    obj.residentialid = res_id;
                    obj.kname = $('#kname').val();
                    obj.distance = $('#distance').val();
                    $.ajax({
                        url: 'index.php?r=residential/savekeylocation',
                        async: false,
                        data: obj,
                        type: 'POST',
                        success: function (data) {
                            showMessage('success', 'Added successfully.');
                            allKeyLocation();
                            $('#kname').val(' ');
                            $('#distance').val(' ');
                        },
                        error: function (data) {
                            showMessage('danger', 'Please try again.');
                        }
                    });
                });
    }
}
function validateUpdateLocation() {
    var flag = true;
    var kname = $('#ukname').val();
    var distance = $('#udistance').val();
    if (kname == '') {
        $('#err-kanme').html('Key Location required');
        flag = false;
    } else {
        $('#err-kname').html('');
    }
      $('#ukname').keypress(function (e) {
        var regex = new RegExp("^[a-zA-Z]+$");
        var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
        if (regex.test(str)) {
            return true;
        } else
        {
            e.preventDefault();
            $('#err-ukname').html(' Please Enter Alphabate');
            return false;
        }
    });
    if (distance == '') {
        $('#err-udistance').html('Distance required');
        flag = false;
    } else {
        $('#err-udistance').html('');
         if (isNaN(distance)) {
            $('#err-udistance').html('Must be numerical');
            flag = false;
        }
    }
    return flag;
}
function validateLocation() {
    var flag = true;
    var kname = $('#kname').val();
    var distance = $('#distance').val();
    if (kname == '') {
        $('#err-kname').html('Key Location required');
        flag = false;
    } else {
        $('#err-kname').html('');
    }
    
    if (distance == '') {
        $('#err-distance').html('Distance required');
        flag = false;
    } else {
        $('#err-distance').html('');
         if (isNaN(distance)) {
            $('#err-distance').html('Must be numerical');
            flag = false;
        }
    }
    return flag;
}