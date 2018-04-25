<h2>Type of properties</h2>
<div class="container">
    <div class="row">
        <div class="col-sm-8">
            <form id="Viewtypeofproperty">
                <div class="form-group row control-group ">
                    <label for="commercialshop" class="col-sm-2 form-control-label">About Property</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="aboutpropertyid" name="aboutpropertyid" placeholder="- About Property -">
                            <?php
                           foreach( $objRespropertyabout AS $rowRespropertyabout){
                                if($objResproperty->respropertytype->aboutpropertyid == $rowRespropertyabout->id ){
                                    echo '<option selected value="'.$rowRespropertyabout->id.'" >'.$rowRespropertyabout->name.'</option>';
                                }else{
                                    echo '<option value="'.$rowRespropertyabout->id.'" >'.$rowRespropertyabout->name.'</option>';    
                                }
                                
                           }
                           ?>
                        </select>
                        <p id="err-aboutproperty" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group ">
                    <label for="commercialshop" class="col-sm-2 form-control-label">Flat Type</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="flattypeid" name="flattypeid" placeholder="- Flat Type -">
                            <?php
                           foreach( $objRespropertyflattype AS $rowRespropertyflattype){
                                if($objResproperty->respropertytype->flattypeid == $rowRespropertyflattype->id ){
                                    echo '<option selected value="'.$rowRespropertyflattype->id.'" >'.$rowRespropertyflattype->type.'</option>';
                                }else{
                                    echo '<option value="'.$rowRespropertyflattype->id.'" >'.$rowRespropertyflattype->type.'</option>';    
                                }
                                
                           }
                           ?>
                        </select>
                        <p id="err-flattype" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Username" class="col-sm-2 form-control-label">No Of Bedroom</label>
                    <div class="col-sm-10">
                        <input  type="text" class="form-control input-sm" id="noofbedroom" name="noofbedroom" value="<?php echo $objResproperty->respropertytype->noofbedroom; ?>" placeholder="No Of Bedroom" >
                        <p id="err-noofbedroom" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Username" class="col-sm-2 form-control-label">No Of Bathroom </label>
                    <div class="col-sm-10">
                        <input  type="text" class="form-control input-sm" id="noofbathroom" name="noofbathroom" value="<?php echo $objResproperty->respropertytype->noofbathroom; ?>" placeholder="No Of Bathroom" >
                        <p id="err-villatype" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Username" class="col-sm-2 form-control-label">No Of balcony </label>
                    <div class="col-sm-10">
                        <input  type="text" class="form-control input-sm" id="noofbalcony" name="noofbalcony" value="<?php echo $objResproperty->respropertytype->noofbalcony; ?>" placeholder="No Of balcony" >
                        <p id="err-noofbbalcony" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Username" class="col-sm-2 form-control-label">Separate Dinning Space </label>
                    <div class="col-sm-10">
                        <input  type="text" class="form-control input-sm" id="dinningspace" name="dinningspace" value="<?php echo $objResproperty->respropertytype->dinningspace; ?>" placeholder="Separate Dinning Space" >
                        <p id="err-seperatediningspace" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group ">
                    <label for="commercialshop" class="col-sm-2 form-control-label">Parking</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="parkingtype" name="parkingtype" placeholder="- Select Type Of Parking -">
                            <?php
                           foreach( $objRespropertyparking AS $rowobjRespropertyparking){
                                if($objResproperty->respropertytype->parkingtype == $rowobjRespropertyparking->type ){
                                    echo '<option selected value="'.$rowobjRespropertyparking->type.'" >'.$rowobjRespropertyparking->type.'</option>';
                                }else{
                                    echo '<option value="'.$rowobjRespropertyparking->type.'" >'.$rowobjRespropertyparking->type.'</option>';    
                                }
                                
                           }
                           ?>
                        </select>
                        <p id="err-parking" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group ">
                    <label for="commercialshop" class="col-sm-2 form-control-label">Furnish Status</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="furnishtype" name="furnishtype" placeholder="- Select Commercial Shop -">
                            <?php
                           foreach( $objRespropertyfurnishedstatus AS $rowobjRespropertyfurnishedstatus){
                                if($objResproperty->respropertytype->furnishtype == $rowobjRespropertyfurnishedstatus->status ){
                                    echo '<option selected value="'.$rowobjRespropertyfurnishedstatus->status.'" >'.$rowobjRespropertyfurnishedstatus->status.'</option>';
                                }else{
                                    echo '<option value="'.$rowobjRespropertyfurnishedstatus->status.'" >'.$rowobjRespropertyfurnishedstatus->status.'</option>';    
                                }
                                
                           }
                           ?>
                        </select>
                        <p id="err-furnishingstatus" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Username" class="col-sm-2 form-control-label">Flooring</label>
                    <div class="col-sm-10">
                        <input  type="text" class="form-control input-sm" id="flooring" name="flooring" value="<?php echo $objResproperty->respropertytype->flooring; ?>" placeholder="Flooring" >
                        <p id="err-flooring" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Username" class="col-sm-2 form-control-label">Sanction Authority </label>
                    <div class="col-sm-10">
                        <input  type="text" class="form-control input-sm" id="sanctionauthority" name="sanctionauthority" value="<?php echo $objResproperty->respropertytype->sanctionauthority; ?>" placeholder="Sanction Authority " >
                        <p id="err-sanctionauthority" class="text-danger"></p>
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
            foreach ($objRespropertyimage AS $objImage) {
                if ($objImage->type == 'type') {
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
        var myDropzone = new Dropzone("#image", {
            url: "index.php?r=property/uploadrespropertytype&id=" + id + "&type=type",
            clickable: '#clickimage',
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