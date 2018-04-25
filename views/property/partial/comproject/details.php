<h2>ALL DETAILS</h2>
<div class="container" id="myTab">
    <div class="row">
        <div class="col-sm-12"> 
            <form id="Details">
                <div class="form-group row control-group">
                    <label for="Username" class="col-sm-2 form-control-label">Shop/Office</label>
                    <div class="col-sm-10">
                       <select class="form-control input-sm" id="shoporoffice" name="shoporoffice">
                            <option value="<?php echo $objComproject->comprojectdetails->shoporoffice; ?>"><?php echo $objComproject->comprojectdetails->shoporoffice; ?></option>
                            <option value="Shop">Shop</option>
                            <option value="Office">Office</option>
                        </select>
                        <p id="res-project-err-status" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Towers" class="col-sm-2 form-control-label">Old/New</label>
                    <div class="col-sm-10">
                          <select class="form-control input-sm" id="neworold" name="neworold">
                            <option value="<?php echo $objComproject->comprojectdetails->neworold; ?>"><?php echo $objComproject->comprojectdetails->neworold; ?></option>
                            <option value="Old">Old</option>
                            <option value="New">New</option>
                        </select>
                        <p id="err-heading1details" class="text-danger"></p>
                    </div>
                </div>
                
                <div class="form-group row control-group">
                    <label for="Username" class="col-sm-2 form-control-label">Rent/Purchase</label>
                    <div class="col-sm-10">
                         <select class="form-control input-sm" id="rentorpurchase" name="rentorpurchase">
                            <option value="<?php echo $objComproject->comprojectdetails->rentorpurchase; ?>"><?php echo $objComproject->comprojectdetails->rentorpurchase; ?></option>
                            <option value="Rent">Rent</option>
                            <option value="Purchase">Purchase</option>
                        </select>
                        <p id="err-featuresheading2" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Towers" class="col-sm-2 form-control-label">Area PerSqFeet</label>
                    <div class="col-sm-10">
                        <input  type="text" class="form-control input-sm" value="<?php  echo $objComproject->comprojectdetails->areapersqfeet; ?>" id="areapersqfeet" name="areapersqfeet" placeholder="Area Per Sq Feet " >
                        <p id="err-heading2details" class="text-danger"></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-2"><label for="Phone" class=" form-control-label">Expected Price/Rent<span class="text-danger">*</span></label></div>
                    <div class="col-sm-5"> <div class="form-group row control-group">
                            <select class="form-control input-sm" id="res-price-format" name="res-price-format" style="width: 464px; margin-left: 15px;">
                                <?php
                                $digit = $objComproject->comprojectdetails->expectedprice;
                                $lengthNum = strlen($digit);
                                if ($lengthNum == 0 && $lengthNum == NULL) {
                                    return 0;
                                } else {
                                    $lengthNum = strlen($digit);
//                                $n =  strlen($no); // 7
                                    switch ($lengthNum) {
                                        case 3:
                                            $val = $digit / 100;
                                            $val = round($val, 2);
//                                        $finalval =  $val ." hundred";
                                            break;
                                        case 4:
                                            $val = $digit / 1000;
                                            $val = round($val, 2);
//                                        $finalval =  $val ." thousand";
                                            break;
                                        case 5:
                                            $val = $digit / 1000;
                                            $val = round($val, 2);
//                                        $finalval =  $val ." thousand";
                                            break;
                                        case 6:
                                            $val = $digit / 100000;
                                            $val = round($val, 2);
//                                        $finalval =  $val ." lakh";
                                            break;
                                        case 7:
                                            $val = $digit / 100000;
                                            $val = round($val, 2);
//                                        $finalval =  $val ." lakh";
                                            break;
                                        case 8:
                                            $val = $digit / 10000000;
                                            $val = round($val, 2);
//                                        $finalval =  $val ." crore";
                                            break;
                                        case 9:
                                            $val = $digit / 10000000;
                                            $val = round($val, 2);
//                                        $finalval =  $val ." crore";
                                            break;

                                        default:
                                            echo "";
                                    }
                                }

                                $digit = $objComproject->comprojectdetails->expectedprice;
                                $lengthNum = strlen($digit);
                                $lakh = 6;
                                $thousand = 5;
                                $crore = 9;
                                if ($lengthNum > 5 && $lengthNum < 8) {
                                    echo ' <option value="Lakh">Lakh</option>';
                                } else if ($lengthNum < 6 && $lengthNum > 0 && $lengthNum == 4) {
                                    echo ' <option value="Thousand">Thousand</option>';
                                } else if ($lengthNum < 10 && $lengthNum > 7) {
                                    echo '<option value="Crore">Crore</option>';
                                }
                                ?>
                                <option value="Thousand">Thousand</option>
                                <option value="Lakh">Lakh</option>
                                <option value="Crore">Crore</option>
                            </select>
                            <p id="resaleproperty-err-status" class="text-danger"></p>
                        </div></div>
                    <div class="col-sm-5"><div class="form-group row control-group">
                            <input type="text" class="form-control input-sm" id="expectedprice" name="expectedprice"
                                   value="<?php echo $val; ?>" style="width: 464px; margin-left: 4px;">
                            <p id="resaleproperty-err-expectedprice" class="text-danger"></p>
                        </div></div>
                </div>
                <div class="form-group row control-group">
                    <label for="Towers" class="col-sm-2 form-control-label">Height</label>
                    <div class="col-sm-10">
                       <input  type="text" class="form-control input-sm" value="<?php  echo $objComproject->comprojectdetails->height; ?>" id="height" name="height" placeholder="Height" >
                        <p id="err-heading3details" class="text-danger"></p>
                    </div>
                </div>
<div class="form-group row control-group">
                    <label for="Username" class="col-sm-2 form-control-label">Floor Number</label>
                    <div class="col-sm-10">
                        <input  type="text" class="form-control input-sm" 
                        value="<?php echo $objComproject->comprojectdetails->floornumber; ?>" 
                        id="floornumber" name="floornumber" placeholder="Floor Number" >
                        <p id="err-floornumber" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Towers" class="col-sm-2 form-control-label">Parking for Shop</label>
                    <div class="col-sm-10">
                      <input  type="text" class="form-control input-sm" 
                        value="<?php echo $objComproject->comprojectdetails->parkingforshop; ?>" 
                        id="parkingforshop" name="parkingforshop" placeholder="Enter Parking for shop" >
                        <p id="err-parkingforshop" class="text-danger"></p>
                    </div>
                </div>

                 <div class="form-group row control-group">
                    <label for="Towers" class="col-sm-2 form-control-label">Property Facing</label>
                    <div class="col-sm-10">
                      <input  type="text" class="form-control input-sm" 
                        value="<?php echo $objComproject->comprojectdetails->propertyfacing; ?>" 
                        id="propertyfacing" name="propertyfacing" placeholder="Property Facing" >
                        <p id="err-propertyfacing" class="text-danger"></p>
                    </div>
                </div>

                 <div class="form-group row control-group">
                    <label for="Towers" class="col-sm-2 form-control-label">Pantry</label>
                    <div class="col-sm-10">
                      <input  type="text" class="form-control input-sm" 
                        value="<?php echo $objComproject->comprojectdetails->pantry; ?>" 
                        id="pantry" name="pantry" placeholder="Pantry" >
                        <p id="err-pantry" class="text-danger"></p>
                    </div>
                </div>

                 <div class="form-group row control-group">
                    <label for="Towers" class="col-sm-2 form-control-label">Cabin</label>
                    <div class="col-sm-10">
                      <input  type="text" class="form-control input-sm" 
                        value="<?php echo $objComproject->comprojectdetails->cabin; ?>" 
                        id="cabin" name="cabin" placeholder="Cabin" >
                        <p id="err-cabin" class="text-danger"></p>
                    </div>
                </div>

                 <div class="form-group row control-group">
                    <label for="Towers" class="col-sm-2 form-control-label">Workstation</label>
                    <div class="col-sm-10">
                      <input  type="text" class="form-control input-sm" 
                        value="<?php echo $objComproject->comprojectdetails->workstation; ?>" 
                        id="workstation" name="workstation" placeholder="Number of Workstation" >
                        <p id="err-workstation" class="text-danger"></p>
                    </div>
                </div>

                 <div class="form-group row control-group">
                    <label for="Towers" class="col-sm-2 form-control-label">Cubicles</label>
                    <div class="col-sm-10">
                      <input  type="text" class="form-control input-sm" 
                        value="<?php echo $objComproject->comprojectdetails->cubicles; ?>" 
                        id="cubicles" name="cubicles" placeholder="Number of Cubicles" >
                        <p id="err-cubicles" class="text-danger"></p>
                    </div>
                </div>

                 <div class="form-group row control-group">
                    <label for="Towers" class="col-sm-2 form-control-label">Conference Room</label>
                    <div class="col-sm-10">
                      <input  type="text" class="form-control input-sm" 
                        value="<?php echo $objComproject->comprojectdetails->conferenceroom; ?>" 
                        id="conferenceroom" name="conferenceroom" placeholder="Number of Conference Room" >
                        <p id="err-conferenceroom" class="text-danger"></p>
                    </div>
                </div>

                 <div class="form-group row control-group">
                    <label for="Towers" class="col-sm-2 form-control-label">2 Wheeler Parking</label>
                    <div class="col-sm-10">
                      <input  type="text" class="form-control input-sm" 
                        value="<?php echo $objComproject->comprojectdetails->twowheelerparking; ?>" 
                        id="twowheelerparking" name="twowheelerparking" placeholder="2 Wheeler Parking" >
                        <p id="err-twowheelerparking" class="text-danger"></p>
                    </div>
                </div>

                 <div class="form-group row control-group">
                    <label for="Towers" class="col-sm-2 form-control-label">4 Wheeler Parking</label>
                    <div class="col-sm-10">
                      <input  type="text" class="form-control input-sm" 
                        value="<?php echo $objComproject->comprojectdetails->fourwheelerparking; ?>" 
                        id="fourwheelerparking" name="fourwheelerparking" placeholder="4 Wheeler Parking" >
                        <p id="err-fourwheelerparking" class="text-danger"></p>
                    </div>
                </div>


<div class="form-group row control-group">
                    <label for="Username" class="col-sm-2 form-control-label">Video Link</label>
                    <div class="col-sm-10">
                          <textarea class="form-control input-sm" id="videolink"  name="videolink" 
                           placeholder="Video link"><?php  echo $objComproject->comprojectdetails->videolink; ?></textarea>
                        <p id="err-videolink" class="text-danger"></p>
                    </div>
                </div>

                <input type="hidden" value="<?php echo $objComproject->comprojectdetails->id; ?>" id="comprojectdetailsid">
                <div class="form-group row">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button onclick="saveComDetails();" type="button" class="btn btn-success">Save</button>
                        <button onclick="resetProfile();" type="button" class="btn btn-success">Cancel</button>
                    </div>
                </div>
            </form>
        </div>

    </div>
</div>

<script>
function saveComDetails() {
        var price = $('#expectedprice').val();
        var priceFormat = $('#res-price-format').val();
        if (priceFormat == 'Lakh') {
            var amt = price * 100000;
        } else if (priceFormat == 'Thousand') {
            var amt = price * 1000;
        } else if (priceFormat == 'Crore') {
            var amt = price * 10000000;
        }
    alertify.confirm("Are you sure you want to save Details ?",
            function () {
                var obj = new Object();
                obj.comprojectdetailsid = $('#comprojectdetailsid').val();
                // obj.resprojectmicrositedetailsid = $('#resprojectmicrositedetailsid').val();
                obj.shoporoffice = $('#shoporoffice').val();
                obj.neworold = $('#neworold').val();
                obj.featuresheading3 = $('#featuresheading3').val();
                obj.rentorpurchase = $('#rentorpurchase').val();
                obj.areapersqfeet = $('#areapersqfeet').val();
                obj.height = $('#height').val();
                obj.floornumber = $('#floornumber').val();
                    obj.expectedprice = amt;
                obj.parkingforshop = $('#parkingforshop').val();
                obj.propertyfacing = $('#propertyfacing').val();
                obj.pantry = $('#pantry').val();
                obj.cabin = $('#cabin').val();
                obj.workstation = $('#workstation').val();
                obj.cubicles = $('#cubicles').val();
                obj.conferenceroom = $('#conferenceroom').val();
                obj.twowheelerparking = $('#twowheelerparking').val();
                obj.fourwheelerparking = $('#fourwheelerparking').val();
                obj.videolink = $('#videolink').val();
                $.ajax({
                    url: 'index.php?r=property/savecomprojectdetails',
                    async: false,
                    data: obj,
                    type: 'POST',
                    success: function (data) {
                        alertify.alert("Deatils Saved Succesfully !!", function () {
                        });
                    }
                });
            });
}


</script>