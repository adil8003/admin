<?php
$this->title = Yii::t('app', ' CRM');
?>
<div id="success-msg">
</div>
<div class="col-lg-12 col-md-12">
    <div  class="card">
        <div class="header">
            <h4 class="title"> Add user
                <span>
                    <a href="index.php?r=users"  <button class="btn btn-info btn-fill btn-xs btn-wd pull-right">Back</button></a>
                </span> </h4>
        </div><hr>
        <div class="content">
            <form name="form" >
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>User Name:<span class="asterik">*</span><span  class="errmsg" id="err-uname"></span> </label>
                            <input type="text" class="form-control border-input input-sm" name="uname" id="uname" placeholder="  Customer Name "
                                   required/>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Email:<span class="asterik">*</span><span  class="errmsg" id="err-uemail"></span> </label>
                            <input type="text" name="uemail" id="uemail" onblur="checkUniqueEmail();"  class="form-control border-input input-sm"
                                   placeholder="Email">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Contact No:<span class="asterik">*</span><span  class="errmsg" id="err-uphone"></span> </label>
                            <input type="text" name="uphone" id="uphone" onblur="checkUniqueContact();"  class="form-control border-input input-sm"
                                   placeholder="User no.">
                        </div>
                    </div>
                </div>
                <div class="row">
                   <div class="col-md-6">
                        <div class="form-group ">
                            <label>Status :</label>
                            <select class="form-control border-input input-sm" style=" padding: 7px 18px; height: 40px;" id="statusid" name="statusid" placeholder="- Select Customer Status -">
                                <?php
                                foreach ($objStatus as $key => $value) {
                                    if($value->id == 1 || $value->id == 2){
                                    echo "<option value='$value->id' >" . $value->name . "</option>";
                                }
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group ">
                            <label>Status :</label>
                            <select class="form-control border-input input-sm" style=" padding: 7px 18px; height: 40px;" id="roleid" name="roleid" placeholder="- Select Customer Status -">
                                <?php
                                foreach ($objRoles as $key => $value) {
                                    echo "<option value='$value->id' >" . $value->name . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="text-center">
                    <button type="button" id="saveBtn" onclick="saveUser();" class="btn btn-info btn-fill btn-wd">Save User</button>
                <button type="button" onclick="resetdata();" class="btn btn-info btn-fill btn-wd">Reset</button>
                </div>
                <div class="clearfix"></div><br>
            </form>
        </div>
    </div>
</div>
<script src="js/user/add.js"></script>