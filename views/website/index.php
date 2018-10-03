<?php
$this->title = Yii::t('app', 'Website');
$id = (isset($_GET['id'])) ? $_GET['id'] : 0;
?>
<input type="hidden" id="res_id" value="<?php // echo $id; ?>" />
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="header">
                <h4 class="title">Website images
                    <span>
                        <div class="btn-group pull-right">
                            <a href="index.php?r=residential/" type="button" class="btn btn-info btn-wd btn-fill btn-xs ">Back</a>
                        </div>
                    </span>
                </h4>
                <hr>
                <div class="row"> 
                    <div class="col-sm-4  imageScroll">
                        <div id="imageamaneti" class="card">
                            <li>Upload image for <b>Header</b>.</li>
                            <li>Upload only one image.</li>
                            <li>Size should be 1500 * 700+ .</li>
                            <div class="card-block">
                                <h4 class="card-title">Drop Image Or <button type="button" id="clickimageamaneti" class="btn btn-secondary btn-sm">Click here</button></h4>
                                <progress id="progressimage" class="hide progress" value="0" max="100">0%</progress>
                            </div>
                            <div class="" id="amenitiesList">
                                <img id="imageId22" class="img-thumbnail card-img-top" src="images/not_found.png" alt="amenities image ">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 imageScroll">
                        <div id="florplan" class="card">
                            <li>Upload image for <b>About us</b>.</li>
                            <li>Upload only one image.</li>
                            <div class="card-block">
                                <h4 class="card-title">Drop Image Or <button type="button" id="clickiflorplan" class="btn btn-secondary btn-sm">Click here</button></h4>
                                <progress id="progressimage" class="hide progress" value="0" max="100">0%</progress>
                            </div>
                            <div class="" id="florPlanList">
                                <div id="imgNotAvailable"></div>
                                <img id="imageId" class="img-thumbnail card-img-top" src="images/not_found.png" alt="Card image cap">
                            </div>
                        </div>


                    </div>
                    <div class="col-sm-4 imageScroll">
                        <div id="imageother" class="card">
                            <li>Upload image <b>other</b>.</li>
                            <li>Upload only one image.</li>
                            <div class="card-block">
                                <h4 class="card-title">Drop Image Or <button type="button" id="clickother" class="btn btn-secondary btn-sm">Click here</button></h4>
                                <progress id="progressimage" class="hide progress" value="0" max="100">0%</progress>
                            </div>
                            <div class="" id="other">
                                <img id="imageId" class="img-thumbnail card-img-top" src="images/not_found.png" alt="Card image cap">
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div> 
<script src="js/website/index.js"></script>
<style>
    .imageScroll{
        /*overflow-y: auto;*/
        height: 300px;
        overflow-y: hidden;
        overflow-y: scroll;
    }
</style>