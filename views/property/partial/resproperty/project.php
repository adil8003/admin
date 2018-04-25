<h2>project</h2>
<div class="container">
    <div class="row">
        <div class="col-sm-8">
            <form id="Viewproject">
                <div class="form-group row control-group">
                    <label for="Username" class="col-sm-2 form-control-label">Year of Construct</label>
                    <div class="col-sm-10">
                        <input  type="text" class="form-control input-sm" value="<?php echo $objResproperty->respropertyproject->yearofconstruct; ?>" id="yearofconstruct" name="yearofconstruct"  placeholder="Year of Construct" >
                        <p id="err-yearofconst" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Possion" class="col-sm-2 form-control-label">Year of expt possion</label>
                    <div class="col-sm-10">
                        <input  type="text" class="form-control input-sm" value="<?php echo $objResproperty->respropertyproject->yearofpossion; ?>" id="yearofpossion" name="yearofpossion"  placeholder="Year of expt possion" >
                        <p id="err-yearofpossion" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group ">
                    <label for="Ownership" class="col-sm-2 form-control-label">Ownership type</label>
                    <div class="col-sm-10">
                         <select class="form-control" id="ownershiptypeid"  id="ownershiptypeid" name="ownershiptypeid" placeholder="- Select Ownership type -">
                           <!--<option value="<?php // $objOwnershiptype->id;   ?>"><?php // $objOwnershiptype->name;   ?></option>-->
                           <?php
                           foreach( $objOwnershiptype AS $rowOwnershiptype){
                                if($objResproperty->respropertyproject->ownershiptypeid == $rowOwnershiptype->id ){
                                    echo '<option selected value="'.$rowOwnershiptype->id.'" >'.$rowOwnershiptype->name.'</option>';
                                }else{
                                    echo '<option value="'.$rowOwnershiptype->id.'" >'.$rowOwnershiptype->name.'</option>';    
                                }
                                
                           }
                           ?>
                        </select>
                        <p id="err-ownershiptype" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Towers" class="col-sm-2 form-control-label">No Of Tower</label>
                    <div class="col-sm-10">
                        <input  type="text" class="form-control input-sm" value="<?php echo $objResproperty->respropertyproject->nooftower; ?>"  id="nooftower" name="nooftower" value="" placeholder="Towers">
                        <p id="err-towers" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Towers" class="col-sm-2 form-control-label">No of Floor</label>
                    <div class="col-sm-10">
                        <input  type="text" class="form-control input-sm" value="<?php echo $objResproperty->respropertyproject->nooffloor; ?>" id="nooffloor" name="nooffloor" value="" placeholder="Towers">
                        <p id="err-towers" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Towers" class="col-sm-2 form-control-label">No of Flat Per Floor</label>
                    <div class="col-sm-10">
                        <input  type="text" class="form-control input-sm" value="<?php echo $objResproperty->respropertyproject->noofflatperfloor; ?>" id="noofflatperfloor" name="noofflatperfloor" value="" placeholder="Towers">
                        <p id="err-towers" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Row House" class="col-sm-2 form-control-label">No Of Row House</label>
                    <div class="col-sm-10">
                        <input  type="text" class="form-control input-sm" value="<?php echo $objResproperty->respropertyproject->noofrowhouse; ?>" id="noofrowhouse" name="noofrowhouse"  placeholder="Type of Row House" >
                        <p id="err-rowhouse" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="villa" class="col-sm-2 form-control-label">Villa</label>
                    <div class="col-sm-10">
                        <input  type="text" class="form-control input-sm" value="<?php echo $objResproperty->respropertyproject->villa; ?>" id="villa" name="villa"  placeholder="Type Of Villa" >
                        <p id="err-typeofvilla" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="villa" class="col-sm-2 form-control-label">Commercial Shop</label>
                    <div class="col-sm-10">
                        <input  type="text" class="form-control input-sm" value="<?php echo $objResproperty->respropertyproject->commercialshop; ?>" id="commercialshop" name="commercialshop" value="" placeholder="Type Of Villa" >
                        <p id="err-typeofvilla" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Comments" class="col-sm-2 form-control-label">Comments</label>
                    <div class="col-sm-10">
                        <textarea class="form-control input-sm" rows="1" value="" id="comment" name="comment"  placeholder="Comments" ><?php echo $objResproperty->respropertyproject->comment; ?></textarea>
                        <p id="err-villa" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button onclick="savePropertyproject();" type="button" class="btn btn-success">Save</button>
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
            foreach ($objRespropertyimage AS $objImage) {
                if ($objImage->type == 'typeproject') {
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
        var myDropzone = new Dropzone("#imageq", {
            url: "index.php?r=property/uploadrespropertyproject&id=" + id + "&type=typeproject",
            clickable: '#clickimageq',
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