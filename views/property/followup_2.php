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
        <div role="tabpanel" class="col-sm-8 tab-pane active" id="followup"> <!-- /tab-panel -list -->
            <h2> FOLLOW UP DETAILS</h2>
              <input type="hidden" value="<?= $objFollowup->id; ?>" id="followup_id">
           <form id="Followup">

<div class="form-group row control-group">
                    <label for="title" class="col-sm-2 form-control-label">Coustomer Name</label>
                    <div class="col-sm-10">
                     <input type="text" class="form-control" value="<?= $objCustomer->name; ?>" id="customername" 
                        name="customername" placeholder="Customer Name" readonly>
                        <p id="err-customername" class="text-danger"></p>
                    </div>
                </div>           

     <div class="form-group row control-group">
                    <label for="title" class="col-sm-2 form-control-label">Project Type</label>
                    <div class="col-sm-10">
                    <select class="form-control input-sm" id="projecttype" name="projecttype" onblur="getpropertynames()">
                         <option value="<?= $objFollowup->projecttype; ?>"><?= $objFollowup->projecttype; ?></option>
                        <option value="Residential">Residential</option>
                        <option value="Commercial">Commercial</option>
                        <option value="Resell">Resell</option>
                        </select>
                        <p id="err-projecttype" class="text-danger"></p>
                    </div>
                </div>
            
            <div class="form-group row control-group">
                    <label for="title" class="col-sm-2 form-control-label" id="select_property_name">Select Property Name</label>
                    <div class="col-sm-10">
                         <select class="form-control input-sm" id="propertyid" name="propertyid">
                         <option value="<?= $perticularProperty['id']; ?>"><?= $perticularProperty['name']; ?></option>
                        </select>
                        <p id="err-propertyid" class="text-danger"></p>
                    </div>
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
                        echo "<option value='".$rowF->username."'>" . $rowF->username . "</td>";
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
                        echo "<option value='".$rowF->username."'>" . $rowF->username . "</td>";
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
  $(document).ready(function() {
      $('#followupdate').fdatepicker({format: 'yyyy-mm-dd'});
    });

function getpropertynames(){
 var obj = new Object();
        obj.projecttype = $('#projecttype').val();
        // obj.propertyid = $('#propertyid').val();


                    $.ajax({
                            url:'index.php?r=property/getpropertynames',
                            async:false,
                            data: obj,
                            type:'POST',
                            success:function(dataAll){
                 dataAll = JSON.parse(dataAll);
                 console.log(dataAll);

                var html = '';
                $.each(dataAll.data, function(k,v){
                 html += ' <option  value="' + v.id + '" >' + v.name + '</option>';
                });
$('#propertyid').html(html);


                }
            });


}
    
    function saveUpdatefollowup() {
        $("#dialog").attr('title', 'Save Update Followup');
        $("#dialog-msg").html('Saving in Progress.');
        $("#dialog").dialog({
            modal: true,
        });
        // if (validateFollowup()) {
        var obj = new Object();
            obj.followup_id = $('#followup_id').val();
            obj.propertyid = $('#propertyid').val();
            obj.firstdiscussionby = $('#firstdiscussionby').val();
            obj.firstremark = $('#firstremark').val();
            obj.attendedby = $('#attendedby').val();
            obj.attendedremark = $('#attendedremark').val();
            obj.followupdate = $('#followupdate').val();
            obj.status = $('#status').val();

                    $.ajax({
                            url:'index.php?r=property/updatefollowup',
                            async:false,
                            data: obj,
                            type:'POST',
                            success:function(data){
                    console.log(data);


 alertify.alert("Followup Updated Succesfully !!", function(){
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
            if(email.length != 0){        
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