<?php
$this->title = Yii::t('app', 'Update');
$id = (isset($_GET['id'])) ? $_GET['id'] : 0;
?>
<input type="hidden" id="res_id" value="<?php echo $id; ?>" />
<input type="hidden" id="listpage" value="1" />
<input type="hidden" id="update_id" value=" " />
<div class="row">
    <div class="col-lg-4 col-md-5">
        <div class="card card-user" id="addForm">
            <div id="updateprofile">
                <div class="content" >
                    <form name="form" >
                        <div class="row" >
                            <div class="col-md-12">
                                <div class="form-group" >
                                    <label>Wings / phases:<span class="asterik">*</span><span  class="errmsg" id="err-wing"></span> </label>
                                    <input type="text" class="form-control border-input input-sm"  name="wing" id="wing" placeholder="Wing"
                                           required/>
                                </div>
                            </div>
                        </div>
                        <div class="row" >
                            <div class="col-md-12">
                                <div class="form-group" >
                                    <label>Year of construct date :<span class="asterik">*</span><span  class="errmsg" id="err-yearofconstruct"></span> </label>
                                    <input type="text"  class="form-control border-input input-sm" name="yearofconstruct" id="yearofconstruct" placeholder=" Year of construct date "
                                           required/>
                                </div>
                            </div>
                        </div>
                        <div class="row" >
                            <div class="col-md-12">
                                <div class="form-group" >
                                    <label>Possession date :<span class="asterik">*</span><span  class="errmsg" id="err-possesiondate"></span> </label>
                                    <input type="text"  class="form-control border-input input-sm" name="possesiondate" id="possesiondate" placeholder=" Possesion date "
                                           required/>
                                </div>
                            </div>
                        </div>
                        <div class="row" >
                            <div class="col-md-12">
                                <div class="form-group" >
                                    <label>Rera ID  :<span class="asterik">*</span><span  class="errmsg" id="err-reraid"></span> </label>
                                    <input type="text"  class="form-control border-input input-sm" name="reraid" id="reraid" placeholder="Rera ID"
                                           required/>
                                </div>
                            </div>
                        </div>
                        <div class="row" >
                            <div class="col-md-12">
                                <div class="form-group" >
                                    <label>Carpet area:<span class="asterik">*</span><span  class="errmsg" id="err-carpetarea"></span> </label>
                                    <input type="text"  class="form-control border-input input-sm" name="carpetarea" id="carpetarea" placeholder="Carpet area"
                                           required/>
                                </div>
                            </div>
                        </div>
                        <div class="row" >
                            <div class="col-md-12">
                                <div class="form-group" >
                                    <label>Salable area :<span class="asterik">*</span><span  class="errmsg" id="err-salablearea"></span> </label>
                                    <input type="text"  class="form-control border-input input-sm" name="salablearea" id="salablearea" placeholder="Salable area "
                                           required/>
                                </div>
                            </div>
                        </div>
                        <div class="row" >
                            <div class="col-md-12">
                                <div class="form-group" >
                                    <label>Current status :<span  class="errmsg" id="err-cstatus"></span> </label>
                                    <input type="text"  class="form-control border-input input-sm" name="cstatus" id="cstatus" placeholder=" Current status"
                                           required/>
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="button" onclick="saveRwing();" class="btn btn-info btn-fill btn-wd">Save</button>
                         <button type="reset"  class="btn btn-info btn-fill btn-wd">Reset</button>
                        </div>
                        <div class="clearfix"></div><br>
                    </form>
                </div>
                <div class="card " id="propertyDetails" style=" min-height: 240px;">

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
                                    <label>Wings / phases:<span class="asterik">*</span><span  class="errmsg" id="err-wing"></span> </label>
                                    <input type="text" class="form-control border-input input-sm"  name="uwing" id="uwing" placeholder="Wing"
                                           required/>
                                </div>
                            </div>
                        </div>
                        <div class="row" >
                            <div class="col-md-12">
                                <div class="form-group" >
                                    <label>Year of construct date :<span class="asterik">*</span><span  class="errmsg" id="err-uyearofconstruct"></span> </label>
                                    <input type="text"  class="form-control border-input input-sm" name="uyearofconstruct" id="uyearofconstruct" placeholder=" Year of construct date "
                                           required/>
                                </div>
                            </div>
                        </div>
                        <div class="row" >
                            <div class="col-md-12">
                                <div class="form-group" >
                                    <label>Possession date :<span class="asterik">*</span><span  class="errmsg" id="err-possesiondate"></span> </label>
                                    <input type="text"  class="form-control border-input input-sm" name="upossesiondate" id="upossesiondate" placeholder=" Possesion date "
                                           required/>
                                </div>
                            </div>
                        </div>
                          <div class="row" >
                            <div class="col-md-12">
                                <div class="form-group" >
                                    <label>Rera ID  :<span class="asterik">*</span><span  class="errmsg" id="err-ureraid"></span> </label>
                                    <input type="text"  class="form-control border-input input-sm" name="ureraid" id="ureraid" placeholder="Rera ID "
                                           required/>
                                </div>
                            </div>
                        </div>
                        <div class="row" >
                            <div class="col-md-12">
                                <div class="form-group" >
                                    <label>Carpet area:<span class="asterik">*</span><span  class="errmsg" id="err-ucarpetarea"></span> </label>
                                    <input type="text"  class="form-control border-input input-sm" name="ucarpetarea" id="ucarpetarea" placeholder=" Carpet area "
                                           required/>
                                </div>
                            </div>
                        </div>
                        <div class="row" >
                            <div class="col-md-12">
                                <div class="form-group" >
                                    <label>Salable area :<span class="asterik">*</span><span  class="errmsg" id="err-usalablearea"></span> </label>
                                    <input type="text"  class="form-control border-input input-sm" name="usalablearea" id="usalablearea" placeholder=" Salable area "
                                           required/>
                                </div>
                            </div>
                        </div>
                        <div class="row" >
                            <div class="col-md-12">
                                <div class="form-group" >
                                    <label>Current status :<span  class="errmsg" id="err-cstatus"></span> </label>
        <!--                                    <input  placeholder=" Current status"
                                           required/>-->
                                    <textarea   class="form-control border-input input-sm" name="ucstatus" id="ucstatus"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="button" onclick="updateRwing();" class="btn btn-info btn-fill btn-wd">Update</button>
                           
                        </div>
                        <div class="clearfix"></div><br>
                    </form>
                </div>
                <div class="card " id="propertyDetails" style=" min-height: 240px;">

                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-8 col-md-7">
        <div  class="card">
            <div class="header">
                <h4 class="title">Wings / Phase 
                    <span>
                        <a href="index.php?r=residential"  <button class="btn btn-info btn-fill btn-xs btn-wd pull-right">Back</button></a><span><button type="button" id="addbutton" onclick="addFrom();" class="btn btn-info btn-fill btn-xs btn-wd pull-right">Add form</button></span>
                    </span> </h4>
            </div><hr>
            <div id="updateprofile">
                <div class="content" style="    padding: 0px 9px 10px 10px;">
                    <div class="row " id="keyWingslist">
                        <div class="text-danger" id="notAvailable" style="    text-align: center;">

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="js/residential/projectupdate.js"></script>
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