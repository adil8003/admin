<h2>Ameneties</h2>
<div class="container">
    <div class="row">
        <div class="col-sm-8"> 
            <form id="Newamaneties">
            <h4>*Please Note:-</h4>
            <ol>
            <li>Upload Images of 800(width)*600px(height) images with good quality</li>
            <li>These images will be shown only under Amenities Section.</li>
            <li><b>Please provide all the amenities in Lift textbox only with comma seperated.</b></li>
            </ol>
                <div class="form-group row control-group">
                    <label for="villa" class="col-sm-2 form-control-label">Lift</label>
                    <div class="col-sm-10">
                        <input  type="text" class="form-control input-sm" id="lift" value="<?php echo $objComproject->comprojectamaneties->lift; ?>" name="lift" value="" placeholder="Lift" >
                        <p id="err-comothercharges" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="villa" class="col-sm-2 form-control-label">Parking</label>
                    <div class="col-sm-10">
                        <input  type="text" class="form-control input-sm" value="<?php echo $objComproject->comprojectamaneties->parking; ?>" id="parking" name="parking" value="" placeholder="Parking" >
                        <p id="err-comothercharges" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="villa" class="col-sm-2 form-control-label">Restroom</label>
                    <div class="col-sm-10">
                        <input  type="text" class="form-control input-sm" value="<?php echo $objComproject->comprojectamaneties->restroom; ?>" id="restroom" name="restroom" value="" placeholder="Restroom" >
                        <p id="err-comothercharges" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="villa" class="col-sm-2 form-control-label">Furnishing</label>
                    <div class="col-sm-10">
                        <input  type="text" class="form-control input-sm" value="<?php echo $objComproject->comprojectamaneties->furnishing; ?>" id="furnishing" name="furnishing" value="" placeholder="Furnishing" >
                        <p id="err-comothercharges" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="villa" class="col-sm-2 form-control-label">Preferred</label>
                    <div class="col-sm-10">
                        <input  type="text" class="form-control input-sm" id="preferred" name="preferred" value="<?php echo $objComproject->comprojectamaneties->preferred; ?>" placeholder="Preferred" >
                        <p id="err-comothercharges" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button onclick="saveAmaneties();" type="button" class="btn btn-success">Save</button>
                        <button onclick="resetProfile();" type="button" class="btn btn-success">Cancel</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-sm-4 imageScroll">
            <div id="imageamaneti" class="card">
                <div class="card-block">
                    <h4 class="card-title">Drop Image Or <button type="button" id="clickimageamaneti" class="btn btn-secondary btn-sm">Click here</button></h4>
                    <progress id="progressimage" class="hide progress" value="0" max="100">0%</progress>
                </div>
            </div>
            <?php
            foreach ($objComprojectimage AS $objImage) {
                if ($objImage->type == 'typeamaneti') {
                    echo ' <div class="card">';
                    echo' <div class="dz-error-mark"><span id="delete_image" onclick="delete_image(' . $objImage->id . ')">✘</span></div>';
                    echo '<img class="img-thumbnail card-img-top" src="' . $objImage->path . '" alt="Card image cap">';
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