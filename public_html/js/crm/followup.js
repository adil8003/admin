
$(document).ready(function () {
    allFollowup();
    var crmid = $('#crm_id').val();
    $('#followupdate').datetimepicker({
        format: 'Y-m-d H:i',
        step: 15
    });

}); // end document.ready

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


//course layout-
function searchPage(page) {
    $('#listpage').val(page);
    allCourse();
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
            html += '<div class="card shadow">';
            html += '<div class="alert alert-info">';
            html += '<strong>' + v.followupdate + '</strong> ';
            html += '</div>';
            html += '<p class="card-text text-info">' + v.remark + '</p>';
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
                        },
                        error: function (data) {
                            showMessage('danger', 'Please try again.');
                        }
                    });
                });
    }
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