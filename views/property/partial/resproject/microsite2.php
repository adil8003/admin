<h2>Microsite Deatils</h2>
<div class="container" id="myTab">
    <div class="row">
        <div class="col-sm-8"> 
            <form id="Microsite">
            <h4>*Please Note:-</h4>
            <ol>
            <li>Upload Images of 800(width)*600px(height) images with good quality</li>
            <li>These images will be shown only under About Us Section.</li>
            <li><b>Please Upload only one Image and it is compuslory.</b></li>
            </ol>

                <div class="form-group row control-group">
                    <label for="Username" class="col-sm-2 form-control-label">FeaturesHeading1</label>
                    <div class="col-sm-10">
                        <input  type="text" class="form-control input-sm" value="<?php echo $objResprojectmicrositedetails->featuresheading1; ?>" id="featuresheading1" name="featuresheading1" value="" placeholder="Features Heading 1" >
                        <p id="err-swimingpool" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Towers" class="col-sm-2 form-control-label">Heading1 details</label>
                    <div class="col-sm-10">
                        <textarea class="form-control input-sm" id="heading1details"  name="heading1details"  placeholder="Heading1 details"><?php echo $objResproject->objResprojectmicrositedetails->heading1details; ?></textarea>
                        <p id="err-costcomment" class="text-danger"></p>
                    </div>
                </div>

                <div class="form-group row control-group">
                    <label for="Username" class="col-sm-2 form-control-label">FeaturesHeading2</label>
                    <div class="col-sm-10">
                        <input  type="text" class="form-control input-sm" value="<?php echo $objResproject->objResprojectmicrositedetails->featuresheading2; ?>" id="featuresheading2" name="featuresheading2" value="" placeholder="Features Heading 2" >
                        <p id="err-swimingpool" class="text-danger"></p>
                    </div>
                </div>
                  <div class="form-group row control-group">
                    <label for="Towers" class="col-sm-2 form-control-label">Heading2 details</label>
                    <div class="col-sm-10">
                        <textarea class="form-control input-sm" id="heading2details"  name="heading2details"  placeholder="Heading1 details"><?php echo $objResproject->objResprojectmicrositedetails->heading1details; ?></textarea>
                        <p id="err-costcomment" class="text-danger"></p>
                    </div>
                </div>

                <div class="form-group row control-group">
                    <label for="Username" class="col-sm-2 form-control-label">FeaturesHeading3</label>
                    <div class="col-sm-10">
                        <input  type="text" class="form-control input-sm" value="<?php echo $objResproject->objResprojectmicrositedetails->featuresheading3; ?>" id="featuresheading3" name="featuresheading3" value="" placeholder="Features Heading 3" >
                        <p id="err-swimingpool" class="text-danger"></p>
                    </div>
                </div>
<div class="form-group row control-group">
                    <label for="Towers" class="col-sm-2 form-control-label">Heading3 details</label>
                    <div class="col-sm-10">
                        <textarea class="form-control input-sm" id="heading3details"  name="heading3details"  placeholder="Heading3 details"><?php echo $objResproject->objResprojectmicrositedetails->heading3details; ?></textarea>
                        <p id="err-costcomment" class="text-danger"></p>
                    </div>
                </div>


                <div class="form-group row control-group">
                    <label for="Username" class="col-sm-2 form-control-label">FeaturesHeading4</label>
                    <div class="col-sm-10">
                        <input  type="text" class="form-control input-sm" value="<?php echo $objResproject->objResprojectmicrositedetails->featuresheading4; ?>" id="featuresheading4" name="featuresheading4" value="" placeholder="Features Heading 4" >
                        <p id="err-swimingpool" class="text-danger"></p>
                    </div>
                <div class="form-group row control-group">
                    <label for="Towers" class="col-sm-2 form-control-label">Heading4 details</label>
                    <div class="col-sm-10">
                        <textarea class="form-control input-sm" id="heading4details"  name="heading4details"  placeholder="Heading4 details"><?php echo $objResproject->objResprojectmicrositedetails->heading4details; ?></textarea>
                        <p id="err-costcomment" class="text-danger"></p>
                    </div>
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
            foreach ($objResprojectimage AS $objImage) {
                if ($objImage->type == 'typeamaneti') {
                    echo ' <div class="card ">';
                    echo' <div class="dz-error-mark"><span id="delete_image" onclick="delete_image(' . $objImage->id . ')">✘</span></div>';
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
        var id = $('#resprojectid').val();
        var myDropzone = new Dropzone("#imageamaneti", {
            url: "index.php?r=property/uploadresprojectamaneti&id=" + id + "&type=typeamaneti",
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