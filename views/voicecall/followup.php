<?php
$this->title = Yii::t('app', 'Edit');
$id = (isset($_GET['id'])) ? $_GET['id'] : 0;
?>
<input type="hidden" id="crm_id" value="<?php echo $id; ?>" />
<input type="hidden" id="listpage" value="1" />
<input type="hidden" id="follow_id" value=" " />
<div class="row">
    <div class="col-lg-4 col-md-5">
        <div class="card card-user" id="addForm">
            <div id="updateprofile">
                <div class="content" >
                    <form name="form" >
                        <div class="row" >
                            <div class="col-md-12">
                                <div class="form-group" >
                                    <label>Remark:<span class="asterik">*</span><span  class="errmsg" id="err-remark"></span> </label>
                                    <input type="text" class="form-control border-input input-sm"  name="remark" id="remark" placeholder="  Remark "
                                           required/>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group" >
                                    <label>Follow up date and time:<span class="asterik">*</span><span  class="errmsg" id="err-followupdate"></span> </label>
                                    <input type="text"  class="form-control border-input input-sm" name="followupdate" id="followupdate" placeholder=" Follow up date "
                                           required/>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group ">
                                    <label>Status :</label>
                                    <select class="form-control border-input input-sm" style=" padding: 7px 18px; height: 40px;" id="statusid" name="statusid" placeholder="- Select Customer Status -">
                                        <?php
//                                        foreach ($objCustomerstatus as $key => $value) {
//                                            if ($value->id == $objCrm->customerstatusid) {
//                                                echo "<option selected value='$value->id' >" . $value->name . "</option>";
//                                            } else {
//                                                echo "<option value='$value->id' >" . $value->name . "</option>";
//                                            }
//                                        }
                                        ?>
                                         <option selected value=1>Hot</option>
                                        <option selected value=2 >Warm</option>
                                        <option selected value=3 >Cold</option>

                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="text-center">
                            <button type="button" onclick="saveFollowup();" class="btn btn-info btn-fill btn-wd">Save</button>
                        </div>
                        <div class="clearfix"></div><br>
                    </form>
                </div>
                <div class="card " id="customerDetails" style=" min-height: 240px;">

                </div>
            </div>
        </div>
        <div class="card card-user" id="updateForm">
            <div id="updateprofile">
                <div class="content" >
                    <form name="form" >
                        <div class="row" >
                            <div class="col-md-12">
                                <div class="form-group" >
                                    <label>Remark:<span class="asterik">*</span><span  class="errmsg" id="err-uremark"></span> </label>
                                    <input type="text" class="form-control border-input input-sm"  name="remark" id="uremark" placeholder="  Remark "
                                           required/>
                                </div>
                            </div>
                        </div>
                        <div class="row" >
                            <div class="col-md-12">
                                <div class="form-group" >
                                    <label>Follow up date and time:<span class="asterik">*</span><span  class="errmsg" id="err-ufollowupdate"></span> </label>
                                    <input type="text"  class="form-control border-input input-sm" name="followupdate" id="ufollowupdate" placeholder=" Follow up date "
                                           required/>
                                </div>
                            </div>
                        </div>
                          <div class="row">
                            <div class="col-md-12">
                                <div class="form-group ">
                                    <label>Status :</label>
                                    <select class="form-control border-input input-sm" style=" padding: 7px 18px; height: 40px;" id="ustatusid" name="ustatusid" placeholder="- Select Customer Status -">
                                        //<?php
//                                        foreach ($objCustomerstatus as $key => $value) {
//                                            if ($value->id == $objCrm->customerstatusid) {
//                                                echo "<option selected value='$value->id' >" . $value->name . "</option>";
//                                            } else {
//                                                echo "<option value='$value->id' >" . $value->name . "</option>";
//                                            }
//                                        }
//                                        ?>
                                        <option selected value=1>Hot</option>
                                        <option selected value=2 >Warm</option>
                                        <option selected value=3 >Cold</option>

                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="text-center">
                            <button type="button" onclick="updateFollowup();" class="btn btn-info btn-fill btn-wd">Update</button>
                        </div>
                        <div class="clearfix"></div><br>
                    </form>
                </div>
<!--                <div class="card hide" id="customerDetails" style=" min-height: 240px;">

                </div>-->
            </div>
        </div>
    </div>
    <div class="col-lg-8 col-md-7">
        <div  class="card">
            <div class="header">
                <h4 class="title">Follow up List
                    <span>
                        <a href="index.php?r=crm"  <button class="btn btn-info btn-fill btn-xs btn-wd pull-right">Back</button></a>
                    </span> </h4>
            </div><hr>
            <div id="updateprofile">
                <div class="content" style="    padding: 0px 9px 10px 10px;">
                     <div class="text-danger" id="notAvailable1" style="    text-align: center;">

                        </div>
                    <div class="row " id="followuplist">
                        <div class="text-danger" id="notAvailable" style="    text-align: center;">

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="js/voicecall/followup.js"></script>
<style>
    .shadow{-webkit-box-shadow:  -18px 17px 9px -17px rgba(212,26,26,1);
            -moz-box-shadow: -18px 17px 9px -17px rgba(212,26,26,1);
            box-shadow: -16px 16px 7px -17px rgba(212,26,26,1);
            /*height: 20px !important;*/
            min-height: 100px;
            margin: 14px;
            padding: 6px;
            word-wrap: break-word;
    }

</style>