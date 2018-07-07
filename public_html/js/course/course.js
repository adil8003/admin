$(document).ready(function () {
    $('.js-example-basic-multiple').select2({
        placeholder: "Select "
    });

    allCourse();
    window.listCourse = [];
    var id = $('#user_id').val();
    var course_id = $('#course_id').val();
    getOrgdetailsByid();
});
function allCourse(id) {
    var obj = new Object();
    obj.id = id;
    obj.page = $('#listpage').val();
    $.ajax({
        url: "index.php?r=course/allcourse",
        async: false,
        data: obj,
        type: 'GET',
        success: function (data) {
            data = JSON.parse(data);
            if (data.data == '') {
//                showMessage('warning', 'Course not available .')
                $('#notAvailable').html("<h5>Course not available </h5>");
            } else {
                if (data.data[0].status == true) {
                    window.listCourse = data;
                    CardBox();
                }
            }
        }
    });
}

function CardBox(data) {
    var cardbox = $('#box').val();
    if (cardbox === 1) {
        var htm = '';
        htm = getCourseCardBox(data);
        $('#list-course').html(htm);
    } else {
        var htm = '';
        htm = getCourseHorizontalCard(data);
        $('#list-course').html(htm);
    }
}

//course layout-
function searchPage(page) {
    $('#listpage').val(page);
    allCourse();
}

function getCourseHorizontalCard(dataAll) {
   dataAll = window.listCourse ;
    var intRecords = dataAll.data.length;
    var intRecordsPerpage = getCourseCountPerPage('organisation');
    var intRecordsMaxpage = Math.ceil(dataAll.data.length / intRecordsPerpage);
    var intCurrPage = $('#listpage').val();
    var html = '';

    $.each(dataAll.data, function (k, v) {
        var url = window.location.href;
        var startRecord = (intCurrPage - 1) * intRecordsPerpage;
        var endRecord = intCurrPage * intRecordsPerpage;
        if (startRecord <= k && k < endRecord) {
            html += '<div class="col-xs-12">';
            html += '<div class="card coursecard">';
            html += ' <div class="card-block">';
            html += '<div class="card-block">';
            html += ' <div class="row">';
            html += '  <div class="col-md-9">';
            html += ' <h5 class="card-title courseTitle">' + firstLettersCap(v.title) + '<span><a href="index.php?r=course/coursecontent&amp;id=' + v.id + '" title="Add content"><i  class="ti-write teal-text editCourse pull-right"></i>&nbsp;&nbsp;</a>&nbsp;&nbsp;\n\
              <span> <a href="index.php?r=course/editcourse&amp;id=' + v.id + '" title="Edit" class="teal-text editCourse"   > <i  class="ti-pencil teal-text pull-right">&nbsp;</i></a><a href="index.php?r=course/formcontent&amp;id=' + v.id + '" title="Edit" class="teal-text editCourse"   > <i  class="ti-pencil teal-text pull-right">&nbsp;</i></a></span></span></h5><hr class="hrline">';
            html += ' <div class="row">';
            html += '  <div class="col-md-12">';
            html += ' <p class="card-text courselayout"><b>Description :</b> ' + v.description + '</p>';
            html += ' </div>';
//            html += '  <div class="col-md-6">';
//            html += ' <p class=" courselayout"><b>Subject:</b> ' + v.subject + '</p>';
//            html += ' <p class="card-text courselayout"><b>Department:</b>  ' + v.deptname + '</p>';
//            html += ' <p class="card-text courselayout"><b>Branch:</b> ' + v.branchname + '</p>';
//            html += ' </div>';
            html += ' </div>';
            html += ' </div>';
            html += '  <div class="col-md-3">';
            html += ' <div class="author pull-right" id="orgImage">';
            html += ' <img src="index.php?r=course/linkcourseimage&id=' + v.id + '" style="width: 232px; height: 142px;" id="imagepic" alt="Image" class="img-rounded img-responsive img-raised">';
            html += ' </div>';
            html += ' </div>';
            html += ' </div>';
            html += ' </div>';
            html += ' </div>';
            html += ' </div>';
            html += ' </div>';
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
function getCourseCardBox(dataAll) {
    window.dataAll = dataAll;
    var intRecords = dataAll.data.length;
    var intRecordsPerpage = 3;
    var intRecordsMaxpage = Math.ceil(dataAll.data.length / intRecordsPerpage);
    var intCurrPage = $('#listpage').val();
    var html = '';

    $.each(dataAll.data, function (k, v) {
        var url = window.location.href;
        var startRecord = (intCurrPage - 1) * intRecordsPerpage;
        var endRecord = intCurrPage * intRecordsPerpage;
        if (startRecord <= k && k < endRecord) {
            html += ' <div class="col-xs-4">';
            html += '<div class="card coursecard">';
            html += ' <div class="card-block">';
            html += '<div class="card-block">';
            html += ' <h5 class="card-title ">Title:  ' + v.title + '</h5><hr class="hrline">';
            html += ' <p class=" courselayout">Subject:' + v.subject + '</p>';
            html += ' <p class="card-text courselayout">Branch: ' + v.branchname + '</p>';
            html += ' <p class="card-text courselayout">Department: ' + v.deptname + '</p>';
            html += ' <p class="card-text courselayout">Description: ' + v.description + '</p>\n\
               <hr>';
            html += '&nbsp; <a href="index.php?r=course/coursecontent&amp;id=' + v.id + '" title="Add content"><i  class="ti-book teal-text editCourse" title=add content></i></a>\n\
               &nbsp;&nbsp;<span><a href="index.php?r=course/editcourse&amp;id=' + v.id + '" title="Edit" class="teal-text editCourse"   ><i  class="ti-pencil teal-text "></i></a></span>';
            html += ' </div>';
            html += ' </div>';
            html += ' </div>';
            html += ' </div>';
        }
    });

    html += '<div id="pagination"><br><br>';
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
} //course layout end


function saveCourse() {
    if (validateCourse()) {
        alertify.confirm("Are you sure you want add this course?",
                function () {
                    var obj = new Object();
                    obj.organisationid = $('#user_id').val();
                    obj.title = $('#title').val();
                    obj.description = $('#description').val();
                    obj.department = $('#department').val();
                    obj.branch = $('#branch').val();
                    obj.subject = $('#subject').val();
                    obj.coursemodeid = $('#coursemodeid').val();
                    obj.coursesstatusid = $('#coursesstatusid').val();
                    obj.fees = $('#fees').val();
                    $.ajax({
                        url: 'index.php?r=course/savecourses',
                        async: false,
                        data: obj,
                        type: 'POST',
                        success: function (data) {
                            showMessage('success', 'Course added successfully.');
                            $('#title').val();
                            $('#description').val();
                            $('#subject').val();
                            $('#fees').val();
                        },
                        error: function (data) {
                            showMessage('danger', 'Please try again.');
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
function getOrgdetailsByid() {
    var id = $('#user_id').val();
    var obj = new Object();
    obj.id = id;
    $.ajax({
        url: 'index.php?r=course/getorgdetailsbyid',
        async: false,
        data: obj,
        type: 'POST',
        success: function (data) {
            var data = JSON.parse(data);
            if (data.status == true) {
                createHTML(data);
            }
        }
    });
}

function createHTML(data) {
    var id = $('#org_id').val();
    var html = '';
    html += '<div class="card-header">';
    html += '<h4 class="card-title"> Orgnisation info:</h4>';
    html += '</div><hr>';
    html += '<div class="card-block" >';
    html += ' <label>Name:<span class="card-text"> ' + data.orgname + ' </span> </label>';
    html += '<label>Type:<span class="card-text"> ' + data.orgtypeid + '</span> </label>';
    html += '<label>Website:<span class="card-text"> ' + formattedText(data.website) + ' </span> </label>';
    html += ' <label>Address:<span class="card-text"> ' + formattedText(data.address1) + ' </span> </label>';
    html += ' <label>Status:<span class="card-text"> ' + formattedText(data.orgstatus) + ' </span> </label>';
    html += '</br>';
    html += '</br>';
    //    html += ' <a href="index.php?r=orgprofile/organisation"  class="btn btn-sm btn-primary">Show Details</a>';
    html += ' <a href="index.php?r=organisation/editorganisation&amp;id=' + data.org_id + '"  class="btn btn-sm btn-primary">Show Details</a>';
    html += '</div>';
    $('#orgDetails').html(html);
}