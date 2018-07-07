$(document).ready(function () {
    var course_id = $('#course_id').val();
//createCourseHTML();
    getOrgdetailsByid();
    getAllcourseContent();
    $('#contentDesc').hide();
    
});
function getOrgdetailsByid() {
    var course_id = $('#course_id').val();
    var obj = new Object();
    obj.id = course_id;
    $.ajax({
        url: 'index.php?r=course/getcoursedetailbyid',
        async: false,
        data: obj,
        type: 'POST',
        success: function (data) {
            var data = JSON.parse(data);
            if (data.status == true) {
                createHTML(data);
            } else {
                window.location.href = 'index.php?r=dashboard/error';
            }
        }
    });
}
function getCoursebyid(id) {
    var id = $('#course_id').val();
    var obj = new Object();
    obj.id = id;
    $.ajax({
        url: "index.php?r=course/getcoursebyid",
        async: false,
        data: obj,
        type: 'GET',
        success: function (data) {
            data = JSON.parse(data);
            $('#curspic').attr('src', 'index.php?r=course/linkcourseimage&id=' + data.data.id);
            if (data.data.orgimage === '/resources/course/no_image.jpg') {
                $('#picid').hide('hide');
                $('#picid').css('display', 'none');
            } else {
                $('#picid').show();
                $('#picid').css('color', '#1f1d1d');
            }
        }
    });
}
function createHTML(data) {
    var id = $('#course_id').val();
    var html = '';
    html += '<div class="card-header">';
//    html += '<h4 class="card-title"> Courses info </h4>';
    html += '</div>';
    html += ' <div class="author" >';
    html += '<img src="index.php?r=course/linkcourseimage&id=' + data.id + '"  id="curspic" alt="Raised Image" width="100%" class="img-rounded img-responsive img-raised"><br>';
    html += '</h6>';
    html += ' </div>';
    html += '<div class="card-block" >';
    html += ' <label><b>Title: </b><span class="card-text"> ' + formattedText(data.title) + ' </span> </label>';
    html += '<label><b>Subject: </b><span class="card-text"> ' + formattedText(data.subject) + '</span> </label>';
    html += '<label><b>Branch: </b><span class="card-text">' + formattedText(data.branchname) + ' </span> </label>';
    html += '<label><b>Department: </b><span class="card-text">  ' + formattedText(data.deptname) + ' </span> </label>';
//    html += '<label><b>Description: </b><span class="card-text"> ' + formattedText(data.description) + ' </span> </label>';
    html += '</br>';
    html += '</br>';
    html += ' <a href="index.php?r=course/editcourse&amp;id=' + id + '"  class="btn btn-sm btn-primary">Show Details</a>';
    html += '</div>';
    $('#courseDetails').html(html);
}
function formattedText(text) {
    return (text == null || text == '') ? '' : text.trim();
}

function getAllcourseContent() {
    var course_id = $('#course_id').val();
    var obj = new Object();
    obj.id = course_id;
    $.ajax({
        url: 'index.php?r=course/allcoursecontent',
        async: false,
        data: obj,
        type: 'GET',
        success: function (data) {
            var data = JSON.parse(data);
            console.log(data);
            if (data.data.length == '') {
                $('#notAvailable').html("<span> <h5 >Content not available. please add Content <h5></span>");

            } else {
                $('#notAvailable').hide();
                if (data.data.length != '' ) {
                    getAllcourseContenthtml(data);
                } else {
                    window.location.href = 'index.php?r=dashboard/error';
                }
            }
        }
    });
}
//coursecontent layout-
function searchPage(page) {
    $('#listpage').val(page);
    getAllcourseContent();
}
function getAllcourseContenthtml(dataAll) {
    window.dataAll = dataAll;
    var intRecords = dataAll.data.length;
    var intRecordsPerpage = 10;
    var intRecordsMaxpage = Math.ceil(dataAll.data.length / intRecordsPerpage);
    var intCurrPage = $('#listpage').val();
    var html = '<div id="list-content" style="min-height:350px;">';

    $.each(dataAll.data, function (k, v) {

        var url = window.location.href;
        var startRecord = (intCurrPage - 1) * intRecordsPerpage;
        var endRecord = intCurrPage * intRecordsPerpage;
        if (startRecord <= k && k < endRecord) {
            if (Math.abs(k % 2) == 1) {
                html += '<div class="row card-block" style="background:#eee;margin:5px 10px;">';
            } else {
                html += '<div class="row card-block" style="margin:0 10px;">';
            }

            if (k < 9) {
                html += '<div class="col-md-10" > <label>0' + (k + 1) + '. &nbsp;' + v.title + ' </label>';
            } else {
                html += '<div class="col-md-10" > <label>' + (k + 1) + '. &nbsp;' + v.title + ' </label>';
            }

            html += '</div>';
            html += '<div class="col-md-2" style="cursor:pointer" >';
            html += '<i style="line-height:2" class="ti-pencil teal-text" id="contId" onclick="getContentDetail(`' + v.id + '`,`' + v.title + '`,`' + v.description + '`,`' + v.coursesstatusid + '`,`' + v.course_id + '`);"></i>&nbsp;';
            html += '<i style="line-height:2" class="ti-eye teal-text" id="ctDscp" onclick="getContentDescrip(`' + v.description + '`,`' + v.title + '`);"></i>';
            html += '</div>';
            html += '</div>';
            // if(Math.abs(k % 2) == 1){
            //     html += '<li style="color:#A00;">';
            // }else{
            //     html += '<li>';
            // }

            // html += '<input type="hidden" id="hidesc" value="" />';
            // html += '<input type="hidden" id="courseid" value="" />';
            // html += '<div class="fx" >';
            // html += '<h6><span class="title" style="font-size=24px;color:#dd0330;margin:0 5px">' + v.displayorderid + '</span>'+ v.title + '</h6>';
            // html += ' title="Edit" class="teal-text "><i  class="ti-pencil teal-text pull-right"></i></a></span>';
            // html += '<span class="pull-right"><a href="#"  title="Description" class="ti-eye teal-text pull-right" title="description">&nbsp;</a></span> &nbsp;&nbsp;&nbsp;';
            // html += '</div>';
            // html += '</li><br>';
        }
    });
    html += '</div>';
    html += '<div id="pagination" class="pull-right">';
    html += '<span class="all-pages">Page ' + intCurrPage + ' of ' + intRecordsMaxpage + '</span>';
    for (var i = 1; i <= intRecordsMaxpage; i++) {
        if (i != intCurrPage) {
            html += '<span onclick="searchPage(' + i + ');" class="page-num">' + i + '</span>';
        } else {
            html += '<span class="current page-num">' + i + '</span>';
        }
    }
    html += '</div><br>';
//    return html;
    $('#list-description').html(html);
}

function getContentDetail(id, title, description, coursesstatusid, course_id) {
    $('#coursedesc').hide();
    $('#passForm').hide();
    $('#updateContent').show();
    $('#contId').val(id);
    $('#update-content-title').val(title);
    $('#update-content-description').val(description);
    $('#update-coursesstatusid').val(coursesstatusid);
    $('#courseid').val(course_id);
}
//function getContentDescrip(description) {
//    alert(description)
//  console.log(description)
//    $('#fullDesc').show();
//    $('#fullDesc').html('<p>' + description + '</p>');
//}

function saveCoursecontent() {
    var course_id = $('#course_id').val();
    if (validateContent()) {
        alertify.confirm("Are you sure you want add this content?",
                function () {
                    var obj = new Object();
                    obj.course_id = course_id;
                    obj.title = $('#content-title').val();
                    obj.description = $('#content-description').val();
                    obj.coursesstatusid = $('#coursesstatusid').val();
                    $.ajax({
                        url: 'index.php?r=course/savecoursecontent',
                        async: false,
                        data: obj,
                        type: 'POST',
                        success: function (data) {
                            showMessage('success', 'Course content save successfully.');
                            $('#content-title').val('');
                            $('#content-description').val('');
                            getAllcourseContent();
                        },
                        error: function (data) {
                            showMessage('danger', 'Please try again.');
                        }
                    });
                });
    }
}
function updateCoursecontent() {
//    if (validateContent()) {
    alertify.confirm("Are you sure you want update this content?",
            function () {
                var obj = new Object();
                obj.id = $('#contId').val();
                obj.course_id = $('#courseid').val();
                obj.title = $('#update-content-title').val();
                obj.description = $('#update-content-description').val();
                obj.coursesstatusid = $('#update-coursesstatusid').val();
                $.ajax({
                    url: 'index.php?r=course/updatecoursescontent',
                    async: false,
                    data: obj,
                    type: 'POST',
                    success: function (data) {
                        showMessage('success', 'Course content update successfully.');
                        getAllcourseContent();
                    },
                    error: function (data) {
                        showMessage('danger', 'Please try again.');
                    }
                });
            });
//    }
}
function validateUpdateContent() {
    var flag = true;
    var title = $('#update-content-title').val();
    var description = $('#update-content-description').val();

    if (title == '') {
        $('#err-update-content-title').html('Title required');
        flag = false;
    } else {
        $('#err-update-content-title').html('');
    }
    if (description == '') {
        $('#err-update-content-description').html('Description required');
        flag = false;
    } else {
        $('#err-update-content-description').html('');
    }
    return flag;
}
function validateContent() {
    var flag = true;
    var title = $('#content-title').val();
    var description = $('#content-description').val();

    if (title == '') {
        $('#err-content-title').html('Title required');
        flag = false;
    } else {
        $('#err-content-title').html('');
    }
    if (description == '') {
        $('#err-content-description').html('Description required');
        flag = false;
    } else {
        $('#err-content-description').html('');
    }
    return flag;
}

function getContentDescrip(description, title) {
    $('.addcoursecontent').hide();
    $('#updateContent').hide();
    $('#coursedesc').hide();
    $('#contentDesc').hide();
//    $("#ctDscp").click(function (description) {
    if ($('.contentDesc').is(':hidden')) {
        $('#contentDesc').show();
        $('#addcoursecontent').hide();
        $('#password').show();
        $('#coursedesc').hide();
//            function contentDescription(data) {
//                $('#fullDesc').html();
//            }
        // $('#cd-title').html(' <p class=" descPara"><span class="category">'+ title +'</span>' + description + '</p>');
        // $('#fullDesc').html(' <p class=" descPara"><span class="category">'+ title +'</span>' + description + '</p>');
    } else {
        $('.addcoursecontent').hide();
        $('#coursedesc').hide();
        $('#contentDesc').show();
        $('#passForm').show();
        $('#dec-Title').html('<h5 class="title" id="dec-Title">' + title + '</h5>');
        $('#fullDesc').html('<p class=" descPara"><span class="category descPara"></span>' + description + '</p>');

    }
}
//    });
//});
$(function () {
    $('.addcoursecontent').hide();
    $('#updateContent').hide();
    $("#password").click(function () {
        if ($('.addcoursecontent').is(':hidden')) {
            $('.addcoursecontent').show();
            $('#coursedesc').hide();
            $('#hideButton').show();
            $('#passForm').show();
        } else {
            $('.addcoursecontent').show();
            $('#coursedesc').show();
            $('#hideButton').show();
            $('#passForm').show();

        }
    });
});
$(function () {
    $('.addcoursecontent').hide();
    $("#coursedesc").show();
    $("#passForm").click(function () {
        $(".addcoursecontent").hide();
        $('#coursedesc').show();
        $('#hideButton').show();
    }
    );
});
$(function () {
    $('.addcoursecontent').hide();
    $("#coursedesc").show();
    $("#addContForm").click(function () {
        $(".addcoursecontent").hide();
        $('#coursedesc').show();
        $('#updateContent').hide();
        $('#hideButton').show();
        $('#passForm').show();
    }
    );
});
$(function () {
    $('.addcoursecontent').hide();
    $("#coursedesc").show();
    $("#indexPage").click(function () {
        $(".addcoursecontent").hide();
        $('#coursedesc').show();
        $('#updateContent').hide();
        $('#hideButton').show();
        $('#passForm').hide();
        $('#contentDesc').hide();
        $('#coursedesc').show();
    }
    );
});














     