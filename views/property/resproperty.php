<?php
$this->title = Yii::t('app', 'Residential Property');
?>
<!-- Nav Bar- start-->
<div class="container">
     <input type="hidden" value="<?= $objResproperty->id; ?>" id="respropertyid">
    <ul class="nav nav-tabs" role="tablist" id="Property">
        <li class="nav-item">
            <a class="nav-link" href="#resproperty" role="tab" data-toggle="tab" aria-controls="resproperty">Property</a>
        </li>
          <li class="nav-item">
            <a class="nav-link" href="#project" role="tab" data-toggle="tab" aria-controls="project">Project</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#owner" role="tab" data-toggle="tab" aria-controls="owner">Owner</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#cost" role="tab" data-toggle="tab" aria-controls="cost">Cost</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#typeofproperty" role="tab" data-toggle="tab" aria-controls="typeofproperty">Type of properties</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#amaneties" role="tab" data-toggle="tab" aria-controls="amaneties">Amaneties</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#geolocation" role="tab" data-toggle="tab" aria-controls="geolocation">Geo location</a>
        </li>
         <li class="nav-item">
            <a class="nav-link" href="#feedback" role="tab" data-toggle="tab" aria-controls="feedback">Feedback</a>
        </li>
    </ul>
    <!-- Nav Bar- start-->
    <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="resproperty"> <!-- /tab-panel -list -->
            <h2>Property </h2>
            <form id="addresproject">
                <div class="form-group row control-group">
                    <label for="Name" class="col-sm-2 form-control-label">Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control input-sm" id="name" name="name" value="<?php echo $objResproperty->name; ?>">
                        <p id="res-project-err-name" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Location" class="col-sm-2 form-control-label">Sub location</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control input-sm" id="sublocation" name="sublocation" value="<?php echo $objResproperty->sublocation; ?>">
                        <p id="res-project-err-sublocation" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Location" class="col-sm-2 form-control-label">Location</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control input-sm" id="location" name="location" value="<?php echo $objResproperty->location; ?>">
                        <p id="res-project-err-location" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="City" class="col-sm-2 form-control-label">City</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control input-sm" id="city" name="city" value="<?php echo $objResproperty->city; ?>">
                        <p id="res-project-err-city" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="State" class="col-sm-2 form-control-label">State</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control input-sm" id="state" name="state" value="<?php echo $objResproperty->state; ?>">
                        <p id="res-project-err-state" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Pincode" class="col-sm-2 form-control-label">Pincode</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control input-sm" id="pincode" name="pincode" value="<?php echo $objResproperty->pincode; ?>">
                        <p id="res-project-err-pincode" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Latlong" class="col-sm-2 form-control-label">Latlong</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control input-sm" id="latlong" name="latlong" value="<?php echo $objResproperty->latlong; ?>">
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
                <div class="form-group row">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button onclick="saveRespropertyproperty();" type="button" class="btn btn-success">Save</button>
                        <button onclick="resetResproject();" type="button" class="btn btn-success">Cancel</button>
                    </div>
                </div>
            </form>
        </div> <!-- /tab-panel archictecture -->
         <div role="tabpanel" class="tab-pane" id="owner"> 
            <?= $this->render( 'partial/resproperty/owner.php', ['objResproperty'=> $objResproperty ,'objBuilder' => $objBuilder] ); ?>
        </div> <!-- /tab-panel owner -->
        <div role="tabpanel" class="tab-pane" id="project"> 
            <?= $this->render( 'partial/resproperty/project.php', ['objResproperty'=> $objResproperty, 'objRespropertyimage' =>$objRespropertyimage, 'objOwnershiptype'=>$objOwnershiptype ]); ?>
        </div> <!-- /tab-panel owner -->
        <div role="tabpanel" class="tab-pane" id="cost"> 
            <?= $this->render( 'partial/resproperty/cost.php', ['objResproperty'=> $objResproperty, 'objRespropertyimage' =>$objRespropertyimage] ); ?>
        </div> <!-- /tab-panel cost -->
        <div role="tabpanel" class="tab-pane" id="typeofproperty"> 
            <?= $this->render( 'partial/resproperty/type.php', ['objResproperty'=> $objResproperty, 'objRespropertyimage' =>$objRespropertyimage,
                'objRespropertyabout' =>$objRespropertyabout, 'objRespropertyflattype' =>$objRespropertyflattype, 'objRespropertyparking' =>$objRespropertyparking, 'objRespropertyfurnishedstatus' =>$objRespropertyfurnishedstatus] ); ?>
        </div> <!-- /tab-panel construction -->
        <div role="tabpanel" class="tab-pane" id="amaneties"> 
            <?= $this->render( 'partial/resproperty/amaneties.php', ['objResproperty'=> $objResproperty, 'objRespropertyimage' =>$objRespropertyimage] ); ?>
        </div> <!-- /tab-panel feature -->
        <div role="tabpanel" class="tab-pane" id="geolocation"> 
             <?= $this->render( 'partial/resproperty/geolocation.php', ['objResproperty'=> $objResproperty, 'objRespropertyimage' =>$objRespropertyimage] ); ?>
        </div> <!-- /tab-panel geolocation -->
          <div role="tabpanel" class="tab-pane" id="feedback"> 
             <?= $this->render( 'partial/resproperty/feedback.php', ['objResproperty'=> $objResproperty , 'objRespropertyfeedback' => $objRespropertyfeedback]  ); ?>
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
<script src="js/property/resproperty.js"></script>


