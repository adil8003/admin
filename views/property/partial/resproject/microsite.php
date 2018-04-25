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
                    <label for="Username" class="col-sm-2 form-control-label">Property heading</label>
                    <div class="col-sm-10">
                        <input  type="text"  class="form-control input-sm" value="<?php echo $objResproject->resprojectmicrositedetails->featuresheading1; ?>" id="featuresheading1" name="featuresheading1" value="" placeholder="Property Details" >
                        <p id="err-featuresheading1" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Towers" class="col-sm-2 form-control-label">Property Details</label>
                    <div class="col-sm-10">
                        <textarea class="form-control input-sm" id="heading1details"  name="heading1details"  placeholder="Property Details Info ex. "><?php echo $objResproject->resprojectmicrositedetails->heading1details; ?></textarea>
                        <p id="err-heading1details" class="text-danger"></p>
                    </div>
                </div>
                <!-- ///////////////////////FEATURES 2 //////////////////// -->
                <!-- ///////////////////////FEATURES 2 //////////////////// -->
                <div class="form-group row control-group" id="mydiv">
                    <label for="Username" class="col-sm-2 form-control-label">Ameneties</label>
                    <div class="col-sm-10">
                        <input  type="text" class="form-control input-sm"  value="<?php echo $objResproject->resprojectmicrositedetails->featuresheading2; ?>" id="featuresheading2" name="featuresheading2" value="" placeholder="Ameneties" >
                        <p id="err-featuresheading2" class="text-danger"></p>
                    </div>
                    <div class="row">
                        <div class="col-sm-10 col-sm-offset-2 ">
                            <div class="col-sm-4" style="padding: 2px;  margin-right: 0px;">
                                <label><input type="checkbox" id="liftid"  value=""<?php echo ($objResproject->resmoredata->liftid == 1) ? "checked" : "" ?>>Lift</label>
                            </div>
                            <div class="col-sm-4">
                                <label><input type="checkbox" id="parkingid" <?php echo ($objResproject->resmoredata->parkingid == 1) ? "checked" : "" ?>>Parking</label>
                            </div>
                            <div class="col-sm-4">
                                <label><input type="checkbox" id="securityid" <?php echo ($objResproject->resmoredata->securityid == 1) ? "checked" : "" ?>>Security</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2 ">
                            <div class="col-sm-4" style="padding: 2px;  margin-right: 0px;">
                                <label><input type="checkbox" id="swimmingpoolid" <?php echo ($objResproject->resmoredata->swimmingpoolid == 1) ? "checked" : "" ?> >Swimming pool</label>
                            </div>
                            <div class="col-sm-4">
                                <label><input type="checkbox" id="clubhouseid" <?php echo ($objResproject->resmoredata->clubhouseid == 1) ? "checked" : "" ?>>Club House</label>
                            </div>
                            <div class="col-sm-4">
                                <label><input type="checkbox" id="childrenplaygroundid" <?php echo ($objResproject->resmoredata->childrenplaygroundid == 1) ? "checked" : "" ?>>Children playground</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2">
                            <div class="col-sm-4" style="padding: 2px;  margin-right: 0px;">
                                <label><input type="checkbox" id="seniorcitizenid" <?php echo ($objResproject->resmoredata->seniorcitizenid == 1) ? "checked" : "" ?> >Senior citizen</label>
                            </div>
                            <div class="col-sm-4">
                                <label><input type="checkbox" id="gymid" <?php echo ($objResproject->resmoredata->gymid == 1) ? "checked" : "" ?>>Gym</label>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ///////////////////////FEATURES 3 //////////////////// -->

                <div class="row">
                    <div class="form-group row control-group">
                        <label for="Username" class="col-sm-2 form-control-label">Key location</label>
                        <div class="col-sm-10" style="padding-bottom: 1em;">
                            <input  type="text" class="form-control input-sm"  value="<?php echo $objResproject->resprojectmicrositedetails->featuresheading3; ?>" id="featuresheading3" name="featuresheading3" value="" placeholder="Key location" >
                            <p id="err-featuresheading2" class="text-danger"></p>
                        </div>
                        <div class="row">
                            <!--<div class="row">-->
                                <div class="col-sm-10 col-sm-offset-2 ">
                                    <div class="col-sm-4" >
                                        <label><input type="checkbox" name="check" id="School"<?php echo ($objResproject->resmoredata->schoolid == 1) ? "checked" : "" ?> >School</label><span><input  type="text"  id="School-id" class="form-control input-sm" value="<?php echo $objResproject->resmoredata->schooltrext; ?>"name="schooltrext"  placeholder="Enter school distance" ></span>
                                    </div>
                                    <div class="col-sm-4">
                                        <label><input type="checkbox" name="check" id="Collage" <?php echo ($objResproject->resmoredata->collageid == 1) ? "checked" : "" ?>>College</label><span><input  type="text" id="Collage-id" class="form-control input-sm" value="<?php echo $objResproject->resmoredata->collagetext; ?>"  name="collagetext"  placeholder="Enter police collage distance" ></span>
                                    </div>
                                    <div class="col-sm-4">
                                        <label><input type="checkbox" name="check" id="Multiplex" <?php echo ($objResproject->resmoredata->multiplexid == 1) ? "checked" : "" ?> >Multiplex</label><span><input  type="text"  id="Multiplex-id" class="form-control input-sm" value="<?php echo $objResproject->resmoredata->multiplextext; ?>" name="multiplextext"  placeholder="Enter multiplex distance" ></span>
                                    </div>
                                </div>
                            <!--</div>-->
                        </div>
                        <div class="row">
                            <!--<div class="row">-->
                                <div class="col-sm-10 col-sm-offset-2 ">
                                    <div class="col-sm-4">
                                        <label><input type="checkbox" name="check" id="Policestation" <?php echo ($objResproject->resmoredata->policestationid == 1) ? "checked" : "" ?> >Police Station</label><span><input id="Police-station"  type="text" class="form-control input-sm" value="<?php echo $objResproject->resmoredata->policestationtext; ?>"  name="policestationtext"  placeholder="Enter police station distance" ></span>
                                    </div>
                                    <div class="col-sm-4">
                                        <label><input type="checkbox"  name="check" id="Railwaystation" <?php echo ($objResproject->resmoredata->railwaystationid == 1) ? "checked" : "" ?> >Railway station</label><span><input id="Railway-station" type="text" class="form-control input-sm" value="<?php echo $objResproject->resmoredata->railwaystationtext; ?>" name="railwaystationtext"  placeholder="Enter railway station distance" ></span>
                                    </div>
                                    <div class="col-sm-4">
                                        <label><input type="checkbox" name="check" id="Airport" <?php echo ($objResproject->resmoredata->airportid == 1) ? "checked" : "" ?>>Airport</label><span><input  type="text" id="Air-port" class="form-control input-sm" value="<?php echo $objResproject->resmoredata->airporttext; ?>"  name="airporttext"  placeholder="Enter airport distance" ></span>
                                    </div>
                                </div>
                            <!--</div>-->
                        </div>
                        <div class="row">
                            <!--<div class="row">-->
                                <div class="col-sm-10 col-sm-offset-2">
                                    <div class="col-sm-4">
                                        <label><input type="checkbox" name="check" id="Mall" <?php echo ($objResproject->resmoredata->mallid == 1) ? "checked" : "" ?>>Mall</label><span><input  type="text" class="form-control input-sm" value="<?php echo $objResproject->resmoredata->malltext; ?>" id="Mall-id" name="malltext"  placeholder="Enter mall distance" ></span>
                                    </div>
                                    <div class="col-sm-4">
                                        <label><input type="checkbox" name="check" id="Market" <?php echo ($objResproject->resmoredata->marketid == 1) ? "checked" : "" ?> >Market</label><span><input  type="text" class="form-control input-sm" value="<?php echo $objResproject->resmoredata->markettext; ?>" id="Market-id" name="markettext"  placeholder="Enter market distance" ></span>
                                    </div>
                                    <div class="col-sm-4">
                                        <label><input type="checkbox" name="check" id="Temple"  <?php echo ($objResproject->resmoredata->templeid == 1) ? "checked" : "" ?>>Temple</label><span><input  type="text" class="form-control input-sm" value="<?php echo $objResproject->resmoredata->templetext; ?>" id="Temple-id" name="templetext"  placeholder="Enter temple distance " ></span>
                                    </div>
                                </div>
                            <!--</div>-->
                        </div>
                    </div>
                </div><br>

                <!-- ///////////////////////FEATURES 4 //////////////////// -->

                <div class="form-group row control-group">
                    <label for="Username" class="col-sm-2 form-control-label">Location</label>
                    <div class="col-sm-10">
                        <input  type="text" class="form-control input-sm" value="<?php echo $objResproject->resprojectmicrositedetails->featuresheading4; ?>" id="featuresheading4" name="featuresheading4"  placeholder="Location" >
                        <p id="err-featuresheading4" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Towers" class="col-sm-2 form-control-label">Location Details</label>
                    <div class="col-sm-10">
                        <textarea class="form-control input-sm" id="heading4details"  name="heading4details"  placeholder="Location"><?php echo $objResproject->resprojectmicrositedetails->heading4details; ?></textarea>
                        <p id="err-heading4details" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Towers" class="col-sm-2 form-control-label">About us Content</label>
                    <div class="col-sm-10">
                        <textarea class="form-control input-sm" id="aboutuscontent"  name="aboutuscontent"  placeholder="Aboutus Content"><?php echo $objResproject->resprojectmicrositedetails->aboutuscontent; ?></textarea>
                        <p id="err-aboutuscontent" class="text-danger"></p>
                    </div>
                </div>
                <input type="hidden" value="<?php echo $objResproject->resprojectmicrositedetails->id; ?>" id="resprojectmicrositedetailsid">
                <div class="form-group row">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button onclick="saveResMicrosite();" type="button" class="btn btn-success">Save</button>
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
            foreach ($objResprojectimage AS $objImage) {
                if ($objImage->type == 'about') {
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
        var id = $('#resprojectid').val();
        var myDropzone = new Dropzone("#imageabout", {
            url: "index.php?r=property/uploadresprojectmicrosite&id=" + id + "&type=about",
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
    function saveResMicrosite() {
        var school = ($('#School').is(":checked") == true) ? 1 : 0;
        var Collage = ($('#Collage').is(":checked")) == true ? 1 : 0;
        var Multiplex = ($('#Multiplex').is(":checked")) == true ? 1 : 0;
        var Policestation = ($('#Policestation').is(":checked")) == true ? 1 : 0;
        var Railwaystation = ($('#Railwaystation').is(":checked")) == true ? 1 : 0;
        var Airport = ($('#Airport').is(":checked")) == true ? 1 : 0;
        var Mall = ($('#Mall').is(":checked")) == true ? 1 : 0;
        var Market = ($('#Market').is(":checked")) == true ? 1 : 0;
        var Temple = ($('#Temple').is(":checked")) == true ? 1 : 0;
        var liftid = ($('#liftid').is(":checked")) == true ? 1 : 0;
        var parkingid = ($('#parkingid').is(":checked")) == true ? 1 : 0;
        var securityid = ($('#securityid').is(":checked")) == true ? 1 : 0;
        var swimmingpoolid = ($('#swimmingpoolid').is(":checked")) == true ? 1 : 0;
        var clubhouseid = ($('#clubhouseid').is(":checked")) == true ? 1 : 0;
        var childrenplaygroundid = ($('#childrenplaygroundid').is(":checked")) == true ? 1 : 0;
        var seniorcitizenid = ($('#seniorcitizenid').is(":checked")) == true ? 1 : 0;
        var gymid = ($('#gymid').is(":checked")) == true ? 1 : 0;

        alertify.confirm("Are you sure you want to save Microsite ?",
                function () {
                    var obj = new Object();
                    obj.resprojectid = $('#resprojectid').val();
                    obj.featuresheading1 = $('#featuresheading1').val();
                    obj.featuresheading2 = $('#featuresheading2').val();
                    obj.featuresheading3 = $('#featuresheading3').val();
                    obj.featuresheading4 = $('#featuresheading4').val();
                    obj.heading1details = $('#heading1details').val();
                    obj.heading2details = $('#heading2details').val();
                    obj.heading3details = 1;
                    obj.heading4details = $('#heading4details').val();
                    obj.aboutuscontent = $('#aboutuscontent').val();

                    obj.schoolid = school;
                    obj.schooltrext = $('#School-id').val();
                    obj.collageid = Collage;
                    obj.collagetext = $('#Collage-id').val();
                    obj.multiplexid = Multiplex;
                    obj.multiplextext = $('#Multiplex-id').val();
                    obj.policestationid = Policestation;
                    obj.policestationtext = $('#Police-station').val();
                    obj.railwaystationid = Railwaystation;
                    obj.railwaystationtext = $('#Railway-station').val();
                    obj.airportid = Airport;
                    obj.airporttext = $('#Air-port').val();
                    obj.mallid = Mall;
                    obj.malltext = $('#Mall-id').val();
                    obj.marketid = Market;
                    obj.markettext = $('#Market-id').val();
                    obj.templeid = Temple;
                    obj.templetext = $('#Temple-id').val();
                    obj.liftid = liftid;
                    obj.parkingid = parkingid;
                    obj.securityid = securityid;
                    obj.swimmingpoolid = swimmingpoolid;
                    obj.clubhouseid = clubhouseid;
                    obj.childrenplaygroundid = childrenplaygroundid;
                    obj.seniorcitizenid = seniorcitizenid;
                    obj.gymid = gymid;
                    $.ajax({
                        url: 'index.php?r=property/saveresprojectmicrosite',
                        async: false,
                        data: obj,
                        type: 'POST',
                        success: function (data) {
                            alertify.alert("Microsite Saved Succesfully !!", function () {
                            });
                        }
                    });
                    $.ajax({
                        url: 'index.php?r=property/saveresmoredata',
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