$(document).ready(function () {
    $('#possesiondate').datetimepicker({
        format: 'Y-m-d',
    });
    $('#yearofconstruct').datetimepicker({
        format: 'Y-m-d',
    });
    allWings();
    GetResdetailsbyid();
    var res_id = $('#res_id').val();
    var update_id = $('#update_id').val();
    $('#updateForm').hide();
        $('#addbutton').hide();
    
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
function Updateform(id,wing, possesiondate,cstatus,yearofconstruct,carpetarea,salablearea,reraid) {
       $('#upossesiondate').datetimepicker({
        format: 'Y-m-d',
        step: 15
    });
       $('#uyearofconstruct').datetimepicker({
        format: 'Y-m-d',
        step: 15
    });
    $('#addForm').hide();
    $('#customerDetails').show();
    $('#updateForm').show();
    $('#update_id').val(id);
    $('#uwing').val(wing);
    $('#upossesiondate').val(possesiondate);
    $('#ucstatus').val(cstatus);
    $('#uyearofconstruct').val(yearofconstruct);
    $('#ucarpetarea').val(carpetarea);
    $('#usalablearea').val(salablearea);
    $('#ureraid').val(reraid);
    $('#addbutton').show();

}

function  updateRwing() {
    var update_id = $('#update_id').val();
    var res_id = $('#res_id').val();
    if (validateUpdateLocation()) {
        alertify.confirm("Are you sure you want update?",
                function () {
                    var obj = new Object();
                    obj.residentialid = res_id;
                    obj.id = update_id;
                    obj.wing = $('#uwing').val();
                    obj.status = $('#ucstatus').val();
                    obj.possesiondate = $('#upossesiondate').val();
                    obj.yearofconstruct = $('#uyearofconstruct').val();
                    obj.carpetarea = $('#ucarpetarea').val();
                    obj.salablearea = $('#usalablearea').val();
                    obj.reraid = $('#ureraid').val();
                    $.ajax({
                        url: 'index.php?r=residential/updatewings',
                        async: false,
                        data: obj,
                        type: 'POST',
                        success: function (data) {
                            showMessage('success', 'Update successfully.');
                            allWings();
                            $('#addForm').show();
                            $('#updateForm').hide();
                            $('#addbutton').hide();
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
     html += '<p class=" text-danger" style="padding:2px"><b>Proprty type:-</b> </p>';
                  html += '<span style="display:inline">';
                $.each(data.ptypename, function (k, v) {
                    html += '<p class="" style="display:inline"> ' + v.name + ' </p>';
                });
                html += '</span> </p>';
    html += '<p class=" text-danger" style="font-size: 13px;padding:2px">Property For:-  ' + data.data.btype + '</p>';
    html += '<p class=" text-danger" style="font-size: 13px;padding:2px">Location:-  ' + data.data.location + '</p>';
    html += '</div>';
    $('#propertyDetails').html(html);

}
function allWings(id) {
    var res_id = $('#res_id').val();
    var obj = new Object();
    obj.residentialid = res_id;
    obj.page = $('#listpage').val();
    $.ajax({
        url: "index.php?r=residential/getallwings",
        async: false,
        data: obj,
        type: 'GET',
        success: function (data) {
            data = JSON.parse(data);
            if (data.data.length === 0) {
                $('#notAvailable').html("<h5>Construction details not available </h5>");
            } else {
                if (data.data[0].status === true) {
                    window.listWings = data;
                    var htm = '';
                    htm = getkeylocationHtmlCard(data);
                    $('#keyWingslist').html(htm);

                }
            }
        }
    });
}

//follow up layout-
function searchPage(page) {
    $('#listpage').val(page);
    allWings();
}
function getkeylocationHtmlCard(dataAll) {
    dataAll = window.listWings;
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
            html += '<span><strong>Year of construct:&nbsp;&nbsp;' + v.yearofconstruct + ' </strong><a class="iconPencil " href="#" onclick="Updateform(`' + v.id + '`,`' + v.wing + '`,`'+ v.possesiondate +'`,`' + v.status1 + '`,`'+ v.yearofconstruct +'`,`'+ v.carpetarea +'`,`'+ v.salablearea +'`,`'+ v.reraid +'`);" id="editForm"> <i  class="ti-pencil teal-text pull-right" id="editIcon"></i></a></span></span> ';
            html += '</div>';
            html += '<div class="row" style="padding:10px">';
                html += '<div class="col-md-6">';
                html += '<div class="card-text">Phases/wings: <b> ' + v.wing + '</b></div>';
                html += '</div>';
                html += '<div class="col-md-6">';
                html += '<div class="card-text">Possession date: <b>' + v.possesiondate + '</b></div>';
                html += '</div>';
            html += '</div>';
            html += '<div class="row" style="padding:10px">';
                html += '<div class="col-md-4">';
                html += '<div class="card-text">Carpet area:<b> ' + v.carpetarea + ' Sqft</b></div>';
                html += '</div>';
                html += '<div class="col-md-4">';
                html += '<div class="card-text">Salable area: <b> ' + v.salablearea + ' Sqft</b></div>';
                html += '</div>';
                html += '<div class="col-md-4">';
                html += '<div class="card-text">Rera ID: <b> ' + v.reraid + '</b></div>';
                html += '</div>';
            html += '<div class="row" style="padding:10px"><hr>';
                html += '<div class="col-md-12">';
                html += '<div class="card-text" style="word-wrap: break-word;"><b> ' + v.status1 + '</b></div>';
                html += '</div>';
                html += '</div>';
            html += '</div>';
//            html += '<p class="card-text"><b>' + v.wing + '</b></p>';
//            html += '<p class="card-text"><b>' + v.wing + '</b></p>';
//            html += '<p class="card-text " style="color:red"><b>' + v.wing + '</b><span><p class="card-text "><b>' + v.wing + '</b></p></span></p>';
//            html += '<p class="card-text pull-right pull-right" style="padding:6px;word-wrap: break-word;"><strong>Possession date:&nbsp;&nbsp; ' + v.possesiondate + '</strong></p><br>';
//            html += '<p class="card-text "><b>' + v.wing + '</b></p>';
//            html += '<p class="card-text "><b>' + v.wing + '</b></p>';
//            html += '<p class="card-text pull-left"><b>' + v.wing + '</b></p>';
//            html += '<p class="card-text" style="padding:6px;word-wrap: break-word;">' + v.status1 + '</p>';
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



function saveRwing() {
    var res_id = $('#res_id').val();
    if (validateLocation()) {
        alertify.confirm("Are you sure you want add this Wing?",
                function () {
                    var obj = new Object();
                    obj.residentialid = res_id;
                    obj.wing = $('#wing').val();
                    obj.possesiondate = $('#possesiondate').val();
                    obj.status = $('#cstatus').val();
                    obj.yearofconstruct = $('#yearofconstruct').val();
                    obj.carpetarea = $('#carpetarea').val();
                    obj.salablearea = $('#salablearea').val();
                    obj.reraid = $('#reraid').val();
                    $.ajax({
                        url: 'index.php?r=residential/savewings',
                        async: false,
                        data: obj,
                        type: 'POST',
                        success: function (data) {
                            showMessage('success', 'Added successfully.');
                            allWings();
                            $('#wing').val(' ');
                            $('#possesiondate').val(' ');
                            $('#yearofconstruct').val(' ');
                            $('#cstatus').val(' ');
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
    var wing = $('#uwing').val();
    var possesiondate = $('#upossesiondate').val();
    var yearofconstruct = $('#uyearofconstruct').val();
    var ucstatus = $('#ucstatus').val();
    if (wing == '') {
        $('#err-uwing').html('Enter wing');
        flag = false;
    } else {
        $('#err-uwing').html('');
    }
    $('#uwing').keypress(function (e) {
        var regex = new RegExp("^[a-zA-Z]+$");
        var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
        if (regex.test(str)) {
            return true;
        } else
        {
            e.preventDefault();
            $('#err-uwing').html(' Please Enter Alphabate');
            return false;
        }
    });
    if (possesiondate == '') {
        $('#err-upossesiondate').html('Possesion date required');
        flag = false;
    } else {
        $('#err-upossesiondate').html('');
    }
    if (yearofconstruct == '') {
        $('#err-uyearofconstruct').html('Year of construct required');
        flag = false;
    } else {
        $('#err-uyearofconstruct').html('');
    }
    return flag;
}
function validateLocation() {
    var flag = true;
    var kname = $('#wing').val();
    var possesiondate = $('#possesiondate').val();
    var yearofconstruct = $('#yearofconstruct').val();
    if (kname == '') {
        $('#err-wing').html('Wing required');
        flag = false;
    } else {
        $('#err-wing').html('');
    }
    $('#wing').keypress(function (e) {
        var regex = new RegExp("^[a-zA-Z]+$");
        var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
        if (regex.test(str)) {
            return true;
        } else
        {
            e.preventDefault();
            $('#err-wing').html(' Please Enter Alphabate');
            return false;
        }
    });
    if (possesiondate == '') {
        $('#err-possesiondate').html('Possesion date  required');
        flag = false;
    } else {
        $('#err-possesiondate').html('');

    }
    if (yearofconstruct == '') {
        $('#err-yearofconstruct').html('Year of construct date  required');
        flag = false;
    } else {
        $('#err-yearofconstruct').html('');

    }
    return flag;
}
function addFrom(){
    $('#addForm').show();
    $('#updateForm').hide();
    $('#addbutton').hide();
    
}