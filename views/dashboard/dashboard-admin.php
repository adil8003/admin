<?php
$this->title = Yii::t('app', 'Dashboard');
?>
<input type="hidden" id="orgid"  value="<?php ?>"/>
<div class="row">
    <div class="col-md-12">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                     <div class="col-lg-4 col-sm-6">
                        <div class="card" style="min-height:150px">
                            <div class="content">
                                <div class="row">
                                    <div class="col-xs-10">
                                       <div>Res Most Popular </div>
                                    </div>
                                    <div class="col-xs-2">
                                        <p id="resMostPopular">0</p>
                                    </div>
                                    <div class="col-xs-10">
                                       <div>Res fetured projects </div>
                                    </div>
                                     <div class="col-xs-2">
                                        <p id="feturedprojects">0</p>
                                    </div>
                                    <div class="col-xs-10">
                                       <div>Res Most valuable </div>
                                    </div>
                                     <div class="col-xs-2">
                                        <p id="resMostvaluable">0</p>
                                    </div>
                                    <div class="col-xs-10">
                                       <div>Total active </div>
                                    </div>
                                     <div class="col-xs-2">
                                        <p id="resactive">0</p>
                                    </div>
                                    <div class="col-xs-10">
                                       <div>Total inactive </div>
                                    </div>
                                     <div class="col-xs-2">
                                        <p id="resinactive">0</p>
                                    </div>
                                    <div class="col-xs-10">
                                       <div>ALL </div>
                                    </div>
                                     <div class="col-xs-2">
                                        <p id="rescount">0</p>
                                    </div>
                                </div>
                                <!--<hr />-->
<!--                                <div class="stats">
                                    <i id="resMostPopular" class=""></i>  
                                </div>-->
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-sm-6">
                        <div class="card" style="min-height:150px">
                            <div class="content">
                                <div class="row">
                                    <div class="col-xs-4">
                                        <div class="icon-big icon-warning text-center">
                                            <i class="ti-home"></i>
                                        </div>
                                    </div>
                                    <div class="col-xs-8">
                                        <div class="numbers">
                                            <p>.......</p>
                                            <p id="s">0</p>
                                        </div>
                                    </div>
                                </div>
                                <hr />
                                <div class="stats">
                                    <i id="ss" class=""></i>  
                                    <i id="ss" class=""></i>
                                </div>
                            </div>
                        </div>
                    </div>
                   
<!--                    <div class="col-lg-2 col-sm-6">
                        <div class="card" style="min-height:150px">
                            <div class="content">
                                <div class="row">
                                    <div class="col-xs-4">
                                        <div class="icon-big icon-warning text-center">
                                            <i class="ti-home"></i>
                                        </div>
                                    </div>
                                    <div class="col-xs-8">
                                        <div class="numbers">
                                            <p>Res Most valuable</p>
                                            <p id="resMostvaluable">30</p>
                                        </div>
                                    </div>
                                </div>
                                <hr />
                                <div class="stats">
                                    <i id="resMostvaluable" class=""></i>
                                </div>
                            </div>
                        </div>
                    </div>-->

                    <div class="col-lg-2 col-sm-6">
                        <div class="card" style="min-height:150px">
                            <div class="content">
                                <div class="row">
                                    <div class="col-xs-5">
                                        <div class="icon-big icon-success text-center">
                                            <i class="ti-home"></i>
                                        </div>
                                    </div>
                                    <div class="col-xs-7">
                                        <div class="numbers">
                                            <p>Resale</p>
                                            <p id="resalecount">30</p>
                                        </div>
                                    </div>
                                </div>
                                <hr />
                                <div class="stats">
                                    <i id="resaleactive" class=""></i>  
                                    <i id="resaleinactive" class=""></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-sm-6">
                        <div class="card" style="min-height:150px">
                            <div class="content">
                                <div class="row">
                                    <div class="col-xs-4">
                                        <div class="icon-big icon-danger text-center">
                                            <i class="ti-"></i>
                                        </div>
                                    </div>
                                    <div class="col-xs-8">
                                        <div class="numbers">
                                            <p>Customers</p>
                                            <p id="cusCount">0</p>
                                        </div>
                                    </div>
                                </div>
                                <hr />
                                <div class="stats">
                                    <i id="cusactive" class=""></i>  
                                    <i id="cusinactive" class=""></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-sm-6">
                        <div class="card" style="min-height:150px">
                            <div class="content">
                                <div class="row">
                                    <div class="col-xs-5">
                                        <div class="icon-big icon-info text-center">
                                            <i class="ti-mobile"></i>
                                        </div>
                                    </div>
                                    <div class="col-xs-7">
                                        <div class="numbers">
                                            <p>Today Call </p>
                                            <p id="custCount"></p>
                                        </div>
                                    </div>
                                </div>
                                <hr />
                                <div class="stats" id="callList">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-5 ">
                <div class="card">
                    <div class="header">
                    </div>
                    <div class="content">
                        <div class="js-donut-container"></div>

                        <div class="chart-legend">
                            <button type="button"  class="btn btn-danger btn-block" id="flip">Advance Search</button>
                        </div>
                        <hr>
                        <div class="stats">
                            <div id="panel">
                                <form name="form" id="resaleForm">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Property type: <span class="asterik">*</span><span  class="errmsg" id="err-ownername"></span> </label>
                                                <input type="text" name="ownername"  id="ownername"  class="form-control border-input input-sm"
                                                       placeholder="Owener name">
                                            </div>
                                        </div>

                                        <div class="col-md-6 ">
                                            <div class="form-group">
                                                <label for="Branch">Location
                                                    <span class="asterik">*</span>
                                                    <span class="errmsg" id="err-department"></span>
                                                </label>
                                                <select style="width:100%" class="js-example-basic-multiple" placeholder="Select department" id="department" name="department" multiple="multiple" >
                                                    <option value='dd'>dd</option>
                                                    <option value='ss'>kd</option>
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row" style="padding: 5px;">
                                            <div class="col-md-12">
                                                <p>Price: <span id="demo"></span></p>
                                                <div class="slidecontainer">
                                                    <input type="range" min="1" max="100" value="50" class="slider" id="myRange">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <button type="button" onclick="saveResale();" class="btn btn-info btn-fill btn-xs">Search</button>
                                    </div>
                                    <div class="clearfix"></div><br>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-7">
                <div class="card" >
                    <div class="header">
                        <h4 class="title">Result</h4>
                    </div>
                    <div class="content">
                        <div class="chart-legend">
                            <!--<i class="fa fa-circle text-info"></i> Active employees-->
                            <!--<i class="fa fa-circle text-warning"></i>Inactive employees-->
                        </div>
                        <hr>
                        <div class="stats" id="customerCallList">

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="js-bar-container"></div>
                <div class="js-donut-container"></div>
            </div>
        </div>
    </div>
</div>
<script src="js/dashboard/dashboard.js"></script>
<style>
    .slider {
        -webkit-appearance: none;  /* Override default CSS styles */
        appearance: none;
        width: 100%; /* Full-width */
        height: 25px; /* Specified height */
        background: #d3d3d3; /* Grey background */
        outline: none; /* Remove outline */
        opacity: 0.7; /* Set transparency (for mouse-over effects on hover) */
        -webkit-transition: .2s; /* 0.2 seconds transition on hover */
        transition: opacity .2s;
    }

    /* Mouse-over effects */
    .slider:hover {
        opacity: 1; /* Fully shown on mouse-over */
    }

    /* The slider handle (use -webkit- (Chrome, Opera, Safari, Edge) and -moz- (Firefox) to override default look) */ 
    .slider::-webkit-slider-thumb {
        -webkit-appearance: none; /* Override default look */
        appearance: none;
        width: 25px; /* Set a specific slider handle width */
        height: 25px; /* Slider handle height */
        background: #4CAF50; /* Green background */
        cursor: pointer; /* Cursor on hover */
    }

    .slider::-moz-range-thumb {
        width: 25px; /* Set a specific slider handle width */
        height: 25px; /* Slider handle height */
        background: #4CAF50; /* Green background */
        cursor: pointer; /* Cursor on hover */
    }
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

