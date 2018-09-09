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
    var myDropzone = new Dropzone("#imageother", {
        url: "index.php?r=resale/uploadresidentialotherimag&id=" + resaleid + "&imgtype=other",
        clickable: '#clickother',
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