<h2>Micro Site</h2>
<div class="container" id="myTab">
    <div class="row">
        <div class="col-sm-12"> 
            <form id="Microsite">
                <h4>*Please Note:-</h4>
                <ol>
                    <li>Upload Images of 800(width)*600px(height) images with good quality</li>
                    <li>These images will be shown only under About Section.</li>
                    <li>Upload only one image.</li>
                </ol>
                <!-- ///////////////////////FEATURES 1 //////////////////// -->
                <div class="form-group row control-group">
                    <label for="Username" class="col-sm-2 form-control-label">Featiures Heading1</label>
                    <div class="col-sm-10">
                        <input  type="text" class="form-control input-sm" value="<?php echo $objComproject->comprojectmicrositedetails->featuresheading1; ?>" id="featuresheading1" name="featuresheading1" value="" placeholder="Features Heading1" >
                        <p id="err-featuresheading1" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Towers" class="col-sm-2 form-control-label">Heading1 Deatils</label>
                    <div class="col-sm-10">
                        <textarea class="form-control input-sm" id="heading1details"  name="heading1details"  placeholder="Heading1 Details"><?php echo $objComproject->comprojectmicrositedetails->heading1details; ?></textarea>
                        <p id="err-heading1details" class="text-danger"></p>
                    </div>
                </div>
                <!-- ///////////////////////FEATURES 2 //////////////////// -->

                <div class="form-group row control-group">
                    <label for="Username" class="col-sm-2 form-control-label">Featiures Heading2</label>
                    <div class="col-sm-10">
                        <input  type="text" class="form-control input-sm" value="<?php echo $objComproject->comprojectmicrositedetails->featuresheading2; ?>" id="featuresheading2" name="featuresheading2" value="" placeholder="Features Heading2" >
                        <p id="err-featuresheading2" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Towers" class="col-sm-2 form-control-label">Heading2 Deatils</label>
                    <div class="col-sm-10">
                        <textarea class="form-control input-sm" id="heading2details"  name="heading2details"  placeholder="Heading2 Details"><?php echo $objComproject->comprojectmicrositedetails->heading2details; ?></textarea>
                        <p id="err-heading2details" class="text-danger"></p>
                    </div>
                </div>

                <!-- ///////////////////////FEATURES 3 //////////////////// -->

                <div class="form-group row control-group">
                    <label for="Username" class="col-sm-2 form-control-label">Featiures Heading3</label>
                    <div class="col-sm-10">
                        <input  type="text" class="form-control input-sm" value="<?php echo $objComproject->comprojectmicrositedetails->featuresheading3; ?>" id="featuresheading3" name="featuresheading3" value="" placeholder="Features Heading3" >
                        <p id="err-featuresheading3" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Towers" class="col-sm-2 form-control-label">Heading3 Deatils</label>
                    <div class="col-sm-10">
                        <textarea class="form-control input-sm" id="heading3details"  name="heading3details"  placeholder="Heading3 Details"><?php echo $objComproject->comprojectmicrositedetails->heading3details; ?></textarea>
                        <p id="err-heading3details" class="text-danger"></p>
                    </div>
                </div>


                <!-- ///////////////////////FEATURES 4 //////////////////// -->

                <div class="form-group row control-group">
                    <label for="Username" class="col-sm-2 form-control-label">Featiures Heading4</label>
                    <div class="col-sm-10">
                        <input  type="text" class="form-control input-sm" value="<?php echo $objComproject->comprojectmicrositedetails->featuresheading4; ?>" id="featuresheading4" name="featuresheading4" value="" placeholder="Features Heading4" >
                        <p id="err-featuresheading4" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Towers" class="col-sm-2 form-control-label">Heading4 Deatils</label>
                    <div class="col-sm-10">
                        <textarea class="form-control input-sm" id="heading4details"  name="heading4details"  placeholder="Heading4 Details"><?php echo $objComproject->comprojectmicrositedetails->heading4details; ?></textarea>
                        <p id="err-heading4details" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Towers" class="col-sm-2 form-control-label">About us Content</label>
                    <div class="col-sm-10">
                        <textarea class="form-control input-sm" id="aboutuscontent"  name="aboutuscontent"  placeholder="Aboutus Content"><?php echo $objComproject->comprojectmicrositedetails->aboutuscontent; ?></textarea>
                        <p id="err-aboutuscontent" class="text-danger"></p>
                    </div>
                </div>
                <input type="hidden" value="<?php echo $objComproject->comprojectmicrositedetails->id; ?>" id="comprojectmicrositedetailsid">
                <div class="form-group row">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button onclick="saveComMicrosite();" type="button" class="btn btn-success">Save</button>
                        <button onclick="resetProfile();" type="button" class="btn btn-success">Cancel</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function saveComMicrosite() {
        alertify.confirm("Are you sure you want to save Microsite ?",
                function () {
                    var obj = new Object();
                    obj.comprojectid = $('#comprojectid').val();
                    // obj.resprojectmicrositedetailsid = $('#resprojectmicrositedetailsid').val();
                    obj.featuresheading1 = $('#featuresheading1').val();
                    obj.featuresheading2 = $('#featuresheading2').val();
                    obj.featuresheading3 = $('#featuresheading3').val();
                    obj.featuresheading4 = $('#featuresheading4').val();
                    obj.heading1details = $('#heading1details').val();
                    obj.heading2details = $('#heading2details').val();
                    obj.heading3details = $('#heading3details').val();
                    obj.heading4details = $('#heading4details').val();
                    obj.aboutuscontent = $('#aboutuscontent').val();
                    $.ajax({
                        url: 'index.php?r=property/savecomprojectmicrosite',
                        async: false,
                        data: obj,
                        type: 'POST',
                        success: function (data) {
                            alertify.alert("Microsite Saved Succesfully !!", function () {
                            });
                        }
                    });
                });
    }



</script>