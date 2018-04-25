<?php
$this->title = Yii::t('app', 'Residential Project');
?>
<!-- Nav Bar- start-->
<div class="container">
    <ul class="nav nav-tabs" role="tablist" id="resproject">
        <li class="nav-item">
            <a class="nav-link" href="#property" role="tab" data-toggle="tab" aria-controls="property">Property</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#owner" role="tab" data-toggle="tab" aria-controls="owner">Owner</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#project" role="tab" data-toggle="tab" aria-controls="project">Project </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#cost" role="tab" data-toggle="tab" aria-controls="cost">Cost</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#typeofproperties" role="tab" data-toggle="tab" aria-controls="typeofproperties">Type of properties</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#amaneties" role="tab" data-toggle="tab" aria-controls="amaneties">Amaneties</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#geolocation" role="tab" data-toggle="tab" aria-controls="geolocation">Geo location</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#feedback" role="tab" data-toggle="tab" aria-controls="feedback">Feedback</a>
        </li>
    </ul>
    <!-- Nav Bar- start-->

    <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="property"> <!-- /tab-panel -list -->
            <h2>Property</h2>
            <form id="addresproject">
                <div class="form-group row control-group">
                    <label for="Name" class="col-sm-2 form-control-label">Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control input-sm" id="res-project-name" name="res-project-name" value="<?php echo $objResproject->name; ?>">
                        <p id="res-project-err-name" class="text-danger"></p>
                    </div>
                </div>
                
                
                <div class="form-group row control-group">
                    <label for="Location" class="col-sm-2 form-control-label">Location</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control input-sm" id="res-project-location" name="res-project-location" value="<?php echo $objResproject->location; ?>">
                        <p id="res-project-err-location" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="City" class="col-sm-2 form-control-label">City</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control input-sm" id="res-project-city" name="res-project-city" value="<?php echo $objResproject->city; ?>">
                        <p id="res-project-err-city" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="State" class="col-sm-2 form-control-label">State</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control input-sm" id="res-project-state" name="res-project-state" value="<?php echo $objResproject->state; ?>">
                        <p id="res-project-err-state" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Pincode" class="col-sm-2 form-control-label">Pincode</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control input-sm" id="res-project-pincode" name="res-project-pincode" value="<?php echo $objResproject->pincode; ?>">
                        <p id="res-project-err-pincode" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Latlong" class="col-sm-2 form-control-label">Latlong</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control input-sm" id="res-project-latlong" name="res-project-latlong" value="<?php echo $objResproject->latlong; ?>">
                        <p id="res-project-err-latlong" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Status" class="col-sm-2 form-control-label">Status</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control input-sm" id="res-project-status" name="res-project-status" value="Active">
                        <p id="res-project-err-status" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-offset-2 col-sm-10">
                        
                        <!--<button onclick="resetResproject();" type="button" class="btn btn-success">Cancel</button>-->
                    </div>
                </div>
            </form>
        </div> <!-- /tab-panel archictecture -->
        <div role="tabpanel" class="tab-pane" id="owner"> <!-- /tab-panel -list -->
            <h2>Owner</h2>
            <form id="updprofile">
                 <div class="form-group row control-group ">
                    <label for="Type" class="col-sm-2 form-control-label">Builder Name</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="buildeid" placeholder="- Select Builder -">
                            <?php
//                            foreach ($objResprojectowner as $key => $value) {
//                                if ($value->id) {
//                                        echo "<option value='$value->id' >" . $value->name . "</option>";
//                                    }
//                                }
                            ?>
                        </select>
                        <p id="err-leavetypeid" class="text-danger"></p>
                    </div>
                </div>
                 <button  onclick="saveResprojectowner();" type="button" class="btn btn-success btnmargin">Save</button><br>
                <div class="form-group row control-group">
                    <label for="Username" class="col-sm-2 form-control-label">Username</label>
                    <div class="col-sm-10">
                        <input disabled="disabled" type="text" class="form-control input-sm" id="username" name="username" value="" >
                        <p id="err-username" class="text-danger"></p>
                    </div>
                </div><br>
                <div class="form-group row control-group">
                    <label for="Email" class="col-sm-2 form-control-label">Email</label>
                    <div class="col-sm-10">
                        <input disabled="disabled" type="email" class="form-control input-sm" id="email" name="email" value="" >
                        <p id="err-email" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Email" class="col-sm-2 form-control-label">Role</label>
                    <div class="col-sm-10">
                        <input disabled="disabled" type="text" class="form-control input-sm" id="role" name="role" value="" >
                        <p id="err-email" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Email" class="col-sm-2 form-control-label">Status</label>
                    <div class="col-sm-10">
                        <input disabled="disabled" type="text" class="form-control input-sm" id="status" name="status" value="" >
                        <p id="err-email" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Email" class="col-sm-2 form-control-label">Joining Date</label>
                    <div class="col-sm-10">
                        <input disabled="disabled" type="text" class="form-control input-sm" id="date" name="date" value="" >
                        <p id="err-email" class="text-danger"></p>
                    </div>
                </div>
<!--                <div class="form-group row">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button onclick="saveProfile();" type="button" class="btn btn-success">Save</button>
                        <button onclick="resetProfile();" type="button" class="btn btn-success">Cancel</button>
                    </div>
                </div>-->
            </form>
        </div> <!-- /tab-panel owner -->
        <div role="tabpanel" class="tab-pane" id="project"> <!-- /tab-panel -list -->
            <input type="hidden" value="<?= $objResproject->id; ?>" id="resprojectid">
            <h2>project</h2>
            <form id="Viewproject">
                <div class="form-group row control-group">
                    <label for="Username" class="col-sm-2 form-control-label">Year of Construct</label>
                    <div class="col-sm-10">
                        <input  type="text" class="form-control input-sm" value="<?php echo $objResprojectproject->yearofconstruct; ?>" id="yearofconstruct" name="yearofconstruct"  placeholder="Year of Construct" >
                        <p id="err-yearofconst" class="text-danger"></p>
                    </div>
                </div>
               
                <div class="form-group row control-group">
                    <label for="Possion" class="col-sm-2 form-control-label">Year of expt possion</label>
                    <div class="col-sm-10">
                        <input  type="text" class="form-control input-sm" value="<?php echo $objResprojectproject->yearofpossion; ?>" id="yearofpossion" name="yearofpossion" value="" placeholder="Year of expt possion" >
                        <p id="err-yearofpossion" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group ">
                    <label for="Ownership" class="col-sm-2 form-control-label">Ownership type</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="ownershiptype" id="ownershiptypeid" name="ownershiptypeid" placeholder="- Select Ownership type -">
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
                        <input  type="text" class="form-control input-sm" value="<?php echo $objResprojectproject->nooftower ?>" id="noftower" name="towers" value="" placeholder="Towers">
                        <p id="err-towers" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Towers" class="col-sm-2 form-control-label">No of Floor</label>
                    <div class="col-sm-10">
                        <input  type="text" class="form-control input-sm" value="<?php echo $objResprojectproject->nooffloor ?>" id="nooffloor" name="nooffloor" value="" placeholder="Towers">
                        <p id="err-towers" class="text-danger"></p>
                    </div>
                </div>
                 <div class="form-group row control-group">
                    <label for="Towers" class="col-sm-2 form-control-label">No of Flat Per Floor</label>
                    <div class="col-sm-10">
                        <input  type="text" class="form-control input-sm" value="<?php echo $objResprojectproject->noofflatperfloor ?>" id="noofflatperfloor" name="noofflatperfloor" value="" placeholder="Towers">
                        <p id="err-towers" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Row House" class="col-sm-2 form-control-label">No Of Row House</label>
                    <div class="col-sm-10">
                        <input  type="text" class="form-control input-sm" value="<?php echo $objResprojectproject->noofrowhouse ?>" id="noofrowhouse" name="noofrowhouse"  placeholder="Type of Row House" >
                        <p id="err-rowhouse" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="villa" class="col-sm-2 form-control-label">Villa</label>
                    <div class="col-sm-10">
                        <input  type="text" class="form-control input-sm" value="<?php echo $objResprojectproject->villa ?>" id="villa" name="villa" value="" placeholder="Type Of Villa" >
                        <p id="err-typeofvilla" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="villa" class="col-sm-2 form-control-label">Commercial Shop</label>
                    <div class="col-sm-10">
                        <input  type="text" class="form-control input-sm" value="<?php echo $objResprojectproject->commercialshop ?>" id="commercialshop" name="commercialshop" value="" placeholder="Type Of Villa" >
                        <p id="err-typeofvilla" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Comments" class="col-sm-2 form-control-label">Comments</label>
                    <div class="col-sm-10">
                        <textarea class="form-control input-sm" rows="1" value="<?php echo $objResprojectproject->comment ?>" id="comment" name="comment"  placeholder="Comments" ></textarea>
                        <p id="err-villa" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button onclick="saveProject();" type="button" class="btn btn-success">Save</button>
                        <button onclick="resetProfile();" type="button" class="btn btn-success">Cancel</button>
                    </div>
                </div>
            </form>
        </div> <!-- /tab-panel archictecture -->
        <div role="tabpanel" class="tab-pane" id="cost"> <!-- /tab-panel -list -->
            <h2>Cost</h2>
            <form id="Newcost">
                <div class="form-group row control-group">
                    <label for="Username" class="col-sm-2 form-control-label">Per Square Feet</label>
                    <div class="col-sm-10">
                        <input  type="text" class="form-control input-sm" id="persquarefeet" value="<?php echo $objResprojectcost->persquarefeet; ?>" name="persquarefeet" value="" placeholder="Per Square Feet" >
                        <p id="err-persquarefeet" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Towers" class="col-sm-2 form-control-label">Other Charges</label>
                    <div class="col-sm-10">
                        <input  type="text" class="form-control input-sm" value="<?php echo $objResprojectcost->othercharges; ?>" id="othercharges" name="othercharges"  placeholder="Other Charges">
                        <p id="err-othercharges" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Towers" class="col-sm-2 form-control-label">Total Charges</label>
                    <div class="col-sm-10">
                        <textarea class="form-control input-sm" id="totalcharges" value="<?php echo $objResprojectcost->totalcharges; ?>" name="totalcharges"  placeholder="Comment"><?php echo $objResprojectcost->totalcharges; ?></textarea>
                        <p id="err-costcomment" class="text-danger"></p>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button onclick="saveCost();" type="button" class="btn btn-success">Save</button>
                        <button onclick="resetProfile();" type="button" class="btn btn-success">Cancel</button>
                    </div>
                </div>

            </form>
        </div> <!-- /tab-panel cost -->
        <div role="tabpanel" class="tab-pane" id="typeofproperties"> <!-- /tab-panel -list -->
            <h2>Type of properties</h2><br>
            <form id="Viewtypeofproperty">
                <div class="form-group row control-group">
                    <label for="Username" class="col-sm-2 form-control-label"> RK Flat</label>
                    <div class="col-sm-10">
                        <input  type="text" class="form-control input-sm" id="rkflat" name="rkflat" value="" placeholder="Please enter  RK flat" >
                        <p id="err-rkflat" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Username" class="col-sm-2 form-control-label">1 BHK </label>
                    <div class="col-sm-10">
                        <input  type="text" class="form-control input-sm" id="onebhk" name="onebhk" value="" placeholder="Please Enter 1BHK " >
                        <p id="err-onebhk" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Username" class="col-sm-2 form-control-label">2 BHK </label>
                    <div class="col-sm-10">
                        <input  type="text" class="form-control input-sm" id="twobhk" name="twobhk" value="" placeholder="Please Enter 2BHK" >
                        <p id="err-twobhk" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Username" class="col-sm-2 form-control-label">2.5 BHK </label>
                    <div class="col-sm-10">
                        <input  type="text" class="form-control input-sm" id="tp5bhk" name="tp5bhk" value="" placeholder="Please Enter 2.5BHK" >
                        <p id="err-tp5bhk" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Username" class="col-sm-2 form-control-label">3 BHK </label>
                    <div class="col-sm-10">
                        <input  type="text" class="form-control input-sm" id="threebhk" name="threebhk" value="" placeholder="Please Enter 3BHK" >
                        <p id="err-threebhk" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Username" class="col-sm-2 form-control-label">Row Houses </label>
                    <div class="col-sm-10">
                        <input  type="text" class="form-control input-sm" id="rowhose" name="rowhose" value="" placeholder="Please Row House" >
                        <p id="err-rowhose" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Username" class="col-sm-2 form-control-label">Type of Villa </label>
                    <div class="col-sm-10">
                        <input  type="text" class="form-control input-sm" id="villatype" name="villatype" value="" placeholder="Please Enter Type Of Villa" >
                        <p id="err-villatype" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group">
                    <label for="verification code">Upload photo </label>
                    <button> <input type="file" class="btn btn-info" id="propertyimg" name="licence_backpic1"></button> 
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
                        <input  type="text" class="form-control input-sm" value="<?php echo $objResprojectamaneties->swimingpool ?>" id="swimingpool" name="swimingpool" value="" placeholder="Swiming pool" >
                        <p id="err-swimingpool" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Towers" class="col-sm-2 form-control-label">Garden</label>
                    <div class="col-sm-10">
                        <input  type="text" class="form-control input-sm" value="<?php echo $objResprojectamaneties->garden ?>" id="garden" name="garden" value="" placeholder="Garden">
                        <p id="err-garden" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Towers" class="col-sm-2 form-control-label">Gym</label>
                    <div class="col-sm-10">
                        <input  type="text" class="form-control input-sm" value="<?php echo $objResprojectamaneties->gym ?>" id="gym" name="gym" value="" placeholder="Gym ">
                        <p id="err-gym" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Towers" class="col-sm-2 form-control-label">Temple</label>
                    <div class="col-sm-10">
                        <input  type="text" class="form-control input-sm" id="temple" value="<?php echo $objResprojectamaneties->temple ?>" name="temple" value="" placeholder="Temple ">
                        <p id="err-temple" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Towers" class="col-sm-2 form-control-label">Club house</label>
                    <div class="col-sm-10">
                        <input  type="text" class="form-control input-sm" id="clubhouse" value="<?php echo $objResprojectamaneties->clubhouse ?>" name="clubhouse" value="" placeholder="Club house">
                        <p id="err-clubhouse" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Towers" class="col-sm-2 form-control-label">Solar system</label>
                    <div class="col-sm-10">
                        <input  type="text" class="form-control input-sm" id="solarsystem" value="<?php echo $objResprojectamaneties->solarsystem ?>" name="solarsystem" value="" placeholder="Solar system">
                        <p id="err-solarsystem" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Towers" class="col-sm-2 form-control-label">Security Doors</label>
                    <div class="col-sm-10">
                        <input  type="text" class="form-control input-sm" id="securitydoor" value="<?php echo $objResprojectamaneties->securitydoor ?>" name="securitydoor" value="" placeholder="Security Doors">
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
            <form id="Newgeolocation">
                <div class="form-group row control-group">
                    <label for="Username" class="col-sm-2 form-control-label">Railway station</label>
                    <div class="col-sm-10">
                        <input  type="text" class="form-control input-sm" id="railwaystn" name="railwaystn" value="" placeholder="Railway station" >
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
                    <label for="Towers" class="col-sm-2 form-control-label">temple</label>
                    <div class="col-sm-10">
                        <input  type="text" class="form-control input-sm" id="templegeo" name="temple" value="" placeholder="Temple">
                        <p id="err-templegeo" class="text-danger"></p>
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
    .btnmargin{    margin-left: 135px;
        
    }
</style>
<script type="text/javascript">
    $(document).ready(function() {
        $('#resproject a:first').tab('show');
        $('#tblresproject').DataTable();

//        $('#Viewproject .form-control').bind('blur', function() {
//            validateProject();
//        });
//        $('#Newcost .form-control').bind('blur', function() {
//            validateCost();
//        });
//        $('#Viewtypeofproperty .form-control').bind('blur', function() {
//            validateTypeofproperty();
//        });
//        $('#Newamaneties .form-control').bind('blur', function() {
//            validateAmaneties();
//        });
//        $('#Newgeolocation .form-control').bind('blur', function() {
//            validateGeolocation();
        //});
    }); // end document.ready

    function saveProfile() {
    }
    function resetProfile() {
    }
    
    
    function saveResprojectowner() {
//        $('#addemployee .form-group input').attr('disabled', 'disabled');
//        $('#addemployee .form-group select').attr('disabled', 'disabled');
//        $('#addemployee .form-group button').attr('disabled', 'disabled');
        //if (validateGeolocation()) {
            var obj = new Object();
            obj.buildeid = $('#buildeid').val();
            obj.resprojectid = $('#resprojectid').val();
            $.ajax({
                url: 'index.php?r=property/saveresprojectowner',
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
    
    
    function saveGeolocation() {
//        $('#addemployee .form-group input').attr('disabled', 'disabled');
//        $('#addemployee .form-group select').attr('disabled', 'disabled');
//        $('#addemployee .form-group button').attr('disabled', 'disabled');
        if (validateGeolocation()) {
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
                url: 'index.php?r=property/saveupdategeolocation',
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
    
    function saveAmaneties() {
//        $('#addemployee .form-group input').attr('disabled', 'disabled');
//        $('#addemployee .form-group select').attr('disabled', 'disabled');
//        $('#addemployee .form-group button').attr('disabled', 'disabled');
        //if (validateAmaneties()) {
            var obj = new Object();
            obj.resprojectid = $('#resprojectid').val();
            obj.swimingpool = $('#swimingpool').val();
            obj.garden = $('#garden').val();
            obj.gym = $('#gym').val();
            obj.temple = $('#temple').val();
            obj.clubhouse = $('#clubhouse').val();
            obj.solarsystem = $('#solarsystem').val();
            obj.securitydoor = $('#securitydoor').val();
            $.ajax({
                url: 'index.php?r=property/saveupdateresprojectamaneties',
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
    
    function saveTypeofproperty() {
//        $('#addemployee .form-group input').attr('disabled', 'disabled');
//        $('#addemployee .form-group select').attr('disabled', 'disabled');
//        $('#addemployee .form-group button').attr('disabled', 'disabled');
        if (validateTypeofproperty()) {
            var obj = new Object();
            obj.rkflat = $('#rkflat').val();
            obj.onebhk = $('#onebhk').val();
            obj.twobhk = $('#twobhk').val();
            obj.tp5bhk = $('#tp5bhk').val();
            obj.threebhk = $('#threebhk').val();
            obj.villatype = $('#villatype').val();
            obj.rowhose = $('#rowhose').val();
            obj.propertyimg = $('#propertyimg').val();
            $.ajax({
                url: 'index.php?r=property/saveupdatetypeofproperty',
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


    function saveProject() {
//        $('#addemployee .form-group input').attr('disabled', 'disabled');
//        $('#addemployee .form-group select').attr('disabled', 'disabled');
//        $('#addemployee .form-group button').attr('disabled', 'disabled');
        //if (validateProject()) {
            var obj = new Object();
            obj.resprojectid = $('#resprojectid').val();
            obj.yearofconstruct = $('#yearofconstruct').val();
            obj.yearofpossion = $('#yearofpossion').val();
            obj.ownershiptypeid = $('#ownershiptypeid').val();
            obj.nooftower = $('#nooftower').val();
            obj.nooffloor = $('#nooffloor').val();
            obj.noofflatperfloor = $('#noofflatperfloor').val();
            obj.noofrowhouse = $('#noofrowhouse').val();
            obj.villa = $('#villa').val();
            obj.commercialshop = $('#commercialshop').val();
            obj.comment = $('#comment').val();
            $.ajax({
                url: 'index.php?r=property/saveupdateresproject',
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

    function saveCost() {
//        $('#addemployee .form-group input').attr('disabled', 'disabled');
//        $('#addemployee .form-group select').attr('disabled', 'disabled');
//        $('#addemployee .form-group button').attr('disabled', 'disabled');
       // if (validateCost()) {
            var obj = new Object();
            obj.resprojectid = $('#resprojectid').val();
            obj.persquarefeet = $('#persquarefeet').val();
            obj.othercharges = $('#othercharges').val();
            obj.totalcharges = $('#totalcharges').val();

            $.ajax({
                url: 'index.php?r=property/saveupdateresprojectcost',
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
    


</script>
