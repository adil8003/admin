<?php
$this->title = Yii::t('app', 'Edit');
$id = (isset($_GET['id'])) ? $_GET['id'] : 0;
?>
<input type="hidden" id="res_id" value="<?php echo $id; ?>" />
<input type="hidden" id="listpage" value="1" />
<input type="hidden" id="amenities_id" value=" " />
<input type="hidden" id="tagline_id" value=" " />
<div class="row">
    <div class="col-lg-4 col-md-5">
        <div class="card card-user" id="addForm">
            <div >
                <div class="content" >
                    <form name="form" id="updateprofile">
                        <div class="row" >
                            <div class="col-md-12">
                                <div class="form-group" >
                                    <label>Amenities Name:<span class="asterik">*</span><span  class="errmsg" id="err-aname"></span> </label>
                                    <input   class="form-control border-input input-sm"  name="aname" id="aname" placeholder="  Amenities ">
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="button" onclick="saveAmenities();"  class="btn btn-info btn-fill btn-wd">Save</button>
                        </div>
                        <div class="clearfix"></div><br>
                    </form>
                <!--</div>-->
                <!--<div class="content" >-->
                    <form name="form" id="addFormtagline">
                        <div class="row" >
                            <div class="col-md-12">
                                <div class="form-group" >
                                    <label>Tag Line:<span class="asterik">*</span><span  class="errmsg" id="err-tagline"></span> </label>
                                    <input type="text" maxlength="30"  class="form-control border-input input-sm"  name="tagline" id="tagline" placeholder="  Tag line (Max length 30 characters)">
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="button" onclick="saveTagLine();"  class="btn btn-info btn-fill btn-wd">Save</button>
                        </div>
                        <div class="clearfix"></div><br>
                    </form>
                </div>
                <div class="card " id="propertyDetails" style=" min-height: 240px;">

                </div>
            </div>
        </div>
        <div class="card card-user" id="updateForm">
            <div >
                <div class="content" id="updateContent">
                    <form name="form" id="updateAmenities">
                        <div class="row" >
                            <div class="col-md-12">
                                <div class="form-group" >
                                    <label>Amenities:<span class="asterik">*</span><span  class="errmsg" id="err-uaname"></span> </label>
                                    <input type="text" class="form-control border-input input-sm"  name="uaname" id="uaname" placeholder="  Amenities "
                                           required/>
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="button"  onclick="updateAmenities();" class="btn btn-info btn-fill btn-wd">Update</button>
                        </div>
                        <div class="clearfix"></div><br>
                    </form>
                    <form name="form" id="updateFormtagline">
                        <div class="row" >
                            <div class="col-md-12">
                                <div class="form-group" >
                                    <label>Tag line:<span class="asterik">*</span><span  class="errmsg" id="err-utagline"></span> </label>
                                    <input type="text" class="form-control border-input input-sm"  name="utagline" id="utagline" placeholder="  Enter tag line "
                                           required/>
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="button"  onclick="updateTagline();" class="btn btn-info btn-fill btn-wd">Update</button>
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
                <h4 class="title">Amenities List/ Tag line
                    <span>
                        <a href="index.php?r=residential"  <button class="btn btn-info btn-fill btn-xs btn-wd pull-right">Back</button></a>
                    </span> </h4>
            </div><hr>
            <div id="updateprofile">
                <div class="content" style="    padding: 0px 9px 10px 10px;">
                    <div class="row " >
                        <div class="col-md-7" id="amenitiesList">
                            <div class="text-danger" id="notAvailable" style="    text-align: center;">


                            </div>
                        </div>
                        <div class="col-md-5" id="ListTAgLine">
                            <div class="text-danger" id="notAvailable1" style="    text-align: center;">


                        </div>
                        </div>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="js/residential/amenities.js"></script>
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