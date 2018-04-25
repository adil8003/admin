<h2>Cost</h2>
<div class="container">
    <div class="row">
        <div class="col-sm-8">
            <form id="Newcost">
             <h4>*Please Note:-</h4>
            <ol>
            <li>Upload Images of 800(width)*600px(height) images with good quality</li>
            <li>Please Upload Floor Plan Images Only on this page (If they are avialble or Do not Upload Images).</li>
            </ol>
                <div class="form-group row control-group">
                    <label for="Username" class="col-sm-2 form-control-label">Per Square Feet</label>
                    <div class="col-sm-10">
                        <input  type="text" class="form-control input-sm"  id="persquarefeet" value="<?php echo $objResproject->resprojectcost->persquarefeet; ?>" name="persquarefeet"  placeholder="Per Square Feet" >
                        <p id="err-persquarefeet" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Towers" class="col-sm-2 form-control-label">Other Charges</label>
                    <div class="col-sm-10">
                        <input  type="text" class="form-control input-sm" value="<?php echo $objResproject->resprojectcost->othercharges; ?>" id="othercharges" name="othercharges"  placeholder="Other Charges">
                        <p id="err-othercharges" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Towers" class="col-sm-2 form-control-label">Total Charges</label>
                    <div class="col-sm-10">
                        <textarea class="form-control input-sm" id="totalcharges"  name="totalcharges"  placeholder="Comment"><?php echo $objResproject->resprojectcost->totalcharges; ?></textarea>
                        <p id="err-costcomment" class="text-danger"></p>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button onclick="saveCost();" type="button" class="btn btn-success">Save</button>
                        <button onclick="resetProfile();" type="button" class="btn btn-success">Cancel</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-sm-4 imageScroll">
            <div id="imagecost" class="card">
                <div class="card-block">
                    <h4 class="card-title">Drop Image Or <button type="button" id="clickimagecost" class="btn btn-secondary btn-sm">Click here</button></h4>
                    <progress id="progressimage" class="hide progress" value="0" max="100">0%</progress>
                </div>
            </div>
            <?php
            foreach ($objResprojectimage AS $objImage) {
                if ($objImage->type == 'typecost') {
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
        var myDropzone = new Dropzone("#imagecost", {
            url: "index.php?r=property/uploadresprojectcost&id=" + id + "&type=typecost",
            clickable: '#clickimagecost',
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