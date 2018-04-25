<h2>Extra details</h2>
<div class="container" id="myTab">
    <div class="row">
        <div class="col-sm-12">
            <form id="Newgeolocation">
                <h4>*Please Note:-</h4>
                <div class="form-group row control-group">
                    <label for="Username" class="col-sm-2 form-control-label">Year of Construct</label>
                    <div class="col-sm-10">
                        <input  type="text" class="form-control input-sm" id="exyearofconstruct" name="yearofconstruct" value="<?php echo $objComproject->comextradetails->yearofconstruct; ?>" placeholder="Year of Construct" >
                        <p id="err-comyearofconst" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Towers" class="col-sm-2 form-control-label">Possession status</label>
                    <div class="col-sm-10">
                        <input  type="text" class="form-control input-sm" id="possessionstatus" name="possessionstatus" value="<?php echo $objComproject->comextradetails->possessionstatus; ?>" placeholder="Possession status ">
                        <p id="err-hospital" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group ">
                    <label for="commercialshop" class="col-sm-2 form-control-label">Furnishing</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="furnishingid" name="furnishingid" placeholder="- Furnishing -">
                            <?php
                            foreach ($objComprojectfurnishing AS $rowobjComprojectfurnishing) {
                                if ($objComproject->comextradetails->furnishingid == $rowobjComprojectfurnishing->id) {
                                    echo '<option selected value="' . $rowobjComprojectfurnishing->id . '" >' . $rowobjComprojectfurnishing->name . '</option>';
                                } else {
                                    echo '<option value="' . $rowobjComprojectfurnishing->id . '" >' . $rowobjComprojectfurnishing->name . '</option>';
                                }
                            }
                            ?>
                        </select>
                        <p id="err-officefurnishing" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group ">
                    <label for="commercialshop" class="col-sm-2 form-control-label">Preferred</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="preferredid" name="preferredid" placeholder="- Preferred -">
                            <?php
                            foreach ($objComprojectpreferred AS $rowobjComprojectpreferred) {
                                if ($objComproject->comextradetails->preferredid == $rowobjComprojectpreferred->id) {
                                    echo '<option selected value="' . $rowobjComprojectpreferred->id . '" >' . $rowobjComprojectpreferred->name . '</option>';
                                } else {
                                    echo '<option value="' . $rowobjComprojectpreferred->id . '" >' . $rowobjComprojectpreferred->name . '</option>';
                                }
                            }
                            ?>
                        </select>
                        <p id="err-officePreferred" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Username" class="col-sm-2 form-control-label">Saleable area</label>
                    <div class="col-sm-10">
                        <input  type="text" class="form-control input-sm" id="saleablearea" name="saleablearea" value="<?php echo $objComproject->comextradetails->saleablearea; ?>" placeholder="Saleable area" >
                        <p id="err-saleablearea" class="text-danger"></p>
                    </div>
                </div>

                <div class="form-group row control-group">
                    <label for="Towers" class="col-sm-2 form-control-label">Carpet area</label>
                    <div class="col-sm-10">
                        <input  type="text" class="form-control input-sm" id="carpetarea" name="carpetarea" value="<?php echo $objComproject->comextradetails->carpetarea; ?>" placeholder="Carpet area">
                        <p id="err-airport" class="text-danger"></p>
                    </div>
                </div>

                <div class="form-group row control-group">
                    <label for="Towers" class="col-sm-2 form-control-label">Reserve parking space</label>
                    <div class="col-sm-10">
                        <input  type="text" class="form-control input-sm" id="reserveparkingspace" name="reserveparkingspace" value="<?php echo $objComproject->comextradetails->reserveparkingspace; ?>" placeholder="Reserve parking space ">
                        <p id="err-multiplex" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Towers" class="col-sm-2 form-control-label">Preleased / Vacant</label>
                    <div class="col-sm-10">
                        <input  type="text" class="form-control input-sm" id="preleasedvacant" name="preleasedvacant" value="<?php echo $objComproject->comextradetails->preleasedvacant; ?>" placeholder="Preleased / Vacant">
                        <p id="err-school" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Towers" class="col-sm-2 form-control-label">If Preleased then Rent Started from</label>
                    <div class="col-sm-10">
                        <input  type="text" class="form-control input-sm" id="preleasedperiod" name="preleasedperiod" value="<?php echo $objComproject->comextradetails->preleasedperiod; ?>" placeholder="If Preleased then Rent Started from">
                        <p id="err-college" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Towers" class="col-sm-2 form-control-label">If Preleased then Deposit & Annual Escalation</label>
                    <div class="col-sm-10">
                        <input  type="text" class="form-control input-sm" id="preleaseddepstannualescalation" name="preleaseddepstannualescalation" value="<?php echo $objComproject->comextradetails->preleaseddepstannualescalation; ?>" placeholder="If Preleased then Deposit & Annual Escalation">
                        <p id="err-market" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Towers" class="col-sm-2 form-control-label">Current Status (Available/Deal Done )</label>
                    <div class="col-sm-10">
                        <input  type="text" class="form-control input-sm" id="currentstatus" name="currentstatus" value="<?php echo $objComproject->comextradetails->currentstatus; ?>" placeholder="Current Status (Available/Deal Done )">
                        <p id="err-templegeo" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button onclick="saveExtradetails();" type="button" class="btn btn-success">Save</button>
                        <button onclick="resetProfile();" type="button" class="btn btn-success">Cancel</button>
                    </div>
                </div>
            </form>
        </div>

    </div>
</div>
<script>
    $(document).ready(function () {
        $('#preleasedperiod').fdatepicker({format: 'yyyy-mm-dd'});
    });
    function saveExtradetails() {
        alertify.confirm("Are you sure you want to save this extra detailsl of property?",
                function () {
                    var obj = new Object();
                    obj.comprojectid = $('#comprojectid').val();
                    obj.yearofconstruct = $('#exyearofconstruct').val();
                    obj.possessionstatus = $('#possessionstatus').val();
                    obj.furnishingid = $('#furnishingid').val();
                    obj.preferredid = $('#preferredid').val();
                    obj.saleablearea = $('#saleablearea').val();
                    obj.carpetarea = $('#carpetarea').val();
                    obj.reserveparkingspace = $('#reserveparkingspace').val();
                    obj.preleasedvacant = $('#preleasedvacant').val();
                    obj.preleasedperiod = $('#preleasedperiod').val();
                    obj.preleaseddepstannualescalation = $('#preleaseddepstannualescalation').val();
                    obj.currentstatus = $('#currentstatus').val();
                    $.ajax({
                        url: 'index.php?r=property/savecomprojetextradetails',
                        async: false,
                        data: obj,
                        type: 'POST',
                        success: function (data) {
                            alertify.alert("Property Updated !!", function () {
                            });
                        }
                    });
                });

    }
</script>