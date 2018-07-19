$(document).ready(function () {
    AllResidential();
    $('#propertyDetails').hide();
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
            {"data": "addeddate"},
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
}

function getResidentialprojectDetails(res_id) {
    $('#propertyDetails').show();
    $('#res_id').val(res_id);
    var obj = new Object();
    obj.id = $('#res_id').val();
    $.ajax({
        url: 'index.php?r=residential/getresdetailsbyid',
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
                html += '<strong>Project name:-  ' + data.data.pname + '</strong><span> <i  class="ti-trash teal-text text-danger pull-right" style="cursor:pointer" onclick="hideDetails();" id="editIcon"></i></span>';
                html += '</div>';
                html += ' <div class="row">';
                html += ' <div class="col-md-6">';
                html += '<p class="card-text"><b>Location:-</b> ' + data.data.location + '</p>';
                html += '<p class="card-text "><b>Landmark:-</b>     ' + data.data.landmark + '</p>';
                html += '<p class="card-text "><b>Proprty type:-</b>     ' + data.data.ptype + '</p>';
                html += '<p class="card-text "><b>Purchase / Sell / Rent:-</b>  ' + data.data.btype + '</p>';
                html += '<p class="card-text "><b>Budget:-</b>  ' + getPriceinString(data.data.price) + '</p>';
                html += '<p class="card-text"><b>Rera no.:-</b> ' + data.data.reraid + '</p>';
                html += '</div>';
                html += '<div class="col-md-6">';
                html += '<p class="card-text"><b>Possesion date:-</b> ' + data.data.possesiondate + '</p>';
                html += '<p class="card-text "><b>Developer name:-</b> ' + formattedText(data.data.dname) + '</p>';
                html += '<p class="card-text "><b>Carpet area:-</b>  ' + formattedText(data.data.carpetarea) + ' sqft</p>';
                html += '<p class="card-text"><b>Project total land area:-</b> ' + data.data.pland + ' sqft</p>';
                html += '<p class="card-text "><b>Address:-</b>  ' + formattedText(data.data.address) + '</p>';
                html += '</div>';
                html += '</div>';
                $('#propertyDetails').html(html);

            }
        },
        error: function (data) {
            showMessage('danger', 'Please try again.');
        }

    });
}
function hideDetails() {
    $('#propertyDetails').fadeOut('slow');
}

