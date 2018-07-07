<?php
$this->title = Yii::t('app', ' CRM');
?>
<div id="success-msg">
</div>
<div class="col-lg-12 col-md-12">
    <div  class="card">
        <div class="header">
            <h4 class="title">CRM 
                <span>
                    <a href="index.php?r=crm"  <button class="btn btn-info btn-fill btn-xs btn-wd pull-right">Back</button></a>
                </span> </h4>
        </div><hr>
        <div class="content">
            <form name="form" >
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group" >
                            <label>Client Name:<span class="asterik">*</span><span  class="errmsg" id="err-orgname"></span> </label>
                            <input type="text" class="form-control border-input input-sm" name="cname" id="cmane" placeholder="  Organisationa Name "
                                   required/>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Contact No:</label>
                            <input type="text" name="cphone" id="cphone"  class="form-control border-input input-sm"
                                   placeholder="Website">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group" >
                            <label>Property type:<span class="asterik">*</span><span  class="errmsg" id="err-orgname"></span> </label>
                            <input type="text" class="form-control border-input input-sm" name="ptype" id="ptype" placeholder="  Organisationa Name "
                                   required/>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group" >
                            <label>buytype:<span class="asterik">*</span><span  class="errmsg" id="err-phone1"></span> </label>
                            <input type="text"  class="form-control border-input input-sm" id="buytype" name="buytype" 
                                   placeholder=" Phone1 " required/>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>price<span class="asterik">*</span><span  class="errmsg" id="err-orgadminemail"></span> </label>
                            <input type="email" name="price" id="price"   class="form-control border-input input-sm"
                                   placeholder="Organisation admin email">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>	location:<span class="asterik">*</span><span  class="errmsg" id="err-orgadminname"></span> </label>
                            <input type="text" name="	location" id="	location"   class="form-control border-input input-sm"
                                   placeholder="Organisation admin email">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Meeting Done with Client or Not:<span class="asterik">*</span><span  class="errmsg" id="err-orgadminphone"></span> </label>
                            <input type="text" name="meetingstatus" id="meetingstatus"  class="form-control border-input input-sm"
                                   placeholder="Organisation admin phone">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Meeting Place:</label>
                            <input type="text" name="meetingtype" id="meetingtype"  class="form-control border-input input-sm"
                                   placeholder=" ">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>postremark:</label>
                            <input type="text" name="postremark" id="postremark	"  class="form-control border-input input-sm"
                                   placeholder=" ">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Details of Property Shown to him:<span class="asterik">*</span><span  class="errmsg" id="err-orgadminphone"></span> </label>
                            <input type="text" name="detailsofproperty" id="detailsofproperty"  class="form-control border-input input-sm"
                                   placeholder="Details of Property Shown to him">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Remark:<span class="asterik">*</span><span  class="errmsg" id="err-orgadminphone"></span> </label>
                            <input type="text" name="remark" id="remark"  class="form-control border-input input-sm"
                                   placeholder="Remark">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Ref From:</label>
                            <input type="text" name="Reffrom" id="Reffrom"  class="form-control border-input input-sm"
                                   placeholder=" ">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>finalstatus:<span class="asterik">*</span><span  class="errmsg" id="err-orgadminphone"></span> </label>
                            <input type="text" name="finalstatus" id="finalstatus"  class="form-control border-input input-sm"
                                   placeholder="Organisation admin phone">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>followupdate:</label>
                            <input type="date" name="followupdate" id="followupdate"  class="form-control border-input input-sm"
                                   placeholder=" ">
                        </div>
                    </div>
                </div>
                <div class="text-center">
                    <button type="button" onclick="saveOrganisation();" class="btn btn-info btn-fill btn-wd">Save Organisation</button>
                </div>
                <div class="clearfix"></div><br>
            </form>
        </div>
    </div>
</div>
<script src="js/crm/add.js"></script>