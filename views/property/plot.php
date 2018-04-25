<?php
$this->title = Yii::t('app', 'Plot');
?>
<!-- Nav Bar- start-->
<div class="container">
    <input type="hidden" value="<?= $objPlots->id; ?>" id="plotsid">
    <ul class="nav nav-tabs" role="tablist" id="Property">
        <li class="nav-item">
            <a class="nav-link" href="#property" role="tab" data-toggle="tab" aria-controls="property">Property</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#geolocation" role="tab" data-toggle="tab" aria-controls="geolocation">Geo location</a>
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
            <form id="addresaleproperty">
                <div class="form-group row control-group">
                    <label for="Name" class="col-sm-2 form-control-label">Owner's Name/Agent <span class="text-danger">*</span></label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control input-sm" id="plot-ownername" name="plot-ownername" value="<?php echo $objPlots->ownername; ?>">
                        <p id="resaleproperty-err-ownername" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Name" class="col-sm-2 form-control-label">Owner's Contact<span class="text-danger">*</span></label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control input-sm" id="plot-contact" name="plot-contact" value="<?php echo $objPlots->contact; ?>">
                        <p id="resaleproperty-err-contact" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="location" class="col-sm-2 form-control-label">Sub location<span class="text-danger">*</span></label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control input-sm" id="plot-sublocation" name="plot-sublocation" value="<?php echo $objPlots->sublocation; ?>">
                        <p id="plot-err-sublocation" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="location" class="col-sm-2 form-control-label">Location<span class="text-danger">*</span></label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control input-sm" id="plot-location" name="plot-location" value="<?php echo $objPlots->location; ?>">
                        <p id="plot-err-location" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="landmark" class="col-sm-2 form-control-label">Landmark<span class="text-danger">*</span></label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control input-sm" id="plot-landmark" name="plot-landmark" value="<?php echo $objPlots->landmark; ?>">
                        <p id="resaleproperty-err-landmark" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="zone" class="col-sm-2 form-control-label">Zone<span class="text-danger">*</span></label>
                    <div class="col-sm-10">
                        <select class="form-control input-sm" id="plot-zones" name="plot-zones">
                            <option value="<?php echo $objPlots->zone; ?>"><?php echo $objPlots->zone; ?></option>
                            <option value="R Zone">R zone</option>
                            <option value="Commercial Zone">Commercial Zone</option>
                            <option value="Industrial Zone">Industrial Zone</option>
                            <option value="Rural Zone">Rural Zone</option>
                        </select>
                        <p id="resaleproperty-err-status" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Status" class="col-sm-2 form-control-label">Sale/Resale/Rent<span class="text-danger">*</span></label>
                    <div class="col-sm-10">
                        <select class="form-control input-sm" id="plot-saleorrent" name="plot-saleorrent">
                            <option value="<?php echo $objPlots->saleorrent; ?>"><?php echo $objPlots->saleorrent; ?></option>
                            <option value="Sale">Sale</option>
                            <option value="Resale">Resale</option>
                            <option value="Rent">Rent</option>
                        </select>
                        <p id="resaleproperty-err-resellrent" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="areapersquarefeet" class="col-sm-2 form-control-label">Per sqft<span class="text-danger">*</span></label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control input-sm" id="plot-areapersquarefeet" value="<?php echo $objPlots->areapersquarefeet; ?>" name="plot-areapersquarefeet">
                        <p id="resaleproperty-err-areapersquarefeet" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="areaperguntha" class="col-sm-2 form-control-label">Per guntha<span class="text-danger">*</span></label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control input-sm" id="plot-areaperguntha" name="plot-areaperguntha" value="<?php echo $objPlots->areaperguntha; ?>">
                        <p id="resaleproperty-err-areaperguntha" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="peracre" class="col-sm-2 form-control-label">Per acre<span class="text-danger">*</span></label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control input-sm" id="plot-peracre" name="plot-peracre" value="<?php echo $objPlots->peracre; ?>">
                        <p id="resaleproperty-err-peracre" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="areaperguntha" class="col-sm-2 form-control-label">Security deposit<span class="text-danger">*</span></label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control input-sm" value="<?php echo $objPlots->securitydeposit; ?>" id="plot-securitydeposit" name="plot-securitydeposit">
                        <p id="resaleproperty-err-securitydeposit" class="text-danger"></p>
                    </div>
                </div>
                <?php $data = $objPlots->sharingratio;
                $str = $data;
               $firstVal =  $str[0].$str[1];
               $secondVal = $str[3].$str[4];       
                               ?>
                <div class=" row control-group ">
                    <label for="sharingratio" class="col-sm-2 form-control-label">Sharing ratio</label>
                    <div class="col-sm-10">
                        <div class="input-group">
                            <input type="text" class="form-control" value="<?php echo $firstVal ?>" id="plot-sharingratiofirst" name="plot-sharingratiofirst"/>
                            <span class="input-group-addon">:</span>
                            <input type="text" class="form-control" value="<?php echo $secondVal ?>" id="plot-sharingratiosecond" name="plot-sharingratiosecond"/>
                        </div>
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-sm-2"><label for="Phone" class=" form-control-label">Expected Price/Rent<span class="text-danger">*</span></label></div>
                    <div class="col-sm-5"> <div class="form-group row control-group">
                            <select class="form-control input-sm" id="plot-price-format" name="plot-price-format" style="width: 464px; margin-left: 15px;">
                                <?php
                                $digit = $objPlots->expectedprice;
                                $lengthNum = strlen($digit);
                                if ($lengthNum == 0 && $lengthNum == NULL) {
                                    return ' ';
                                } else {
                                    $lengthNum = strlen($digit);
//                                $n =  strlen($no); // 7
                                    switch ($lengthNum) {
                                        case 3:
                                            $val = $digit / 100;
                                            $val = round($val, 2);
//                                        $finalval =  $val ." hundred";
                                            break;
                                        case 4:
                                            $val = $digit / 1000;
                                            $val = round($val, 2);
//                                        $finalval =  $val ." thousand";
                                            break;
                                        case 5:
                                            $val = $digit / 1000;
                                            $val = round($val, 2);
//                                        $finalval =  $val ." thousand";
                                            break;
                                        case 6:
                                            $val = $digit / 100000;
                                            $val = round($val, 2);
//                                        $finalval =  $val ." lakh";
                                            break;
                                        case 7:
                                            $val = $digit / 100000;
                                            $val = round($val, 2);
//                                        $finalval =  $val ." lakh";
                                            break;
                                        case 8:
                                            $val = $digit / 10000000;
                                            $val = round($val, 2);
//                                        $finalval =  $val ." crore";
                                            break;
                                        case 9:
                                            $val = $digit / 10000000;
                                            $val = round($val, 2);
//                                        $finalval =  $val ." crore";
                                            break;

                                        default:
                                             $val = 0;
                                    }
                                }

                                $digit = $objPlots->expectedprice;
                                $lengthNum = strlen($digit);
                                $lakh = 6;
                                $thousand = 5;
                                $crore = 9;
                                if ($lengthNum > 5 && $lengthNum < 8) {
                                    echo ' <option value="Lakh">Lakh</option>';
                                } else if ($lengthNum < 6 && $lengthNum > 0 && $lengthNum == 4) {
                                    echo ' <option value="Thousand">Thousand</option>';
                                } else if ($lengthNum < 10 && $lengthNum > 7) {
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
                            <input type="text" class="form-control input-sm" id="plot-expectedprice" name="plot-expectedprice"
                                   value="<?php echo $val; ?>" style="width: 464px; margin-left: 4px;">
                            <p id="resaleproperty-err-plot" class="text-danger"></p>
                        </div></div>
                </div>
                <div class="form-group row control-group">
                    <label for="City" class="col-sm-2 form-control-label">Details address</label>
                    <div class="col-sm-10">
                        <textarea class="form-control input-sm" id="plot-detailedaddress"  
                                  name="plot-detailedaddress"  ><?php echo$objPlots->detailedaddress ?></textarea>
                        <p id="plot-err-detailedaddress" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Status" class="col-sm-2 form-control-label">Status<span class="text-danger">*</span></label>
                    <div class="col-sm-10">
                        <select class="form-control input-sm" id="plot-status" name="plot-status">
                            <option value="<?php echo $objPlots->status; ?>"><?php echo $objPlots->status; ?></option>
                            <option value="Active">Active</option>
                            <option value="Inactive">Inactive</option>
                            <option value="Closed">Closed</option>
                        </select>
                        <p id="plot-err-status" class="text-danger"></p>
                    </div>
                </div>

                <div class="form-group row control-group">
                    <label for="Name" class="col-sm-2 form-control-label">Video Link<span class="text-danger">*</span></label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control input-sm" value="<?php echo $objPlots->videolink; ?>" id="plot-videolink" name="plot-videolink">
                        <p id="resaleproperty-err-videolink" class="text-danger"></p>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button onclick="saveUpdateplots();" type="button" class="btn btn-success">Save</button>
                        <button onclick="resetPlots();" type="button" class="btn btn-success">Cancel</button>
                    </div>
                </div>
            </form>
        </div> <!-- /tab-panel archictecture -->
        <div role="tabpanel" class="tab-pane" id="geolocation"> <!-- /tab-panel -list -->
            <?= $this->render('partial/plots/geolocation.php', ['objPlots' => $objPlots]); ?>   
        </div> <!-- /tab-panel geolocation -->
        <div role="tabpanel" class="tab-pane" id="microsite"> <!-- /tab-panel -list -->
            <?= $this->render('partial/plots/microsite.php', ['objPlots' => $objPlots]); ?>   
        </div> <!-- /tab-panel microsite -->
        <div role="tabpanel" class="tab-pane" id="comprojectimg"> <!-- /tab-panel -list -->
            <?= $this->render('partial/plots/plotimage.php', ['objPlots' => $objPlots, 'objPlotsimage' => $objPlotsimage]); ?>   
        </div> <!-- /tab-panel comprojectimg -->
        <div role="tabpanel" class="tab-pane" id="feedback"> <!-- /tab-panel -list -->
            <?= $this->render('partial/plots/feedback.php', ['objPlots' => $objPlots]); ?>   
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
<script src="js/property/plots.js"></script>
