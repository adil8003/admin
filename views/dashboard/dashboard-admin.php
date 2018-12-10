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
                <div class="col-md-12">
                    <div class="card" >
                        <div class="header">
                            <!--<h4 class="title">Result</h4>-->
                            <form>
                                <input type="file" class="" name="file" id="file" value="Import csv file"><span><button type="button" onclick="saveCsvData();" class="btn btn-info btn-fill btn-xs">SAVE</button></span>

                            </form>
                        </div>
                        <div class="content">


                            <div class="tab">
                                <button class="tablinks" onclick="openCity(event, 'All')">All data count</button>
                                <button class="tablinks" onclick="openCity(event, '10k')">Data assign to builder</button>
                                <button class="tablinks" onclick="openCity(event, '20k')">Calling data</button>
                                <button class="tablinks" onclick="openCity(event, '30k')">Data assign to internal emp</button>
                                <button class="tablinks" onclick="openCity(event, '40k')">40K-50K</button>
                                <!--<button class="tablinks" onclick="openCity(event, '50k')">50Ks</button>-->
                            </div>

                            <div id="All" class="tabcontent">
                                <!--<h3>0-10K</h3>-->
                                <div class="row">
                                    <div class="col-md-4">
                                        <form name="form" id="resaleForm">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <!--<div class="form-group">
                                                        <label>0-10K: <span class="asterik">*</span><span  class="errmsg" id="err-message"></span> </label>
                                                        <input type="text" readonly="" name="type" value="10" id="type"  class="form-control border-input input-sm"
                                                               placeholder="message">
                                                    </div>-->
                                                    <div class="form-control">
                                                        <select class="form-control border-input input-sm" id="type" name="type" style="    height: 40px; margin-top: -13px;width: 115%;margin-left: -19px;margin-top: -6px;
                                                                " >
                                                            <option value="10">0-10k</option>
                                                            <option value="20">10-20k</option>
                                                            <option value="30">20-30k</option>
                                                            <option value="40">30-40k</option>
                                                            <option value="50">40-50k</option>
                                                        </select>
                                                    </div>


                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label> Campaign name: <span class="asterik">*</span><span  class="errmsg" id="err-message"></span> </label>
                                                        <input type="text" name="campaign"  id="campaign"  class="form-control border-input input-sm"
                                                               placeholder="message">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Message: <span class="asterik">*</span><span  class="errmsg" id="err-message"></span> </label>
                                                        <textarea type="text"  class="form-control border-input input-sm" id="message" name="message" placeholder="campaign name"></textarea>                                                    </div>
                                                </div>
                                            </div>

                                            <div class="text-center">
                                                <button type="button" onclick="saveCampaign();" class="btn btn-info btn-fill btn-xs">Send msg</button>
                                            </div>
                                            <div class="clearfix"></div><br>
                                        </form>
                                    </div>
                                    <div class="col-md-8">
                                        <p>8-10 ->  14875 </p>
                                        <p>10-15 -> 22881</p>
                                        <p>15-20 -> 9523</p>
                                        <p>20-25 ->  4178</p>
                                        <p>25-30 ->  2035</p>
                                        <p>30-35 ->  4178</p>
                                        <p>35-40 ->  629</p>
                                        <p>40-45 ->  407</p>
                                        <p>45-50 ->  249</p>
                                        <hr>
                                        <p>10-20 ->  30925</p>
                                        <p>10-25 ->  34262</p>
                                        <p>10-30 ->  35817</p>
                                        <p>15-25 ->  12860</p>
                                    </div>
                                </div>

                            </div>

                            <div id="10k" class="tabcontent">
                                <!--<h3>10K-20k salary</h3>-->
                                <div id="alert-msg" class="alert"> </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <form name="form" id="resaleForm">
                                            <label> <span class="asterik"></span><span  class="errmsg" id="err-bname"></span> </label>
                                            <input type="text" name="bname"  id="bname"  class="form-control border-input input-sm"
                                                   placeholder="Enter Builder Name">
                                            <div class="text-center">
                                                <button type="button" onclick="saveBuilders();" class="btn btn-info btn-fill btn-xs">Save</button>
                                            </div>
                                        </form>  
                                    </div>
                                    <div class="col-md-6">
                                        <form>
                                            <input type="file" class="" name="file" id="file1" value="Import csv file"><span><button type="button" onclick="saveVoiceCallData();" class="btn btn-info btn-fill btn-xs">SAVE</button></span>

                                        </form>
                                    </div>   

                                </div><hr>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div id="panel">
                                            <form name="form" id="resaleForm">
                                                <div class="row">
                                                    <div class="col-md-6">

                                                        <div class="form-group">
                                                            <label>Min salary: <span class="asterik">*</span><span  class="errmsg" id="err-ownername"></span> </label>
<!--                                                            <input type="text" name="ownername"  id="ownername"  class="form-control border-input input-sm"
                                                                   placeholder="Owener name">-->
                                                            <input type="text" class="form-control border-input input-xm small" id="min" name="min">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">


                                                        <div class="form-group">
                                                            <label>Max salary: <span class="asterik">*</span><span  class="errmsg" id="err-ownername"></span> </label>
<!--                                                            <input type="text" name="ownername"  id="ownername"  class="form-control border-input input-sm"
                                                                   placeholder="Owener name">-->
                                                            <input type="text" class="form-control border-input input-sm" id="max" name="max">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6 ">
                                                        <div class="form-group">
                                                            <label for="Branch">Builders
                                                                <span class="asterik">*</span>
                                                                <span class="errmsg" id="err-department"></span>
                                                            </label>
                                                            <select style="width:100%;padding: 7px 18px;
                                                                    height: 40px;" class="form-control border-input input-sm" id="builderid" name="builderid" style=" padding: 7px 18px; height: 40px;"  placeholder="Select department" id="department" name="department"  >
                                                                <option value='dd'>dd</option>
                                                                <option value='ss'>kd</option>

                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 ">
                                                        <div class="form-group">
                                                            <label for="Branch">Users
                                                                <span class="asterik">*</span>
                                                                <span class="errmsg" id="err-department"></span>
                                                            </label>
                                                            <select style="width:100%;padding: 7px 18px;
                                                                    height: 40px;" class="form-control border-input input-sm" id="userid" name="userid" style=" padding: 7px 18px; height: 40px;"  placeholder="Select department" id="department" name="department"  >
                                                                <option value='dd'>dd</option>
                                                                <option value='ss'>kd</option>

                                                            </select>
                                                        </div>
                                                    </div>
                                                    <!--                                                        <div class="col-md-6">
                                                                                                                <form>
                                                                                                                    <input type="file" class="" name="file" id="file2" value="Import csv file">
                                                    
                                                                                                                </form>
                                                                                                            </div>-->
                                                </div>
                                        </div>
                                        <div class="text-center">
                                            <button type="button" onclick="saveGetComData();" class="btn btn-info btn-fill btn-xs">Save</button>
                                        </div>
                                        <div class="clearfix"></div><br>
                                        </form>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div id="panel">
                                        <p ></p>
                                        <ul id="usersList">
                                            <li><p></p></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="20k" class="tabcontent">
                            <!--<h3>Calling data</h3>-->
                            <hr>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="content table-responsive table-full-width">
                                        <table class="table table-striped" id="tblVoiceCustomer">
                                            <thead>
                                                <tr>
                                                    <td>Minimum price:</td>
                                                    <td><input type="text" class="form-control border-input input-xm small" id="cusmin" name="min"></td>
                                                </tr>
                                                <tr>
                                                    <td>Maximum price:</td>
                                                    <td><input type="text" class="form-control border-input input-sm" id="cusmax" name="max"></td>
                                                </tr>
                                            <!--<th>Name</th>-->
                                            <th>Phone</th>
                                            <!--<th>Email</th>-->
                                            <th>user</th>
                                            <th>builder</th>
                                            <th>Action</th>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                                <div class="col-md-0">

                                </div>
                            </div>
                        </div>
                        <div id="30k" class="tabcontent">
                            <!--<h3>Data assign to internal emp</h3>-->
                            <h6 id="CountData" ></h6>
                            <div class="row">
                                <div class="col-md-6">
                                    <div id="panel">
                                        <form name="form" id="resaleForm">
                                            <div class="row">
                                                <div class="col-md-6">

                                                    <div class="form-group">
                                                        <label>Min salary: <span class="asterik">*</span><span  class="errmsg" id="err-internalmin"></span> </label>
<!--                                                            <input type="text" name="ownername"  id="ownername"  class="form-control border-input input-sm"
                                                               placeholder="Owener name">-->
                                                        <input type="text" onblur="getData();" class="form-control border-input input-xm small" id="internalmin" name="min">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">


                                                    <div class="form-group">
                                                        <label>Max salary: <span class="asterik">*</span><span  class="errmsg" id="err-internalmax"></span> </label>
<!--                                                            <input type="text" name="ownername"  id="ownername"  class="form-control border-input input-sm"
                                                               placeholder="Owener name">-->
                                                        <input type="text" onblur="getData();" class="form-control border-input input-sm" id="internalmax" name="max">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">


                                                    <div class="form-group">
                                                        <label>Emp Limit: <span class="asterik">*</span><span  class="errmsg" id="err-ownername"></span> </label>
<!--                                                            <input type="text" name="ownername"  id="ownername"  class="form-control border-input input-sm"
                                                               placeholder="Owener name">-->
                                                        <input type="text" class="form-control border-input input-sm" id="limitnum" name="limitnum">
                                                    </div>
                                                </div>
                                                <!--                                                        <div class="col-md-6 ">
                                                                                                            <div class="form-group">
                                                                                                                <label for="Branch">Builders
                                                                                                                    <span class="asterik">*</span>
                                                                                                                    <span class="errmsg" id="err-department"></span>
                                                                                                                </label>
                                                                                                                <select style="width:100%;padding: 7px 18px;
                                                                                                                        height: 40px;" class="form-control border-input input-sm" id="builderid" name="builderid" style=" padding: 7px 18px; height: 40px;"  placeholder="Select department" id="department" name="department"  >
                                                                                                                    <option value='dd'>dd</option>
                                                                                                                    <option value='ss'>kd</option>
                                                
                                                                                                                </select>
                                                                                                            </div>
                                                                                                        </div>-->
                                                <div class="col-md-6 ">
                                                    <div class="form-group">
                                                        <label for="Branch">Users
                                                            <span class="asterik">*</span>
                                                            <span class="errmsg" id="err-department"></span>
                                                        </label>
                                                        <select style="width:100%;padding: 7px 18px;
                                                                height: 40px;" class="form-control border-input input-sm" id="internaluserid" name="internaluserid" style=" padding: 7px 18px; height: 40px;"  placeholder="Select department" id="department" name="department"  >
                                                            <option value='dd'>dd</option>
                                                            <option value='ss'>kd</option>

                                                        </select>
                                                    </div>
                                                </div>
                                                <!--                                                        <div class="col-md-6">
                                                                                                            <form>
                                                                                                                <input type="file" class="" name="file" id="file2" value="Import csv file">
                                                
                                                                                                            </form>
                                                                                                        </div>-->
                                            </div>
                                    </div>
                                    <div class="text-center">
                                        <button type="button" onclick="dataAssigntoemp();" class="btn btn-info btn-fill btn-xs">Save</button>
                                    </div>
                                    <div class="clearfix"></div><br>
                                    </form>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div id="panel">
                                    <p ></p>
                                    <ul id="usersList">
                                        <li><p></p></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="40k" class="tabcontent">
                        <h3>40k-50k salary</h3>
                        <p>Tokyo is the capital of Japan.</p>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
<script src="js/dashboard/dashboard.js"></script>
<!--<script src="js/voicecall/index.js"></script>-->
<script type='text/javascript' src='js/common/common.js' ></script>
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

    /* Style the tab */
    .tab {
        overflow: hidden;
        border: 1px solid #ccc;
        background-color: #f1f1f1;
    }

    /* Style the buttons inside the tab */
    .tab button {
        background-color: inherit;
        float: left;
        border: none;
        outline: none;
        cursor: pointer;
        padding: 14px 16px;
        transition: 0.3s;
        font-size: 17px;
    }

    /* Change background color of buttons on hover */
    .tab button:hover {
        background-color: #ddd;
    }

    /* Create an active/current tablink class */
    .tab button.active {
        background-color: #ccc;
    }

    /* Style the tab content */
    .tabcontent {
        display: none;
        padding: 6px 12px;
        border: 1px solid #ccc;
        border-top: none;
    }
</style>
<script>
                                            $(document).ready(function () {
                                            });
                                            function openCity(evt, cityName) {
                                                var i, tabcontent, tablinks;
                                                tabcontent = document.getElementsByClassName("tabcontent");
                                                for (i = 0; i < tabcontent.length; i++) {
                                                    tabcontent[i].style.display = "none";
                                                }
                                                tablinks = document.getElementsByClassName("tablinks");
                                                for (i = 0; i < tablinks.length; i++) {
                                                    tablinks[i].className = tablinks[i].className.replace(" active", "");
                                                }
                                                document.getElementById(cityName).style.display = "block";
                                                evt.currentTarget.className += " active";
                                            }
                                            function saveCampaign() {
                                                alertify.confirm("Are you sure you want run this campaign ?",
                                                        function () {
                                                            var obj = new Object();
                                                            obj.type = $('#type').val();
                                                            obj.campaign = $('#campaign').val();
                                                            obj.message = $('#message').val();
                                                            $.ajax({
                                                                url: "index.php?r=cron/savecampaign",
                                                                async: false,
                                                                type: 'POST',
                                                                data: obj,
                                                                success: function (data) {
                                                                    data = JSON.parse(data);
                                                                    if (data.status == true) {
                                                                        if ($('#type').val() == 10) {
                                                                            sendMsg();
                                                                        }
                                                                    }
                                                                },
                                                                error: function (data) {
                                                                    showMessage('danger', 'Please try again.');
                                                                }
                                                            });
                                                        });
                                            }
                                            function sendMsg() {
//                                                        alertify.confirm("Are you sure you want run this campaign ?",
//                                                                function () {
                                                $.ajax({
                                                    url: "index.php?r=cron/sendbulkmsg",
                                                    async: false,
                                                    type: 'POST',
                                                    success: function (data) {
                                                        data = JSON.parse(data);
                                                        if (data.status == true) {
                                                        }
                                                    },
                                                    error: function (data) {
                                                        showMessage('danger', 'Please try again.');
                                                    }
                                                });
//                                                                });
                                            }
                                            function saveCsvData() {
                                                var formData = new FormData();
                                                formData.append('file', $('#file')[0].files[0]);
                                                alertify.confirm("Are you sure you want add this?",
                                                        function () {
                                                            $.ajax({
                                                                url: "index.php?r=cron/bulkuploadcustomers",
                                                                async: false,
                                                                type: 'POST',
                                                                data: formData,
                                                                processData: false, // tell jQuery not to process the data
                                                                contentType: false, // tell jQuery not to set contentType
                                                                success: function (data) {
                                                                    data = JSON.parse(data);
                                                                    if (data.status == true) {
                                                                    }
                                                                },
                                                                error: function (data) {
                                                                    showMessage('danger', 'Please try again.');
                                                                }
                                                            });
                                                        });
                                            }
</script>

