<?php
$this->title = Yii::t('app', ' Add commercial');
$id = (isset($_GET['id'])) ? $_GET['id'] : 0;
?>
<input type="hidden" id="com_id" value="<?php echo $id; ?>" />
<div id="success-msg">
</div>
<div class="col-lg-12 col-md-12">
    <div  class="card">
        <div class="header">
            <h4 class="title">Update commercial project
                <span>
                    <a href="index.php?r=commercial"  <button class="btn btn-info btn-fill btn-xs btn-wd pull-right">Back</button></a>
                </span> </h4>
        </div><hr>
        <div class="content">
            <form name="form" >
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Project Name:<span class="asterik">*</span><span  class="errmsg" id="err-pname"></span> </label>
                            <input type="text" value="<?php echo $objCommercial->cname ?>" class="form-control border-input input-sm" name="cname" id="cname" placeholder="  Project Name "
                                   required/>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Developer name: <span class="asterik">*</span><span  class="errmsg" id="err-dname"></span> </label>
                            <input type="text" value="<?php echo $objCommercial->dname ?>" name="dname" id="dname"  class="form-control border-input input-sm"
                                   placeholder="Deleloper name">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Landmark:<span class="asterik">*</span><span  class="errmsg" id="err-landmark"></span> </label>
                            <input type="text" value="<?php echo $objCommercial->landmark ?>" name="landmark" id="landmark"  class="form-control border-input input-sm"
                                   placeholder="Landmark">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Location:<span class="asterik">*</span><span  class="errmsg" id="err-location"></span> </label>
                            <input type="text" value="<?php echo $objCommercial->location ?>" name="location" id="location"   class="form-control border-input input-sm"
                                   placeholder="Location">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group ">
                            <label>Property type :<span class="asterik">*</span><span  class="errmsg" id="err-propertytypeid"></span> </label>
                            <select class="form-control border-input input-sm" style=" padding: 7px 18px; height: 40px;" id="propertytypeid" name="propertytypeid" placeholder="- Select Customer type -">
                             <?php
                                foreach ($objCtype as $key => $value) {
                                    if ($value->id == $objCommercial->ctypeid) {
                                        echo "<option selected value='$value->id' >" . $value->name . "</option>";
                                    } else {
                                        echo "<option value='$value->id' >" . $value->name . "</option>";
                                    }
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group ">
                            <label>Property for:<span class="asterik">*</span><span  class="errmsg" id="err-buytypeid"></span> </label>
                            <select class="form-control border-input input-sm" style=" padding: 7px 18px; height: 40px;" id="buytypeid" name="buytypeid" placeholder="- Select Customer Status -">
                                <?php
                              foreach ($objBuyTpe as $key => $value) {
                                    if ($value->id == $objCommercial->buytypeid) {
                                        echo "<option selected value='$value->id' >" . $value->name . "</option>";
                                    } else {
                                        echo "<option value='$value->id' >" . $value->name . "</option>";
                                    }
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group ">
                            <label>Status :</label>
                            <select class="form-control border-input input-sm" style=" padding: 7px 18px; height: 40px;" id="statusid" name="statusid" placeholder="- Select Customer Status -">
                                <?php
                                 foreach ($objStatus as $key => $value) {
                                    if ($value->id == $objCommercial->statusid) {
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
                            <label>Rera ID:<span class="asterik">*</span><span  class="errmsg" id="err-orgadminphone"></span> </label>
                            <input type="text" value="<?php echo $objCommercial->reraid ?>" name="reraid" id="reraid"  class="form-control border-input input-sm"
                                   placeholder="Rera no.">
                        </div>
                    </div>
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
                                            $digit = $objCommercial->price;
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

                                            $digit = $objCommercial->price;
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
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Address: <span class="asterik">*</span><span  class="errmsg" id="err-address"></span> </label>
                            <input type="text" name="address" value="<?php echo $objCommercial->address ?>" id="address"   class="form-control border-input input-sm"
                                   placeholder="Address">
                        </div>
                    </div>
                </div>
                <div class="text-center">
                    <button type="button" onclick="updateProperty();" class="btn btn-info btn-fill btn-wd">Save Property</button>
                </div>
                <div class="clearfix"></div><br>
            </form>
        </div>
    </div>
</div>
<script src="js/commercial/edit.js"></script>