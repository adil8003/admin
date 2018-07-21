<?php
$this->title = Yii::t('app', ' Add residential');
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
            <form name="form" >
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Owner name: <span class="asterik">*</span><span  class="errmsg" id="err-ownername"></span> </label>
                            <input type="text" name="ownername" id="ownername"  class="form-control border-input input-sm"
                                   placeholder="Owener name">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Contact:<span class="asterik">*</span><span  class="errmsg" id="err-pname"></span> </label>
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
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Landmark:<span class="asterik">*</span><span  class="errmsg" id="err-landmark"></span> </label>
                            <input type="text" name="landmark" id="landmark"  class="form-control border-input input-sm"
                                   placeholder="Landmark">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Location:<span class="asterik">*</span><span  class="errmsg" id="err-location"></span> </label>
                            <input type="text" name="location" id="location"   class="form-control border-input input-sm"
                                   placeholder="Location">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Age:</label>
                            <input type="text" name="age" id="age"  class="form-control border-input input-sm"
                                   placeholder="Possesion date">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <!--<div class="col-sm-2">-->
                            <label for="price" class="">Price<span class="text-danger">*</span></label>
                            <div class="col-sm-6"> 

                                <div class="form-control">
                                    <select class="form-control border-input input-sm" style="height: 40px;
                                            margin-top: -13px;
                                            width: 230px;
                                            margin-left: -13px;" id="price-format" name="price-format" >
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
                                           value="" >
                                    <p id="err-price" class="text-danger"></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
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
                    <div class="col-md-4">
                        <div class="form-group ">
                            <label>Property for:<span class="asterik">*</span><span  class="errmsg" id="err-buytypeid"></span> </label>
                            <select class="form-control border-input input-sm" style=" padding: 7px 18px; height: 40px;" id="buytypeid" name="buytypeid" placeholder="- Select Customer Status -">
                                <?php
                                foreach ($objBuyTpe as $key => $value) {
                                    echo "<option value='$value->id' >" . $value->name . "</option>";
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
                            <label>Project's total land area:</label>
                            <input type="text" name="plan" id="pland"  class="form-control border-input input-sm"
                                   placeholder="Project's total land area">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Carpet area:<span class="asterik">*</span><span  class="errmsg" id="err-detailsofproperty"></span> </label>
                            <input type="text" name="carpetarea" id="carpetarea"  class="form-control border-input input-sm"
                                   placeholder="Carpet area">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Rera ID:<span class="asterik">*</span><span  class="errmsg" id="err-orgadminphone"></span> </label>
                            <input type="text" name="reraid" id="reraid"  class="form-control border-input input-sm"
                                   placeholder="Rera no.">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Address: <span class="asterik">*</span><span  class="errmsg" id="err-price"></span> </label>
                            <input type="text" name="address" id="address"   class="form-control border-input input-sm"
                                   placeholder="Address">
                        </div>
                    </div>

                </div>
                <div class="text-center">
                    <button type="button" onclick="saveProperty();" class="btn btn-info btn-fill btn-wd">Save Property</button>
                </div>
                <div class="clearfix"></div><br>
            </form>
        </div>
    </div>
</div>
<script src="js/resale/add.js"></script>