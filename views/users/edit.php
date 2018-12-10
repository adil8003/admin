<?php
$this->title = Yii::t('app', 'Edit');
$id = (isset($_GET['id'])) ? $_GET['id'] : 0;
?>
<input type="hidden" id="user_id" value="<?php echo $id; ?>" />
<div id="success-msg">
</div>
<div class="col-lg-12 col-md-12">
    <div  class="card">
        <div class="header">
            <h4 class="title">Edit User
                <span>
                    <a href="index.php?r=crm"  <button class="btn btn-info btn-fill btn-xs btn-wd pull-right">Back</button></a>
                </span> </h4>
        </div><hr>
        <div class="content">
            <form name="form" >
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group" >
                            <label>Client Name:<span class="asterik">*</span><span  class="errmsg" id="err-uname"></span> </label>
                            <input type="text" value="<?php echo $objUser->username; ?>" class="form-control border-input input-sm" name="uname" id="uname" placeholder="  User Name "
                                   required/>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Email:<span class="asterik">*</span><span  class="errmsg" id="err-uemail"></span> </label>
                            <input type="text"  value="<?php echo $objUser->email; ?>" onblur="checkUniqueEmail();" name="uemail" id="uemail"  class="form-control border-input input-sm"
                                   placeholder="Email">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Contact No:<span class="asterik">*</span><span  class="errmsg" id="err-uphone"></span> </label>
                            <input type="text" value="<?php echo $objUser->phone; ?>" onblur="checkUniqueContact();" name="uphone" id="uphone"  class="form-control border-input input-sm"
                                   placeholder="Contact No.">
                        </div>
                    </div>
                </div>
                <div class="row">
                       <div class="col-md-6">
                        <div class="form-group" >
                            <label>Status type:<span class="asterik">*</span><span  class="errmsg" id="err-statusid"></span> </label>
                            <select class="form-control border-input input-sm" style=" padding: 7px 18px; height: 40px;" id="statusid" name="statusid" placeholder="- Select Customer Status -">
                                <?php
                                foreach ($objStatus as $key => $value) {
                                    if($value->id == 1 || $value->id == 2){
                                    if ($value->id == $objUser->status_id) {
                                        
                                        echo "<option selected value='$value->id' >" . $value->name . "</option>";
                                    } else {
                                        echo "<option value='$value->id' >" . $value->name . "</option>";
                                    }
                                    }
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group" >
                            <label>Role type:<span class="asterik">*</span><span  class="errmsg" id="err-roleid"></span> </label>
                            <select class="form-control border-input input-sm" style=" padding: 7px 18px; height: 40px;" id="roleid" name="buytypeid" placeholder="- Select Customer Status -">
                                <?php
                                foreach ($objRoles as $key => $value) {
                                    if ($value->id == $objUser->role_id) {
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
                    <button type="button" onclick="eidtUser();" class="btn btn-info btn-fill btn-wd">Update customer</button>
                </div>
                <div class="clearfix"></div><br>
            </form>
        </div>
    </div>
</div>
<script src="js/user/edit.js"></script>