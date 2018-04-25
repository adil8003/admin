<?php
$this->title = Yii::t('app', 'Resale Property');
?>
<!-- Nav Bar- start-->
<div class="container">
    <input type="hidden" value="<?= $objResaleproperty->id; ?>" id="resalepropertyid">
    <ul class="nav nav-tabs" role="tablist" id="resaleproperty">
        <li class="nav-item">
            <a class="nav-link" href="#property" role="tab" data-toggle="tab" aria-controls="property">Property</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#otherdetails" role="tab" data-toggle="tab" aria-controls="otherdetails">Other Details</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#microsite" role="tab" data-toggle="tab" aria-controls="otherdetails">Microsite Details</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#feedback" role="tab" data-toggle="tab" aria-controls="feedback">Customer Feedback List</a>
        </li>

    </ul>
    <!-- Nav Bar- start-->

    <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="property"> <!-- /tab-panel -list -->
            <h2>Resale/Rent Property</h2>

            <form id="addresaleproperty">

                <div class="form-group row control-group">
                    <label for="Name" class="col-sm-2 form-control-label">Owner's Name<span class="text-danger">*</span></label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control input-sm" id="resaleproperty-ownername" name="resaleproperty-ownername"
                               value="<?php echo $objResaleproperty->ownername; ?>">
                        <p id="resaleproperty-err-ownername" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Name" class="col-sm-2 form-control-label">Owner's Contact<span class="text-danger">*</span></label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control input-sm" id="resaleproperty-contact" name="resaleproperty-contact"
                               value="<?php echo $objResaleproperty->contact; ?>">
                        <p id="resaleproperty-err-contact" class="text-danger"></p>
                    </div>
                </div>

                <div class="form-group row control-group">
                    <label for="Status" class="col-sm-2 form-control-label">Project Type<span class="text-danger">*</span></label>
                    <div class="col-sm-10">
                        <select class="form-control input-sm" id="resaleproperty-projecttype" name="resaleproperty-projecttype">

                            <option value="<?php echo $objResaleproperty->projecttype; ?>"><?php echo $objResaleproperty->projecttype; ?></option>
                            <option value="Residential">Residential</option>
                            <option value="Commercial">Commercial</option>
                            <option value="Plot">Plot</option>
                        </select>
                        <p id="resaleproperty-err-status" class="text-danger"></p>
                    </div>
                </div>

                <div class="form-group row control-group">
                    <label for="Name" class="col-sm-2 form-control-label">Sub location<span class="text-danger">*</span></label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control input-sm" id="resaleproperty-sublocation" name="resaleproperty-sublocation"
                               value="<?php echo $objResaleproperty->sublocation; ?>">
                        <p id="resaleproperty-err-sublocation" class="text-danger"></p>
                    </div>
                </div>
                 <div class="form-group row control-group">
                    <label for="Name" class="col-sm-2 form-control-label">Location<span class="text-danger">*</span></label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control input-sm" id="resaleproperty-location" name="resaleproperty-location"
                               value="<?php echo $objResaleproperty->location; ?>">
                        <p id="resaleproperty-err-location" class="text-danger"></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-2"><label for="Phone" class=" form-control-label">Expected Price/Rent<span class="text-danger">*</span></label></div>
                    <div class="col-sm-5"> <div class="form-group row control-group">
                            <select class="form-control input-sm" id="price-format" name="price-format" style="width: 464px; margin-left: 15px;">
                                <?php
                                $digit = $objResaleproperty->expectedprice;
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
                                         $val = 0;
                                }

                        }
                               
                                $digit = $objResaleproperty->expectedprice;
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
                            <input type="text" class="form-control input-sm" id="resaleproperty-expectedprice" name="resaleproperty-expectedprice"
                                   value="<?php echo $val; ?>" style="width: 464px; margin-left: 4px;">
                            <p id="resaleproperty-err-expectedprice" class="text-danger"></p>
                        </div></div>
                </div>
                <div class="form-group row control-group">
                    <label for="Email" class="col-sm-2 form-control-label">Property Type</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control input-sm" id="resaleproperty-propertytype" name="resaleproperty-propertytype"
                               value="<?php echo $objResaleproperty->propertytype; ?>">
                        <p id="resaleproperty-err-propertytype" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Location" class="col-sm-2 form-control-label">Age</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control input-sm" id="resaleproperty-age" name="resaleproperty-age" value="<?php echo $objResaleproperty->age; ?>">
                        <p id="resaleproperty-err-age" class="text-danger"></p>
                    </div>
                </div>

                <div class="form-group row control-group">
                    <label for="City" class="col-sm-2 form-control-label">Other Amenities</label>
                    <div class="col-sm-10">
                        <textarea class="form-control input-sm" id="resaleproperty-otheramenities"  
                                  name="resaleproperty-otheramenities"  placeholder="Other Amenities"><?php echo $objResaleproperty->otheramenities; ?></textarea>
                        <p id="resaleproperty-err-otheramenities" class="text-danger"></p>
                    </div>
                </div>

                <div class="form-group row control-group">
                    <label for="Status" class="col-sm-2 form-control-label">RESALE/RENT<span class="text-danger">*</span></label>
                    <div class="col-sm-10">
                        <select class="form-control input-sm" id="resaleproperty-resellrent" name="resaleproperty-resellrent">

                            <option value="<?php echo $objResaleproperty->resellrent; ?>"><?php echo $objResaleproperty->resellrent; ?></option>
                            <option value="Resale">Resale</option>
                            <option value="Rent">Rent</option>
                        </select>
                        <p id="resaleproperty-err-resellrent" class="text-danger"></p>
                    </div>
                </div>


                <div class="form-group row control-group">
                    <label for="Status" class="col-sm-2 form-control-label">Status<span class="text-danger">*</span></label>
                    <div class="col-sm-10">
                        <select class="form-control input-sm" id="resaleproperty-status" name="resaleproperty-status">

                            <option value="<?php echo $objResaleproperty->status; ?>"><?php echo $objResaleproperty->status; ?></option>
                            <option value="Active">Active</option>
                            <option value="Inactive">Inactive</option>
                            <option value="Closed">Closed</option>
                        </select>
                        <p id="resaleproperty-err-status" class="text-danger"></p>
                    </div>
                </div>

                <div class="form-group row control-group">
                    <label for="Location" class="col-sm-2 form-control-label">Video Link</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control input-sm" id="resaleproperty-videolink" name="resaleproperty-videolink" value="<?php echo $objResaleproperty->videolink; ?>">
                        <p id="resaleproperty-err-videolink" class="text-danger"></p>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button onclick="saveResaleproperty();" type="button" class="btn btn-success">save</button>
                        <button onclick="resetResproject();" type="button" class="btn btn-success">Cancel</button>
                    </div>
                </div>
            </form>
        </div>

        <!-- /tab-panel archictecture -->
        <div role="tabpanel" class="tab-pane" id="otherdetails"> <!-- /tab-panel -list -->
            <?= $this->render('partial/resaleproperty/otherdetails.php', ['objResaleproperty' => $objResaleproperty, 'objResalepropertyimage' => $objResalepropertyimage]); ?>
        </div> <!-- /tab-panel owner -->
        <div role="tabpanel" class="tab-pane" id="microsite"> <!-- /tab-panel -list -->
            <?= $this->render('partial/resaleproperty/microsite.php', ['objResaleproperty' => $objResaleproperty, 'objResalepropertyimage' => $objResalepropertyimage]); ?>   
        </div> <!-- /tab-panel geolocation -->
        <div role="tabpanel" class="tab-pane" id="feedback"> <!-- /tab-panel -list -->
            <?= $this->render('partial/resaleproperty/feedback.php', ['objResalefeedback' => $objResalefeedback]); ?>   
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
<script>

    function saveResaleproperty() {

         var price = $('#resaleproperty-expectedprice').val();
        var priceFormat = $('#price-format').val();
            if(priceFormat == 'Lakh'){
                var amt = price*100000;
            }else if(priceFormat == 'Thousand'){
                  var amt = price*1000;
            }else if(priceFormat == 'Crore'){
                  var amt = price*10000000;
            }
        var obj = new Object();

        obj.resalepropertyid = $('#resalepropertyid').val();
        obj.ownername = $('#resaleproperty-ownername').val();
        obj.contact = $('#resaleproperty-contact').val();
        obj.sublocation = $('#resaleproperty-sublocation').val();
        obj.location = $('#resaleproperty-location').val();
        obj.expectedprice = amt;
        obj.propertytype = $('#resaleproperty-propertytype').val();
        obj.otheramenities = $('#resaleproperty-otheramenities').val();
        obj.age = $('#resaleproperty-age').val();
        obj.resellrent = $('#resaleproperty-resellrent').val();
        obj.status = $('#resaleproperty-status').val();
        obj.videolink = $('#resaleproperty-videolink').val();
        obj.projecttype = $('#resaleproperty-projecttype').val();
        $.ajax({
            url: 'index.php?r=property/saveupdateresaleproperty',
            async: false,
            data: obj,
            type: 'POST',
            success: function (data) {
                console.log(data);


                alertify.alert("Resale Property Updated Succesfully !!", function () {
                });



            }
        });


    }



</script>