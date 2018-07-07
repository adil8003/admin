$(document).ready(function () {
    $('.js-example-basic-multiple').select2();
    $(".js-example-placeholder-multiple").select2({
        placeholder: "Select"
    });
    var course_id = $('#course_id').val();

    var studentDropzone = new Dropzone("#courseImage", {
        url: "index.php?r=course/uploadcourseimae&id=" + course_id + "",
        clickable: '#coursepic',
        previewTemplate: '<div style="display:none"></div>'
    });
    studentDropzone.on("addedfile", function (file) {
        $('#progressimage').removeClass('hide');
    });
    studentDropzone.on("uploadprogress", function (file, progress, bytesSent) {
        $('#progressimage').attr('value', progress);
        $('#progressimage').html(bytesSent + ' bytes');
    });
    studentDropzone.on("complete", function (file) {
        $('#progressimage').addClass('hide');
        getCoursebyid($('#course_id').val());
    });
    getCoursebyid(course_id);
});
function getCourseid() {
    var id = $('#course_id').val();
    var obj = new Object();
    obj.id = id;
    alertify.confirm("Are you sure you want to delete this image?",
            function () {
                $.ajax({
                    url: "index.php?r=course/deletecourseimage",
                    async: false,
                    data: obj,
                    type: 'POST',
                    success: function (data) {
                        data = JSON.parse(data);
                        getCoursebyid(obj.id);
                        if (data.status) {
                            showMessage('success', 'Course image is deleted.');
                        } else {
                            showMessage('danger', 'Please try again.');
                        }
                    }
                });
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
            console.log(data.data.courseimage);
            $('#curspic').attr('src', 'index.php?r=course/linkcourseimage&id=' + data.data.id);
             if (data.data.image.indexOf('/resources/course/no_image.jpg') > -1) {
                $('#picid').hide('hide');
                $('#picid').css('display', 'none');
            } else {
                $('#picid').show();
                $('#picid').css('color', '#1f1d1d');
            }
        }
    });
}
function saveUpdate() {
    var course_id = $('#course_id').val();
    if (validateCourse()) {
        alertify.confirm("Are you sure you want update this course?",
                function () {
                    var obj = new Object();
                    obj.id = course_id;
                    obj.title = $('#title').val();
                    obj.description = $('#description').val();
                    obj.department = $('#department').val();
                    obj.branch = $('#branch').val();
                    obj.subject = $('#subject').val();
                    obj.coursemodeid = $('#coursemodeid').val();
                    obj.coursesstatusid = $('#coursesstatusid').val();
                    obj.fees = $('#fees').val();
                    $.ajax({
                        url: 'index.php?r=course/updatecourses',
                        async: false,
                        data: obj,
                        type: 'POST',
                        success: function (data) {
                            showMessage('success', 'Course updated successfully.');
                        }
                    });
                });
    }
}

function validateCourse() {
    var flag = true;
    var title = $('#title').val();
    var description = $('#description').val();
    var department = $('#department').val();
    var branch = $('#branch').val();
    var subject = $('#subject').val();
    var coursemodeid = $('#coursemodeid').val();
    var coursesstatusid = $('#coursesstatusid').val();
    var fees = $('#fees').val();

    if (title == '') {
        $('#err-title').html('Title required');
        flag = false;
    } else {
        $('#err-title').html('');
    }
    if (description == '') {
        $('#err-description').html('Description required');
        flag = false;
    } else {
        $('#err-description').html('');
    }
    if (department == '') {
        $('#err-department').html('Department required');
        flag = false;
    } else {
        $('#err-department').html('');
    }
    if (branch == '') {
        $('#err-branch').html('Branch required');
        flag = false;
    } else {
        $('#err-branch').html('');
    }
    if (subject == '') {
        $('#err-subject').html('Subject required');
        flag = false;
    } else {
        $('#err-subject').html('');
    }
    if (coursemodeid == '') {
        $('#err-coursemodeid').html('Course mode required');
        flag = false;
    } else {
        $('#err-coursemodeid').html('');
    }
    if (coursesstatusid == '') {
        $('#err-coursesstatusid').html('Status required');
        flag = false;
    } else {
        $('#err-coursesstatusid').html('');
    }
    if (fees == '') {
        $('#err-fees').html('Fess required');
        flag = false;
    } else {
        $('#err-fees').html('');
        if (isNaN(fees)) {
            $('#err-fees').html('Must be numerical');
            flag = false;
        }
    }
    return flag;
}