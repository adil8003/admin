<?php
$this->title = Yii::t('app', 'Commercial Project');
?>
<!-- Nav Bar- start-->
<div class="container">
     <input type="hidden" value="<?= $objComproject->id; ?>" id="comprojectid">
    <ul class="nav nav-tabs" role="tablist" id="Property">
        <li class="nav-item">
            <a class="nav-link" href="#property" role="tab" data-toggle="tab" aria-controls="property">Property</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#owner" role="tab" data-toggle="tab" aria-controls="owner">Owner</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#details" role="tab" data-toggle="tab" aria-controls="details">Deatils</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#geolocation" role="tab" data-toggle="tab" aria-controls="geolocation">Geo location</a>
        </li>
         <li class="nav-item">
            <a class="nav-link" href="#comextradetails" role="tab" data-toggle="tab" aria-controls="comextradetails">Extra details</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#microsite" role="tab" data-toggle="tab" aria-controls="microsite">Microsite</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#comprojectimg" role="tab" data-toggle="tab" aria-controls="comprojectimg">images</a>
        </li>
         <li class="nav-item">
            <a class="nav-link" href="#feedback" role="tab" data-toggle="tab" aria-controls="feedback">Feedback</a>
        </li>
    </ul>
    <!-- Nav Bar- start-->
    <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="property"> <!-- /tab-panel -list -->
            <h2>Property</h2>
            <form id="addresproject">
                <div class="form-group row control-group">
                    <label for="Name" class="col-sm-2 form-control-label">Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control input-sm" id="name" name="name" value="<?php echo $objComproject->name; ?>">
                        <p id="res-project-err-name" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Name" class="col-sm-2 form-control-label">Agent / Builder Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control input-sm" value="<?php echo $objComproject->agentname; ?>"  id="agentname" name="agentname">
                        <p id="com-project-err-agentname" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Name" class="col-sm-2 form-control-label">Contact Person Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control input-sm" value="<?php echo $objComproject->contactperson; ?>"  id="contactperson" name="contactperson">
                        <p id="com-project-err-contactperson" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Contact" class="col-sm-2 form-control-label">Contact No.</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control input-sm" value="<?php echo $objComproject->contactno; ?>" id="contactno" name="contactno">
                        <p id="com-project-err-contactno" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Landmark" class="col-sm-2 form-control-label">East/West etc.</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control input-sm" value="<?php echo $objComproject->ewnsc; ?>" id="ewnsc" name="ewnsc">
                        <p id="com-project-err-ewnsc" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Landmark" class="col-sm-2 form-control-label">Landmark</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control input-sm" value="<?php echo $objComproject->landmark; ?>"  id="landmark" name="landmark">
                        <p id="com-project-err-landmark" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Location" class="col-sm-2 form-control-label">Sub location</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control input-sm" id="sublocation" name="sublocation" value="<?php echo $objComproject->sublocation; ?>">
                        <p id="res-project-err-sublocation" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Location" class="col-sm-2 form-control-label">Location</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control input-sm" id="location" name="location" value="<?php echo $objComproject->location; ?>">
                        <p id="res-project-err-location" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="City" class="col-sm-2 form-control-label">City</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control input-sm" id="city" name="city" value="<?php echo $objComproject->city; ?>">
                        <p id="res-project-err-city" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="State" class="col-sm-2 form-control-label">State</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control input-sm" id="state" name="state" value="<?php echo $objComproject->state; ?>">
                        <p id="res-project-err-state" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Pincode" class="col-sm-2 form-control-label">Pincode</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control input-sm" id="pincode" name="pincode" value="<?php echo $objComproject->pincode; ?>">
                        <p id="res-project-err-pincode" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Latlong" class="col-sm-2 form-control-label">Latlong</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control input-sm" id="latlong" name="latlong" value="<?php echo $objComproject->latlong; ?>">
                        <p id="res-project-err-latlong" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Status" class="col-sm-2 form-control-label">Status</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control input-sm" id="status" name="status" value="Active">
                        <p id="res-project-err-status" class="text-danger"></p>
                    </div>
                </div>
                                 <div class="form-group row control-group">
                    <label for="Latlong" class="col-sm-2 form-control-label">Video Link</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control input-sm" id="videolink" name="videolink" value="<?php echo $objComproject->videolink; ?>">
                        <p id="res-project-err-videolink" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button onclick="saveResprojectproperty();" type="button" class="btn btn-success">save</button>
                        <button onclick="resetResproject();" type="button" class="btn btn-success">Cancel</button>
                    </div>
                </div>
            </form>
        </div> <!-- /tab-panel archictecture -->
        <div role="tabpanel" class="tab-pane" id="owner"> <!-- /tab-panel -list -->
           <?= $this->render( 'partial/comproject/owner.php', ['objComproject'=> $objComproject , 'objBuilder' => $objBuilder] ); ?>
        </div> <!-- /tab-panel owner -->
        <div role="tabpanel" class="tab-pane" id="details"> <!-- /tab-panel -list -->
          <?= $this->render( 'partial/comproject/details.php', ['objComproject'=> $objComproject,'objComprojectimage' => $objComprojectimage] ); ?>   
        </div> <!-- /tab-panel details -->
        <div role="tabpanel" class="tab-pane" id="geolocation"> <!-- /tab-panel -list -->
          <?= $this->render( 'partial/comproject/geolocation.php', ['objComproject'=> $objComproject,'objComprojectimage' => $objComprojectimage] ); ?>   
        </div> <!-- /tab-panel geolocation -->

        <div role="tabpanel" class="tab-pane" id="comextradetails"> <!-- /tab-panel -list -->
          <?= $this->render( 'partial/comproject/comextradetails.php', ['objComproject'=> $objComproject,'objComprojectpreferred' => $objComprojectpreferred ,'objComprojectfurnishing' => $objComprojectfurnishing]); ?>   
        </div> <!-- /tab-panel comextradetails -->
        <div role="tabpanel" class="tab-pane" id="microsite"> <!-- /tab-panel -list -->
          <?= $this->render( 'partial/comproject/microsite.php', ['objComproject'=> $objComproject,'objComprojectimage' => $objComprojectimage] ); ?>   
        </div> <!-- /tab-panel microsite -->
        <div role="tabpanel" class="tab-pane" id="comprojectimg"> <!-- /tab-panel -list -->
          <?= $this->render( 'partial/comproject/comprojectimg.php', ['objComproject'=> $objComproject,'objComprojectimage' => $objComprojectimage] ); ?>   
        </div> <!-- /tab-panel comprojectimg -->
        <div role="tabpanel" class="tab-pane" id="feedback"> <!-- /tab-panel -list -->
          <?= $this->render( 'partial/comproject/feedback.php', ['objComproject'=> $objComproject, 'objComprojectfeedback' => $objComprojectfeedback]); ?>   
        </div> <!-- /tab-panel feedback -->
    </div><!-- /tab-content -->
</div> <!-- /container -->
<style>
    label.valid {
        width: 24px;
        height: 24px;
        background: url(assets/img/valid.png) center center no-repeat;
        display: inline-block;
        text-indent: -9999px;
    }
    label.error {
        font-weight: bold;
        color: red;
        padding: 2px 8px;
        margin-top: 2px;
    }
    .form-group p {
        margin:0px;
    }
</style>
<script src="js/property/comproject.js"></script>
