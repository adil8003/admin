<h2>geolocation</h2>
<div class="container">
    <div class="row">
        <div class="col-sm-8">
            <form id="Newamaneties">
                <div class="form-group row control-group">
                    <label for="Username" class="col-sm-2 form-control-label">Railway station</label>
                    <div class="col-sm-10">
                        <input  type="text" class="form-control input-sm" id="railwaystation" name="railwaystation" value="<?php echo $objResproperty->respropertygeolocation->railwaystation; ?>" placeholder="Railway sta" >
                        <p id="err-railwaystn" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Towers" class="col-sm-2 form-control-label">Airport</label>
                    <div class="col-sm-10">
                        <input  type="text" class="form-control input-sm" id="airport" name="airport" value="<?php echo $objResproperty->respropertygeolocation->airport; ?>" placeholder="Airport">
                        <p id="err-airport" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Towers" class="col-sm-2 form-control-label">Hospital</label>
                    <div class="col-sm-10">
                        <input  type="text" class="form-control input-sm" id="hospital" name="hospital" value="<?php echo $objResproperty->respropertygeolocation->hospital; ?>" placeholder="Hospital ">
                        <p id="err-hospital" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Towers" class="col-sm-2 form-control-label">Multiplex</label>
                    <div class="col-sm-10">
                        <input  type="text" class="form-control input-sm" id="multiplex" name="multiplex" value="<?php echo $objResproperty->respropertygeolocation->multiplex; ?>" placeholder="Multiplex ">
                        <p id="err-multiplex" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Towers" class="col-sm-2 form-control-label">School</label>
                    <div class="col-sm-10">
                        <input  type="text" class="form-control input-sm" id="school" name="school" value="<?php echo $objResproperty->respropertygeolocation->school; ?>" placeholder="School">
                        <p id="err-school" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Towers" class="col-sm-2 form-control-label">College</label>
                    <div class="col-sm-10">
                        <input  type="text" class="form-control input-sm" id="college" name="college" value="<?php echo $objResproperty->respropertygeolocation->college; ?>" placeholder="College">
                        <p id="err-college" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Towers" class="col-sm-2 form-control-label">Market</label>
                    <div class="col-sm-10">
                        <input  type="text" class="form-control input-sm" id="market" name="market" value="<?php echo $objResproperty->respropertygeolocation->market; ?>" placeholder="Market">
                        <p id="err-market" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Towers" class="col-sm-2 form-control-label">Temple</label>
                    <div class="col-sm-10">
                        <input  type="text" class="form-control input-sm" id="temple" name="temple" value="<?php echo $objResproperty->respropertygeolocation->temple; ?>" placeholder="Temple">
                        <p id="err-temple" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Towers" class="col-sm-2 form-control-label">Famous place</label>
                    <div class="col-sm-10">
                        <input  type="text" class="form-control input-sm" id="famousplace" name="famousplace" value="<?php echo $objResproperty->respropertygeolocation->famousplace; ?>" placeholder="Famous place">
                        <p id="err-famousplace" class="text-danger"></p>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button onclick="saveGeolocation();" type="button" class="btn btn-success">Save</button>
                        <button onclick="resetProfile();" type="button" class="btn btn-success">Cancel</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-sm-4 imageScroll">
            <div id="imagegeo" class="card">
                <div class="card-block">
                    <h4 class="card-title">Drop Image Or <button type="button" id="clickimagegeo" class="btn btn-secondary btn-sm">Click here</button></h4>
                    <progress id="progressimage" class="hide progress" value="0" max="100">0%</progress>
                </div>
            </div>
            <?php
            foreach ($objRespropertyimage AS $objImage) {
                if ($objImage->type === 'typegeo') {
                    echo ' <div class="card">';
                     echo' <div class="dz-error-mark"><span id="delete_image" onclick="delete_image('.$objImage->id.')">✘</span></div>';
                    echo '<img class="img-thumbnail card-img-top" src="' . $objImage->path . '" alt="Card image cap">';
                    echo ' </div>';
                }
            }
            ?>

        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        // Dropzone class:
        var id = $('#respropertyid').val();
        var myDropzone = new Dropzone("#imagegeo", {
            url: "index.php?r=property/uploadrespropertygeo&id=" + id + "&type=typegeo",
            clickable: '#clickimagegeo',
            previewTemplate: '<div style="display:none"></div>'
        });
        myDropzone.on("addedfile", function(file) {
            $('#progressimage').removeClass('hide');
        });
        myDropzone.on("uploadprogress", function(file, progress, bytesSent) {
            $('#progressimage').attr('value', progress);
            $('#progressimage').html(bytesSent + ' bytes');
        });
        myDropzone.on("complete", function(file) {
            $('#progressimage').addClass('hide');
            location.reload();
        });
    });

     function delete_image(id) {
      if(confirm("Are you sure you want to delete ?"))  {
             var obj = new Object();
                    obj.id = id;
            $.ajax({
                url: "index.php?r=property/deleterespropertyimage",
                async: false,
                data: obj,
                type: 'POST',
                success: function(data) {
                 data = JSON.parse(data);
                 location.reload();
                }
            });
     
        }
    }
</script>