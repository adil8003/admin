<h2>Images</h2>
<div class="container" id="myTab">
<div class="row"> 
    <div class="col-sm-6 imageScroll">
        <div id="imageamaneti" class="card">
            <li>Upload image for amaneties.</li>
            <li>Upload only one image.</li>
            <div class="card-block">
                <h4 class="card-title">Drop Image Or <button type="button" id="clickimageamaneti" class="btn btn-secondary btn-sm">Click here</button></h4>
                <progress id="progressimage" class="hide progress" value="0" max="100">0%</progress>
            </div>
        </div>
        <?php
        foreach ($objComprojectimage AS $objImage) {
            if ($objImage->type == 'typeamaneti') {
                echo ' <div class="card">';
                echo' <div class="dz-error-mark"><span id="delete_image" onclick="delete_image(' . $objImage->id . ')"style=" cursor: pointer;">✘</span></div>';
                echo '<img class="img-thumbnail card-img-top" src="' . $objImage->path . '" alt="Card image cap">';
                echo ' </div>';
            }
        }
        ?>
    </div>
    <div class="col-sm-6 imageScroll">
        <div id="imagegeo" class="card">
            <li>Upload image for cost.</li>
            <li>Upload only one image.</li>
            <div class="card-block">
                <h4 class="card-title">Drop Image Or <button type="button" id="clickimagegeolocation" class="btn btn-secondary btn-sm">Click here</button></h4>
                <progress id="progressimage" class="hide progress" value="0" max="100">0%</progress>
            </div>
        </div>
        <?php
        foreach ($objComprojectimage AS $objImage) {
            if ($objImage->type == 'typegeo') {
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
<div class="row"> 
    <div class="col-sm-6 imageScroll">
        <div id="imagef" class="card">
            <li>Upload image for office/shop.</li>
            <li>Upload only one image.</li>
            <div class="card-block">
                <h4 class="card-title">Drop Image Or <button type="button" id="clickimagef" class="btn btn-secondary btn-sm">Click here</button></h4>
                <progress id="progressimage" class="hide progress" value="0" max="100">0%</progress>
            </div>
        </div>
        <?php
        foreach ($objComprojectimage AS $objImage) {
            if ($objImage->type == 'typeoffice') {
                echo ' <div class="card">';
                echo' <div class="dz-error-mark"><span id="delete_image" onclick="delete_image(' . $objImage->id . ')"style=" cursor: pointer;">✘</span></div>';
                echo '<img class="img-thumbnail card-img-top" src="' . $objImage->path . '" alt="Card image cap">';
                echo ' </div>';
            }
        }
        ?>

    </div>
    <div class="col-sm-6 imageScroll">
        <div id="imageabout" class="card">
            <li>Upload image for microsite.</li>
            <li>Upload only one image.</li>
            <div class="card-block">
                <h4 class="card-title">Drop Image Or <button type="button" id="clickimageabout" class="btn btn-secondary btn-sm">Click here</button></h4>
                <progress id="progressimage" class="hide progress" value="0" max="100">0%</progress>
            </div>
        </div>
        <?php
        foreach ($objComprojectimage AS $objImage) {
            if ($objImage->type == 'about') {
                echo ' <div class="card ">';
                echo' <div class="dz-error-mark"><span id="delete_image" onclick="delete_image(' . $objImage->id . ')" style=" cursor: pointer;">✘</span></div>';
                echo '<img id="image" class=" img-thumbnail card-img-top  " src="' . $objImage->path . '" alt="Click me to remove the file." data-dz-remove>';
                echo ' </div>';
            }
        }
        ?>
    </div>
</div>
</div>
<script>
    $(document).ready(function () {
  // Dropzone class:
        var id = $('#comprojectid').val();
        var myDropzone = new Dropzone("#imageamaneti", {
            url: "index.php?r=property/uploadcomprojectamaneti&id=" + id + "&type=typeamaneti",
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
            location.reload();      
        });
    });
    $(document).ready(function () {
        // Dropzone class:
        var id = $('#comprojectid').val();
        var myDropzone = new Dropzone("#imagegeo", {
            url: "index.php?r=property/uploadcomprojectgeo&id=" + id + "&type=typegeo",
            clickable: '#clickimagegeolocation',
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
   
    
          var myDropzone = new Dropzone("#imagef", {
            url: "index.php?r=property/uploadcomprojectoffice&id=" + id + "&type=typeoffice",
            clickable: '#clickimagef',
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
        
        var myDropzone = new Dropzone("#imageabout", {
            url: "index.php?r=property/uploadcomprojectmicrosite&id=" + id + "&type=about",
            clickable: '#clickimageabout',
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