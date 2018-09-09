<?php
$this->title = Yii::t('app', 'Edit');
$id = (isset($_GET['id'])) ? $_GET['id'] : 0;
?>
<input type="hidden" id="crm_id" value="<?php echo $id; ?>" />
<div id="success-msg">
</div>
<div class="col-lg-12 col-md-12">
    <div  class="card">
        <div class="header">
            <h4 class="title">CRM - Customer update
                <span>
                    <a href="index.php?r=crm"  <button class="btn btn-info btn-fill btn-xs btn-wd pull-right">Back</button></a>
                </span> </h4>
        </div><hr>
        <div class="content">
            <form name="form" >
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group" >
                            <label>Client Name:<span class="asterik">*</span><span  class="errmsg" id="err-cname"></span> </label>
                            <input type="text" value="<?php echo $objCrm->cname; ?>" class="form-control border-input input-sm" name="cname" id="cname" placeholder="  Organisationa Name "
                                   required/>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Email:<span class="asterik">*</span><span  class="errmsg" id="err-cemail"></span> </label>
                            <input type="text" readonly="" value="<?php echo $objCrm->cemail; ?>" name="cemail" id="cemail"  class="form-control border-input input-sm"
                                   placeholder="Email">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Contact No:<span class="asterik">*</span><span  class="errmsg" id="err-cphone"></span> </label>
                            <input type="text" value="<?php echo $objCrm->cphone; ?>" name="cphone" id="cphone"  class="form-control border-input input-sm"
                                   placeholder="Contact No.">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 ">
                        <div class="form-group">
                            <label for="Branch">Property type:
                                <span class="asterik">*</span>
                                <span class="errmsg" id="err-propertytypeid"></span>
                            </label>
                            <select class="js-example-basic-multiple form-control border-input input-sm" placeholder="Select department" id="propertytypeid" name="propertytypeid" multiple="multiple">
                                <?php
                                $sel = "selected";
                                foreach ($objSelectedptype as $opt) {
                                    if (!empty($opt)) {
                                        echo "<option value='" . $opt['id'] . "'" . $sel . ">" . $opt['name'] . "</option>";
                                    }
                                    foreach ($objPropertytype as $key => $value) {
                                        echo "<option value='$value->id' >" . $value->name . "</option>";
                                    }
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group" >
                            <label>buy type:<span class="asterik">*</span><span  class="errmsg" id="err-buytypeid"></span> </label>
                            <select class="form-control border-input input-sm" style=" padding: 7px 18px; height: 40px;" id="buytypeid" name="buytypeid" placeholder="- Select Customer Status -">
                                <?php
                                foreach ($objBuyTpe as $key => $value) {
                                    if ($value->id == $objCrm->buytypeid) {
                                        echo "<option selected value='$value->id' >" . $value->name . "</option>";
                                    } else {
                                        echo "<option value='$value->id' >" . $value->name . "</option>";
                                    }
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="row">
                            <label for="price" class="">Price<span class="text-danger">*</span></label>
                            <div class="col-sm-6"> 
                                <div class="form-control">
                                    <select class="form-control border-input input-sm" style="height: 40px;
                                            margin-top: -13px;
                                            width: 230px;
                                            margin-left: -13px;" id="price-format" name="price-format" >
                                            <?php
                                            $digit = $objCrm->price;
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

                                            $digit = $objCrm->price;
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
                                    <p id="err-price" class="text-danger"></p>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group row control-group" style="    margin-top: -6px;
                                     height: 38px;">
                                    <input type="text" class="form-control input-sm border-input" id="price" name="price" placeholder="Price"
                                           value="<?php echo $val; ?>" >
                                    <p id="err-price" class="text-danger"></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>location:<span class="asterik">*</span><span  class="errmsg" id="err-orgadminname"></span> </label>
                            <input type="text" value="<?php echo $objCrm->location; ?>" name="location" id="location"   class="form-control border-input input-sm"
                                   placeholder="Organisation admin email">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Meeting Done with Client or Not:<span class="asterik">*</span><span  class="errmsg" id="err-orgadminphone"></span> </label>
                            <input type="text" value="<?php echo $objCrm->meetingstatus; ?>" name="meetingstatus" id="meetingstatus"  class="form-control border-input input-sm"
                                   placeholder="Organisation admin phone">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Meeting Place:</label>
                            <select class="form-control border-input input-sm" style=" padding: 7px 18px; height: 40px;" id="meetingtypeid" name="meetingtypeid" placeholder="- Select Customer Status -">
                                <?php
                                foreach ($objMeetingtype as $key => $value) {
                                    if ($value->id == $objCrm->meetingtypeid) {
                                        echo "<option selected value='$value->id' >" . $value->name . "</option>";
                                    } else {
                                        echo "<option value='$value->id' >" . $value->name . "</option>";
                                    }
                                }
                                ?>
                            </select>

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>postremark:</label>
                            <input type="text" value="<?php echo $objCrm->postremark; ?>" name="postremark" id="postremark"  class="form-control border-input input-sm"
                                   placeholder=" ">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Details of Property Shown to him:<span class="asterik">*</span><span  class="errmsg" id="err-orgadminphone"></span> </label>
                            <input type="text" value="<?php echo $objCrm->detailsofproperty; ?>" name="detailsofproperty" id="detailsofproperty"  class="form-control border-input input-sm"
                                   placeholder="Details of Property Shown to him">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Ref From:</label>
                            <input type="text" value="<?php echo $objCrm->reffrom; ?>" name="reffrom" id="reffrom"  class="form-control border-input input-sm"
                                   placeholder=" ">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Final status:<span class="asterik">*</span><span  class="errmsg" id="err-finalstatus"></span> </label>
                            <input type="text" value="<?php echo $objCrm->finalstatus; ?>" name="finalstatus" id="finalstatus"  class="form-control border-input input-sm"
                                   placeholder="Organisation admin phone">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group ">
                            <label>Status :</label>
                            <select class="form-control border-input input-sm" style=" padding: 7px 18px; height: 40px;" id="statusid" name="statusid" placeholder="- Select Customer Status -">
                                <?php
                                foreach ($objCustomerstatus as $key => $value) {
                                    if ($value->id == $objCrm->customerstatusid) {
                                        echo "<option selected value='$value->id' >" . $value->name . "</option>";
                                    } else {
                                        echo "<option value='$value->id' >" . $value->name . "</option>";
                                    }
                                }
                                ?>

                            </select>
                        </div>
                    </div>
                </div>
                <div class="text-center">
                    <button type="button" onclick="eidtCustomer();" class="btn btn-info btn-fill btn-wd">Update customer</button>
                </div>
                <div class="clearfix"></div><br>
            </form>
        </div>
    </div>
</div>
<script src="js/crm/edit.js"></script>