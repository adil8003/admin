<h2>Images</h2>
<div class="container" id="myTab">
<div class="row"> 
    <div class="col-sm-6 imageScroll">
        <div id="plotsiteimg" class="card">
            <li>Upload image for plot.</li>
            <li>Upload only one image.</li>
            <div class="card-block">
                <h4 class="card-title">Drop Image Or <button type="button" id="clickimagesite" class="btn btn-secondary btn-sm">Click here</button></h4>
                <progress id="progressimage" class="hide progress" value="0" max="100">0%</progress>
            </div>
        </div>
        <?php
        foreach ($objPlotsimage AS $objImage) {
            if ($objImage->type == 'plotsite') {
                echo ' <div class="card">';
                echo' <div class="dz-error-mark"><span id="delete_image" onclick="delete_image(' . $objImage->id . ')"style=" cursor: pointer;">✘</span></div>';
                echo '<img class="img-thumbnail card-img-top" src="' . $objImage->path . '" alt="Card image cap">';
                echo ' </div>';
            }
        }
        ?>
    </div>
    <div class="col-sm-6 imageScroll">
        <div id="imageother" class="card">
            <li>Upload image for plot.</li>
            <li>Upload only one image.</li>
            <div class="card-block">
                <h4 class="card-title">Drop Image Or <button type="button" id="clickimagesitse" class="btn btn-secondary btn-sm">Click here</button></h4>
                <progress id="progressimage1" class="hide progress" value="0" max="100">0%</progress>
            </div>
        </div>
        <?php
        foreach ($objPlotsimage AS $objImage) {
            if ($objImage->type == 'other') {
                echo ' <div class="card">';
                echo' <div class="dz-error-mark"><span id="delete_image" onclick="delete_image(' . $objImage->id . ')"style=" cursor: pointer;">✘</span></div>';
                echo '<img class="img-thumbnail card-img-top" src="' . $objImage->path . '" alt="Card image cap">';
                echo ' </div>';
            }
        }
        ?>

    </div>
</div>
<br><hr>
</div>
<script>
    $(document).ready(function () {
  // Dropzone class:
        var id = $('#plotsid').val();
        var myDropzone = new Dropzone("#plotsiteimg", {
            url: "index.php?r=property/uploadplotimg&id=" + id + "&type=plotsite",
            clickable: '#clickimagesite',
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
            location.reload();      
        });
    });
    $(document).ready(function () {
        // Dropzone class:
        var id = $('#plotsid').val();
        var myDropzone = new Dropzone("#imageother", {
            url: "index.php?r=property/uploadotherimg&id=" + id + "&type=other",
            clickable: '#clickimagesitse',
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
            location.reload();      
        });
   
        }); 
    function delete_image(id) {
        alertify.confirm("Are you sure you want to Delete Image ?",
                function () {

                    var obj = new Object();
                    obj.id = id;
                    $.ajax({
                        url: "index.php?r=property/deletecomprojectimage",
                        async: false,
                        data: obj,
                        type: 'POST',
                        success: function (data) {
                            data = JSON.parse(data);
                            alertify.alert("Image Deleted !!", function () {
                                location.reload();

                            });

                        }
                    });
                });

    }
</script>