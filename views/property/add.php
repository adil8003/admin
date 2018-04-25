<?php
$this->title = Yii::t('app', 'Add');
?>
<!-- Nav Bar- start-->
<div class="container">
    <ul class="nav nav-tabs" role="tablist" id="add">
        <li class="nav-item">
            <a class="nav-link" href="#resproject" role="tab" data-toggle="tab" aria-controls="resproject">Res Project</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#resproperty" role="tab" data-toggle="tab" aria-controls="resproperty">Res Property</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#comproject" role="tab" data-toggle="tab" aria-controls="comproject">Com Project</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#comproperty" role="tab" data-toggle="tab" aria-controls="comproperty">Com Property </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#builder" role="tab" data-toggle="tab" aria-controls="builder">Builder</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#customer" role="tab" data-toggle="tab" aria-controls="customer">Customer</a>
        </li>
        <!-- <li class="nav-item">
            <a class="nav-link" href="#followup" role="tab" data-toggle="tab" aria-controls="followup">Followup</a>
        </li>  -->       
        <li class="nav-item">
            <a class="nav-link" href="#resaleproperty" role="tab" data-toggle="tab" aria-controls="resaleproperty">Resale Property</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#plots" role="tab" data-toggle="tab" aria-controls="plots">Plots </a>
        </li>
    </ul>
    <!-- Nav Bar- start-->
    <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="resproject"> <!-- /tab-panel -resproject -->
            <h2> New Residential Project</h2>
            <form id="addresproject">
                <div class="form-group row control-group">
                    <label for="Name" class="col-sm-2 form-control-label">Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control input-sm" id="res-project-name" name="res-project-name">
                        <p id="res-project-err-name" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Location" class="col-sm-2 form-control-label">Sub Location</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control input-sm" id="res-project-sublocation" name="res-project-sublocation">
                        <p id="res-project-err-sublocation" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Location" class="col-sm-2 form-control-label">Location</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control input-sm" id="res-project-location" name="res-project-location">
                        <p id="res-project-err-location" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="City" class="col-sm-2 form-control-label">City</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control input-sm" id="res-project-city" name="res-project-city">
                        <p id="res-project-err-city" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="State" class="col-sm-2 form-control-label">State</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control input-sm" id="res-project-state" name="res-project-state" value="Maharashtra">
                        <p id="res-project-err-state" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Pincode" class="col-sm-2 form-control-label">Pincode</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control input-sm" id="res-project-pincode" name="res-project-pincode">
                        <p id="res-project-err-pincode" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Latlong" class="col-sm-2 form-control-label">Latlong</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control input-sm" id="res-project-latlong" name="res-project-latlong">
                        <p id="res-project-err-latlong" class="text-danger"></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-2"><label for="Phone" class=" form-control-label">Expected Price/Rent<span class="text-danger">*</span></label></div>
                    <div class="col-sm-5"> <div class="form-group row control-group" >
                            <select class="form-control input-sm" id="res-price-format" name="res-price-format" style="width: 464px; margin-left: 15px;">
                                <option value="Thousand">Thousand</option>
                                <option value="Lakh">Lakh</option>
                                <option value="Crore">Crore</option>
                            </select>
                            <p id="resaleproperty-err-status" class="text-danger"></p>
                        </div></div>
                    <div class="col-sm-5"><div class="form-group row control-group" >
                            <input type="number" class="form-control input-sm" id="res-project-expectedprice" name="res-project-expectedprice"
                                   value="" style="width: 464px; margin-left: 4px;">
                            <p id="res-project-err-expectedprice" class="text-danger"></p>
                        </div></div>
                </div>
                <div class="form-group row control-group">
                    <label for="Status" class="col-sm-2 form-control-label">Status</label>
                    <div class="col-sm-10">
                        <select class="form-control input-sm" id="res-project-status" name="res-project-status">
                            <option value="Active">Active</option>
                            <option value="Inactive">Inactive</option>
                            <option value="Closed">Closed</option>
                        </select>
                        <p id="res-project-err-status" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Video Link" class="col-sm-2 form-control-label">Video Link</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control input-sm" id="res-project-videolink" name="res-project-videolink">
                        <p id="res-project-err-videolink" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button onclick="saveResproject();" type="button" class="btn btn-success">Save</button>
                        <button onclick="resetResproject();" type="button" class="btn btn-success">Cancel</button>
                    </div>
                </div>
            </form>
        </div> <!-- /tab-panel resproject -->
        <div role="tabpanel" class="tab-pane" id="resproperty"> <!-- /tab-panel -resproperty -->
            <h2>Residential Property</h2>
            <form id="addresproperty">
                <div class="form-group row control-group">
                    <label for="Name" class="col-sm-2 form-control-label">Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control input-sm" id="res-property-name" name="res-property-name">
                        <p id="res-property-err-name" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Sub Location" class="col-sm-2 form-control-label">Sub Location</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control input-sm" id="res-property-sublocation" name="res-property-sublocation">
                        <p id="res-property-err-sublocation" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Location" class="col-sm-2 form-control-label">Location</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control input-sm" id="res-property-location" name="res-property-location">
                        <p id="res-property-err-location" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="City" class="col-sm-2 form-control-label">City</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control input-sm" id="res-property-city" name="res-property-city">
                        <p id="res-property-err-city" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="State" class="col-sm-2 form-control-label">State</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control input-sm" id="res-property-state" name="res-property-state" value="Maharashtra">
                        <p id="res-property-err-state" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Pincode" class="col-sm-2 form-control-label">Pincode</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control input-sm" id="res-property-pincode" name="res-property-pincode">
                        <p id="res-property-err-pincode" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Status" class="col-sm-2 form-control-label">Status</label>
                    <div class="col-sm-10">
                        <select class="form-control input-sm" id="res-property-status" name="res-property-status">
                            <option value="Active">Active</option>
                            <option value="Inactive">Inactive</option>
                        </select>
                        <p id="res-property-err-status" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button onclick="saveResproperty();" type="button" class="btn btn-success">Save</button>
                        <button onclick="resetResproperty();" type="button" class="btn btn-success">Cancel</button>
                    </div>
                </div>
            </form>
        </div> <!-- /tab-panel resproperty -->
        <div role="tabpanel" class="tab-pane" id="comproject"> <!-- /tab-panel -comproject -->
            <h2>Commercial Project</h2>
            <form id="addcomproject">
                <div class="form-group row control-group">
                    <label for="Name" class="col-sm-2 form-control-label">Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control input-sm" id="com-project-name" name="com-project-name">
                        <p id="com-project-err-name" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Name" class="col-sm-2 form-control-label">Agent / Builder Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control input-sm" id="com-project-agentname" name="com-project-agentname">
                        <p id="com-project-err-agentname" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Name" class="col-sm-2 form-control-label">Contact Person Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control input-sm" id="com-project-contactperson" name="com-project-contactperson">
                        <p id="com-project-err-contactperson" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Contact" class="col-sm-2 form-control-label">Contact No.</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control input-sm" id="com-project-contactno" name="com-project-contactno">
                        <p id="com-project-err-contactno" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="eswnsc" class="col-sm-2 form-control-label">Cardinal direction</label>
                    <div class="col-sm-10">
                        <select class="form-control input-sm" id="com-project-ewnsc" name="com-project-ewnsc">
                            <option value="East">East</option>
                            <option value="West">West</option>
                            <option value="North">North</option>
                            <option value="South">South</option>
                            <option value="Central">Central</option>
                        </select>
                        <p id="com-project-err-ewnsc" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Landmark" class="col-sm-2 form-control-label">Landmark</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control input-sm" id="com-project-landmark" name="com-project-landmark">
                        <p id="com-project-err-landmark" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Location" class="col-sm-2 form-control-label">Sub Location</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control input-sm" id="com-project-sublocation" name="com-project-sublocation">
                        <p id="com-project-err-sublocation" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Location" class="col-sm-2 form-control-label">Location</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control input-sm" id="com-project-location" name="com-project-location">
                        <p id="com-project-err-location" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="City" class="col-sm-2 form-control-label">City</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control input-sm" id="com-project-city" name="com-project-city">
                        <p id="com-project-err-city" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="State" class="col-sm-2 form-control-label">State</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control input-sm" id="com-project-state" name="com-project-state" value="Maharashtra">
                        <p id="com-project-err-state" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Pincode" class="col-sm-2 form-control-label">Pincode</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control input-sm" id="com-project-pincode" name="com-project-pincode">
                        <p id="com-project-err-pincode" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Latlong" class="col-sm-2 form-control-label">Latlong</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control input-sm" id="com-project-latlong" name="com-project-latlong">
                        <p id="com-project-err-latlong" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Status" class="col-sm-2 form-control-label">Status</label>
                    <div class="col-sm-10">
                        <select class="form-control input-sm" id="com-project-status" name="com-project-status">
                            <option value="Active">Active</option>
                            <option value="Inactive">Inactive</option>
                            <option value="Closed">Closed</option>
                        </select>
                        <p id="com-project-err-status" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Pincode" class="col-sm-2 form-control-label">Video Link</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control input-sm" id="com-project-videolink" name="com-project-videolink">
                        <p id="com-project-err-videolink" class="text-danger"></p>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button onclick="saveComproject();" type="button" class="btn btn-success">Save</button>
                        <button onclick="resetComproject();" type="button" class="btn btn-success">Cancel</button>
                    </div>
                </div>
            </form>
        </div> <!-- /tab-panel comproject -->
        <div role="tabpanel" class="tab-pane" id="comproperty"> <!-- /tab-panel -comproperty -->
            <h2>Commercial Property</h2>
            <form id="addcomproperty">
                <div class="form-group row control-group">
                    <label for="Name" class="col-sm-2 form-control-label">Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control input-sm" id="com-property-name" name="com-property-name">
                        <p id="com-property-err-name" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Location" class="col-sm-2 form-control-label">Sub Location</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control input-sm" id="com-property-sublocation" name="com-property-sublocation">
                        <p id="com-property-err-sublocation" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Location" class="col-sm-2 form-control-label">Location</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control input-sm" id="com-property-location" name="com-property-location">
                        <p id="com-property-err-location" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="City" class="col-sm-2 form-control-label">City</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control input-sm" id="com-property-city" name="com-property-city">
                        <p id="com-property-err-city" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="State" class="col-sm-2 form-control-label">State</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control input-sm" id="com-property-state" name="com-property-state" value="Maharashtra">
                        <p id="com-property-err-state" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Pincode" class="col-sm-2 form-control-label">Pincode</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control input-sm" id="com-property-pincode" name="com-property-pincode">
                        <p id="com-property-err-pincode" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Latlong" class="col-sm-2 form-control-label">Latlong</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control input-sm" id="com-property-latlong" name="com-property-latlong">
                        <p id="com-property-err-latlong" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Status" class="col-sm-2 form-control-label">Status</label>
                    <div class="col-sm-10">

                        <select class="form-control input-sm" id="com-property-status" name="com-property-status">
                            <option value="Active">Active</option>
                            <option value="Inactive">Inactive</option>
                        </select>
                        <p id="com-property-err-status" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button onclick="saveComproperty();" type="button" class="btn btn-success">Save</button>
                        <button onclick="resetComproperty();" type="button" class="btn btn-success">Cancel</button>
                    </div>
                </div>
            </form>
        </div> <!-- /tab-panel comproperty -->
        <div role="tabpanel" class="tab-pane" id="builder"> <!-- /tab-panel -builder -->
            <h2>Builder</h2>
            <form id="addbuilder">
                <div class="form-group row control-group">
                    <label for="Name" class="col-sm-2 form-control-label">Name<span class="text-danger">*</span></label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control input-sm" id="builder-name" name="builder-name">
                        <p id="builder-err-name" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="CompanyName" class="col-sm-2 form-control-label">Company Name<span class="text-danger">*</span></label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control input-sm" id="builder-companyname" name="builder-companyname">
                        <p id="builder-err-companyname" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="contact" class="col-sm-2 form-control-label">Contact<span class="text-danger">*</span></label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control input-sm" id="builder-contact" name="builder-contact">
                        <p id="builder-err-contact" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="email" class="col-sm-2 form-control-label">Email</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control input-sm" id="builder-email" name="builder-email">
                        <p id="builder-err-email" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="website" class="col-sm-2 form-control-label">Website</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control input-sm" id="builder-website" name="builder-website">
                        <p id="builder-err-website" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="OfficeContact" class="col-sm-2 form-control-label">Office Contact</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control input-sm" id="builder-officecontact" name="builder-officecontact">
                        <p id="builder-err-officecontact" class="text-danger"></p>
                    </div>
                </div>
                <!--                 <div class="form-group row control-group">
                                    <label for="Logopath" class="col-sm-2 form-control-label">Logo</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control input-sm" id="builder-logopath" name="builder-logopath" >
                                        <p id="builder-err-logopath" class="text-danger"></p>
                                    </div>
                                </div>
                                <div class="form-group row control-group">
                                    <label for="picpath" class="col-sm-2 form-control-label">Pic</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control input-sm" id="builder-picpath" name="builder-picpath" >
                                        <p id="builder-err-picpath" class="text-danger"></p>
                                    </div>
                                </div>
                -->
                <div class="form-group row control-group">
                    <label for="description" class="col-sm-2 form-control-label">Description</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control input-sm" id="builder-description" name="builder-description" >
                        <p id="builder-err-description" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Status" class="col-sm-2 form-control-label">Status</label>
                    <div class="col-sm-10">
                        <!-- <input type="text" class="form-control input-sm" id="builder-status" name="builder-status" value="Active"> -->
                        <select class="form-control input-sm" id="builder-status" name="builder-status">
                            <option value="Active">Active</option>
                            <option value="Inactive">Inactive</option>
                        </select>


                        <p id="builder-err-status" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button onclick="saveBuilder();" type="button" class="btn btn-success">Save</button>
                        <button onclick="resetBuilder();" type="button" class="btn btn-success">Cancel</button>
                    </div>
                </div>
            </form>
        </div> <!-- /tab-panel builder -->
        <div role="tabpanel" class="tab-pane" id="customer"> <!-- /tab-panel -customer -->
            <h2>Customer</h2>
            <div id="imageamaneti" class="card">
                <div class="card-block">
                    <button type="button" id="clickimageamaneti" class="btn btn-secondary btn-sm">UPLOAD CSV</button>
                    <progress id="progressimage" class="hide progress" value="0" max="100">0%</progress>
                </div>
            </div>
            <form id="addcustomer">
                <div class="form-group row control-group">
                    <label for="Name" class="col-sm-2 form-control-label">Name<span class="text-danger">*</span></label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control input-sm" id="customer-name" name="customer-name">
                        <p id="customer-err-name" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Phone" class="col-sm-2 form-control-label">Phone<span class="text-danger">*</span></label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control input-sm" id="customer-phone" name="customer-phone">
                        <p id="customer-err-phone" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Email" class="col-sm-2 form-control-label">Email</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control input-sm" id="customer-email" name="customer-email">
                        <p id="customer-err-email" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Location" class="col-sm-2 form-control-label">Sub location</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control input-sm" id="customer-sublocation" name="customer-sublocation">
                        <p id="customer-err-sublocation" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Location" class="col-sm-2 form-control-label">Location</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control input-sm" id="customer-location" name="customer-location">
                        <p id="customer-err-location" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="City" class="col-sm-2 form-control-label">City</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control input-sm" id="customer-city" name="customer-city">
                        <p id="customer-err-city" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Pincode" class="col-sm-2 form-control-label">Pincode</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control input-sm" id="customer-pincode" name="customer-pincode">
                        <p id="customer-err-pincode" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="description" class="col-sm-2 form-control-label">Description</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control input-sm" id="customer-description" name="customer-description" >
                        <p id="customer-err-description" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="description" class="col-sm-2 form-control-label">Added By</label>
                    <div class="col-sm-10">
                        <select class="form-control input-sm" id="customer-addedby" name="customer-addedby">
                            <option value="Admin">Admin</option>
                            <option value="CSV">CSV</option>
                            <option value="Employee">Employee</option>
                        </select>
                        <p id="customer-err-addedby" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="description" class="col-sm-2 form-control-label">Contacted By</label>
                    <div class="col-sm-10">
                        <select class="form-control input-sm" id="customer-contacted_by" name="customer-contacted_by">
                            <option value="Individual">Individual</option>
                            <option value="Agent">Agent</option>
                        </select>
                        <p id="customer-err-contacted_by" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Status" class="col-sm-2 form-control-label">Status<span class="text-danger">*</span></label>
                    <div class="col-sm-10">
                        <select class="form-control input-sm" id="customer-status" name="customer-status">
                            <option value="Active">Active</option>
                            <option value="Inactive">Inactive</option>
                        </select>
                        <p id="customer-err-status" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button onclick="saveCustomer();" type="button" class="btn btn-success">Save</button>
                        <button onclick="resetCustomer();" type="button" class="btn btn-success">Cancel</button>
                    </div>
                </div>
            </form>


        </div> <!-- /tab-panel customer -->


        <div role="tabpanel" class="tab-pane" id="followup"> <!-- /tab-panel -customer -->
            <h2>Followup</h2>

            <form id="addfollowup">
                <div class="form-group row control-group">
                    <label for="Status" class="col-sm-2 form-control-label">Customer<span class="text-danger">*</span></label>
                    <div class="col-sm-10">
                        <?php if (count($objCustomers)) { ?>


                            <select class="form-control input-sm" id="followup-customerid" name="followup-customerid">
                                <?php
                                foreach ($objCustomers AS $rowF) {
                                    echo "<option value='" . $rowF->id . "'>" . $rowF->name . "</td>";
                                }
                                ?>
                            </select>
                            <?php
                        } else {
                            echo "<span class= 'form-control input-sm' id= 'followup-customerid' name='followup-customerid' ><b>PLEASE ADD CUSTOMER FIRST.</b></span>";
                        }
                        ?>

                        <p id="customer-err-status" class="text-danger"></p>
                    </div>
                </div>

                <div class="form-group row control-group">
                    <label for="Status" class="col-sm-2 form-control-label">Project Type<span class="text-danger">*</span></label>
                    <div class="col-sm-10">
                        <select class="form-control input-sm" id="followup-projecttype" name="followup-projecttype">
                            <option value="Residential">Residential</option>
                            <option value="Commercial">Commercial</option>
                            <option value="Resale-Rent">Resale-Rent</option>
                        </select>
                        <p id="customer-err-status" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="title" class="col-sm-2 form-control-label">First Discussuion By</label>
                    <div class="col-sm-10">


                        <select class="form-control input-sm" id="followup-firstdiscussionby" name="followup-firstdiscussionby">
                            <?php
                            foreach ($objUsers AS $rowF) {
                                echo "<option value='" . $rowF->username . "'>" . $rowF->username . "</td>";
                            }
                            ?>
                        </select>


                        <p id="err-firstdiscussionby" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Description" class="col-sm-2 form-control-label">First Remark</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" id="followup-firstremark" name="followup-firstremark" rows="3"placeholder="First Remark"></textarea>
                        <p id="err-firstremark" class="text-danger"></p>
                    </div>
                </div>

                <div class="form-group row control-group">
                    <label for="Description" class="col-sm-2 form-control-label">Followup Date</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="followupdate" 
                               name="followupdate" placeholder="Followup Date">
                        <p id="err-followupdate" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Status" class="col-sm-2 form-control-label">Status<span class="text-danger">*</span></label>
                    <div class="col-sm-10">
                        <select class="form-control input-sm" id="followup-status" name="followup-status">
                            <option value="Active">Active</option>
                            <option value="Inactive">Inactive</option>
                        </select>
                        <p id="customer-err-status" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button onclick="saveFollowup();" type="button" class="btn btn-success">Save</button>
                        <button onclick="resetFollowup();" type="button" class="btn btn-success">Cancel</button>
                    </div>
                </div>
            </form>
        </div> <!-- /tab-panel customer -->
        <div role="tabpanel" class="tab-pane" id="resaleproperty"> <!-- /tab-panel -resaleproperty -->
            <h2>Resale Property</h2>
            <form id="addresaleproperty">
                <div class="form-group row control-group">
                    <label for="Name" class="col-sm-2 form-control-label">Owner's Name<span class="text-danger">*</span></label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control input-sm" id="resaleproperty-ownername" name="resaleproperty-ownername">
                        <p id="resaleproperty-err-ownername" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Name" class="col-sm-2 form-control-label">Owner's Contact<span class="text-danger">*</span></label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control input-sm" id="resaleproperty-contact" name="resaleproperty-contact">
                        <p id="resaleproperty-err-contact" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Status" class="col-sm-2 form-control-label">Project Type<span class="text-danger">*</span></label>
                    <div class="col-sm-10">
                        <select class="form-control input-sm" id="resaleproperty-projecttype" name="resaleproperty-projecttype">
                            <option value="Residential">Residential</option>
                            <option value="Commercial">Commercial</option>
                            <option value="Plot">Plot</option>
                        </select>
                        <p id="resaleproperty-err-projecttype" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Name" class="col-sm-2 form-control-label">Sub Location<span class="text-danger">*</span></label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control input-sm" id="resaleproperty-sublocation" name="resaleproperty-sublocation">
                        <p id="resaleproperty-err-sublocation" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Name" class="col-sm-2 form-control-label">Location<span class="text-danger">*</span></label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control input-sm" id="resaleproperty-location" name="resaleproperty-location">
                        <p id="resaleproperty-err-location" class="text-danger"></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-2"><label for="Phone" class=" form-control-label">Expected Price/Rent<span class="text-danger">*</span></label></div>
                    <div class="col-sm-5"> <div class="form-group row control-group" >
                            <select class="form-control input-sm" id="price-format" name="price-format" style="width: 464px; margin-left: 15px;">
                                <option value="Thousand">Thousand</option>
                                <option value="Lakh">Lakh</option>
                                <option value="Crore">Crore</option>
                            </select>
                            <p id="resaleproperty-err-status" class="text-danger"></p>
                        </div></div>
                    <div class="col-sm-5"><div class="form-group row control-group" >
                            <input type="number" class="form-control input-sm" id="resaleproperty-expectedprice" name="resaleproperty-expectedprice"
                                   value="" style="width: 464px; margin-left: 4px;">
                            <p id="resaleproperty-err-expectedprice" class="text-danger"></p>
                        </div></div>
                </div>
                <div class="form-group row control-group">
                    <label for="Email" class="col-sm-2 form-control-label">Property Type</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control input-sm" id="resaleproperty-propertytype" name="resaleproperty-propertytype">
                        <p id="resaleproperty-err-propertytype" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Location" class="col-sm-2 form-control-label">Age</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control input-sm" id="resaleproperty-age" name="resaleproperty-age">
                        <p id="resaleproperty-err-age" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="City" class="col-sm-2 form-control-label">Other Amenities</label>
                    <div class="col-sm-10">
                        <textarea class="form-control input-sm" id="resaleproperty-otheramenities"  
                                  name="resaleproperty-otheramenities"  placeholder="Other Amenities"></textarea>
                        <p id="resaleproperty-err-otheramenities" class="text-danger"></p>
                    </div>
                </div>

                <div class="form-group row control-group">
                    <label for="Status" class="col-sm-2 form-control-label">RESALE/RENT<span class="text-danger">*</span></label>
                    <div class="col-sm-10">
                        <select class="form-control input-sm" id="resaleproperty-resellrent" name="resaleproperty-resellrent">
                            <option value="Resale">Resale</option>
                            <option value="Rent">Rent</option>
                        </select>
                        <p id="resaleproperty-err-resellrent" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Status" class="col-sm-2 form-control-label">Status<span class="text-danger">*</span></label>
                    <div class="col-sm-10">
                        <select class="form-control input-sm" id="resaleproperty-status" name="resaleproperty-status">
                            <option value="Active">Active</option>
                            <option value="Inactive">Inactive</option>
                            <option value="Closed">Closed</option>
                        </select>
                        <p id="resaleproperty-err-status" class="text-danger"></p>
                    </div>
                </div>

                <div class="form-group row control-group">
                    <label for="Name" class="col-sm-2 form-control-label">Video Link<span class="text-danger">*</span></label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control input-sm" id="resaleproperty-videolink" name="resaleproperty-videolink">
                        <p id="resaleproperty-err-videolink" class="text-danger"></p>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button onclick="saveResaleproperty();" type="button" class="btn btn-success">Save</button>
                        <button onclick="resetResaleproperty();" type="button" class="btn btn-success">Cancel</button>
                    </div>
                </div>
            </form>


        </div> <!-- /tab-panel resaleproperty -->
        <div role="tabpanel" class="tab-pane" id="plots"> <!-- /tab-panel -resaleproperty -->
            <h2>Plots</h2>
            <form id="addresaleproperty">
                <div class="form-group row control-group">
                    <label for="Name" class="col-sm-2 form-control-label">Owner's Name/Agent <span class="text-danger">*</span></label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control input-sm" id="plot-ownername" name="plot-ownername">
                        <p id="resaleproperty-err-ownername" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Name" class="col-sm-2 form-control-label">Owner's Contact<span class="text-danger">*</span></label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control input-sm" id="plot-contact" name="plot-contact">
                        <p id="resaleproperty-err-contact" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="location" class="col-sm-2 form-control-label">Sub Location<span class="text-danger">*</span></label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control input-sm" id="plot-sublocation" name="plot-sublocation">
                        <p id="plot-err-sublocation" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="location" class="col-sm-2 form-control-label">Location<span class="text-danger">*</span></label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control input-sm" id="plot-location" name="plot-location">
                        <p id="plot-err-location" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="landmark" class="col-sm-2 form-control-label">Landmark<span class="text-danger">*</span></label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control input-sm" id="plot-landmark" name="plot-landmark">
                        <p id="resaleproperty-err-landmark" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="zone" class="col-sm-2 form-control-label">Zone<span class="text-danger">*</span></label>
                    <div class="col-sm-10">
                        <select class="form-control input-sm" id="plot-zones" name="plot-zones">
                            <option value="R Zone">R zone</option>
                            <option value="Commercial Zone">Commercial Zone</option>
                            <option value="Industrial Zone">Industrial Zone</option>
                            <option value="Rural Zone">Rural Zone</option>
                        </select>
                        <p id="resaleproperty-err-status" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="areapersquarefeet" class="col-sm-2 form-control-label">Per sqft<span class="text-danger">*</span></label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control input-sm" id="plot-areapersquarefeet" name="plot-areapersquarefeet">
                        <p id="resaleproperty-err-areapersquarefeet" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Status" class="col-sm-2 form-control-label">Sale/j.v/Rent<span class="text-danger">*</span></label>
                    <div class="col-sm-10">
                        <select class="form-control input-sm" id="plot-saleorrent" name="plot-saleorrent">
                            <option value="joint venture">Joint venture</option>
                            <option value="sale">Sale</option>
                            <option value="Rent">Rent</option>
                        </select>
                        <p id="resaleproperty-err-resellrent" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="areaperguntha" class="col-sm-2 form-control-label">Area per guntha<span class="text-danger">*</span></label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control input-sm" id="plot-areaperguntha" name="plot-areaperguntha">
                        <p id="resaleproperty-err-areaperguntha" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="areaperguntha" class="col-sm-2 form-control-label">per acre<span class="text-danger">*</span></label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control input-sm" id="plot-peracre" name="plot-peracre">
                        <p id="resaleproperty-err-peracre" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="areaperguntha" class="col-sm-2 form-control-label">Security deposit<span class="text-danger">*</span></label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control input-sm" id="plot-securitydeposit" name="plot-securitydeposit">
                        <p id="resaleproperty-err-securitydeposit" class="text-danger"></p>
                    </div>
                </div>
                <div class=" row control-group ">
                    <label for="sharingratio" class="col-sm-2 form-control-label">Sharing ratio</label>
                    <div class="col-sm-10">
                        <div class="input-group">
                            <input type="text" class="form-control" id="plot-sharingratiofirst" name="plot-sharingratiofirst"/>
                            <span class="input-group-addon">:</span>
                            <input type="text" class="form-control" id="plot-sharingratiosecond" name="plot-sharingratiosecond"/>
                        </div>
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-sm-2"><label for="Phone" class=" form-control-label">Expected Price/Rent<span class="text-danger">*</span></label></div>
                    <div class="col-sm-5"> <div class="form-group row control-group" >
                            <select class="form-control input-sm" id="price-format" name="price-format" style="width: 464px; margin-left: 15px;">
                                <option value="Thousand">Thousand</option>
                                <option value="Lakh">Lakh</option>
                                <option value="Crore">Crore</option>
                            </select>
                            <p id="resaleproperty-err-status" class="text-danger"></p>
                        </div></div>
                    <div class="col-sm-5"><div class="form-group row control-group" >
                            <input type="number" class="form-control input-sm" id="plot-expectedprice" name="resaleproperty-expectedprice"
                                   value="" style="width: 464px; margin-left: 4px;">
                            <p id="resaleproperty-err-expectedprice" class="text-danger"></p>
                        </div></div>
                </div>
                <div class="form-group row control-group">
                    <label for="City" class="col-sm-2 form-control-label">Details address</label>
                    <div class="col-sm-10">
                        <textarea class="form-control input-sm" id="plot-detailedaddress"  
                                  name="plot-detailedaddress"  ></textarea>
                        <p id="plot-err-detailedaddress" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Status" class="col-sm-2 form-control-label">Status<span class="text-danger">*</span></label>
                    <div class="col-sm-10">
                        <select class="form-control input-sm" id="plot-status" name="plot-status">
                            <option value="Active">Active</option>
                            <option value="Inactive">Inactive</option>
                            <option value="Closed">Closed</option>
                        </select>
                        <p id="plot-err-status" class="text-danger"></p>
                    </div>
                </div>

                <div class="form-group row control-group">
                    <label for="Name" class="col-sm-2 form-control-label">Video Link<span class="text-danger">*</span></label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control input-sm" id="plot-videolink" name="plot-videolink">
                        <p id="resaleproperty-err-videolink" class="text-danger"></p>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button onclick="savePlots();" type="button" class="btn btn-success">Save</button>
                        <button onclick="resetPlots();" type="button" class="btn btn-success">Cancel</button>
                    </div>
                </div>
            </form>


        </div> <!-- /tab-panel resaleproperty -->


    </div><!-- /tab-content -->

</div> <!-- /container -->

<link rel="stylesheet" href="vendor/foundation-date-time-picker/css/foundation-datepicker.min.css"/>
<script src="vendor/foundation-date-time-picker/js/foundation-datepicker.min.js"></script> 

<script type="text/javascript">
                            $(document).ready(function () {
                                $('#add a:first').tab('show');
                                $('#followupdate').fdatepicker({format: 'yyyy-mm-dd'});
                            }); // end document.ready

                            $(document).ready(function () {
                                // Dropzone class:
                                // var id = $('#resprojectid').val();
                                var myDropzone = new Dropzone("#imageamaneti", {
                                    url: "index.php?r=property/uploadcustomercsv",
                                    clickable: '#clickimageamaneti',
                                    previewTemplate: '<div style="display:none"></div>'
                                });
                                myDropzone.on("addedfile", function (file) {
                                    $('#progressimage').removeClass('hide');
                                });
                                myDropzone.on("uploadprogress", function (file, progress, bytesSent) {
                                    $('#progressimage').attr('value', progress);
                                    $('#progressimage').html(bytesSent + ' bytes');
                                });
                                myDropzone.on("complete", function (file) {
                                    $('#progressimage').addClass('hide');

                                    // location.reload();
                                });
                            });
                            function resetResproject() {
                                $('#res-project-name').val('');
                                $('#res-project-location').val('');
                                $('#res-project-sublocation').val('');
                                $('#res-project-city').val('');
                                $('#res-project-state').val('Maharashtra');
                                $('#res-project-pincode').val('');
                                $('#res-project-status').val('Active');
                                $('#res-project-latlong').val('');
                            }
                            function validateResproject() {
                                var flag = true;
                                var name = $('#res-project-name').val();
                                var sublocation = $('#res-project-sublocation').val();
                                var location = $('#res-project-location').val();
                                var city = $('#res-project-city').val();
                                var status = $('#res-project-status').val();
                                if (name == '') {
                                    $('#res-project-err-name').html('Enter name');
                                    var flag = false;
                                } else {
                                    $('#res-project-err-name').html('');
                                }
                                if (sublocation == '') {
                                    $('#res-project-err-sublocation').html('Enter sub location');
                                    var flag = false;
                                } else {
                                    $('#res-project-err-sublocation').html('');
                                }
                                if (location == '') {
                                    $('#res-project-err-location').html('Enter location');
                                    var flag = false;
                                } else {
                                    $('#res-project-err-location').html('');
                                }
                                if (city == '') {
                                    $('#res-project-err-city').html('Enter city');
                                    var flag = false;
                                } else {
                                    $('#res-project-err-city').html('');
                                }
                                if (status == '') {
                                    $('#res-project-err-status').html('Enter status');
                                    var flag = false;
                                } else {
                                    $('#res-project-err-status').html('');
                                }
                                return flag;
                            }
                            function saveResproject() {
                                var price = $('#res-project-expectedprice').val();
                                var priceFormat = $('#res-price-format').val();
                                if (priceFormat == 'Lakh') {
                                    var amt = price * 100000;
                                } else if (priceFormat == 'Thousand') {
                                    var amt = price * 1000;
                                } else if (priceFormat == 'Crore') {
                                    var amt = price * 10000000;
                                }
                                if (validateResproject()) {
                                    alertify.confirm("Are you sure you want to save this project?",
                                            function () {
                                                var obj = new Object();
                                                obj.name = $('#res-project-name').val();
                                                obj.sublocation = $('#res-project-sublocation').val();
                                                obj.location = $('#res-project-location').val();
                                                obj.city = $('#res-project-city').val();
                                                obj.state = $('#res-project-state').val();
                                                obj.pincode = $('#res-project-pincode').val();
                                                obj.status = $('#res-project-status').val();
                                                obj.latlong = $('#res-project-latlong').val();
                                                obj.videolink = $('#res-project-videolink').val();
                                                obj.expectedprice = amt;
                                                $.ajax({
                                                    url: 'index.php?r=property/saveresproject',
                                                    async: false,
                                                    data: obj,
                                                    type: 'POST',
                                                    success: function (data) {
                                                        alertify.alert("Project Saved !!", function () {
                                                        });
                                                    }

                                                });
                                                $('#res-project-name').val('');
                                                $('#res-project-location').val('');
                                                $('#res-project-sublocation').val('');
                                                $('#res-project-city').val('');
                                                $('#res-project-state').val('');
                                                $('#res-project-pincode').val('');
                                                $('#res-project-status').val('');
                                                $('#res-project-latlong').val('');
                                                $('#res-project-videolink').val('');
                                                $('#res-project-expectedprice').val('');
                                            });

                                }

                            }
                            // res property
                            function resetResproperty() {
                                $('#res-property-name').val('');
                                $('#res-property-sublocation').val('');
                                $('#res-property-location').val('');
                                $('#res-property-city').val('');
                                $('#res-property-state').val('Maharashtra');
                                $('#res-property-pincode').val('');
                                $('#res-property-status').val('Active');
                                $('#res-property-latlong').val('');
                            }
                            function validateResproperty() {
                                var flag = true;
                                var name = $('#res-property-name').val();
                                var location = $('#res-property-location').val();
                                var sublocation = $('#res-property-sublocation').val();
                                var city = $('#res-property-city').val();
                                var status = $('#res-property-status').val();
                                if (name == '') {
                                    $('#res-property-err-name').html('Enter name');
                                    var flag = false;
                                } else {
                                    $('#res-property-err-name').html('');
                                }
                                if (sublocation == '') {
                                    $('#res-property-err-sublocation').html('Enter sub location');
                                    var flag = false;
                                } else {
                                    $('#res-property-err-sublocation').html('');
                                }
                                if (location == '') {
                                    $('#res-property-err-location').html('Enter location');
                                    var flag = false;
                                } else {
                                    $('#res-property-err-location').html('');
                                }
                                if (city == '') {
                                    $('#res-property-err-city').html('Enter city');
                                    var flag = false;
                                } else {
                                    $('#res-property-err-city').html('');
                                }
                                if (status == '') {
                                    $('#res-property-err-status').html('Enter status');
                                    var flag = false;
                                } else {
                                    $('#res-property-err-status').html('');
                                }
                                return flag;
                            }

                            function saveResproperty() {
                                if (validateResproperty()) {
                                    alertify.confirm("Are you sure you want to save this project?",
                                            function () {
                                                var obj = new Object();
                                                obj.name = $('#res-property-name').val();
                                                obj.sublocation = $('#res-property-sublocation').val();
                                                obj.location = $('#res-property-location').val();
                                                obj.city = $('#res-property-city').val();
                                                obj.state = $('#res-property-state').val();
                                                obj.pincode = $('#res-property-pincode').val();
                                                obj.status = $('#res-property-status').val();
                                                obj.latlong = $('#res-property-latlong').val();
                                                $.ajax({
                                                    url: 'index.php?r=property/saveresproperty',
                                                    async: false,
                                                    data: obj,
                                                    type: 'POST',
                                                    success: function (data) {
                                                        alertify.alert("Project Saved !!", function () {
                                                        });
                                                    }
                                                });
                                                $('#res-property-name').val('');
                                                $('#res-property-location').val('');
                                                $('#res-property-sublocation').val('');
                                                $('#res-property-city').val('');
                                                $('#res-property-state').val('');
                                                $('#res-property-pincode').val('');
                                                $('#res-property-status').val('');
                                                $('#res-property-status').val('');
                                                $('#res-property-latlong').val('');
                                            });
                                }
                            }

                            function saveResaleproperty() {
                                // if (validateResproperty()) {
                                var price = $('#resaleproperty-expectedprice').val();
                                var priceFormat = $('#price-format').val();
                                if (priceFormat == 'Lakh') {
                                    var amt = price * 100000;
                                } else if (priceFormat == 'Thousand') {
                                    var amt = price * 1000;
                                } else if (priceFormat == 'Crore') {
                                    var amt = price * 10000000;
                                }

                                alertify.confirm("Are you sure you want to save this Resale Property?",
                                        function () {
                                            var obj = new Object();
                                            obj.ownername = $('#resaleproperty-ownername').val();
                                            obj.contact = $('#resaleproperty-contact').val();
                                            obj.sublocation = $('#resaleproperty-sublocation').val();
                                            obj.location = $('#resaleproperty-location').val();
                                            obj.expectedprice = amt;
                                            obj.propertytype = $('#resaleproperty-propertytype').val();
                                            obj.age = $('#resaleproperty-age').val();
                                            obj.otheramenities = $('#resaleproperty-otheramenities').val();
                                            obj.status = $('#resaleproperty-status').val();
                                            obj.resellrent = $('#resaleproperty-resellrent').val();
                                            obj.videolink = $('#resaleproperty-videolink').val();
                                            obj.projecttype = $('#resaleproperty-projecttype').val();
                                            $.ajax({
                                                url: 'index.php?r=property/saveresaleproperty',
                                                async: false,
                                                data: obj,
                                                type: 'POST',
                                                success: function (data) {
                                                    alertify.alert("Resale Property Saved !!", function () {
                                                    });
                                                }
                                            });
                                            $('#resaleproperty-ownername').val('');
                                            $('#resaleproperty-contact').val('');
                                            $('#resaleproperty-location').val('');
                                            $('#resaleproperty-sublocation').val('');
                                            $('#resaleproperty-expectedprice').val('');
                                            $('#resaleproperty-age').val('');
                                            $('#resaleproperty-otheramenities').val('');
                                            $('#resaleproperty-videolink').val('');
                                            $('#resaleproperty-projecttype').val('');
                                        });
                                // }
                            }
                            function savePlots() {
                                // if (validateResproperty()) {
                                var price = $('#plot-expectedprice').val();
                                var priceFormat = $('#price-format').val();
                                if (priceFormat == 'Lakh') {
                                    var amt = price * 100000;
                                } else if (priceFormat == 'Thousand') {
                                    var amt = price * 1000;
                                } else if (priceFormat == 'Crore') {
                                    var amt = price * 10000000;
                                }
                                var firstVal = $('#plot-sharingratiosecond').val();
                                var secondVal = $('#plot-sharingratiofirst').val();
                                var sharingratio = firstVal + ':' + secondVal;
                                if (firstVal == '' && secondVal == '') {
                                    var sharingratio = 0 + ' : ' + 0;
                                } else {
                                    var sharingratio = firstVal + ':' + secondVal;
                                }
                                alertify.confirm("Are you sure you want to save this Plot Property?",
                                        function () {
                                            var obj = new Object();
                                            obj.ownername = $('#plot-ownername').val();
                                            obj.contact = $('#plot-contact').val();
                                            obj.location = $('#plot-location').val();
                                            obj.sublocation = $('#plot-sublocation').val();
                                            obj.landmark = $('#plot-landmark').val();
                                            obj.zone = $('#plot-zones').val();
                                            obj.areapersquarefeet = $('#plot-areapersquarefeet').val();
                                            obj.saleorrent = $('#plot-saleorrent').val();
                                            obj.areaperguntha = $('#plot-areaperguntha').val();
                                            obj.peracre = $('#plot-peracre').val();
                                            obj.securitydeposit = $('#plot-securitydeposit').val();
                                            obj.sharingratio = sharingratio;
                                            obj.expectedprice = amt;
                                            obj.detailedaddress = $('#plot-detailedaddress').val();
                                            obj.status = $('#plot-status').val();
                                            obj.videolink = $('#plot-videolink').val();
                                            $.ajax({
                                                url: 'index.php?r=property/saveplots',
                                                async: false,
                                                data: obj,
                                                type: 'POST',
                                                success: function (data) {
                                                    alertify.alert("Plot Property Saved !!", function () {
                                                    });
                                                }
                                            });
                                            $('#plot-ownername').val('');
                                            $('#plot-contact').val('');
                                            $('#plot-sublocation').val('');
                                            $('#plot-location').val('');
                                            $('#plot-landmark').val('');
                                            $('#plot-areapersquarefeet').val('');
                                            $('#plot-areaperguntha').val('');
                                            $('#plot-peracre').val('');
                                            $('#plot-securitydeposit').val('');
                                            $('#plot-expectedprice').val('');
                                            $('#price-format').val('');
                                            $('#plot-detailedaddress').val('');
                                            $('#plot-videolink').val('');
                                            $('#plot-expectedprice').val('');

                                        });
                                // }
                            }

// com project
                            function resetComproject() {
                                $('#com-project-name').val('');
                                $('#com-project-location').val('');
                                $('#com-project-city').val('');
                                $('#com-project-state').val('Maharashtra');
                                $('#com-project-pincode').val('');
                                $('#com-project-status').val('Active');
                                $('#com-project-latlong').val('');
                            }
                            function validateComproject() {
                                var flag = true;
                                var name = $('#com-project-name').val();
                                var agentname = $('#com-project-agentname').val();
                                var contactperson = $('#com-project-contactperson').val();
                                var contactno = $('#com-project-contactno').val();
                                if (name == '') {
                                    $('#com-project-err-name').html('Enter name');
                                    var flag = false;
                                } else {
                                    $('#com-project-err-name').html('');
                                }

                                if (agentname == '') {
                                    $('#com-project-err-agentname').html('Enter agent name');
                                    var flag = false;
                                } else {
                                    $('#com-project-err-city').html('');
                                }
                                if (contactno == '') {
                                    $('#com-project-err-contactno').html('Enter contact no.');
                                    var flag = false;
                                } else {
                                    $('#com-project-err-contactno').html('');
                                }
                                return flag;
                            }
                            function saveComproject() {
                                $('#addcomproject .form-group button').attr('disabled', 'disabled');
                                if (validateComproject()) {
                                    alertify.confirm("Are you sure you want to save this project?",
                                            function () {
                                                var obj = new Object();
                                                obj.name = $('#com-project-name').val();
                                                obj.sublocation = $('#com-project-sublocation').val();
                                                obj.location = $('#com-project-location').val();
                                                obj.agentname = $('#com-project-agentname').val();
                                                obj.contactperson = $('#com-project-contactperson').val();
                                                obj.contactno = $('#com-project-contactno').val();
                                                obj.ewnsc = $('#com-project-ewnsc').val();
                                                obj.landmark = $('#com-project-landmark').val();
                                                obj.city = $('#com-project-city').val();
                                                obj.state = $('#com-project-state').val();
                                                obj.pincode = $('#com-project-pincode').val();
                                                obj.status = $('#com-project-status').val();
                                                obj.latlong = $('#com-project-latlong').val();
                                                obj.videolink = $('#com-project-videolink').val();
//                                                obj.comprojecttype = $('#com-project-type').val();
                                                $.ajax({
                                                    url: 'index.php?r=property/savecomproject',
                                                    async: false,
                                                    data: obj,
                                                    type: 'POST',
                                                    success: function (data) {
                                                        alertify.alert("Project Saved !!", function () {
                                                        });
                                                    }
                                                });
                                                $('#com-project-name').val('');
                                                $('#com-project-location').val('');
                                                $('#com-project-agentname').val('');
                                                $('#com-project-contactperson').val('');
                                                $('#com-project-contactno').val('');
                                                $('#com-project-ewnsc').val('');
                                                $('#com-project-landmark').val('');
                                                $('#com-project-city').val('');
                                                $('#com-project-pincode').val('');
                                                $('#com-project-latlong').val('');
                                                $('#com-project-videolink').val('');
                                            });
                                }
                            }
// com property
                            function resetComproperty() {
                                $('#com-property-name').val('');
                                $('#com-property-location').val('');
                                $('#com-property-sublocation').val('');
                                $('#com-property-city').val('');
                                $('#com-property-state').val('Maharashtra');
                                $('#com-property-pincode').val('');
                                $('#com-property-status').val('Active');
                                $('#com-property-latlong').val('');
                            }
                            function validateComproperty() {
                                var flag = true;
                                var name = $('#com-property-name').val();
                                var location = $('#com-property-location').val();
                                var sublocation = $('#com-property-sublocation').val();
                                var city = $('#com-property-city').val();
                                var status = $('#com-property-status').val();
                                if (name == '') {
                                    $('#com-property-err-name').html('Enter name');
                                    var flag = false;
                                } else {
                                    $('#com-property-err-name').html('');
                                }
                                if (sublocation == '') {
                                    $('#com-property-err-sublocation').html('Enter sub location');
                                    var flag = false;
                                } else {
                                    $('#com-property-err-sublocation').html('');
                                }
                                if (location == '') {
                                    $('#com-property-err-location').html('Enter location');
                                    var flag = false;
                                } else {
                                    $('#com-property-err-location').html('');
                                }
                                if (city == '') {
                                    $('#com-property-err-city').html('Enter city');
                                    var flag = false;
                                } else {
                                    $('#com-property-err-city').html('');
                                }
                                if (status == '') {
                                    $('#com-property-err-status').html('Enter status');
                                    var flag = false;
                                } else {
                                    $('#com-property-err-status').html('');
                                }
                                return flag;
                            }
                            function saveComproperty() {
                                if (validateComproperty()) {
                                    alertify.confirm("Are you sure you want to save this property ?",
                                            function () {
                                                var obj = new Object();
                                                obj.name = $('#com-property-name').val();
                                                obj.sublocation = $('#com-property-sublocation').val();
                                                obj.location = $('#com-property-location').val();
                                                obj.city = $('#com-property-city').val();
                                                obj.state = $('#com-property-state').val();
                                                obj.pincode = $('#com-property-pincode').val();
                                                obj.status = $('#res-project-status').val();
                                                obj.latlong = $('#res-project-latlong').val();
                                                $.ajax({
                                                    url: 'index.php?r=property/savecomproperty',
                                                    async: false,
                                                    data: obj,
                                                    type: 'POST',
                                                    success: function (data) {
                                                        alertify.alert("Property saved !!", function () {
                                                            $('#addcomproperty .form-group button').removeAttr('disabled');

                                                        });
                                                    }
                                                });
                                                $('#com-property-name').val('');
                                                $('#com-property-location').val('');
                                                $('#com-property-city').val('');
                                                $('#com-property-pincode').val('');
                                                $('#res-project-latlong').val('');
                                            });
                                }
                            }
// builder
                            function resetBuilder() {
                                $('#builder-name').val('');
                                $('#builder-companyname').val('');
                                $('#builder-contact').val('');
                                $('#builder-email').val('');
                                $('#builder-website').val('');
                                $('#builder-officecontact').val('');
                                $('#builder-logopath').val('');
                                $('#builder-picpath').val('');
                                $('#builder-description').val('');
                                $('#builder-status').val('Active');
                            }
                            function validateBuilder() {
                                var flag = true;
                                var nameOriginal = $('#builder-name').val();
                                var name = nameOriginal.trim();
                                var companynameOriginal = $('#builder-companyname').val();
                                var companyname = companynameOriginal.trim();
                                var contactOriginal = $('#builder-contact').val();
                                var contact = contactOriginal.trim();
                                var statusOriginal = $('#builder-status').val();
                                var status = statusOriginal.trim();
                                var emailOriginal = $('#builder-email').val();
                                var email = emailOriginal.trim();
                                var websiteOriginal = $('#builder-website').val();
                                var website = websiteOriginal.trim();



                                if (name == '') {
                                    $('#builder-err-name').html('Enter name');
                                    var flag = false;
                                } else {
                                    $('#builder-err-name').html('');
                                }
                                if (companyname == '') {
                                    $('#builder-err-companyname').html('Enter company name');
                                    var flag = false;
                                } else {
                                    $('#builder-err-companyname').html('');
                                }
                                if (contact == '') {
                                    $('#builder-err-contact').html('Enter contact');
                                    var flag = false;
                                } else {
                                    $('#builder-err-contact').html('');
                                }
                                if (email == '') {
                                    $('#builder-err-email').html('');
                                } else {
                                    if (email.length != 0) {
                                        var reg = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
                                        if (!reg.test(email)) {
                                            $('#builder-err-email').html('Enter valid email');
                                            var flag = false;
                                        } else {
                                            $('#builder-err-email').html('');
                                        }
                                    }
                                }

                                if (website == '') {
                                    $('#builder-err-website').html('');
                                } else {
                                    if (website.length != 0) {
                                        if (validateWebsite(website) == false) {
                                            $('#builder-err-website').html('Enter valid website');
                                            var flag = false;
                                        } else {
                                            $('#builder-err-website').html('');
                                        }
                                    }
                                }

                                if (status == '') {
                                    $('#builder-err-status').html('Enter status');
                                    var flag = false;
                                } else {
                                    $('#builder-err-status').html('');
                                }
                                return flag;
                            }

                            function validateWebsite(website) {
                                var re = /(https?:\/\/(?:www\.|(?!www))[^\s\.]+\.[^\s]{2,}|www\.[^\s]+\.[^\s]{2,})/;
                                return re.test(website);
                            }
                            function saveBuilder() {

                                $('#addcomproperty .form-group button').attr('disabled', 'disabled');
                                if (validateBuilder()) {
                                    alertify.confirm("Are you sure you want to save this builder?",
                                            function () {

                                                var obj = new Object();
                                                obj.name = $('#builder-name').val();
                                                obj.companyname = $('#builder-companyname').val();
                                                obj.contact = $('#builder-contact').val();
                                                obj.email = $('#builder-email').val();
                                                obj.website = $('#builder-website').val();
                                                obj.officecontact = $('#builder-officecontact').val();
                                                obj.logopath = $('#builder-logopath').val();
                                                obj.picpath = $('#builder-picpath').val();
                                                obj.description = $('#builder-description').val();
                                                obj.status = $('#builder-status').val();
                                                $.ajax({
                                                    url: 'index.php?r=property/savebuilder',
                                                    async: false,
                                                    data: obj,
                                                    type: 'POST',
                                                    success: function (data) {
                                                        alertify.alert("Builder Saved Succesfully !!", function () {

                                                        });
                                                        $('#addcomproperty .form-group button').removeAttr('disabled');
                                                    }
                                                });


                                            });
                                }
                            }
// customer
                            function resetCustomer() {
                                $('#customer-name').val('');
                                $('#customer-phone').val('');
                                $('#customer-email').val('');
                                $('#customer-location').val('');
                                $('#customer-city').val('');
                                $('#customer-pincode').val('');
                                $('#customer-picpath').val('');
                                $('#customer-description').val('');
                                $('#customer-status').val('Active');
                            }
                            function validateCustomer() {
                                var flag = true;

                                var nameOriginal = $('#customer-name').val();
                                var name = nameOriginal.trim();
                                var phoneOriginal = $('#customer-phone').val();
                                var phone = phoneOriginal.trim();
                                var status = $('#customer-status').val();
                                var emailOriginal = $('#customer-email').val();
                                var email = emailOriginal.trim();


                                if (name == '') {
                                    $('#customer-err-name').html('Enter name');
                                    var flag = false;
                                } else {
                                    $('#customer-err-name').html('');
                                }
                                if (phone == '') {
                                    $('#customer-err-phone').html('Enter phone');
                                    var flag = false;
                                } else {
                                    $('#customer-err-phone').html('');
                                }

                                if (email == '') {
                                    $('#customer-err-email').html('');
                                } else {
                                    if (email.length != 0) {
                                        var reg = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
                                        if (!reg.test(email)) {
                                            $('#customer-err-email').html('Enter valid email');
                                            var flag = false;
                                        } else {
                                            $('#customer-err-email').html('');
                                        }
                                    }
                                }



                                if (status == '') {
                                    $('#customer-err-status').html('Enter status');
                                    var flag = false;
                                } else {
                                    $('#customer-err-status').html('');
                                }
                                return flag;
                            }
                            function saveCustomer() {

                                if (validateCustomer()) {

                                    alertify.confirm("Are you sure you want to save this Customer ?",
                                            function () {
                                                $('#addcustomer .form-group button').attr('disabled', 'disabled');
                                                var obj = new Object();
                                                obj.name = $('#customer-name').val();
                                                obj.phone = $('#customer-phone').val();
                                                obj.email = $('#customer-email').val();
                                                obj.sublocation = $('#customer-sublocation').val();
                                                obj.location = $('#customer-location').val();
                                                obj.city = $('#customer-city').val();
                                                obj.pincode = $('#customer-pincode').val();
                                                obj.picpath = $('#customer-picpath').val();
                                                obj.description = $('#customer-description').val();
                                                obj.addedby = $('#customer-addedby').val();
                                                obj.contacted_by = $('#customer-contacted_by').val();
                                                obj.status = $('#customer-status').val();
                                                $.ajax({
                                                    url: 'index.php?r=property/savecustomer',
                                                    async: false,
                                                    data: obj,
                                                    type: 'POST',
                                                    success: function (data) {
                                                        data = JSON.parse(data);
                                                        console.log(data.msg);

                                                        if (data.msg == "exists") {


                                                            alertify.alert("The Phone Number Already Exists !!", function () {
                                                                $('#addcustomer .form-group button').prop('disabled', false);
                                                            });
                                                        }


                                                        if (data.msg == "success") {

                                                            alertify.alert("Customer Added Successfully !!", function () {
                                                                resetCustomer();
                                                            });
                                                        }
                                                    }
                                                });
                                                $('#customer-name').val('');
                                                $('#customer-phone').val('');
                                                $('#customer-email').val('');
                                                $('#customer-sublocation').val('');
                                                $('#customer-location').val('');
                                                $('#customer-city').val('');
                                                $('#customer-pincode').val('');
                                                $('#customer-description').val('');
                                            });
                                }
                            }


                            function saveFollowup() {
                                $("#dialog").attr('title', ' Save Update Followup');
                                $("#dialog-msg").html('Saving in Progress.');
                                $("#dialog").dialog({
                                    modal: true,
                                });

                                var obj = new Object();
                                obj.customerid = $('#followup-customerid').val();
                                if (obj.customerid == "") {
                                    alertify.alert("Please Add Customer First !!", function () {
                                    });
                                    return false;
                                }
                                obj.firstdiscussionby = $('#followup-firstdiscussionby').val();
                                obj.firstremark = $('#followup-firstremark').val();
                                obj.projecttype = $('#followup-projecttype').val();
                                obj.followupdate = $('#followupdate').val();
                                obj.status = $('#followup-status').val();

                                $.ajax({
                                    url: 'index.php?r=property/addfollowup',
                                    async: false,
                                    data: obj,
                                    type: 'POST',
                                    success: function (data) {
                                        console.log(data);


                                        alertify.alert("Followup Added Succesfully !!", function () {
                                        });


                                        $('#dialog').dialog("close");
                                        $('#myTab a:first').tab('show');
                                    }
                                });

                            }


</script>
