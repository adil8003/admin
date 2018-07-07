<?php
$this->title = Yii::t('app', 'Settings');
?>
<input type="hidden" id="userid"  value="<?php echo yii::$app->session['userid'] ?>"/>
<div class="row" >
    <div class="card" id="" >
        <div class="header">
            <h5 class="title">Course  List  <span>
                    <!--                    <div class="border-input input-md btn btn-info btn-fill btn-xs btn-wd pull-right">
                                            <select onchange="CardBox();" id="box" class=" border-input input-md btn btn-info btn-fill btn-xs btn-wd" style="margin: -4px;">
                                                <option value="Active">Change layout</option>
                                                <option  value="1">Card box</option>
                                                <option value="2">Horizontal card</option>
                                            </select>
                                        </div>-->
                </span> </h5>
        </div>
        <hr>
        <div class="col-xs-12">
            <div class="row">
                <div class="col-md-4" id="">
                    <div id="f1_container">
                        <div id="f1_card" class="shadow">
                            <div class="front face">
                                <img style="width: 100%;" src="https://udemy-images.udemy.com/course/240x135/756150_c033_2.jpg">
                                <p class="js-topic">JavaScript</p>
                            </div>
                            <div class="back face center">
                                <p>This is nice for exposing more information about an image.</p>
                                <p>Any content can go here.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4" id="">
                    <div id="f1_container">
                        <div id="f1_card" class="shadow">
                            <div class="front face">
                                <img style="width: 100%;"  src="https://udemy-images.udemy.com/course/240x135/756150_c033_2.jpg">
                                <p class="js-topic">JavaScript</p>
                            </div>
                            <div class="back face center">
                                <p>This is nice for exposing more information about an image.</p>
                                <p>Any content can go here.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4" id="">
                    <div id="f1_container">
                        <div id="f1_card" class="shadow">
                            <div class="front face">
                                <img style="width: 100%;"  src="https://udemy-images.udemy.com/course/240x135/756150_c033_2.jpg">
                                <p class="js-topic">JavaScript</p>
                            </div>
                            <div class="back face center">
                                <p>This is nice for exposing more information about an image.</p>
                                <p>Any content can go here.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<style>
    #f1_container {
        position: relative;
        /*margin: 10px auto;*/
        /*width: 350px;*/
        height: 181px;
        z-index: 1;
    }
    #f1_container {
        perspective: 1000;
    }
    #f1_card {
        width: 100%;
        height: 100%;
        transform-style: preserve-3d;
        transition: all 1.0s linear;
    }
    #f1_container:hover #f1_card {
        transform: rotateY(180deg);
        box-shadow: -5px 5px 5px #aaa;
    }
    .face {
        position: absolute;
        width: 100%;
        height: 100%;
        backface-visibility: hidden;
    }
    .face.back {
        display: block;
        transform: rotateY(180deg);
        box-sizing: border-box;
        padding: 10px;
        color: white;
        text-align: center;
        background-color: #aaa;
    }
    .topic-thumbnail {
        margin-right: 15px;
        height: 90px;
        width: 92px;
        overflow: hidden;
    }/*
*
    .tutorial--flex-grid {
        margin: 0 -10px;
    }
    .tutorial--flex-grid .card-outer a {
        color: #383838;
    }*/
    .hackr--flex-grid .card-outer a {
        word-break: break-all;
        font-size: 14px;
        border-radius: 3px;
        color: #383838;
        border: 1px solid #eee;
    }/*
    .topic-grid-item, .topic-grid-item:hover {
        background-color: #fff;
        transition: all .1s linear;
    }*/
    .topic-grid-item {
        /*padding: 15px;/*/
        display: flex;
        min-height: 20px;
        align-items: center;
        justify-content: flex-start;
        flex-direction: row;
        border: none;
        margin-bottom: 17px;
        border-radius: 6px;
        box-shadow: 0 1px 2px rgba(0,0,0,.1);
    }


    ul{ list-style: none;
        margin: 0;
        padding: 0;
    }
    .subfont{
        font-size: 14px;
        font-weight: 500;
        letter-spacing: .4px;
    }
    .sub{
        font-size: 15px !important;
        font-weight: 700 !important;
        line-height: 18px !important;
    }
    .search-course-card--card__inner--1tkPf {
        border: 1px solid #dedfe0;
        border-radius: 2px 2px 0 0;
        /*position: relative;*/
        padding-right: 30px;
        background-color: #fff;
        /*min-height: 132px;*/
        display: flex;
    }
    .search-course-card--card--left-col--3kKip {
        width: 260px;
        /*margin-right: 30px;*/
    }

    a {
        color: #007791;
        font-weight: 400;
    }
    .fx {
        flex: 1;
        min-width: 1px;
    }
    .search-course-card--card__title--1moSD h1 {
        font-size: 15px !important;
        font-weight: 700 !important;
        color: #29303b !important;
        margin: 0 !important;
        padding: 0 !important;
        line-height: 18px !important;
    }
    .search-course-card--card__content--3-BSH {
        height: auto;
        flex: 1;
        min-width: 1px;
        align-items: stretch;
        display: flex;
        padding-bottom: 10px;
    }
    .search-course-card--card__subtitle--CBRzq {
        font-size: 13px !important;
        color: #505763;
        margin: 5px 0 0;
    }
    .search-course-card--card__head--2X4bl {
        padding-top: 10px;
    }
</style>
