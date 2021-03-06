<?php
$this->title = Yii::t('app', 'Resale image');
$id = (isset($_GET['id'])) ? $_GET['id'] : 0;
?>
<input type="hidden" id="resaleid" value="<?php echo $id; ?>" />
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="header">
                <h4 class="title">Resale Project Images 
                    <span>
                        <div class="btn-group pull-right">
                            <a href="index.php?r=resale/" type="button" class="btn btn-info btn-wd btn-fill btn-xs ">Back</a>
                        </div>
                    </span>
                </h4>
                <hr>
                <div class="row"> 
                    <div class="col-sm-4  imageScroll">
                        <div id="imageamaneti" class="card">
                            <li>Upload image for <b>amaneties</b>.</li>
                            <li>Upload only one image.</li>
                            <div class="card-block">
                                <h4 class="card-title">Drop Image Or <button type="button" id="clickimageamaneti" class="btn btn-secondary btn-sm">Click here</button></h4>
                                <progress id="progressimage" class="hide progress" value="0" max="100">0%</progress>
                            </div>
                            <div class="" id="amenitiesList">
                                <img id="imageId" class="img-thumbnail card-img-top" src="images/logo.png" alt="Card image cap">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 imageScroll">
                        <div id="florplan" class="card">
                            <li>Upload image for <b>floor plan</b>.</li>
                            <li>Upload only one image.</li>
                            <div class="card-block">
                                <h4 class="card-title">Drop Image Or <button type="button" id="clickiflorplan" class="btn btn-secondary btn-sm">Click here</button></h4>
                                <progress id="progressimage" class="hide progress" value="0" max="100">0%</progress>
                            </div>
                            <div class="" id="florPlanList">
                                <img id="imageId" class="img-thumbnail card-img-top" src="images/logo.png" alt="Card image cap">
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
                                <img id="imageId" class="img-thumbnail card-img-top" src="images/logo.png" alt="Card image cap">
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div> 
<script src="js/resale/image.js"></script>
<style>
    .imageScroll{
        /*overflow-y: auto;*/
        height: 300px;
        overflow-y: hidden;
        overflow-y: scroll;
    }
</style>