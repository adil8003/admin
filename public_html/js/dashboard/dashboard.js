$(document).ready(function () {

    getAllCountStats();
    todayAllCallList();
    $("#panel").hide();

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
            console.log(data.data[0].status);
            if (data.data[0].status == true) {
                $('#rescount').html('<p id="rescount">' + data.data[0].rescount + '</p>')
                $('#resalecount').html('<p id="resalecount">' + data.data[0].resalecount + '</p>')
                $('#cusCount').html('<p id="cusCount">' + data.data[0].crmcount + '</p>')

                $('#resactive').html('<i id="resactive" class="fa fa-circle text-success"></i>Active ' + data.data[0].resactive + '');
                $('#resinactive').html('<i id="resactive" class="fa fa-circle text-danger"></i>Inactive ' + data.data[0].resinactive + '');

                $('#resaleactive').html('<i id="resaleactive" class="fa fa-circle text-success"></i>Active ' + data.data[0].resaleactive + '');
                $('#resaleinactive').html('<i id="resaleinactive" class="fa fa-circle text-danger"></i>Inactive ' + data.data[0].resaleinactive + '');

                $('#cusactive').html('<i id="cusactive" class="fa fa-circle text-success"></i>Active ' + data.data[0].crmactive + '');
                $('#cusinactive').html('<i id="cusinactive" class="fa fa-circle text-danger"></i>Inactive ' + data.data[0].crminactive + '');
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