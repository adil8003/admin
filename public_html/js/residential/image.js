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
        $('#progressimage1').removeClass('hide');
    });
    myDropzone.on("uploadprogress", function (file, progress, bytesSent) {
        $('#progressimage1').attr('value', progress);
        $('#progressimage1').html(bytesSent + ' bytes');
    });
    myDropzone.on("complete", function (file) {
        $('#progressimage1').addClass('hide');
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
        $('#progressimage2').removeClass('hide');
    });
    myDropzone.on("uploadprogress", function (file, progress, bytesSent) {
        $('#progressimage2').attr('value', progress);
        $('#progressimage2').html(bytesSent + ' bytes');
    });
    myDropzone.on("complete", function (file) {
        $('#progressimage2').addClass('hide');
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
                    if (v.imgtype === 'amenities') {
                        amenities += '<div class="dz-error-mark"><span id="resimg_id" style=" cursor:pointer;" ><i onclick="getImageId(`'+ v.id +'`)" class="ti ti-trash"></i></span></div>';
                        amenities += '<img id="imageId" class="img-thumbnail card-img-top" src="index.php?r=residential/linkuserimageamenities&id=' + v.id + '" alt="amenities image"><hr>';
                        $('#amenitiesList').html(amenities);
                    }
                });
                var florplan = '';
                $.each(data.data, function (k, v) {
                    if (v.imgtype === 'florplan') {
                        florplan += '<div class="dz-error-mark"><span id="resimg_id" style=" cursor:pointer;"  ><i onclick="getImageId(`'+ v.id +'`)"  class="ti ti-trash"></i></span></div>';
                        florplan += '<img id="" class="img-thumbnail card-img-top" src="index.php?r=residential/linkuserimageflorplan&id=' + v.id + '" alt="Florplan image"><hr>';
                        $('#florPlanList').html(florplan);
                    }else{
//                        florplan += '<img id="" class="img-thumbnail card-img-top" src="images/not_found.png" alt="Florplan image"><hr>';
                        
                    }
                });
                var other = '';
                $.each(data.data, function (k, v) {
                    if (v.imgtype === 'other') {
                        other += '<div class="dz-error-mark"><span id="resimg_id" style=" cursor:pointer;" ><i onclick="getImageId(`'+ v.id +'`)"  class="ti ti-trash"></i></span></div>';
                        other += '<img id="" class="img-thumbnail card-img-top" src="index.php?r=residential/linkuserimageother&id=' + v.id + '" alt="Other image"><hr>';
                        $('#other').html(other);
                    }
                });
            } else if(data.data == ''){
                $('#imgNotAvailable').text('Image not available.')
            }

        }
    });
}
function getImageId(imgid) {
     var id = $('#res_id').val();
    var obj = new Object();
    obj.id = imgid;
    obj.residentialid = id;
    alertify.confirm("Are you sure you want to delete this image?",
            function () {
                $.ajax({
                    url: "index.php?r=residential/deleteimage",
                    async: false,
                    data: obj,
                    type: 'POST',
                    success: function (data) {
                        data = JSON.parse(data);
                        getResidentialImagebyid(obj.id);
                        if (data.status == true) {
                            showMessage('success', 'Successfully image is deleted.');
                            getResidentialImagebyid(obj.id);
                            NoImage();
                        } else {
                            showMessage('danger', 'Please try again.');
                        }
                    }
                });
            });
}
function NoImage(){
     $('#imageId22').html('<img id="imageId" class="img-thumbnail card-img-top" src="images/not_found.png" alt="amenities image ">')
}