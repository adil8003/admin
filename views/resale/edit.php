<?php
$this->title = Yii::t('app', 'Edit');
$id = (isset($_GET['id'])) ? $_GET['id'] : 0;
?>
<input type="hidden" id="resale_id" value="<?php echo $id; ?>" />
<div id="success-msg">
</div>
<div class="col-lg-12 col-md-12">
    <div  class="card">
        <div class="header">
            <h4 class="title">Update resale project
                <span>
                    <a href="index.php?r=resale"  <button class="btn btn-info btn-fill btn-xs btn-wd pull-right">Back</button></a>
                </span> </h4>
        </div><hr>
        <div class="content">
            <form name="form" id="resaleForm">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Owner name: <span class="asterik">*</span><span  class="errmsg" id="err-ownername"></span> </label>
                            <input type="text" name="ownername" value="<?php echo $objResale->ownername; ?>" id="ownername"  class="form-control border-input input-sm"
                                   placeholder="Owener name">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Contact:<span class="asterik">*</span><span  class="errmsg" id="err-contact"></span> </label>
                            <input type="text" value="<?php echo $objResale->contact; ?>" class="form-control border-input input-sm" name="contact" id="contact" placeholder="  Project Name "
                                   required/>
                        </div>
                    </div>
                   <div class="col-md-4">
                        <div class="form-group ">
                            <label>Property type :<span class="asterik">*</span><span  class="errmsg" id="err-propertytypeid"></span> </label>
                            <select class="form-control border-input input-sm" style=" padding: 7px 18px; height: 40px;" id="propertytypeid" name="propertytypeid" placeholder="- Select Customer type -">
                                <?php
                                foreach ($objPropertytype as $key => $value) {
                                    echo "<option value='$value->id' >" . $value->name . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Society name:<span class="asterik">*</span><span  class="errmsg" id="err-societyname"></span> </label>
                            <input type="text" value="<?php echo $objResale->societyname; ?>" name="societyname" id="societyname"  class="form-control border-input input-sm"
                                   placeholder="Landmark">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Building name:<span class="asterik">*</span><span  class="errmsg" id="err-buildingname"></span> </label>
                            <input type="text"  value="<?php echo $objResale->buildingname; ?>" name="buildingname" id="buildingname"   class="form-control border-input input-sm"
                                   placeholder="Building name">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Wing:<span class="asterik">*</span><span  class="errmsg" id="err-wing"></span> </label>
                            <input type="text" name="wing"  value="<?php echo $objResale->wing; ?>" id="wing"   class="form-control border-input input-sm"
                                   placeholder="Wing">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Flat number:<span class="asterik">*</span><span  class="errmsg" id="err-flatnumber"></span> </label>
                            <input type="text" value="<?php echo $objResale->flatnumber; ?>" name="flatnumber" id="flatnumber"  class="form-control border-input input-sm"
                                   placeholder="Flat number">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Floor number:<span class="asterik">*</span><span  class="errmsg" id="err-floornumber"></span> </label>
                            <input type="text" name="floornumber" value="<?php echo $objResale->floornumber; ?>" id="floornumber"   class="form-control border-input input-sm"
                                   placeholder="Floor number">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Carpet area:<span class="asterik">*</span><span  class="errmsg" id="err-carpetarea"></span> </label>
                            <input type="text" value="<?php echo $objResale->carpetarea; ?>" name="carpetarea" id="carpetarea"   class="form-control border-input input-sm"
                                   placeholder="Carpet area">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Landmark:<span class="asterik">*</span><span  class="errmsg" id="err-landmark"></span> </label>
                            <input type="text" name="landmark" value="<?php echo $objResale->landmark; ?>" id="landmark"  class="form-control border-input input-sm"
                                   placeholder="Landmark">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Location:<span class="asterik">*</span><span  class="errmsg" id="err-location"></span> </label>
                            <input type="text" value="<?php echo $objResale->location; ?>" name="location" id="location"   class="form-control border-input input-sm"
                                   placeholder="Location">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Age:</label>
                            <input type="text" value="<?php echo $objResale->age; ?>" name="age" id="age"  class="form-control border-input input-sm"
                                   placeholder="Possesion date">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-5">
                        <div class="form-group ">
                            <label>Status :</label>
                            <select class="form-control border-input input-sm" style=" padding: 7px 18px; height: 40px;" id="statusid" name="statusid" placeholder="- Select Customer Status -">
                                <?php
                                foreach ($objStatus as $key => $value) {
                                    if ($value->id == $objResale->statusid) {
                                        echo "<option selected value='$value->id' >" . $value->name . "</option>";
                                    } else {
                                        echo "<option value='$value->id' >" . $value->name . "</option>";
                                    }
                                }
                                ?>

                            </select>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="row">
                            <label for="price" class="">Price<span class="text-danger">*</span></label>
                            <div class="col-sm-6"> 
                                <div class="form-control">
                                    <select class="form-control border-input input-sm" style="height: 40px;
                                            margin-top: -13px;
                                            width: 230px;
                                            margin-left: -13px;" id="price-format" name="price-format" >
                                            <?php
                                            $digit = $objResale->price;
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

                                            $digit = $objResale->price;
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
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Property facing:</label>
                            <input type="text" value="<?php echo $objResale->propertyfacing; ?>" name="propertyfacing" id="propertyfacing"  class="form-control border-input input-sm"
                                   placeholder="property facing">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Furniture:<span class="asterik">*</span><span  class="errmsg" id="err-detailsofproperty"></span> </label>
                            <input type="text" value="<?php echo $objResale->furniture; ?>" name="furniture" id="furniture"  class="form-control border-input input-sm"
                                   placeholder="Furniture">
                        </div>
                    </div>


                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Address: <span class="asterik">*</span><span  class="errmsg" id="err-address"></span> </label>
                            <input type="text" value="<?php echo $objResale->address; ?>" name="address" id="address"   class="form-control border-input input-sm"
                                   placeholder="Address">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Remarks:<span class="asterik">*</span><span  class="errmsg" id="err-remarks"></span> </label>
                            <input type="text" value="<?php echo $objResale->remarks; ?>" name="remarks" id="remarks"  class="form-control border-input input-sm"
                                   placeholder="Remarks">
                        </div>
                    </div>

                </div>
                <div class="text-center">
                    <button type="button" onclick="updateResale();" class="btn btn-info btn-fill btn-wd">Update Property</button>
                </div>
                <div class="clearfix"></div><br>
            </form>
        </div>
    </div>
</div>
<script src="js/resale/edit.js"></script>