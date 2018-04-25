<?php
$this->title = Yii::t('app', 'Residential Property');
?>
<!-- Nav Bar- start-->
<div class="container">
    <ul class="nav nav-tabs" role="tablist" id="Property">
        <li class="nav-item">
            <a class="nav-link" href="#customer" role="tab" data-toggle="tab" aria-controls="customer">FOLLOW UP DEATILS</a>
        </li>
    </ul>
    <!-- Nav Bar- start-->
    <div class="tab-content">
        <div role="tabpanel" class="col-sm-12 tab-pane active" id="followup"> <!-- /tab-panel -list -->
            <h2> FOLLOW UP DETAILS</h2>
            <input type="hidden" value="<?= $objFollowup->id; ?>" id="followup_id">
            <form id="Followup">

                <div class="form-group row control-group">
                    <label for="title" class="col-sm-2 form-control-label">Customer Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" value="<?= $objCustomer->name; ?>" id="customername" 
                               name="customername" placeholder="Customer Name" readonly>
                        <p id="err-customername" class="text-danger"></p>
                    </div>
                </div>           

                <div class="form-group row control-group">
                    <label for="title" class="col-sm-2 form-control-label">Rent/Purchase</label>
                    <div class="col-sm-10">
                        <select class="form-control input-sm" id="rentpurchase" name="rentpurchase">
                            <option value="<?= $objFollowup->rentpurchase; ?>"><?= $objFollowup->rentpurchase; ?></option>
                            <option value="Rent">Rent</option>
                            <option value="Purchase">Purchase</option>
                        </select>
                        <p id="err-rentpurchase" class="text-danger"></p>
                    </div>
                </div>

                <div class="form-group row control-group">
                    <label for="title" class="col-sm-2 form-control-label">New/Resale</label>
                    <div class="col-sm-10">
                        <select class="form-control input-sm" id="newresale" name="newresale">
                            <option value="<?= $objFollowup->newresale; ?>"><?= $objFollowup->newresale; ?></option>
                            <option value="New">New</option>
                            <option value="Resale">Resale</option>
                        </select>
                        <p id="err-newresale" class="text-danger"></p>
                    </div>
                </div>


                <div class="form-group row control-group">
                    <label for="title" class="col-sm-2 form-control-label">Project Type</label>
                    <div class="col-sm-10">
                        <select class="form-control input-sm" id="projecttype" name="projecttype" >
                            <option value="<?= $objFollowup->projecttype; ?>"><?= $objFollowup->projecttype; ?></option>
                            <option value="Residential">Residential</option>
                            <option value="Commercial">Commercial</option>
                            <option value="Plot">Plot</option>
                            <option value="Industrial">Industrial</option>
                        </select>
                        <p id="err-projecttype" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="title" class="col-sm-2 form-control-label">Residential Type</label>
                    <div class="col-sm-10">
                        <select class="form-control input-sm" id="restypeofproperty" name="restypeofproperty" >
                            <option value="<?= $objFollowup->restypeofproperty; ?>"><?= $objFollowup->restypeofproperty; ?></option>
                            <option value="1RK">1RK</option>
                            <option value="1BHK">1BHK</option>
                            <option value="2BHK">2BHK</option>
                            <option value="3BHK">3BHK</option>
                            <option value="4BHK">3BHK</option>
                            <option value="Bunglow">Bunglow</option>
                            <option value="Raw House">Raw House</option>
                        </select>
                        <p id="err-projecttype" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="title" class="col-sm-2 form-control-label">Commercial Type</label>
                    <div class="col-sm-10">
                        <select class="form-control input-sm" id="comtypeofproperty" name="comtypeofproperty" >
                            <option value="<?= $objFollowup->comtypeofproperty; ?>"><?= $objFollowup->comtypeofproperty; ?></option>
                            <option value="Shop">Shop</option>
                            <option value="Office">Office</option> 
                        </select>
                        <p id="err-projecttype" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="title" class="col-sm-2 form-control-label">Industrial Type</label>
                    <div class="col-sm-10">
                        <select class="form-control input-sm" id="industypeofproperty" name="industypeofproperty" >
                            <option value="<?= $objFollowup->industypeofproperty; ?>"><?= $objFollowup->industypeofproperty; ?></option>
                            <option value="Plot">Plot</option>
                            <option value="Shed">Shed</option>
                        </select>
                        <p id="err-projecttype" class="text-danger"></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-2"><label for="Phone" class=" form-control-label">Budget<span class="text-danger">*</span></label></div>
                    <div class="col-sm-5"> <div class="form-group row control-group">
                            <select class="form-control input-sm" id="price-format" name="price-format" style="width: 464px; margin-left: 15px;">
                                <?php
                                echo $digit = $objFollowup->expectedprice;
                                $lengthNum = strlen($digit);
                                if ($lengthNum == 0 && $lengthNum == NULL && $lengthNum == '') {
                                    return $val = 0;
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
                                            $val = 0;
                                    }
                                }
                                $digit = $objFollowup->expectedprice;
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
                            <input type="text" class="form-control input-sm" id="follow-expectedprice" name="follow-expectedprice"
                                   value="<?php echo $val; ?>" style="width: 464px; margin-left: 4px;">
                            <p id="follow-expectedprice-err-expectedprice" class="text-danger"></p>
                        </div></div>
                </div>
                <div class="form-group row control-group">
                    <label for="title" class="col-sm-2 form-control-label">First Discussuion By</label>
                    <div class="col-sm-10">
                     <!--    <input type="text" class="form-control" value="<?= $objFollowup->firstdiscussionby; ?>" id="firstdiscussionby" 
                        name="firstdiscussionby" placeholder="First Discussion By"> -->

                        <select class="form-control input-sm" id="firstdiscussionby" name="firstdiscussionby">
                            <option value="<?= $objFollowup->firstdiscussionby; ?>"><?= $objFollowup->firstdiscussionby; ?></option>
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
                      <!--   <input type="text" class="form-control" value="<?= $objFollowup->firstremark; ?>" id="firstremark"
                         name="firstremark" placeholder="First Remark"> -->
                        <textarea class="form-control" id="firstremark" name="firstremark" rows="3"placeholder="First Remark"><?= $objFollowup->firstremark; ?></textarea>
                        <p id="err-firstremark" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Description" class="col-sm-2 form-control-label">Attended By</label>
                    <div class="col-sm-10">
                        <!-- <input type="text" class="form-control"   value="<?= $objFollowup->attendedby; ?>" id="attendedby" 
                        name="attendedby" placeholder="Attended By"> -->
                        <select class="form-control input-sm" id="attendedby" name="attendedby">
                            <option value="<?= $objFollowup->attendedby; ?>"><?= $objFollowup->attendedby; ?></option>
                            <?php
                            foreach ($objUsers AS $rowF) {
                                echo "<option value='" . $rowF->username . "'>" . $rowF->username . "</td>";
                            }
                            ?>
                        </select>

                        <p id="err-attendedby" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Description" class="col-sm-2 form-control-label">Attended Remark</label>
                    <div class="col-sm-10">
<!--                         <input type="text" class="form-control" value="<?= $objFollowup->attendedremark; ?>" id="attendedremark"
                         name="attendedremark" placeholder="Attended Remark"> -->
                        <textarea class="form-control" id="attendedremark" name="attendedremark" rows="3"placeholder="Attended Remark"><?= $objFollowup->attendedremark; ?></textarea>
                        <p id="err-attendedremark" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Description" class="col-sm-2 form-control-label">Followup Date</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control"  value="<?= $objFollowup->followupdate; ?>" id="followupdate" 
                               name="followupdate" placeholder="Followup Date">
                        <p id="err-followupdate" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Status" class="col-sm-2 form-control-label">Status</label>
                    <div class="col-sm-10">
                        <select class="form-control input-sm" id="status" name="status">
                            <option value="<?= $objFollowup->status; ?>"><?= $objFollowup->status; ?></option>
                            <option value="Followup">Followup</option>
                            <option value="Dead">Dead</option>
                            <option value="Closed">Closed</option>
                        </select>


                        <p id="err-status" class="text-danger"></p>
                    </div>
                </div>



                <div class="form-group row">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="button" onclick="saveUpdatefollowup();" class="btn btn-success">Save</button>
                        <button type="button" onclick="resetUpdatecustomer();" class="btn btn-success">Cancel</button>
                    </div>
                </div>
            </form>
        </div> <!-- /tab-panel archictecture -->

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
<link rel="stylesheet" href="vendor/foundation-date-time-picker/css/foundation-datepicker.min.css"/>
<script src="vendor/foundation-date-time-picker/js/foundation-datepicker.min.js"></script> 


<script>
                            $(document).ready(function () {
                                $('#followupdate').fdatepicker({format: 'yyyy-mm-dd'});
                            });

                            function getpropertynames() {
                                var obj = new Object();
                                obj.projecttype = $('#projecttype').val();
                                // obj.propertyid = $('#propertyid').val();


                                $.ajax({
                                    url: 'index.php?r=property/getpropertynames',
                                    async: false,
                                    data: obj,
                                    type: 'POST',
                                    success: function (dataAll) {
                                        dataAll = JSON.parse(dataAll);
                                        console.log(dataAll);

                                        var html = '';
                                        $.each(dataAll.data, function (k, v) {
                                            html += ' <option  value="' + v.id + '" >' + v.name + '</option>';
                                        });
                                        $('#propertyid').html(html);


                                    }
                                });


                            }

                            function saveUpdatefollowup() {
                                var price = $('#follow-expectedprice').val();
                                var priceFormat = $('#price-format').val();
                                if (priceFormat == 'Lakh') {
                                    var amt = price * 100000;
                                } else if (priceFormat == 'Thousand') {
                                    var amt = price * 1000;
                                } else if (priceFormat == 'Crore') {
                                    var amt = price * 10000000;
                                }
                                $("#dialog").attr('title', 'Save Update Followup');
                                $("#dialog-msg").html('Saving in Progress.');
                                $("#dialog").dialog({
                                    modal: true,
                                });
                                // if (validateFollowup()) {
                                var obj = new Object();
                                obj.followup_id = $('#followup_id').val();
                                obj.propertyid = $('#propertyid').val();
                                obj.rentpurchase = $('#rentpurchase').val();
                                obj.newresale = $('#newresale').val();
                                obj.projecttype = $('#projecttype').val();
                                obj.expectedprice = amt;
                                obj.industypeofproperty = $('#industypeofproperty').val();
                                obj.comtypeofproperty = $('#comtypeofproperty').val();
                                obj.restypeofproperty = $('#restypeofproperty').val();
                                obj.firstdiscussionby = $('#firstdiscussionby').val();
                                obj.firstremark = $('#firstremark').val();
                                obj.attendedby = $('#attendedby').val();
                                obj.attendedremark = $('#attendedremark').val();
                                obj.followupdate = $('#followupdate').val();
                                obj.status = $('#status').val();

                                $.ajax({
                                    url: 'index.php?r=property/updatefollowup',
                                    async: false,
                                    data: obj,
                                    type: 'POST',
                                    success: function (data) {
                                        console.log(data);


                                        alertify.alert("Followup Updated Succesfully !!", function () {
                                        });


                                        $('#dialog').dialog("close");
                                        $('#myTab a:first').tab('show');
                                    }
                                });

                            }


                            function validateFollowup() {
                                var flag = true;

                                var nameOriginal = $('#name').val();
                                var name = nameOriginal.trim();
                                var phoneOriginal = $('#phone').val();
                                var phone = phoneOriginal.trim();
                                var status = $('#status').val();
                                var emailOriginal = $('#email').val();
                                var email = emailOriginal.trim();


                                if (name == '') {
                                    $('#err-name').html('Enter name');
                                    var flag = false;
                                } else {
                                    $('#err-name').html('');
                                }
                                if (phone == '') {
                                    $('#err-phone').html('Enter phone');
                                    var flag = false;
                                } else {
                                    $('#err-phone').html('');
                                }

                                if (email == '') {
                                    $('#err-email').html('');
                                } else {
                                    if (email.length != 0) {
                                        var reg = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
                                        if (!reg.test(email)) {
                                            $('#err-email').html('Enter valid email');
                                            var flag = false;
                                        } else {
                                            $('#err-email').html('');
                                        }
                                    }
                                }



                                if (status == '') {
                                    $('#err-status').html('Enter status');
                                    var flag = false;
                                } else {
                                    $('#err-status').html('');
                                }
                                return flag;
                            }


</script>