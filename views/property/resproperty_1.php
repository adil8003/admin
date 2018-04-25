<?php
//$this->title = Yii::t('app', 'Dashboard');
//echo  $objUser->username ;
?>
<!--<div class="container">
        <form method="POST" action="index.php?r=site/verification">
        <div class="signin row">
                <h3 class="card-title text-center">Business Management Solutions</h3>
                <div class="col-sm-12">
                        <div class="card card-block">
                                <p class="card-text text-center"><i class="fa fa-user fa-fw fa-5x"></i></p>
                                <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                        <input type="text" class="form-control" placeholder="Username">
                                </div>
                                <p class="card-text"></p>
                                <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-unlock-alt"></i></span>
                                        <input type="text" class="form-control" placeholder="Password">
                                </div>
                                <p class="card-text"></p>
                                <button type="submit" class="btn btn-primary btn-sm btn-block">Sign in</button>
                        </div>
                </div>
        </div>
        </form>
</div> <!-- /container-->

<?php
$this->title = Yii::t('app', 'Residential Property');
?>
<!-- Nav Bar- start-->
<div class="container">
    <ul class="nav nav-tabs" role="tablist" id="Property">
        <li class="nav-item">
            <a class="nav-link" href="#project" role="tab" data-toggle="tab" aria-controls="project">Project</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#cost" role="tab" data-toggle="tab" aria-controls="cost">Cost</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#typeofproperty" role="tab" data-toggle="tab" aria-controls="typeofproperty">Type of properties</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#amaneties" role="tab" data-toggle="tab" aria-controls="amaneties">Amaneties</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#geolocation" role="tab" data-toggle="tab" aria-controls="geolocation">Geo location</a>
        </li>
    </ul>
    <!-- Nav Bar- start-->

    <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="project"> <!-- /tab-panel -list -->
            <h2>Project</h2>
            <form id="Viewproject">
                <div class="form-group row control-group">
                    <label for="Username" class="col-sm-2 form-control-label">Year of Construct</label>
                    <div class="col-sm-10">
                        <input  type="text" class="form-control input-sm" id="yearofconst" name="yearofconst" value="" placeholder="Year of Construct" >
                        <p id="err-yearofconst" class="text-danger"></p>
                    </div>
                </div>
               
                <div class="form-group row control-group">
                    <label for="Possion" class="col-sm-2 form-control-label">Year of expt possion</label>
                    <div class="col-sm-10">
                        <input  type="text" class="form-control input-sm" id="yearofpossion" name="yearofpossion" value="" placeholder="Year of expt possion" >
                        <p id="err-yearofpossion" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group ">
                    <label for="Ownership" class="col-sm-2 form-control-label">Ownership type</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="ownershiptype" name="ownershiptype" placeholder="- Select Ownership type -">
                            <option>Free hold</option>
                            <option>leasejold</option>
                            <option>Power of attorney</option>
                            <option>Cooperative society</option>
                        </select>
                        <p id="err-ownershiptype" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Towers" class="col-sm-2 form-control-label">No Of Tower</label>
                    <div class="col-sm-10">
                        <input  type="text" class="form-control input-sm" id="noftower" name="towers" value="" placeholder="Towers">
                        <p id="err-towers" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Towers" class="col-sm-2 form-control-label">No of Floor</label>
                    <div class="col-sm-10">
                        <input  type="text" class="form-control input-sm" id="towers" name="towers" value="" placeholder="Towers">
                        <p id="err-towers" class="text-danger"></p>
                    </div>
                </div>
                 <div class="form-group row control-group">
                    <label for="Towers" class="col-sm-2 form-control-label">No of Flat Per Floor</label>
                    <div class="col-sm-10">
                        <input  type="text" class="form-control input-sm" id="towers" name="towers" value="" placeholder="Towers">
                        <p id="err-towers" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Row House" class="col-sm-2 form-control-label">No Of Row House</label>
                    <div class="col-sm-10">
                        <input  type="text" class="form-control input-sm" id="rowhouse" name="rowhouse" value="" placeholder="Type of Row House" >
                        <p id="err-rowhouse" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="villa" class="col-sm-2 form-control-label">Villa</label>
                    <div class="col-sm-10">
                        <input  type="text" class="form-control input-sm" id="typeofvilla" name="typeofvilla" value="" placeholder="Type Of Villa" >
                        <p id="err-typeofvilla" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="villa" class="col-sm-2 form-control-label">Commercial Shop</label>
                    <div class="col-sm-10">
                        <input  type="text" class="form-control input-sm" id="typeofvilla" name="typeofvilla" value="" placeholder="Type Of Villa" >
                        <p id="err-typeofvilla" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Comments" class="col-sm-2 form-control-label">Comments</label>
                    <div class="col-sm-10">
                        <textarea class="form-control input-sm" rows="1" id="comments" name="comments" value="" placeholder="Comments" ></textarea>
                        <p id="err-villa" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button onclick="saveProperty();" type="button" class="btn btn-success">Save</button>
                        <button onclick="resetProfile();" type="button" class="btn btn-success">Cancel</button>
                    </div>
                </div>
            </form>
        </div> <!-- /tab-panel archictecture -->

        <div role="tabpanel" class="tab-pane" id="cost"> <!-- /tab-panel -list -->
            <h2>Cost</h2>
            <form id="Newcost">
                <div class="form-group row control-group">
                    <label for="Username" class="col-sm-2 form-control-label">Sale</label>
                    <div class="col-sm-10">
                        <input  type="text" class="form-control input-sm" id="sale" name="sale" value="" placeholder="Per Square Feet" >
                        <p id="err-sale" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Username" class="col-sm-2 form-control-label">New Property</label>
                    <div class="col-sm-10">
                        <input  type="text" class="form-control input-sm" id="newproperty" name="newproperty" value="" placeholder="New Property" >
                        <p id="err-newproperty" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Towers" class="col-sm-2 form-control-label">Resale Property</label>
                    <div class="col-sm-10">
                        <input  type="text" class="form-control input-sm" id="resaleproperty" name="resaleproperty" value="" placeholder="Resale Property">
                        <p id="err-resaleproperty" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Towers" class="col-sm-2 form-control-label">Rent</label>
                    <div class="col-sm-10">
                        <input  type="text" class="form-control input-sm" id="rent" name="rent" value="" placeholder="Rent">
                        <p id="err-rent" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Towers" class="col-sm-2 form-control-label">Type of properties`</label>
                    <div class="col-sm-10">
                        <input  type="text" class="form-control input-sm" id="typeproperty" name="typeproperty" value="" placeholder="Type of properties">
                        <p id="err-typeproperty" class="text-danger"></p>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button onclick="savePropertycost();" type="button" class="btn btn-success">Save</button>
                        <button onclick="resetProfile();" type="button" class="btn btn-success">Cancel</button>
                    </div>
                </div>
            </form>

        </div> <!-- /tab-panel cost -->
        <div role="tabpanel" class="tab-pane" id="typeofproperty"> <!-- /tab-panel -list -->
            <h2>Type of properties</h2>
            <form id="Viewtypeofproperty">
                <div class="form-group row control-group ">
                    <label for="commercialshop" class="col-sm-2 form-control-label">About Property</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="aboutproperty" name="aboutproperty" placeholder="- About Property -">
                            <option>Row House</option>
                            <option>Flat</option>
                            <option>Villa</option>
                            <option>Shop</option>
                        </select>
                        <p id="err-aboutproperty" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group ">
                    <label for="commercialshop" class="col-sm-2 form-control-label">Flat Type</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="flattype" name="flattype" placeholder="- Flat Type -">
                            <option>1 BHK</option>
                            <option>2 BHK</option>
                            <option>2.5 BHK</option>
                            <option>3 BHK</option>
                            <option>Villa</option>
                            <option>Row House</option>
                        </select>
                        <p id="err-flattype" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Username" class="col-sm-2 form-control-label">No Of Bedroom</label>
                    <div class="col-sm-10">
                        <input  type="text" class="form-control input-sm" id="noofbedroom" name="noofbedroom" value="" placeholder="No Of Bedroom" >
                        <p id="err-noofbedroom" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Username" class="col-sm-2 form-control-label">No Of Bathroom </label>
                    <div class="col-sm-10">
                        <input  type="text" class="form-control input-sm" id="noofbathroom" name="noofbathroom" value="" placeholder="No Of Bathroom" >
                        <p id="err-villatype" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Username" class="col-sm-2 form-control-label">No Of balcony </label>
                    <div class="col-sm-10">
                        <input  type="text" class="form-control input-sm" id="noofbbalcony" name="noofbbalcony" value="" placeholder="No Of balcony" >
                        <p id="err-noofbbalcony" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Username" class="col-sm-2 form-control-label">Separate Dinning Space </label>
                    <div class="col-sm-10">
                        <input  type="text" class="form-control input-sm" id="seperatediningspace" name="seperatediningspace" value="" placeholder="Separate Dinning Space" >
                        <p id="err-seperatediningspace" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group ">
                    <label for="commercialshop" class="col-sm-2 form-control-label">Parking</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="parking" name="parking" placeholder="- Select Type Of Parking -">
                            <option>Reverved Parking</option>
                            <option>Common Parking</option>
                            <option>Covered Parking</option>
                            <option>open Parking</option>
                            <option>Villa Parking</option>
                            <option>No Of parking</option>
                        </select>
                        <p id="err-parking" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group ">
                    <label for="commercialshop" class="col-sm-2 form-control-label">Furnish Status</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="furnishingstatus" name="furnishingstatus" placeholder="- Select Commercial Shop -">
                            <option>Fully</option>
                            <option>Semi</option>
                            <option>None</option>
                        </select>
                        <p id="err-furnishingstatus" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Username" class="col-sm-2 form-control-label">Flooring</label>
                    <div class="col-sm-10">
                        <input  type="text" class="form-control input-sm" id="flooring" name="flooring" value="" placeholder="Flooring" >
                        <p id="err-flooring" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Username" class="col-sm-2 form-control-label">Sanction Authority </label>
                    <div class="col-sm-10">
                        <input  type="text" class="form-control input-sm" id="sanctionauthority" name="sanctionauthority" value="" placeholder="Sanction Authority " >
                        <p id="err-sanctionauthority" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group">
                    <label for="verification code">Floor Plan Photo Upload </label>
                    <button> <input type="file" class="btn btn-info" id="floorpic" name="licence_backpic1"></button> 
                     <p id="err-floorpic" class="text-danger"></p>
                </div>

                <div class="form-group row">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button onclick="saveTypeofproperty();" type="button" class="btn btn-success">Save</button>
                        <button onclick="resetProfile();" type="button" class="btn btn-success">Cancel</button>
                    </div>
                </div>
            </form>

        </div> <!-- /tab-panel construction -->
        <div role="tabpanel" class="tab-pane" id="amaneties"> <!-- /tab-panel -list -->
            <h2>Amaneties</h2>Swiming pool
            Garden
            chuildren play 
            Gym
            Temple
            Club house
            Solar system
            Security Doors 
            <form id="Newamaneties">
                <div class="form-group row control-group">
                    <label for="Username" class="col-sm-2 form-control-label">Swiming pool</label>
                    <div class="col-sm-10">
                        <input  type="text" class="form-control input-sm" id="swimingpool" name="swimingpool" value="" placeholder="Per Square Feet" >
                        <p id="err-swimingpool" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Towers" class="col-sm-2 form-control-label">Garden</label>
                    <div class="col-sm-10">
                        <input  type="text" class="form-control input-sm" id="garden" name="garden" value="" placeholder="Garden">
                        <p id="err-garden" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Towers" class="col-sm-2 form-control-label">Gym</label>
                    <div class="col-sm-10">
                        <input  type="text" class="form-control input-sm" id="gym" name="gym" value="" placeholder="Gym ">
                        <p id="err-gym" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Towers" class="col-sm-2 form-control-label">Temple</label>
                    <div class="col-sm-10">
                        <input  type="text" class="form-control input-sm" id="temple" name="temple" value="" placeholder="Temple ">
                        <p id="err-temple" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Towers" class="col-sm-2 form-control-label">Club house</label>
                    <div class="col-sm-10">
                        <input  type="text" class="form-control input-sm" id="clubhouse" name="clubhouse" value="" placeholder="Club house">
                        <p id="err-clubhouse" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Towers" class="col-sm-2 form-control-label">Solar system</label>
                    <div class="col-sm-10">
                        <input  type="text" class="form-control input-sm" id="solarsystem" name="solarsystem" value="" placeholder="Solar system">
                        <p id="err-solarsystem" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Towers" class="col-sm-2 form-control-label">Security Doors</label>
                    <div class="col-sm-10">
                        <input  type="text" class="form-control input-sm" id="securitydoor" name="securitydoor" value="" placeholder="Security Doors">
                        <p id="err-securitydoor" class="text-danger"></p>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button onclick="saveAmaneties();" type="button" class="btn btn-success">Save</button>
                        <button onclick="resetProfile();" type="button" class="btn btn-success">Cancel</button>
                    </div>
                </div>
            </form>
        </div> <!-- /tab-panel feature -->
        <div role="tabpanel" class="tab-pane" id="geolocation"> <!-- /tab-panel -list -->
            <h2>geolocation</h2>Rly sta
            Airport
            Busttand
            Bank
            Hospital
            Multiplex
            School
            College
            Temple
            Market
            Famous place
            <form id="Newamaneties">
                <div class="form-group row control-group">
                    <label for="Username" class="col-sm-2 form-control-label">Railway station</label>
                    <div class="col-sm-10">
                        <input  type="text" class="form-control input-sm" id="railwaystn" name="railwaystn" value="" placeholder="Railway sta" >
                        <p id="err-railwaystn" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Towers" class="col-sm-2 form-control-label">Airport</label>
                    <div class="col-sm-10">
                        <input  type="text" class="form-control input-sm" id="airport" name="airport" value="" placeholder="Airport">
                        <p id="err-airport" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Towers" class="col-sm-2 form-control-label">Hospital</label>
                    <div class="col-sm-10">
                        <input  type="text" class="form-control input-sm" id="hospital" name="hospital" value="" placeholder="Hospital ">
                        <p id="err-hospital" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Towers" class="col-sm-2 form-control-label">Multiplex</label>
                    <div class="col-sm-10">
                        <input  type="text" class="form-control input-sm" id="multiplex" name="multiplex" value="" placeholder="Multiplex ">
                        <p id="err-multiplex" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Towers" class="col-sm-2 form-control-label">School</label>
                    <div class="col-sm-10">
                        <input  type="text" class="form-control input-sm" id="school" name="school" value="" placeholder="School">
                        <p id="err-school" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Towers" class="col-sm-2 form-control-label">College</label>
                    <div class="col-sm-10">
                        <input  type="text" class="form-control input-sm" id="college" name="college" value="" placeholder="College">
                        <p id="err-college" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Towers" class="col-sm-2 form-control-label">Market</label>
                    <div class="col-sm-10">
                        <input  type="text" class="form-control input-sm" id="market" name="market" value="" placeholder="Market">
                        <p id="err-market" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Towers" class="col-sm-2 form-control-label">Temple</label>
                    <div class="col-sm-10">
                        <input  type="text" class="form-control input-sm" id="temple" name="othercharges" value="" placeholder="Temple">
                        <p id="err-temple" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Towers" class="col-sm-2 form-control-label">Famous place</label>
                    <div class="col-sm-10">
                        <input  type="text" class="form-control input-sm" id="famousplace" name="famousplace" value="" placeholder="Famous place">
                        <p id="err-famousplace" class="text-danger"></p>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button onclick="saveGeolocation();" type="button" class="btn btn-success">Save</button>
                        <button onclick="resetProfile();" type="button" class="btn btn-success">Cancel</button>
                    </div>
                </div>
            </form>

        </div> <!-- /tab-panel geolocation -->
        <!--        <div role="tabpanel" class="tab-pane" id="feedback">  /tab-panel -list 
                    <h2>feedback</h2>
                </div>  /tab-panel feedback -->
    </div><!-- /tab-content -->

</div> <!-- /container -->
<style>
    label.valid {
        width: 24px;
        height: 24px;
        background: url(assets/img/valid.png) center center no-repeat;
        display: inline-block;
        text-indent: -9999px;
    }
    label.error {
        font-weight: bold;
        color: red;
        padding: 2px 8px;
        margin-top: 2px;
    }
    .form-group p {
        margin:0px;
    }
</style>
<script type="text/javascript">
    $(document).ready(function() {
        $('#resproject a:first').tab('show');
        $('#tblresproject').DataTable();

        $('#Newproperty .form-control').bind('blur', function() {
            validateProperty();
        });
    }); // end document.ready

    function saveProfile() {
    }
    function resetProfile() {
    }

    function saveProject() {
//        $('#addemployee .form-group input').attr('disabled', 'disabled');
//        $('#addemployee .form-group select').attr('disabled', 'disabled');
//        $('#addemployee .form-group button').attr('disabled', 'disabled');
        if (validateProject()) {
            var obj = new Object();
            obj.yearofconst = $('#yearofconst').val();
            obj.yearofpossion = $('#yearofpossion').val();
            obj.ownershiptype = $('#ownershiptype').val();
            obj.towers = $('#towers').val();
            obj.rowhouse = $('#rowhouse').val();
            obj.villa = $('#villa').val();
            obj.commercialshop = $('#commercialshop').val();
            obj.comment = $('#comment').val();
            $.ajax({
                url: 'index.php?r=humanresource/saveupdateresproperty',
                async: false,
                data: obj,
                type: 'POST',
                success: function(data) {
//                    $('#addemployee .form-group input').removeAttr('disabled');
//                    $('#addemployee .form-group select').removeAttr('disabled');
//                    $('#addemployee .form-group button').removeAttr('disabled');
//                    $('#employee').fnReloadAjax('media/examples_support/json_source2.txt');
                }
            });
        }
    }

    function savePropertycost() {
//        $('#addemployee .form-group input').attr('disabled', 'disabled');
//        $('#addemployee .form-group select').attr('disabled', 'disabled');
//        $('#addemployee .form-group button').attr('disabled', 'disabled');
        if (validateProject()) {
            var obj = new Object();
            obj.sale = $('#sale').val();
            obj.newproperty = $('#newproperty').val();
            obj.resaleproperty = $('#resaleproperty').val();
            obj.rent = $('#rent').val();
            obj.typeproperty = $('#typeproperty').val();
            $.ajax({
                url: 'index.php?r=humanresource/saveupdaterespropertycost',
                async: false,
                data: obj,
                type: 'POST',
                success: function(data) {
//                    $('#addemployee .form-group input').removeAttr('disabled');
//                    $('#addemployee .form-group select').removeAttr('disabled');
//                    $('#addemployee .form-group button').removeAttr('disabled');
//                    $('#employee').fnReloadAjax('media/examples_support/json_source2.txt');
                }
            });
        }
    }
    
     function saveTypeofproperty() {
//        $('#addemployee .form-group input').attr('disabled', 'disabled');
//        $('#addemployee .form-group select').attr('disabled', 'disabled');
//        $('#addemployee .form-group button').attr('disabled', 'disabled');
       // if (validateProject()) {
            var obj = new Object();
            obj.aboutproperty = $('#aboutproperty').val();
            obj.flattype = $('#flattype').val();
            obj.noofbedroom = $('#noofbedroom').val();
            obj.noofbathroom = $('#noofbathroom').val();
            obj.noofbbalcony = $('#noofbbalcony').val();
            obj.seperatediningspace = $('#seperatediningspace').val();
            obj.parking = $('#parking').val();
            obj.furnishingstatus = $('#furnishingstatus').val();
            obj.flooring = $('#flooring').val();
            obj.sanctionauthority = $('#sanctionauthority').val();
            obj.floorpic = $('#floorpic').val();
           
            $.ajax({
                url: 'index.php?r=humanresource/saveupdaterestypeofproperty',
                async: false,
                data: obj,
                type: 'POST',
                success: function(data) {
//                    $('#addemployee .form-group input').removeAttr('disabled');
//                    $('#addemployee .form-group select').removeAttr('disabled');
//                    $('#addemployee .form-group button').removeAttr('disabled');
//                    $('#employee').fnReloadAjax('media/examples_support/json_source2.txt');
                }
            });
       // }
    }
    function saveAmaneties() {
    //        $('#addemployee .form-group input').attr('disabled', 'disabled');
    //        $('#addemployee .form-group select').attr('disabled', 'disabled');
    //        $('#addemployee .form-group button').attr('disabled', 'disabled');
            //if (validateAmaneties()) {
                var obj = new Object();
                obj.swimingpool = $('#swimingpool').val();
                obj.garden = $('#garden').val();
                obj.gym = $('#gym').val();
                obj.temple = $('#temple').val();
                obj.clubhouse = $('#clubhouse').val();
                obj.solarsystem = $('#solarsystem').val();
                obj.securitydoor = $('#securitydoor').val();
                $.ajax({
                    url: 'index.php?r=humanresource/saveupdateresamaneties',
                    async: false,
                    data: obj,
                    type: 'POST',
                    success: function(data) {
    //                    $('#addemployee .form-group input').removeAttr('disabled');
    //                    $('#addemployee .form-group select').removeAttr('disabled');
    //                    $('#addemployee .form-group button').removeAttr('disabled');
    //                    $('#employee').fnReloadAjax('media/examples_support/json_source2.txt');
                    }
                });
            //}
        }
        
         function saveGeolocation() {
//        $('#addemployee .form-group input').attr('disabled', 'disabled');
//        $('#addemployee .form-group select').attr('disabled', 'disabled');
//        $('#addemployee .form-group button').attr('disabled', 'disabled');
        //if (validateGeolocation()) {
            var obj = new Object();
            obj.railwaystn = $('#railwaystn').val();
            obj.airport = $('#airport').val();
            obj.hospital = $('#hospital').val();
            obj.multiplex = $('#multiplex').val();
            obj.school = $('#school').val();
            obj.college = $('#college').val();
            obj.market = $('#market').val();
            obj.templegeo = $('#templegeo').val();
            obj.famousplace = $('#famousplace').val();
            $.ajax({
                url: 'index.php?r=humanresource/saveupdateresgeolocation',
                async: false,
                data: obj,
                type: 'POST',
                success: function(data) {
//                    $('#addemployee .form-group input').removeAttr('disabled');
//                    $('#addemployee .form-group select').removeAttr('disabled');
//                    $('#addemployee .form-group button').removeAttr('disabled');
//                    $('#employee').fnReloadAjax('media/examples_support/json_source2.txt');
                }
            });
        //}
    }
//==========validation===========

    function validateProperty() {
        var flag = true;
        var yearofconst = $('#yearofconst').val();
        var yearofpossion = $('#yearofpossion').val();
//        var ownershiptype = $('#ownershiptype').select2('val');
        var towers = $('#towers').val();
        var rowhouse = $('#rowhouse').val();
        var villa = $('#villa').val()
        var comment = $('#comment').val();

        if (yearofconst == '') {
            $('#err-yearofconst').html('Please Enter Year of Construct`  ');
            var flag = false;
        } else {
            $('#err-username').html('');
        }
        if (yearofpossion == '') {
            $('#err-yearofpossion').html('Enter Year of expt possion');
            var flag = false;
        } else {
            $('#err-yearofpossion').html('');
        }
        if (towers == '') {
            $('#err-towers').html('Enter Towers');
            var flag = false;
        } else {
            $('#err-towers').html('');
        }
        if (rowhouse == '') {
            $('#err-rowhouse').html('Enter Row House');
            var flag = false;
        } else {
            $('#err-rowhouse').html('');
        }
        if (villa == '') {
            $('#err-villa').html('Enter Villa');
            var flag = false;
        } else {
            $('#err-villa').html('');
        }
        if (comment == '') {
            $('#err-comment').html('Select commercial Shop');
            var flag = false;
        } else {
            $('#err-comment`').html('');
        }
        return flag;
    }

</script>
