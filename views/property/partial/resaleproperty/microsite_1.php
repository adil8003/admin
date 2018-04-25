<h2>Micro Site</h2>
<div class="container" id="myTab">
    <div class="row">
        <div class="col-sm-8"> 
            <form id="Microsite">
                <h4>*Please Note:-</h4>
                <ol>
                    <li>Upload Images of 800(width)*600px(height) images with good quality</li>
                    <li>These images will be shown only under About Section.</li>
                    <li>Upload only one image.</li>
                </ol>
                <!-- ///////////////////////FEATURES 1 //////////////////// -->

                <div class="form-group row control-group">
                    <label for="Username" class="col-sm-2 form-control-label">Property Details</label>
                    <div class="col-sm-10">
                        <input  type="text"  class="form-control input-sm" value="<?php echo $objResaleproperty->resalemicrositedetails->featuresheading1; ?>" id="featuresheading1" name="featuresheading1" value="" placeholder="Property Details" >
                        <p id="err-featuresheading1" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Towers" class="col-sm-2 form-control-label">Property Details</label>
                    <div class="col-sm-10">
                        <textarea class="form-control input-sm" id="heading1details"  name="heading1details"  placeholder="Property Details Info ex. "><?php echo $objResaleproperty->resalemicrositedetails->heading1details; ?></textarea>
                        <p id="err-heading1details" class="text-danger"></p>
                    </div>
                </div>
                <!-- ///////////////////////FEATURES 2 //////////////////// -->
<!--                        <div class="form-group row control-group" id="mydiv">
                            <label for="Username" class="col-sm-2  form-control-label">Ameneties</label>
                            <div class="col-sm-10">
                                <input  type="text"  class="form-control input-sm" value="" id="featuresheading2" name="featuresheading2"  placeholder="" >
                                <div class="col-sm-3">
                                <label><input type="checkbox" id="lift" value="Lift">Lift</label>
                                <spaan> <label><input type="checkbox" id="parking" value="Parking">Parking</label></spaan>
                                <spaan><label><input type="checkbox" id="security" value="Security">Security</label></spaan>
                                <spaan><label><input type="checkbox" id="swimmingpool" value="Swimming pool">Swimming pool</label></spaan>
                                <spaan><label><input type="checkbox" id="clubhouse" value="Club House">Club House</label></spaan>
                            </div>
                            </div>
                        </div>-->
                         <div class="form-group row control-group">
                    <label for="Username" class="col-sm-2 form-control-label">Ameneties </label>
                    <div class="col-sm-10">
                        <input  type="text"  class="form-control input-sm" value="<?php echo $objResaleproperty->resalemicrositedetails->featuresheading2; ?>" id="featuresheading2" name="featuresheading2" value="" placeholder="Property Details" >
                        <p id="err-featuresheading1" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Towers" class="col-sm-2 form-control-label">Ameneties details</label>
                    <div class="col-sm-10">
                        <textarea class="form-control input-sm" id="heading2details"  name="heading1details"  placeholder="Property Details Info ex. "><?php echo $objResaleproperty->resalemicrositedetails->heading2details; ?></textarea>
                        <p id="err-heading1details" class="text-danger"></p>
                    </div>
                </div>

                    <!-- ///////////////////////FEATURES 3 //////////////////// -->
                    
                    <?php
//                    $objResaleproperty->resalemicrositedetails->heading3details;
                 $val = $objResaleproperty->resalemicrositedetails->heading3details;
                     
                    ?>
                    <div class="row">
                         <div class="form-group row control-group">
                                    <label for="Username" class="col-sm-2 form-control-label">Key location</label>
                                    <div class="col-sm-10">
                                        <input  type="text" class="form-control input-sm"  value="<?php echo $objResaleproperty->resalemicrositedetails->featuresheading3;  ?>" id="featuresheading3" name="featuresheading3" value="" placeholder="Ameneties" >
                                        <p id="err-featuresheading2" class="text-danger"></p>
                                    </div>
                        <div class="row">
                            <div class="col-sm-2">
<!--                                <label for="Username"  class="form-control-label">Key location</label>-->
                            </div>
                            <div class="col-sm-10">
                                <div class="col-sm-4" style="    padding: 2px;  margin-right: 0px;">
                                    <label><input type="checkbox" name="check" id="School" >School</label><span><input  type="text"  id="School-id" class="form-control input-sm" value="" name="featuresheading3"  placeholder="Location" ></span>
                                </div>
                                <div class="col-sm-4">
                                    <label><input type="checkbox" name="check" id="Collage" >Collage</label><span><input  type="text" id="Collage-id" class="form-control input-sm" value=""  name="featuresheading3"  placeholder="Location" ></span>
                                </div>
                                <div class="col-sm-4">
                                    <label><input type="checkbox" name="check" id="Multiplex" value="3">Multiplex</label><span><input  type="text"  id="Multiplex-id" class="form-control input-sm" value="" name="featuresheading3"  placeholder="Location" ></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="row">
                                <div class="col-sm-2">
                                    <!--<label for="Username"  form-control-label">Location</label>-->
                                </div>
                                <div class="col-sm-10">
                                    <div class="col-sm-4">
                                        <label><input type="checkbox" name="check" id="Policestation" value="4">Police Station</label><span><input id="Police-station"  type="text" class="form-control input-sm" value=""  name="featuresheading4"  placeholder="Location" ></span>
                                    </div>
                                    <div class="col-sm-4">
                                        <label><input type="checkbox"  name="check" id="Railwaystation" value="5">Railway station</label><span><input id="Railway-station" type="text" class="form-control input-sm" value=""  name="featuresheading4"  placeholder="Location" ></span>
                                    </div>
                                    <div class="col-sm-4">
                                        <label><input type="checkbox" name="check" id="Airport" value="6">Airport</label><span><input  type="text" id="Air-port" class="form-control input-sm" value=""  name="featuresheading4"  placeholder="Location" ></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="row">
                                <div class="col-sm-2">
                                    <!--<label for="Username"  form-control-label">Location</label>-->
                                </div>
                                <div class="col-sm-10">
                                    <div class="col-sm-4">
                                        <label><input type="checkbox" name="check" id="Mall" value="7">Mall</label><span><input  type="text" class="form-control input-sm" value="" id="Mall-id" name="featuresheading4"  placeholder="Location" ></span>
                                    </div>
                                    <div class="col-sm-4">
                                        <label><input type="checkbox" name="check" id="Market" value="8">Market</label><span><input  type="text" class="form-control input-sm" value="" id="Market-id" name="featuresheading4"  placeholder="Location" ></span>
                                    </div>
                                    <div class="col-sm-4">
                                        <label><input type="checkbox" name="check" id="Temple" value="9">Temple</label><span><input  type="text" class="form-control input-sm" value="" id="Temple-id" name="featuresheading4"  placeholder="Location" ></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div><br>

                    <!-- ///////////////////////FEATURES 4 //////////////////// -->

                    <div class="form-group row control-group">
                        <label for="Username" class="col-sm-2 form-control-label">Location</label>
                        <div class="col-sm-10">
                            <input  type="text" class="form-control input-sm" value="<?php echo $objResaleproperty->resalemicrositedetails->featuresheading4; ?>" id="featuresheading4" name="featuresheading4"  placeholder="Location" >
                            <p id="err-featuresheading4" class="text-danger"></p>
                        </div>
                    </div>
                    <div class="form-group row control-group">
                        <label for="Towers" class="col-sm-2 form-control-label">Location Details</label>
                        <div class="col-sm-10">
                            <textarea class="form-control input-sm" id="heading4details"  name="heading4details"  placeholder="Location"><?php echo $objResaleproperty->resalemicrositedetails->heading4details; ?></textarea>
                            <p id="err-heading4details" class="text-danger"></p>
                        </div>
                    </div>
                    <div class="form-group row control-group">
                        <label for="Towers" class="col-sm-2 form-control-label">About us Content</label>
                        <div class="col-sm-10">
                            <textarea class="form-control input-sm" id="aboutuscontent"  name="aboutuscontent"  placeholder="Aboutus Content"><?php echo $objResaleproperty->resalemicrositedetails->aboutuscontent; ?></textarea>
                            <p id="err-aboutuscontent" class="text-danger"></p>
                        </div>
                    </div>
                    <input type="hidden" value="<?php echo $objResaleproperty->resalemicrositedetails->id; ?>" id="resalemicrositedetailsid">
                    <div class="form-group row">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button onclick="saveResaleMicrosite();" type="button" class="btn btn-success">Save</button>
                            <button onclick="resetProfile();" type="button" class="btn btn-success">Cancel</button>
                        </div>
                    </div>
            </form>
        </div>
        <div class="col-sm-4 imageScroll">
            <div id="imageabout" class="card">
                <div class="card-block">
                    <h4 class="card-title">Drop Image Or <button type="button" id="clickimageabout" class="btn btn-secondary btn-sm">Click here</button></h4>
                    <progress id="progressimage" class="hide progress" value="0" max="100">0%</progress>
                </div>
            </div>
            <?php
            foreach ($objResalepropertyimage AS $objImage) {
                if ($objImage->type == 'microsite') {
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
        var id = $('#resalepropertyid').val();
        var myDropzone = new Dropzone("#imageabout", {
            url: "index.php?r=property/uploadresalemicrosite&id=" + id + "&type=microsite",
            clickable: '#clickimageabout',
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
                        url: "index.php?r=property/deleteresaleprojectimage",
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
    function saveResaleMicrosite() {
        var aa =   $('#School').is(":checked");
        if(aa == true){
            alert(1)
        }
        alertify.confirm("Are you sure you want to save Microsite ?",
                function () {
                    var obj = new Object();
                    obj.resalepropertyid = $('#resalepropertyid').val();
                    obj.featuresheading1 = $('#featuresheading1').val();
                    obj.featuresheading2 = $('#featuresheading2').val();
                    obj.featuresheading3 = $('#featuresheading3').val();
                    obj.featuresheading4 = $('#featuresheading4').val();
                    obj.heading1details = $('#heading1details').val();
                    obj.heading2details = $('#heading2details').val();
                    obj.heading3details = 1;
                    obj.heading4details = $('#heading4details').val();
                    obj.aboutuscontent = $('#aboutuscontent').val();
                    
                    obj.school = $('#School').is(":checked");
                    obj.collage = $('#Collage').is(":checked");
                    obj.multiplex = $('#Multiplex').is(":checked");
                    obj.policestation =  $('#Policestation').is(":checked");
                    obj.airport = $('#Airport').is(":checked");
                    obj.mall = $('#Mall').is(":checked");
                    obj.market = $('#Market').is(":checked");
                    obj.temple =  $('#Temple').is(":checked");


                    $.ajax({
                        url: 'index.php?r=property/saveresalemicrositedetails',
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