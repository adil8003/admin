<h1>Project</h1> 
<div class="container">
    <div class="row">
        <div class="col-sm-8">
            <form id="Newproject">
            <h4>*Please Note:-</h4>
            <ol>
            <li>Upload Images of 1444px(width)*900px(height) images with good quality</li>
            <li>Upload only 3 Images.</li>
            </ol>
                <div class="form-group row control-group">
                    <label for="Username" class="col-sm-2 form-control-label">Year of Construct</label>
                    <div class="col-sm-10">
                        <input  type="text" class="form-control input-sm" id="yearofconstruct" name="yearofconstruct" value="<?php echo $objComproject->comprojectproject->yearofconstruct; ?>" placeholder="Year of Construct" >
                        <p id="err-comyearofconst" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Possion" class="col-sm-2 form-control-label">Year of expt possion</label>
                    <div class="col-sm-10">
                        <input  type="text" class="form-control input-sm" id="yearofposition" name="yearofposition" value="<?php echo $objComproject->comprojectproject->yearofposition; ?>" placeholder="Year of expt possion" >
                        <p id="err-comyearofpossion" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Possion" class="col-sm-2 form-control-label">Age</label>
                    <div class="col-sm-10">
                        <input  type="text" class="form-control input-sm" id="age" name="age" value="<?php echo $objComproject->comprojectproject->age; ?>" placeholder="Age" >
                        <p id="err-age" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Possion" class="col-sm-2 form-control-label">Total floor</label>
                    <div class="col-sm-10">
                        <input  type="text" class="form-control input-sm" id="totalfloor" name="totalfloor" value="<?php echo $objComproject->comprojectproject->totalfloor; ?>" placeholder="Total floor" >
                        <p id="err-comtotalfloor" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Possion" class="col-sm-2 form-control-label">Floor No </label>
                    <div class="col-sm-10">
                        <input  type="text" class="form-control input-sm" id="floorno" name="floorno" value="<?php echo $objComproject->comprojectproject->floorno; ?>" placeholder="Floor No" >
                        <p id="err-comfloorno" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group ">
                    <label for="Ownership" class="col-sm-2 form-control-label">Commercial proj type</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="commercialprojtypeid" name="commercialprojtypeid" placeholder="- Select Ownership type -">
                        <?php
                           foreach( $objCommercialprojtype AS $rowobjCommercialprojtype){
                                if($objComproject->comprojectproject->commercialprojtypeid == $rowobjCommercialprojtype->id ){
                                    echo '<option selected value="'.$rowobjCommercialprojtype->id.'" >'.$rowobjCommercialprojtype->name.'</option>';
                                }else{
                                    echo '<option value="'.$rowobjCommercialprojtype->id.'" >'.$rowobjCommercialprojtype->name.'</option>';    
                                }
                                
                           }
                           ?>
                        </select>
                        <p id="err-commercialprojtype" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Towers" class="col-sm-2 form-control-label">Total sq Feet</label>
                    <div class="col-sm-10">
                        <input  type="text" class="form-control input-sm" id="totalsqfeet" name="totalsqfeet" value="<?php echo $objComproject->comprojectproject->totalsqfeet; ?>" placeholder="Total sq Feet">
                        <p id="err-totalsqfeet" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Row House" class="col-sm-2 form-control-label">Cost Per sq Feet</label>
                    <div class="col-sm-10">
                        <input  type="text" class="form-control input-sm" id="costpersqfeet"  name="costpersqfeet" value="<?php echo $objComproject->comprojectproject->costpersqfeet; ?>" placeholder="Cost Per sq Feet" >
                        <p id="err-comcostpersqfeet" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="villa" class="col-sm-2 form-control-label">Other charges</label>
                    <div class="col-sm-10">
                        <input  type="text" class="form-control input-sm" id="othercharges" name="othercharges" value="<?php echo $objComproject->comprojectproject->othercharges; ?>" placeholder="Other charges" >
                        <p id="err-othercharges" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="villa" class="col-sm-2 form-control-label">Comments</label>
                    <div class="col-sm-10">
                        <input  type="text" class="form-control input-sm" id="comments" name="comments" value="<?php echo $objComproject->comprojectproject->comments; ?>" placeholder="Other charges" >
                        <p id="err-othercharges" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button onclick="saveProject();" type="button" class="btn btn-success">Save</button>
                        <button onclick="resetProfile();" type="button" class="btn btn-success">Cancel</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-sm-4 imageScroll">
            <div id="imageq" class="card">
                <div class="card-block">
                    <h4 class="card-title">Drop Image Or <button type="button" id="clickimageq" class="btn btn-secondary btn-sm">Click here</button></h4>
                    <progress id="progressimage" class="hide progress" value="0" max="100">0%</progress>
                </div>
            </div>
            <?php
            foreach ($objComprojectimage AS $objImage) {
                if ($objImage->type == 'typeproject') {
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
        var myDropzone = new Dropzone("#imageq", {
            url: "index.php?r=property/uploadcomproject&id=" + id + "&type=typeproject",
            clickable: '#clickimageq',
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