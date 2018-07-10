<?php
$this->title = Yii::t('app', 'Edit');
$id = (isset($_GET['id'])) ? $_GET['id'] : 0;
?>
<input type="hidden" id="crm_id" value="<?php echo $id; ?>" />
<input type="hidden" id="listpage" value="1" />
<div class="row">
    <div class="col-lg-4 col-md-5">
        <div class="card card-user">
            <div id="updateprofile">
                <div class="content" >
                    <form name="form" >
                        <div class="row" >
                            <div class="col-md-12">
                                <div class="form-group" >
                                    <label>Remark:<span class="asterik">*</span><span  class="errmsg" id="err-title"></span> </label>
                                    <input type="text" class="form-control border-input input-sm"  name="remark" id="remark" placeholder="  Remark "
                                           required/>
                                </div>
                            </div>
                        </div>
                        <div class="row" >
                            <div class="col-md-12">
                                <div class="form-group" >
                                    <label>Followup date:<span class="asterik">*</span><span  class="errmsg" id="err-offer"></span> </label>
                                    <input type="text"  class="form-control border-input input-sm" name="datetimes" id="datetimes" placeholder=" Follow up date "
                                           required/>
                                </div>
                            </div>
                        </div>
                        <div class="row" >
                            <div class="col-md-12">
                                <div class="form-group" >
                                    <label>Call time:<span class="asterik">*</span><span  class="errmsg" id="err-offer"></span> </label>
                                    <input type="text"  class="form-control border-input input-sm" name="timetocall" id="timetocall" placeholder=" Follow up time "
                                           required/>
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="button" onclick="Savefollowup();" class="btn btn-info btn-fill btn-wd">Save Follow</button>
                        </div>
                        <div class="clearfix"></div><br>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-8 col-md-7">
        <div  class="card">
            <div class="header">
                <h4 class="title">Follow up List
                    <span>
                        <a href="index.php?r=trendding"  <button class="btn btn-info btn-fill btn-xs btn-wd pull-right">Back</button></a>
                    </span> </h4>
            </div><hr>
            <div id="updateprofile">
                <div class="content" style="    padding: 0px 9px 10px 10px;">
                    <div class="row" id="tProduct">
                        <div class="text-danger" id="notAvailable" style="    text-align: center;">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="js/crm/followup.js"></script>