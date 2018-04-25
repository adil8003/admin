<h2>Owner </h2>
<form id="updprofile">
    <div class="form-group row control-group ">
        <label for="Type" class="col-sm-2 form-control-label">Builder Name</label>
        <div class="col-sm-10">
            <select class="form-control" id="builderid" placeholder="- Select Builder -">
                <?php
                foreach ($objBuilder as $key => $value) {
                    if ($value->id == $objResproperty->builderid) {
                        echo "<option selected value='$value->id' >" . $value->name . "</option>";
                    } else {
                        echo "<option value='$value->id' >" . $value->name . "</option>";
                    }
                }
                ?>
            </select>
            <p id="err-builderid" class="text-danger"></p>
        </div>
    </div>
    <button  onclick="saveResprojectowner();" type="button" class="btn btn-success btnmargin">Save</button><br>
    <div class="form-group row control-group">
        <label for="Username" class="col-sm-2 form-control-label">Company Name</label>
        <div class="col-sm-10">
            <input disabled="disabled" type="text" class="form-control input-sm" id="companyname" name="companyname" value="<?php echo $objResproperty->builder->companyname ?>" >
            <p id="err-name" class="text-danger"></p>
        </div>
    </div><br>

    <div class="form-group row control-group">
        <label for="Email" class="col-sm-2 form-control-label">Email</label>
        <div class="col-sm-10">
            <input disabled="disabled" type="email" class="form-control input-sm" id="email" name="email" value="<?php echo $objResproperty->builder->email ?>" >
            <p id="err-email" class="text-danger"></p>
        </div>
    </div>
    <div class="form-group row control-group">
        <label for="Email" class="col-sm-2 form-control-label">Contact</label>
        <div class="col-sm-10">
            <input disabled="disabled" type="text" class="form-control input-sm" id="contact" name="contact" value="<?php echo $objResproperty->builder->contact ?>" >
            <p id="err-email" class="text-danger"></p>
        </div>
    </div>
    <div class="form-group row control-group">
        <label for="Email" class="col-sm-2 form-control-label">Website</label>
        <div class="col-sm-10">
            <input disabled="disabled" type="text" class="form-control input-sm" id="website" name="website" value="<?php echo $objResproperty->builder->website ?>" >
            <p id="err-email" class="text-danger"></p>
        </div>
    </div>
    <div class="form-group row control-group">
        <label for="Email" class="col-sm-2 form-control-label">Office Contact</label>
        <div class="col-sm-10">
            <input disabled="disabled" type="text" class="form-control input-sm" id="officecontact" name="officecontact" value="<?php echo $objResproperty->builder->officecontact ?>" >
            <p id="err-email" class="text-danger"></p>
        </div>
    </div>
    <div class="form-group row control-group">
        <label for="Email" class="col-sm-2 form-control-label">Description</label>
        <div class="col-sm-10">
            <input disabled="disabled" type="text" class="form-control input-sm" id="description" name="description" value="<?php echo $objResproperty->builder->description ?>" >
            <p id="err-email" class="text-danger"></p>
        </div>
    </div>
</form>