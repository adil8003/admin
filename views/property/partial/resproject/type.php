<h2>Type of properties</h2><br>
<div class="container">
    <div class="row">
        <div class="col-sm-8">
            <form id="Viewtypeofproperty" >
             <h4>*Please Note:-</h4>
            <ol>
            <li>Upload Images of 800(width)*600px(height) images with good quality</li>
            <li>These images will be shown only under Features Section.</li>
            </ol>
                <div class="form-group row control-group">
                    <label for="Username" class="col-sm-2 form-control-label"> RK Flat</label>
                    <div class="col-sm-10">
                        <input  type="text" class="form-control input-sm" value="<?php echo $objResproject->resprojectproperty->rkflat; ?>" id="rkflat" name="rkflat" value="" placeholder="Please enter  RK flat" >
                        <p id="err-rkflat" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Username" class="col-sm-2 form-control-label">1 BHK </label>
                    <div class="col-sm-10">
                        <input  type="text" class="form-control input-sm" value="<?php echo $objResproject->resprojectproperty->onebhk; ?>" id="onebhk" name="onebhk" value="" placeholder="Please Enter 1BHK " >
                        <p id="err-onebhk" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Username" class="col-sm-2 form-control-label">2 BHK </label>
                    <div class="col-sm-10">
                        <input  type="text" class="form-control input-sm" value="<?php echo $objResproject->resprojectproperty->twobhk; ?>" id="twobhk" name="twobhk" value="" placeholder="Please Enter 2BHK" >
                        <p id="err-twobhk" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Username" class="col-sm-2 form-control-label">2.5 BHK </label>
                    <div class="col-sm-10">
                        <input  type="text" class="form-control input-sm" value="<?php echo $objResproject->resprojectproperty->tp5bhk; ?>" id="tp5bhk" name="tp5bhk" value="" placeholder="Please Enter 2.5BHK" >
                        <p id="err-tp5bhk" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Username" class="col-sm-2 form-control-label">3 BHK </label>
                    <div class="col-sm-10">
                        <input  type="text" class="form-control input-sm" value="<?php echo $objResproject->resprojectproperty->threebhk; ?>"  id="threebhk" name="threebhk" value="" placeholder="Please Enter 3BHK" >
                        <p id="err-threebhk" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Username" class="col-sm-2 form-control-label">Row Houses </label>
                    <div class="col-sm-10">
                        <input  type="text" class="form-control input-sm" value="<?php echo $objResproject->resprojectproperty->rowhose; ?>"  id="rowhose" name="rowhose" value="" placeholder="Please Row House" >
                        <p id="err-rowhose" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Username" class="col-sm-2 form-control-label">Type of Villa </label>
                    <div class="col-sm-10">
                        <input  type="text" class="form-control input-sm" value="<?php echo $objResproject->resprojectproperty->typeofvilla; ?>" id="typeofvilla" name="typeofvilla" value="" placeholder="Please Enter Type Of Villa" >
                        <p id="err-villatype" class="text-danger"></p>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button onclick="saveTypeofproperty();" type="button" class="btn btn-success">Save</button>
                        <button onclick="resetProfile();" type="button" class="btn btn-success">Cancel</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-sm-4 imageScroll">
            <div id="image" class="card">
                <div class="card-block">
                    <h4 class="card-title">Drop Image Or <button type="button" id="clickimage" class="btn btn-secondary btn-sm">Click here</button></h4>
                    <progress id="progressimage" class="hide progress" value="0" max="100">0%</progress>
                </div>
            </div>
            <?php
            foreach ($objResprojectimage AS $objImage) {
                if ($objImage->type == 'projecttype') {
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
        var id = $('#resprojectid').val();
        var myDropzone = new Dropzone("#image", {
            url: "index.php?r=property/uploadresprojecttype&id=" + id + "&type=projecttype",
            clickable: '#clickimage',
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
                        url: "index.php?r=property/deleteresprojectimage",
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