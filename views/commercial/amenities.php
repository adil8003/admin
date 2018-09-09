<?php
$this->title = Yii::t('app', 'Features');
$id = (isset($_GET['id'])) ? $_GET['id'] : 0;
?>
<input type="hidden" id="com_id" value="<?php echo $id; ?>" />
<input type="hidden" id="listpage" value="1" />
<input type="hidden" id="amenities_id" value=" " />
<div class="row">
    <div class="col-lg-4 col-md-5">
        <div class="card card-user" id="addForm">
            <div id="updateprofile">
                <div class="content" >
                    <form name="form" >
                        <div class="row" >
                            <div class="col-md-12">
                                <div class="form-group" >
                                    <label>Commercial features name:<span class="asterik">*</span><span  class="errmsg" id="err-aname"></span> </label>
                                    <input type="text" class="form-control border-input input-sm"  name="aname" id="aname" placeholder="   Key features of commercial project  "
                                           required/>
                                </div>
                            </div>
                             <div class="col-md-12">
                                <div class="form-group" >
                                    <label>Comment: </label>
                                    <input type="text" class="form-control border-input input-sm"  name="cdetails" id="cdetails" placeholder=""
                                           required/>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group ">
                                    <label>Status: </label>
                                    <select class="form-control border-input input-sm" style=" padding: 7px 18px; height: 40px;" id="typeid" name="typeid" placeholder="- Select Customer Status -">
                                        <option value='2'>Available/Yes</option>
                                        <option value='1' >No</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="button" onclick="saveKeyfeatures();" class="btn btn-info btn-fill btn-wd">Save</button>
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
                                    <label>Amenities:<span class="asterik">*</span><span  class="errmsg" id="err-uaname"></span> </label>
                                    <input type="text" class="form-control border-input input-sm"  name="uaname" id="uaname" placeholder="  Key features of commercial project "
                                           required/>
                                </div>
                            </div>
                        </div>
                           <div class="col-md-12">
                                <div class="form-group" >
                                    <label>Comment: </label>
                                    <input type="text" class="form-control border-input input-sm"  name="ucdetails" id="ucdetails" placeholder=""
                                           required/>
                                </div>
                            </div>
                        <div class="col-md-12">
                            <div class="form-group ">
                                <label>Status :</label>
                                <select class="form-control border-input input-sm" style=" padding: 7px 18px; height: 40px;" id="utypeid" name="utypeid" placeholder="- Select Customer Status -">
                                    <option value='1' >No</option>
                                    <option value='2'>Available/Yes</option>
                                </select>
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="button" onclick="updateAmenities();" class="btn btn-info btn-fill btn-wd">Update</button>
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
                <h4 class="title">Key features of commercial project
                    <span>
                        <a href="index.php?r=residential"  <button class="btn btn-info btn-fill btn-xs btn-wd pull-right">Back</button></a>
                    </span> </h4>
            </div><hr>
            <div id="updateprofile">
                <div class="content" style="    padding: 0px 9px 10px 10px;">
                    <div class="row " id="amenitiesList">
                        <div class="text-danger" id="notAvailable" style="    text-align: center;">

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="js/commercial/amenities.js"></script>
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