$(document).ready(function () {
    $('#propertyDetails').hide();
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
    $('#tblResale').DataTable({
        ajax: "index.php?r=resale/getallresale",
        "iDisplayLength": 5,
        "columns": [
            {"data": "id",
                "render": function (data, type, full, meta) {
                    var htmlAction = '';
                    return '<a href="#"><b id="resaleid" onclick="getResidentialprojectDetails(`' + full.id + '`)">' + full.ownername + '</b></a>';
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
            {"data": "contact"},
            {"data": "stype"},
            {"data": "id",
                "render": function (data, type, full, meta) {
                    var htmlAction = '';
                    htmlAction += '<a href="index.php?r=resale/edit&amp;id=' + data + '" title="Edit" class="teal-text"   ><i  class="ti-pencil teal-text "></i></a>&nbsp;&nbsp;'
                    htmlAction += '<a href="index.php?r=resale/amenities&amp;id=' + data + '" title="Amenities" class="teal-text"  ><i   class="ti-home teal-text "></i></a>&nbsp;&nbsp;'
                    htmlAction += '<a href="index.php?r=resale/keylocation&amp;id=' + data + '" title="Key location" class="teal-text"  ><i   class="ti-car teal-text "></i></a>&nbsp;&nbsp;'
                    htmlAction += '<a href="index.php?r=resale/image&amp;id=' + data + '" title="Image gallery" class="teal-text"  ><i   class="ti-gallery teal-text "></i></a>&nbsp;&nbsp;'
                    return htmlAction;
                }
            }
        ]
    });
    var oTable1 = $('#tblResale').dataTable().yadcf([
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
    var table = $('#tblResale').DataTable();
    $('#resmin, #resmax').keyup(function () {
        table.draw();
    });


});
function getResidentialprojectDetails(resaleid) {
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
    $('#propertyDetails').show();
    $('#resaleid').val(resaleid);
    var obj = new Object();
    obj.id = $('#resaleid').val();
    $.ajax({
        url: 'index.php?r=resale/getresdetailsbyid',
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
                html += '<strong>Owner name:-  ' + data.data.ownername + '</strong><span> <i  class="ti-trash teal-text text-danger pull-right" style="cursor:pointer" onclick="hideDetails();" id="editIcon"></i></span>';
                html += '</div>';
                html += ' <div class="row">';
                html += ' <div class="col-md-6">';
                html += '<p class="card-text"><b>Contact no.:-</b> ' + data.data.contact + '</p>';
                html += '<p class="card-text"><b>Location:-</b> ' + formattedText(data.data.location) + '</p>';
                html += '<p class="card-text "><b>Landmark:-</b>     ' + formattedText(data.data.landmark) + '</p>';
                html += '<p class="card-text "><b>Budget:-</b>  ' + getPriceinString(data.data.price) + '</p>';
                html += '<p class="card-text "><b>Proprty type:-</b>     ' + data.data.ptype + '</p>';
                html += '<p class="card-text "><b>Building name:-</b>     ' + formattedText(data.data.buildingname) + '</p>';
                html += '<p class="card-text "><b>Building age:-</b>     ' + formattedText(data.data.age) + '</p>';
                html += '<p class="card-text "><b>Society name:-</b>     ' + formattedText(data.data.societyname) + '</p>';
                html += '<p class="card-text "><b>Status:-</b>     ' + formattedText(data.data.stype) + '</p>';
                html += '</div>';
                html += '<div class="col-md-6">';
                html += '<p class="card-text "><b>Wing:-</b>  ' + formattedText(data.data.wing) + '</p>';
                html += '<p class="card-text "><b>Flat number:-</b>  ' + formattedText(data.data.flatnumber) + '</p>';
                html += '<p class="card-text "><b>Floor number:-</b>  ' + formattedText(data.data.floornumber) + '</p>';
                html += '<p class="card-text "><b>Furniture:-</b>  ' + formattedText(data.data.furniture) + '</p>';
                html += '<p class="card-text "><b>Property facing:-</b>  ' + formattedText(data.data.propertyfacing) + '</p>';
                html += '<p class="card-text "><b>Carpet area:-</b>  ' + formattedText(data.data.carpetarea) + ' sqft</p>';
                html += '<p class="card-text "><b>Address:-</b>  ' + formattedText(data.data.address) + '</p>';
                html += '<p class="card-text "><b>Remarks:-</b>  ' + formattedText(data.data.remarks) + '</p>';
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

