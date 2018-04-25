<h2>Ameneties</h2>
<div class="container">
    <div class="row">
        <div class="col-sm-8"> 
            <form id="Newamaneties">
                <div class="form-group row control-group">
                    <label for="Username" class="col-sm-2 form-control-label">Swiming pool</label>
                    <div class="col-sm-10">
                        <input  type="text" class="form-control input-sm" id="swimingpool" name="swimingpool" value="<?php echo $objResproperty->respropertyamaneties->swimingpool; ?>" placeholder="Per Square Feet" >
                        <p id="err-swimingpool" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Towers" class="col-sm-2 form-control-label">Garden</label>
                    <div class="col-sm-10">
                        <input  type="text" class="form-control input-sm" id="garden" name="garden" value="<?php echo $objResproperty->respropertyamaneties->garden; ?>" placeholder="Garden">
                        <p id="err-garden" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Towers" class="col-sm-2 form-control-label">Gym</label>
                    <div class="col-sm-10">
                        <input  type="text" class="form-control input-sm" id="gym" name="gym" value="<?php echo $objResproperty->respropertyamaneties->gym; ?>" placeholder="Gym ">
                        <p id="err-gym" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Towers" class="col-sm-2 form-control-label">Temple</label>
                    <div class="col-sm-10">
                        <input  type="text" class="form-control input-sm" id="temple" name="temple" value="<?php echo $objResproperty->respropertyamaneties->temple; ?>" placeholder="Temple ">
                        <p id="err-temple" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Towers" class="col-sm-2 form-control-label">Club house</label>
                    <div class="col-sm-10">
                        <input  type="text" class="form-control input-sm" id="clubhouse" name="clubhouse" value="<?php echo $objResproperty->respropertyamaneties->clubhouse; ?>" placeholder="Club house">
                        <p id="err-clubhouse" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Towers" class="col-sm-2 form-control-label">Solar system</label>
                    <div class="col-sm-10">
                        <input  type="text" class="form-control input-sm" id="solarsystem" name="solarsystem" value="<?php echo $objResproperty->respropertyamaneties->solarsystem; ?>" placeholder="Solar system">
                        <p id="err-solarsystem" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Towers" class="col-sm-2 form-control-label">Security Doors</label>
                    <div class="col-sm-10">
                        <input  type="text" class="form-control input-sm" id="securitydoor" name="securitydoor" value="<?php echo $objResproperty->respropertyamaneties->securitydoor; ?>" placeholder="Security Doors">
                        <p id="err-securitydoor" class="text-danger"></p>
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
            foreach ($objRespropertyimage AS $objImage) {
                if ($objImage->type == 'typeamaneti') {
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
        var myDropzone = new Dropzone("#imageamaneti", {
            url: "index.php?r=property/uploadrespropertyamaneti&id=" + id + "&type=typeamaneti",
            clickable: '#clickimageamaneti',
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