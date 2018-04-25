<?php
$this->title = Yii::t('app', 'Residential Project');
?>
<!-- Nav Bar- start-->
<div class="container">
    <input type="hidden" value="<?= $objResproject->id; ?>" id="resprojectid">
    <ul class="nav nav-tabs" role="tablist" id="resproject">
        <li class="nav-item">
            <a class="nav-link" href="#property" role="tab" data-toggle="tab" aria-controls="property">Property</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#owner" role="tab" data-toggle="tab" aria-controls="owner">Owner</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#project" role="tab" data-toggle="tab" aria-controls="project">Project </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#cost" role="tab" data-toggle="tab" aria-controls="cost">Cost</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#typeofproperties" role="tab" data-toggle="tab" aria-controls="typeofproperties">Type of properties</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#amaneties" role="tab" data-toggle="tab" aria-controls="amaneties">Amaneties</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#geolocation" role="tab" data-toggle="tab" aria-controls="geolocation">Geo location</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#microsite" role="tab" data-toggle="tab" aria-controls="microsite">Microsite Details</a>
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
                        <input type="text" class="form-control input-sm" id="name" name="name" value="<?php echo $objResproject->name; ?>">
                        <p id="res-project-err-name" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Location" class="col-sm-2 form-control-label">Sub location</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control input-sm" id="sublocation" name="sublocation" value="<?php echo $objResproject->sublocation; ?>">
                        <p id="res-project-err-sublocation" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Location" class="col-sm-2 form-control-label">Location</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control input-sm" id="location" name="location" value="<?php echo $objResproject->location; ?>">
                        <p id="res-project-err-location" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="City" class="col-sm-2 form-control-label">City</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control input-sm" id="city" name="city" value="<?php echo $objResproject->city; ?>">
                        <p id="res-project-err-city" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="State" class="col-sm-2 form-control-label">State</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control input-sm" id="state" name="state" value="<?php echo $objResproject->state; ?>">
                        <p id="res-project-err-state" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Pincode" class="col-sm-2 form-control-label">Pincode</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control input-sm" id="pincode" name="pincode" value="<?php echo $objResproject->pincode; ?>">
                        <p id="res-project-err-pincode" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Latlong" class="col-sm-2 form-control-label">Latlong</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control input-sm" id="latlong" name="latlong" value="<?php echo $objResproject->latlong; ?>">
                        <p id="res-project-err-latlong" class="text-danger"></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-2"><label for="Phone" class=" form-control-label">Expected Price/Rent<span class="text-danger">*</span></label></div>
                    <div class="col-sm-5"> <div class="form-group row control-group">
                            <select class="form-control input-sm" id="res-price-format" name="res-price-format" style="width: 464px; margin-left: 15px;">
                                <?php
                                $digit = $objResproject->expectedprice;
                                $lengthNum = strlen($digit);
                            if($lengthNum == 0 &&  $lengthNum == NULL) {
                                return ' ';

                            }else {
                                  $lengthNum = strlen($digit);
//                                $n =  strlen($no); // 7
                                switch ($lengthNum) {
                                    case 3:
                                        $val = $digit/100;
                                        $val = round($val, 2);
//                                        $finalval =  $val ." hundred";
                                        break;
                                    case 4:
                                        $val = $digit/1000;
                                        $val = round($val, 2);
//                                        $finalval =  $val ." thousand";
                                        break;
                                    case 5:
                                        $val = $digit/1000;
                                        $val = round($val, 2);
//                                        $finalval =  $val ." thousand";
                                        break;
                                    case 6:
                                        $val = $digit/100000;
                                        $val = round($val, 2);
//                                        $finalval =  $val ." lakh";
                                        break;
                                    case 7:
                                        $val = $digit/100000;
                                        $val = round($val, 2);
//                                        $finalval =  $val ." lakh";
                                        break;
                                    case 8:
                                        $val = $digit/10000000;
                                        $val = round($val, 2);
//                                        $finalval =  $val ." crore";
                                        break;
                                    case 9:
                                        $val = $digit/10000000;
                                        $val = round($val, 2);
//                                        $finalval =  $val ." crore";
                                        break;

                                    default:
                                        echo "";
                                }

                        }
                               
                                $digit = $objResproject->expectedprice;
                                $lengthNum = strlen($digit);
                                $lakh = 6 ; $thousand = 5 ; $crore = 9; 
                                if( $lengthNum > 5 &&  $lengthNum < 8  ){ 
                                echo  ' <option value="Lakh">Lakh</option>';
                                }else if( $lengthNum < 6 && $lengthNum > 0 &&  $lengthNum == 4){
                                echo ' <option value="Thousand">Thousand</option>';
                                }else if( $lengthNum < 10 && $lengthNum > 7){
                                echo '<option value="Crore">Crore</option>';
                                }
                                ?>
                                <option value="Thousand">Thousand</option>
                                <option value="Lakh">Lakh</option>
                                <option value="Crore">Crore</option>
                            </select>
                            <p id="resaleproperty-err-status" class="text-danger"></p>
                        </div></div>
                    <div class="col-sm-5"><div class="form-group row control-group">
                            <input type="text" class="form-control input-sm" id="expectedprice" name="resaleproperty-expectedprice"
                                   value="<?php echo $val; ?>" style="width: 464px; margin-left: 4px;">
                            <p id="resaleproperty-err-expectedprice" class="text-danger"></p>
                        </div></div>
                </div>
                <div class="form-group row control-group">
                    <label for="Status" class="col-sm-2 form-control-label">Status</label>
                    <div class="col-sm-10">
 <select class="form-control input-sm" id="status" name="status">
                            <option value="<?php echo $objResproject->status; ?>"><?php echo $objResproject->status; ?></option>
                            <option value="Active">Active</option>
                            <option value="Inactive">Inactive</option>
                            <option value="Inactive">Closed</option>
                        </select>
                        <p id="res-project-err-status" class="text-danger"></p>

                    </div>
                </div>

<div class="form-group row control-group">
                    <label for="Latlong" class="col-sm-2 form-control-label">Video-Link</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control input-sm" id="videolink" name="videolink" value="<?php echo $objResproject->videolink; ?>">
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
        </div>

        <!-- /tab-panel archictecture -->
        <div role="tabpanel" class="tab-pane" id="owner"> <!-- /tab-panel -list -->
            <?= $this->render( 'partial/resproject/owner.php', ['objResproject'=> $objResproject, 'objBuilder' => $objBuilder] ); ?>
        </div> <!-- /tab-panel owner -->
        <div role="tabpanel" class="tab-pane" id="project"> <!-- /tab-panel -list -->
          <?= $this->render( 'partial/resproject/project.php', ['objResproject'=> $objResproject,'objResprojectimage' =>$objResprojectimage, 'objOwnershiptype'=>$objOwnershiptype ]); ?>  
        </div> <!-- /tab-panel archictecture -->
        <div role="tabpanel" class="tab-pane" id="cost"> <!-- /tab-panel -list -->
            <?= $this->render( 'partial/resproject/cost.php', ['objResproject'=> $objResproject, 'objResprojectimage' =>$objResprojectimage ] ); ?>  
        </div> <!-- /tab-panel cost -->
        <div role="tabpanel" class="tab-pane" id="typeofproperties"> <!-- /tab-panel -list -->
            <?= $this->render( 'partial/resproject/type.php', ['objResproject'=> $objResproject , 'objResprojectimage' =>$objResprojectimage ]); ?>  
        </div> <!-- /tab-panel construction -->
        <div role="tabpanel" class="tab-pane" id="amaneties"> <!-- /tab-panel -list -->
            <?= $this->render( 'partial/resproject/amaneties.php', ['objResproject'=> $objResproject, 'objResprojectimage' =>$objResprojectimage ]); ?>  
        </div> <!-- /tab-panel feature -->
        <div role="tabpanel" class="tab-pane" id="geolocation"> <!-- /tab-panel -list -->
           <?= $this->render( 'partial/resproject/geolocation.php', ['objResproject'=> $objResproject,'objResprojectimage' =>$objResprojectimage ] ); ?>   
        </div> <!-- /tab-panel geolocation -->
         <div role="tabpanel" class="tab-pane" id="microsite"> <!-- /tab-panel -list -->
           <?= $this->render( 'partial/resproject/microsite.php', ['objResproject'=> $objResproject,'objResprojectimage' =>$objResprojectimage  ] ); ?>   
        </div> <!-- /tab-panel geolocation -->
         <div role="tabpanel" class="tab-pane" id="feedback"> <!-- /tab-panel -list -->
           <?= $this->render( 'partial/resproject/feedback.php', ['objResproject'=> $objResproject ,'objResprojctfeedback' => $objResprojctfeedback  ] ); ?>   
        </div> <!-- /tab-panel geolocation -->
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
    .btnmargin{    margin-left: 135px;
        
    }
</style>
<script src="js/property/resproject.js"></script>