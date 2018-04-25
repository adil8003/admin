<h2>Office</h2>  
<div class="container">
    <div class="row">
        <div class="col-sm-8">
            <form id="Newamaneties">
            <h4>*Please Note:-</h4>
            <ol>
            <li>Upload Images of 800(width)*600px(height) images with good quality</li>
            <li>These images will be shown only under Features Section.</li>
            </ol>
                <div class="form-group row control-group">
                    <label for="Username" class="col-sm-2 form-control-label">Year of Construct</label>
                    <div class="col-sm-10">
                        <input  type="text" class="form-control input-sm" id="offyearofconstruct" name="offyearofconstruct" value="<?php echo $objComproject->comprojectoffice->yearofconstruct; ?>" placeholder="Year of Construct" >
                        <p id="err-yearofconst" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Possion" class="col-sm-2 form-control-label">Year of expt possion</label>
                    <div class="col-sm-10">
                        <input  type="text" class="form-control input-sm" id="offyearofposition" name="offyearofposition" value="<?php echo $objComproject->comprojectoffice->yearofposition; ?>" placeholder="Year of expt possion" >
                        <p id="err-yearofpossion" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Possion" class="col-sm-2 form-control-label">Age</label>
                    <div class="col-sm-10">
                        <input  type="text" class="form-control input-sm" id="offage" name="offage" value="<?php echo $objComproject->comprojectoffice->age; ?>" placeholder="Age" >
                        <p id="err-age" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group ">
                    <label for="commercialshop" class="col-sm-2 form-control-label">Furnishing</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="furnishingid" name="furnishingid" placeholder="- Restroom -">
                             <?php
                           foreach( $objComprojectfurnishing AS $rowobjComprojectfurnishing){
                                if($objComproject->comprojectoffice->furnishingid == $rowobjComprojectfurnishing->id ){
                                    echo '<option selected value="'.$rowobjComprojectfurnishing->id.'" >'.$rowobjComprojectfurnishing->name.'</option>';
                                }else{
                                    echo '<option value="'.$rowobjComprojectfurnishing->id.'" >'.$rowobjComprojectfurnishing->name.'</option>';    
                                }
                                
                           }
                           ?>
                        </select>
                        <p id="err-officefurnishing" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group ">
                    <label for="commercialshop" class="col-sm-2 form-control-label">Preferred</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="preferredid" name="preferredid" placeholder="- Restroom -">
                           <?php
                           foreach( $objComprojectpreferred AS $rowobjComprojectpreferred){
                                if($objComproject->comprojectoffice->preferredid == $rowobjComprojectpreferred->id ){
                                    echo '<option selected value="'.$rowobjComprojectpreferred->id.'" >'.$rowobjComprojectpreferred->name.'</option>';
                                }else{
                                    echo '<option value="'.$rowobjComprojectpreferred->id.'" >'.$rowobjComprojectpreferred->name.'</option>';    
                                }
                                
                           }
                           ?>
                        </select>
                        <p id="err-officePreferred" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Possion" class="col-sm-2 form-control-label">Total floor</label>
                    <div class="col-sm-10">
                        <input  type="text" class="form-control input-sm" id="offtotalfloor" name="totalfloor" value="<?php echo $objComproject->comprojectoffice->totalfloor; ?>" placeholder="Total floor" >
                        <p id="err-totalfloor" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Possion" class="col-sm-2 form-control-label">Floor No </label>
                    <div class="col-sm-10">
                        <input  type="text" class="form-control input-sm" id="floornooffice" name="floorno" value="<?php echo $objComproject->comprojectoffice->floorno; ?>" placeholder="Floor No" >
                        <p id="err-floorno" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group ">
                    <label for="Ownership" class="col-sm-2 form-control-label">Commercial proj type</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="commercialprojtypeid" name="commercialprojtypeid" placeholder="- Select Ownership type -">
                            <?php
                           foreach( $objCommercialprojtype AS $rowobjCommercialprojtype){
                                if($objComproject->comprojectoffice->commercialprojtypeid == $rowobjCommercialprojtype->id ){
                                    echo '<option selected value="'.$rowobjCommercialprojtype->id.'" >'.$rowobjCommercialprojtype->name.'</option>';
                                }else{
                                    echo '<option value="'.$rowobjCommercialprojtype->id.'" >'.$rowobjCommercialprojtype->name.'</option>';    
                                }
                                
                           }
                           ?>
                        </select>
                        <p id="err-comprojtype" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Towers" class="col-sm-2 form-control-label">Total sq Feet</label>
                    <div class="col-sm-10">
                        <input  type="text" class="form-control input-sm" value="<?php echo $objComproject->comprojectoffice->officetotalsqfeet; ?>" id="officetotalsqfeet" name="officetotalsqfeet"  placeholder="Total sq Feet">
                        <p id="err-totalsqfeet" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Row House" class="col-sm-2 form-control-label">Cost Per sq Feet</label>
                    <div class="col-sm-10">
                        <input  type="text" class="form-control input-sm" id="offcostpersqfeet" name="offcostpersqfeet" value="<?php echo $objComproject->comprojectoffice->costpersqfeet; ?>" placeholder="Cost Per sq Feet" >
                        <p id="err-compropertycostpersqfeet" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="villa" class="col-sm-2 form-control-label">Other charges</label>
                    <div class="col-sm-10">
                        <input  type="text" class="form-control input-sm" id="offothercharges" name="offothercharges" value="<?php echo $objComproject->comprojectoffice->othercharges; ?>" placeholder="Other charges" >
                        <p id="err-comothercharges" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button onclick="saveOffice();" type="button" class="btn btn-success">Save</button>
                        <button onclick="resetProfile();" type="button" class="btn btn-success">Cancel</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-sm-4 imageScroll">
            <div id="imagef" class="card">
                <div class="card-block">
                    <h4 class="card-title">Drop Image Or <button type="button" id="clickimagef" class="btn btn-secondary btn-sm">Click here</button></h4>
                    <progress id="progressimage" class="hide progress" value="0" max="100">0%</progress>
                </div>
            </div>
            <?php
            foreach ($objComprojectimage AS $objImage) {
                if ($objImage->type == 'typeoffice') {
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