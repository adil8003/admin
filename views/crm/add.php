<?php
$this->title = Yii::t('app', ' CRM');
?>
<div id="success-msg">
</div>
<div class="col-lg-12 col-md-12">
    <div  class="card">
        <div class="header">
            <h4 class="title">CRM - Add customer
                <span>
                    <a href="index.php?r=crm"  <button class="btn btn-info btn-fill btn-xs btn-wd pull-right">Back</button></a>
                </span> </h4>
        </div><hr>
        <div class="content">
            <form name="form" >
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Customer Name:<span class="asterik">*</span><span  class="errmsg" id="err-cname"></span> </label>
                            <input type="text" class="form-control border-input input-sm" name="cname" id="cname" placeholder="  Customer Name "
                                   required/>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Contact No:<span class="asterik">*</span><span  class="errmsg" id="err-cphone"></span> </label>
                            <input type="text" name="cphone" id="cphone"  class="form-control border-input input-sm"
                                   placeholder="Customer no.">
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
                            <label>Type :<span class="asterik">*</span><span  class="errmsg" id="err-buytypeid"></span> </label>
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
                            <label>Meeting Place :</label>
                            <select class="form-control border-input input-sm" style=" padding: 7px 18px; height: 40px;" id="meetingtypeid" name="meetingtypeid" placeholder="- Select Customer Status -">
                                <?php
                                foreach ($objMeetingtype as $key => $value) {
                                    echo "<option value='$value->id' >" . $value->name . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-7">
                        <div class="row">
                            <!--<div class="col-sm-2">-->
                            <label for="price"  class="">Price<span class="text-danger text-center" id="err-price" style="margin: 126px;">*</span></label>
                            <div class="col-sm-6"> 

                                <div class="form-control">
                                    <select class="form-control border-input input-sm" style="height: 40px;
                                            margin-top: -13px;
                                            width: 259px;
                                            margin-left: -13px;" id="price-format" name="price-format" >
                                        <option value="Thousand">Thousand</option>
                                        <option value="Lakh">Lakh</option>
                                        <option value="Crore">Crore</option>
                                    </select>
                                    <!--<p id="err-price" class="text-danger"></p>-->
                                </div>
                            </div>
                            <div class="col-sm-5">
                                <div class="form-group row control-group" style="    margin-top: -6px;
                                     height: 38px;"> 
                                    <input type="text" class="form-control input-sm border-input" id="price" name="price" placeholder="Price"
                                           value="" >
                                    <!--<p id="err-price" class="text-danger"></p>-->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">
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
                            <label>Meeting Done with Client or Not:<span class="asterik">*</span><span  class="errmsg" id="err-orgadminphone"></span> </label>
                            <input type="text" name="meetingstatus" id="meetingstatus"  class="form-control border-input input-sm"
                                   placeholder="Meeting Done with Client or Not">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Details of Property Shown to him:<span class="asterik">*</span><span  class="errmsg" id="err-detailsofproperty"></span> </label>
                            <input type="text" name="detailsofproperty" id="detailsofproperty"  class="form-control border-input input-sm"
                                   placeholder="Details of Property Shown to him">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Post remark:</label>
                            <input type="text" name="postremark" id="postremark"  class="form-control border-input input-sm"
                                   placeholder=" Post remark">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Final status:<span class="asterik">*</span><span  class="errmsg" id="err-orgadminphone"></span> </label>
                            <input type="text" name="finalstatus" id="finalstatus"  class="form-control border-input input-sm"
                                   placeholder="Final status">
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Ref From:</label>
                            <input type="text" name="reffrom" id="reffrom"  class="form-control border-input input-sm"
                                   placeholder="Ref From ">
                        </div>
                    </div>
                    <div class="col-md-6">
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
                <div class="text-center">
                    <button type="button" onclick="saveCustomer();" class="btn btn-info btn-fill btn-wd">Save Customer</button>
                </div>
                <div class="clearfix"></div><br>
            </form>
        </div>
    </div>
</div>
<script src="js/crm/add.js"></script>