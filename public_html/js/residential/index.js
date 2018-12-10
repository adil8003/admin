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
            {"data": "id",
                "render": function (data, type, full, meta) {
                    var htmlAction = '';
                    htmlAction += '<a href="index.php?r=residential/edit&amp;id=' + data + '" title="Edit" class="teal-text"   ><i  class="ti-pencil teal-text "></i></a>&nbsp;&nbsp;'
                    htmlAction += '<a href="index.php?r=residential/amenities&amp;id=' + data + '" title="Amenities" class="teal-text"  ><i   class="ti-home teal-text "></i></a>&nbsp;&nbsp;'
                    htmlAction += '<a href="index.php?r=residential/keylocation&amp;id=' + data + '" title="Key location" class="teal-text"  ><i   class="ti-car teal-text "></i></a>&nbsp;&nbsp;'
                    htmlAction += '<a href="index.php?r=residential/image&amp;id=' + data + '" title="Image gallery" class="teal-text"  ><i   class="ti-gallery teal-text "></i></a>&nbsp;&nbsp;'
                    htmlAction += '<a href="index.php?r=residential/projectupdate&amp;id=' + data + '" title="Project update" class="teal-text"  ><i   class="fa fa-link teal-text "></i></a>&nbsp;&nbsp;'
//                    htmlAction += '<a href="index.php?r=residential/projectupdate&amp;id=' + data + '" title="Project update" class="teal-text"  ><i   class="ti-split-h"></i></a>&nbsp;&nbsp;'
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
function getResidentialprojectDetails(res_id) {
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
                html += '<strong>Project name:-  ' + data.data.pname + '</strong><span><a href="#top" ><i  class="ti-trash teal-text text-danger pull-right"  onclick="hideDetails();" id="editIcon"></i></a></span>';
                html += '</div>';
                html += ' <div class="row">';
                html += ' <div class="col-md-6">';
                html += '<p class="card-text"><b>Location:-</b> ' + data.data.location + '</p>';
                html += '<p class="card-text "><b>Landmark:-</b>     ' + data.data.landmark + '</p>';
                html += '<p class="card-text "><b>Budget:-</b>  ' + getPriceinString(data.data.price) + '</p>';
                html += '<p class="card-text "><b>Proprty type:-</b> </p>';
                  html += '<span style="display:inline">';
                $.each(data.ptypename, function (k, v) {
                    html += '<p class="" style="display:inline"> ' + v.name + ' </p>';
                });
                html += '</span> </p>';
                html += '</div>';
                html += '<div class="col-md-6">';
                html += '<p class="card-text "><b>Developer name:-</b> ' + formattedText(data.data.dname) + '</p>';
                html += '<p class="card-text "><b>Purchase / Sell / Rent:-</b>  ' + data.data.btype + '</p>';
                html += '<p class="card-text"><b>Project total land area:-</b> ' + data.data.pland + ':' + data.data.landtype + '</p>';
                html += '<p class="card-text " id="target"><b>Address:-</b>  ' + formattedText(data.data.address) + '</p>';
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
//$('a[href^="#"]').on('click', function(event) {
//    alert(1)
//    var target = $(this.getAttribute('href'));
//    if( target.length ) {
//        event.preventDefault();
//        $('html, body').stop().animate({
//            scrollTop: target.offset().top
//        }, 1000);
//    }
//});
//$("#res_id").click(function() {
//     alert(1)
//    $('html, body').animate({
//        scrollTop: parseInt($("#target").offset().top)
//    }, 2000);
//});


