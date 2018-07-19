$(document).ready(function () {
    // Dropzone class:
    getResidentialImagebyid();
    var id = $('#res_id').val();
    var myDropzone = new Dropzone("#imageamaneti", {
        url: "index.php?r=residential/uploadresidentialamenities&id=" + id + "&imgtype=amenities",
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
        getResidentialImagebyid(id);
    });
});
$(document).ready(function () {
    // Dropzone class:
    var id = $('#res_id').val();
    var myDropzone = new Dropzone("#florplan", {
        url: "index.php?r=residential/uploadresidentialflorplan&id=" + id + "&imgtype=florplan",
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
        getResidentialImagebyid(id);
    });
});
$(document).ready(function () {
    // Dropzone class:
    var id = $('#res_id').val();
    var myDropzone = new Dropzone("#imageother", {
        url: "index.php?r=residential/uploadresidentialotherimag&id=" + id + "&imgtype=other",
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
        getResidentialImagebyid(id);
    });
});

function getResidentialImagebyid(id) {
    var id = $('#res_id').val();
    var obj = new Object();
    obj.id = id;
    $.ajax({
        url: "index.php?r=residential/getimages",
        async: false,
        data: obj,
        type: 'POST',
        success: function (data) {
            data = JSON.parse(data);
            if (data.data[0].status === true) {
                var amenities = '';
                $.each(data.data, function (k, v) {
                    console.log(v.imgtype);
                    if (v.imgtype === 'amenities') {
                        amenities += '<div class="dz-error-mark"><span id="delete_image"  ><i class="ti ti-trash"></i></span></div>';
                        amenities += '<img id="imageId" class="img-thumbnail card-img-top" src="index.php?r=residential/linkuserimageamenities&id=' + v.id + '" alt="Card image cap">';
                        $('#amenitiesList').html(amenities);
                    }
                     var florplan = '';
                    if (v.imgtype === 'florplan') {
                        florplan += '<div class="dz-error-mark"><span id="delete_image"  ><i class="ti ti-trash"></i></span></div>';
                        florplan += '<img id="" class="img-thumbnail card-img-top" src="index.php?r=residential/linkuserimageflorplan&id=' + v.id + '" alt="Card image cap">';
                        $('#florPlanList').html(florplan);
                    }
                     var other = '';
                    if (v.imgtype === 'other') {
                        other += '<div class="dz-error-mark"><span id="delete_image"  ><i class="ti ti-trash"></i></span></div>';
                        other += '<img id="" class="img-thumbnail card-img-top" src="index.php?r=residential/linkuserimageother&id=' + v.id + '" alt="Card image cap">';
                        $('#other').html(other);
                    }
                });
            } else {

            }

        }
    });
}