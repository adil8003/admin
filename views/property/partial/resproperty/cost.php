<h2>Cost</h2>
<div class="container">
    <div class="row">
        <div class="col-sm-8">
            <form id="Newcost">
                <div class="form-group row control-group">
                    <label for="Username" class="col-sm-2 form-control-label">Sale</label>
                    <div class="col-sm-10">
                        <input  type="text" class="form-control input-sm" value="<?php echo $objResproperty->respropertycost->sale; ?>" id="sale" name="sale" placeholder="Per Square Feet" >
                        <p id="err-sale" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Username" class="col-sm-2 form-control-label">New Property</label>
                    <div class="col-sm-10">
                        <input  type="text" class="form-control input-sm" id="newproperty" name="newproperty" value="<?php echo $objResproperty->respropertycost->newproperty; ?>" placeholder="New Property" >
                        <p id="err-newproperty" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Towers" class="col-sm-2 form-control-label">Resale Property</label>
                    <div class="col-sm-10">
                        <input  type="text" class="form-control input-sm" id="resaleproperty" name="resaleproperty" value="<?php echo $objResproperty->respropertycost->resaleproperty; ?>" placeholder="Resale Property">
                        <p id="err-resaleproperty" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Towers" class="col-sm-2 form-control-label">Rent</label>
                    <div class="col-sm-10">
                        <input  type="text" class="form-control input-sm" id="rent" name="rent" value="<?php echo $objResproperty->respropertycost->rent; ?>" placeholder="Rent">
                        <p id="err-rent" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Towers" class="col-sm-2 form-control-label">Type of properties`</label>
                    <div class="col-sm-10">
                        <input  type="text" class="form-control input-sm" id="typeofproperties" name="typeofproperties" value="<?php echo $objResproperty->respropertycost->typeofproperties; ?>" placeholder="Type of properties">
                        <p id="err-typeproperty" class="text-danger"></p>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button onclick="savePropertycost();" type="button" class="btn btn-success">Save</button>
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
            foreach ($objRespropertyimage AS $objImage) {
                if ($objImage->type == 'typecost') {
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
        var myDropzone = new Dropzone("#imagecost", {
            url: "index.php?r=property/uploadrespropertycost&id=" + id + "&type=typecost",
            clickable: '#clickimagecost',
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