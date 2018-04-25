 <h2>Geolocation</h2>
<div class="container" id="myTab">
    <div class="row">
        <div class="col-sm-12">
            <form id="Newgeolocation">
            <h4>*Please Note:-</h4>
            <ol>
            <li>Upload Images of 800(width)*600px(height) images with good quality</li>
            <li>These images will be shown only under Site Progression Section.</li>
            </ol>
                <div class="form-group row control-group">
                    <label for="Username" class="col-sm-2 form-control-label">Railway station</label>
                    <div class="col-sm-10">
                        <input  type="text" class="form-control input-sm" id="railwaystation" name="railwaystation" value="<?php echo $objComproject->comprojectgeolocation->railwaystation; ?>" placeholder="Railway station" >
                        <p id="err-railwaystn" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Towers" class="col-sm-2 form-control-label">Airport</label>
                    <div class="col-sm-10">
                        <input  type="text" class="form-control input-sm" id="airport" name="airport" value="<?php echo $objComproject->comprojectgeolocation->airport; ?>" placeholder="Airport">
                        <p id="err-airport" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Towers" class="col-sm-2 form-control-label">Hospital</label>
                    <div class="col-sm-10">
                        <input  type="text" class="form-control input-sm" id="hospital" name="hospital" value="<?php echo $objComproject->comprojectgeolocation->hospital; ?>" placeholder="Hospital ">
                        <p id="err-hospital" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Towers" class="col-sm-2 form-control-label">Multiplex</label>
                    <div class="col-sm-10">
                        <input  type="text" class="form-control input-sm" id="multiplex" name="multiplex" value="<?php echo $objComproject->comprojectgeolocation->multiplex; ?>" placeholder="Multiplex ">
                        <p id="err-multiplex" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Towers" class="col-sm-2 form-control-label">School</label>
                    <div class="col-sm-10">
                        <input  type="text" class="form-control input-sm" id="school" name="school" value="<?php echo $objComproject->comprojectgeolocation->school; ?>" placeholder="School">
                        <p id="err-school" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Towers" class="col-sm-2 form-control-label">College</label>
                    <div class="col-sm-10">
                        <input  type="text" class="form-control input-sm" id="college" name="college" value="<?php echo $objComproject->comprojectgeolocation->college; ?>" placeholder="College">
                        <p id="err-college" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Towers" class="col-sm-2 form-control-label">Market</label>
                    <div class="col-sm-10">
                        <input  type="text" class="form-control input-sm" id="market" name="market" value="<?php echo $objComproject->comprojectgeolocation->market; ?>" placeholder="Market">
                        <p id="err-market" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Towers" class="col-sm-2 form-control-label">temple</label>
                    <div class="col-sm-10">
                        <input  type="text" class="form-control input-sm" id="temple" name="temple" value="<?php echo $objComproject->comprojectgeolocation->temple; ?>" placeholder="Temple">
                        <p id="err-templegeo" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Towers" class="col-sm-2 form-control-label">Famous place</label>
                    <div class="col-sm-10">
                        <input  type="text" class="form-control input-sm" id="famousplace" name="famousplace" value="<?php echo $objComproject->comprojectgeolocation->famousplace; ?>" placeholder="Famous place">
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
            </div>

    </div>
</div>
