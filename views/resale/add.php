<?php
$this->title = Yii::t('app', ' Add resale');
?>
<div id="success-msg">
</div>
<div class="col-lg-12 col-md-12">
    <div  class="card">
        <div class="header">
            <h4 class="title">Add resale project
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
                            <input type="text" name="ownername"  id="ownername"  class="form-control border-input input-sm"
                                   placeholder="Owener name">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Contact:<span class="asterik">*</span><span  class="errmsg" id="err-contact"></span> </label>
                            <input type="text" class="form-control border-input input-sm" name="contact" id="contact" placeholder="  Project Name "
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
                            <input type="text" name="societyname" id="societyname"  class="form-control border-input input-sm"
                                   placeholder="Landmark">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Building name:<span class="asterik">*</span><span  class="errmsg" id="err-buildingname"></span> </label>
                            <input type="text" name="buildingname" id="buildingname"   class="form-control border-input input-sm"
                                   placeholder="Building name">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Wing:<span class="asterik">*</span><span  class="errmsg" id="err-wing"></span> </label>
                            <input type="text" name="wing" id="wing"   class="form-control border-input input-sm"
                                   placeholder="Wing">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Flat number:<span class="asterik">*</span><span  class="errmsg" id="err-flatnumber"></span> </label>
                            <input type="text" name="flatnumber" id="flatnumber"  class="form-control border-input input-sm"
                                   placeholder="Flat number">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Floor number:<span class="asterik">*</span><span  class="errmsg" id="err-floornumber"></span> </label>
                            <input type="text" name="floornumber" id="floornumber"   class="form-control border-input input-sm"
                                   placeholder="Floor number">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Carpet area:<span class="asterik">*</span><span  class="errmsg" id="err-carpetarea"></span> </label>
                            <input type="text" name="carpetarea" id="carpetarea"   class="form-control border-input input-sm"
                                   placeholder="Carpet area">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Landmark:<span class="asterik">*</span><span  class="errmsg" id="err-landmark"></span> </label>
                            <input type="text" name="landmark" id="landmark"  class="form-control border-input input-sm"
                                   placeholder="Landmark">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Location:<span class="asterik">*</span><span  class="errmsg" id="err-location"></span> </label>
                            <input type="text" name="location" id="location"   class="form-control border-input input-sm"
                                   placeholder="Location">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Age:</label>
                            <input type="text" name="age" id="age"  class="form-control border-input input-sm"
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
                                    echo "<option value='$value->id' >" . $value->name . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="row">
                            <!--<div class="col-sm-2">-->
                            <label for="price"  class="">Price<span class="text-danger text-center" id="err-price" style="margin: 126px;">*</span></label>
                            <div class="col-sm-6"> 

                                <div class="form-control">
                                    <select class="form-control border-input input-sm" style="height: 40px;
                                            margin-top: -13px;
                                            width: 260px;
                                            margin-left: -13px;" id="price-format" name="price-format" >
                                        <option value="Thousand">Thousand</option>
                                        <option value="Lakh">Lakh</option>
                                        <option value="Crore">Crore</option>
                                    </select>
                                    <p id="err-price" class="text-danger"></p>
                                </div>
                            </div>
                            <div class="col-sm-6">
                               
                                <div class="form-group row control-group" style="width: 290px;margin-top: -6px;
                                     height: 38px;">
                                    <input type="text" class="form-control input-sm border-input" id="price" name="price" placeholder="Price"
                                           value="" >
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Property facing:</label>
                            <input type="text" name="propertyfacing" id="propertyfacing"  class="form-control border-input input-sm"
                                   placeholder="property facing">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Furniture:<span class="asterik">*</span><span  class="errmsg" id="err-detailsofproperty"></span> </label>
                            <input type="text" name="furniture" id="furniture"  class="form-control border-input input-sm"
                                   placeholder="Furniture">
                        </div>
                    </div>


                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Address: <span class="asterik">*</span><span  class="errmsg" id="err-address"></span> </label>
                            <input type="text" name="address" id="address"   class="form-control border-input input-sm"
                                   placeholder="Address">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Remarks:<span class="asterik">*</span><span  class="errmsg" id="err-remarks"></span> </label>
                            <input type="text" name="remarks" id="remarks"  class="form-control border-input input-sm"
                                   placeholder="Remarks">
                        </div>
                    </div>

                </div>
                <div class="text-center">
                    <button type="button" onclick="saveResale();" class="btn btn-info btn-fill btn-wd">Save Property</button>
                    <button type="reset" onclick="reset();" id="reset" class="btn btn-info btn-fill btn-wd">Reset</button>
                </div>
                <div class="clearfix"></div><br>
            </form>
        </div>
    </div>
</div>
<script src="js/resale/add.js"></script>