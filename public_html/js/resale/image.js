$(document).ready(function () {
    // Dropzone class:
    getResaleImagebyid();
    var resaleid = $('#resaleid').val();
    var myDropzone = new Dropzone("#imageamaneti", {
        url: "index.php?r=resale/uploadresidentialamenities&id=" + resaleid + "&imgtype=amenities",
        clickable: '#clickimageamaneti',
        previewTemplate: '<div style="display:none"></div>'
    });
    myDropzone.on("addedfile", function (file) {
        $('#progressimage').removeClass('hide');
    });
    myDropzone.on("uploadprogress", function (file, progress, bytesSent) {
        $('#progressimage').attr('value', progress);
        $('#progressimage').html(bytesSent + ' bytes');
    });
    myDropzone.on("complete", function (file) {
        $('#progressimage').addClass('hide');
        getResaleImagebyid(resaleid);
    });
});
$(document).ready(function () {
    // Dropzone class:
    var resaleid = $('#resaleid').val();
    var myDropzone = new Dropzone("#florplan", {
        url: "index.php?r=resale/uploadresidentialflorplan&id=" + resaleid + "&imgtype=florplan",
        clickable: '#clickiflorplan',
        previewTemplate: '<div style="display:none"></div>'
    });
    myDropzone.on("addedfile", function (file) {
        $('#progressimage1').removeClass('hide');
    });
    myDropzone.on("uploadprogress", function (file, progress, bytesSent) {
        $('#progressimage1').attr('value', progress);
        $('#progressimage1').html(bytesSent + ' bytes');
    });
    myDropzone.on("complete", function (file) {
        $('#progressimage1').addClass('hide');
        getResaleImagebyid(resaleid);
    });
});
$(document).ready(function () {
    // Dropzone class:
    var resaleid = $('#resaleid').val();
    var myDropzone = new Dropzone("#imageother", {
        url: "index.php?r=resale/uploadresidentialotherimag&id=" + resaleid + "&imgtype=other",
        clickable: '#clickother',
        previewTemplate: '<div style="display:none"></div>'
    });
    myDropzone.on("addedfile", function (file) {
        $('#progressimage2').removeClass('hide');
    });
    myDropzone.on("uploadprogress", function (file, progress, bytesSent) {
        $('#progressimage2').attr('value', progress);
        $('#progressimage2').html(bytesSent + ' bytes');
    });
    myDropzone.on("complete", function (file) {
        $('#progressimage2').addClass('hide');
        getResaleImagebyid(resaleid);
    });
});
$(document).ready(function () {
    // Dropzone class:
    var id = $('#resaleid').val();
    var myDropzone = new Dropzone("#propertybannerimg", {
        url: "index.php?r=resale/uploadpropertybanner&id=" + id + "",
        clickable: '#clicpropertybanner',
        previewTemplate: '<div style="display:none"></div>'
    });
    myDropzone.on("addedfile", function (file) {
        $('#progressimage3').removeClass('hide');
    });
    myDropzone.on("uploadprogress", function (file, progress, bytesSent) {
        $('#progressimage3').attr('value', progress);
        $('#progressimage3').html(bytesSent + ' bytes');
    });
    myDropzone.on("complete", function (file) {
        $('#progressimage3').addClass('hide');
        getResalebyid(id);
    });
});
function getResalebyid(id) {
    var id = $('#resaleid').val();
    var obj = new Object();
    obj.id = id;
    $.ajax({
        url: "index.php?r=resale/getresalebyid",
        async: false,
        data: obj,
        type: 'POST',
        success: function (data) {
            data = JSON.parse(data);
            $('#propertybanner').attr('src', 'index.php?r=resale/linkrespropertybannerimg&id=' + data.data.id);
            if (data.data.image === '/resources/propertybannera/not_found.png') {
                $('#picid').hide();
                $('#picid').css('display', 'none');
            } else {
                $('#picid').show();
                $('#picid').css('color', '#1f1d1d');
            }
        }
    });
}

function deletePropertyBaner() {
    var obj = new Object();
    obj.id = $('#resaleid').val();
    alertify.confirm("Are you sure you want to delete this image?",
            function () {
                $.ajax({
                    url: "index.php?r=resale/deletepropertybannerimg",
                    async: false,
                    data: obj,
                    type: 'POST',
                    success: function (data) {
                        data = JSON.parse(data);
                        getResalebyid(obj.id);
                        if (data.status) {
                            showMessage('success', 'Project  image is deleted.');
                        } else {
                            showMessage('danger', 'Please try again.');
                        }
                    }
                });
            });
}

function getResaleImagebyid(resaleid) {
    var resaleid = $('#resaleid').val();
    var obj = new Object();
    obj.id = resaleid;
    $.ajax({
        url: "index.php?r=resale/getimages",
        async: false,
        data: obj,
        type: 'POST',
        success: function (data) {
            data = JSON.parse(data);
            console.log(data.data[0].status)
            if (data.data[0].status === true) {
                var amenities = '';
                $.each(data.data, function (k, v) {
                    if (v.imgtype === 'amenities') {
                        amenities += '<div class="dz-error-mark"><span id="delete_image"  ><i class="ti ti-trash"></i></span></div>';
                        amenities += '<img id="imageId" class="img-thumbnail card-img-top" src="index.php?r=resale/linkuserimageamenities&id=' + v.id + '" alt="Card image cap"><hr>';
                        $('#amenitiesList').html(amenities);
                    }
                });
                var florplan = '';
                $.each(data.data, function (k, v) {
                    if (v.imgtype === 'florplan') {
                        florplan += '<div class="dz-error-mark"><span id="delete_image"  ><i class="ti ti-trash"></i></span></div>';
                        florplan += '<img id="" class="img-thumbnail card-img-top" src="index.php?r=resale/linkuserimageflorplan&id=' + v.id + '" alt="Card image cap"><hr>';
                        $('#florPlanList').html(florplan);
                    }
                });
                var other = '';
                $.each(data.data, function (k, v) {
                    if (v.imgtype === 'other') {
                        other += '<div class="dz-error-mark"><span id="delete_image"  ><i class="ti ti-trash"></i></span></div>';
                        other += '<img id="" class="img-thumbnail card-img-top" src="index.php?r=resale/linkuserimageother&id=' + v.id + '" alt="Card image cap"><hr>';
                        $('#other').html(other);
                    }
                });
            } else {

            }

        }
    });
}