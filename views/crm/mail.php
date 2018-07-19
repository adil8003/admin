<?php
$this->title = Yii::t('app', 'Mail');
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

                    <div class="card " id="customerDetails" style=" min-height: 240px;">

                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="col-lg-8 col-md-7">
        <div  class="card">
            <div class="header">
                <h4 class="title">Mail
                    <span>
                        <a href="index.php?r=crm"  <button class="btn btn-info btn-fill btn-xs btn-wd pull-right">Back</button></a>
                    </span> </h4>
            </div><hr>
            <div id="updateprofile">
                <div class="content" style="    padding: 0px 9px 10px 10px;">
                    <div class="row " id="keylocationlist">
                        <div class="content" >
                            <form name="form" >
                                <div class="row" >
                                    <div class="col-md-12">
                                        <div class="form-group" >
                                            <label>From:<span class="asterik">*</span><span  class="errmsg" id="err-remark"></span> </label>
                                            <input type="text" class="form-control border-input input-sm"  name="from" id="from" placeholder="  Remark "
                                                   required/>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" >
                                    <div class="col-md-12">
                                        <div class="form-group" >
                                            <label>To:<span class="asterik">*</span><span  class="errmsg" id="err-followupdate"></span> </label>
                                            <input type="text"  class="form-control border-input input-sm" name="mailto" id="mailto" placeholder=" Follow up date "
                                                   required/>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" >
                                    <div class="col-md-12">
                                        <div class="form-group" >
                                            <label>Message:<span class="asterik">*</span><span  class="errmsg" id="err-followupdate"></span> </label>
                                           <textarea cols="92" id="mailEditorText"></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="text-center">
                                    <button type="button" onclick="sendMail();" class="btn btn-info btn-fill btn-wd">Send</button>
                                </div>
                                <div class="clearfix"></div><br>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="js/crm/mail.js"></script>
<style>
    .shadow{-webkit-box-shadow:  -18px 17px 9px -17px rgba(212,26,26,1);
            -moz-box-shadow: -18px 17px 9px -17px rgba(212,26,26,1);
            box-shadow: -16px 19px 6px -19px rgb(8, 20, 60);
            /*height: 20px !important;*/
            min-height: 42px;
            margin: 14px;
            /*padding: 6px;*/
            /*word-wrap: break-word;*/
    }

</style>