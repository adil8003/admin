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
                    <div class="col-md-6">
                        <div class="form-group" >
                            <label>Client Name:<span class="asterik">*</span><span  class="errmsg" id="err-cname"></span> </label>
                            <input type="text" value="<?php echo $objCrm->cname; ?>" class="form-control border-input input-sm" name="cname" id="cname" placeholder="  Organisationa Name "
                                   required/>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Contact No:<span class="asterik">*</span><span  class="errmsg" id="err-cphone"></span> </label>
                            <input type="text" value="<?php echo $objCrm->cphone; ?>" name="cphone" id="cphone"  class="form-control border-input input-sm"
                                   placeholder="Website">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group" >
                            <label>Property type:<span class="asterik">*</span><span  class="errmsg" id="err-propertytypeid"></span> </label>
                            <select class="form-control border-input input-sm" style=" padding: 7px 18px; height: 40px;" id="propertytypeid" name="propertytypeid" placeholder="- Select Customer Status -">
                                <?php
                                foreach ($objPropertytype as $key => $value) {
                                    if ($value->id == $objCrm->propertytypeid) {
                                        echo "<option selected value='$value->id' >" . $value->name . "</option>";
                                    } else {
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
                        <div class="form-group">
                            <label>price<span class="asterik">*</span><span  class="errmsg" id="err-orgadminemail"></span> </label>
                            <input type="email"  value="<?php echo $objCrm->price; ?>"name="price" id="price"   class="form-control border-input input-sm"
                                   placeholder="Organisation admin email">
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
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Remark:<span class="asterik">*</span><span  class="errmsg" id="err-orgadminphone"></span> </label>
                            <input type="text" value="<?php echo $objCrm->remark; ?>" name="remark" id="remark"  class="form-control border-input input-sm"
                                   placeholder="Remark">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Ref From:</label>
                            <input type="text" value="<?php echo $objCrm->reffrom; ?>" name="reffrom" id="reffrom"  class="form-control border-input input-sm"
                                   placeholder=" ">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>finalstatus:<span class="asterik">*</span><span  class="errmsg" id="err-finalstatus"></span> </label>
                            <input type="text" value="<?php echo $objCrm->finalstatus; ?>" name="finalstatus" id="finalstatus"  class="form-control border-input input-sm"
                                   placeholder="Organisation admin phone">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group ">
                            <label>Status :</label>
                            <select class="form-control border-input input-sm" style=" padding: 7px 18px; height: 40px;" id="statusid" name="statusid" placeholder="- Select Customer Status -">
                                <?php
                                foreach ($objStatus as $key => $value) {
                                    if ($value->id == $objCrm->statusid) {
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