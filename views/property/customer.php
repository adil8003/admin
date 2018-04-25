<?php
$this->title = Yii::t('app', 'Residential Property');
?>
<!-- Nav Bar- start-->
<div class="container">
    <ul class="nav nav-tabs" role="tablist" id="Property">
        <li class="nav-item">
            <a class="nav-link" href="#customer" role="tab" data-toggle="tab" aria-controls="customer">Customer Information</a>
        </li>
    </ul>
    <!-- Nav Bar- start-->
    <div class="tab-content">
        <div role="tabpanel" class="col-sm-8 tab-pane active" id="customer"> <!-- /tab-panel -list -->
            <h2> Customer Info</h2>
              <input type="hidden" value="<?= $objCustomer->id; ?>" id="customer_id">
           <form id="Builder_info">
                <div class="form-group row control-group">
                    <label for="title" class="col-sm-2 form-control-label">Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" value="<?= $objCustomer->name; ?>" id="name" name="name" placeholder="Customer Name">
                        <p id="err-name" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Description" class="col-sm-2 form-control-label">phone</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" value="<?= $objCustomer->phone; ?>" id="phone" name="phone" placeholder="Phone No">
                        <p id="err-phone" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Description" class="col-sm-2 form-control-label">Email</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control"   value="<?= $objCustomer->email; ?>" id="email" name="email" placeholder="Email">
                        <p id="err-email" class="text-danger"></p>
                    </div>
                </div>
               <div class="form-group row control-group">
                    <label for="Description" class="col-sm-2 form-control-label">Location</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" value="<?= $objCustomer->location; ?>" id="location" name="location" placeholder="Location">
                        <p id="err-location" class="text-danger"></p>
                    </div>
                </div>
               <div class="form-group row control-group">
                    <label for="Description" class="col-sm-2 form-control-label">City</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control"  value="<?= $objCustomer->city; ?>" id="city" name="city" placeholder="city">
                        <p id="err-city" class="text-danger"></p>
                    </div>
                </div>
               <div class="form-group row control-group">
                    <label for="Description" class="col-sm-2 form-control-label">Pincode</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" value="<?= $objCustomer->pincode; ?>" id="pincode" name="pincode" placeholder="Pincode">
                        <p id="err-pincode" class="text-danger"></p>
                    </div>
                </div>
               <div class="form-group row control-group">
                    <label for="Description" class="col-sm-2 form-control-label">Description</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control"  value="<?= $objCustomer->description; ?>" id="description" name="description" placeholder="Description">
                        <p id="err-description" class="text-danger"></p>
                    </div>
                </div>
              <div class="form-group row control-group">
                    <label for="Contacted By" class="col-sm-2 form-control-label">Contacted By</label>
                    <div class="col-sm-10">
                        <input disabled="disabled" type="text" class="form-control"  value="<?= $objCustomer->contacted_by; ?>" id="description" name="description" placeholder="Description">
                        <p id="err-description" class="text-danger"></p>
                    </div>
                </div>
              <div class="form-group row control-group">
                    <label for="Description" class="col-sm-2 form-control-label">Message Date</label>
                    <div class="col-sm-10">
                        <input disabled="disabled" type="text" class="form-control"  value="<?= $objCustomer->message_date; ?>" id="description" name="description" placeholder="Description">
                        <p id="err-description" class="text-danger"></p>
                    </div>
                </div>

              <div class="form-group row control-group">
                    <label for="Description" class="col-sm-2 form-control-label">Source</label>
                    <div class="col-sm-10">
                        <input disabled="disabled" type="text" class="form-control"  value="<?= $objCustomer->addedby; ?>" id="description" name="description" placeholder="Description">
                        <p id="err-description" class="text-danger"></p>
                    </div>
                </div>




                <div class="form-group row control-group">
                    <label for="Status" class="col-sm-2 form-control-label">Status</label>
                    <div class="col-sm-10">
                       <!--  <input type="text" class="form-control input-sm" value="<?= $objCustomer->status; ?>"  id="status" name="status" > -->
                     <select class="form-control input-sm" id="status" name="customer-status">
                         <option value="<?= $objCustomer->status; ?>"><?= $objCustomer->status; ?></option>
                        <option value="Followup">Followup</option>
                        <option value="Dead">Dead</option>
                        <option value="Closed">Closed</option>
                        </select>


                        <p id="err-status" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="button" onclick="saveUpdatecustomer();" class="btn btn-success">Save</button>
                        <button type="button" onclick="resetUpdatecustomer();" class="btn btn-success">Cancel</button>
                    </div>
                </div>
            </form>
        </div> <!-- /tab-panel archictecture -->
       <div class="col-sm-4">
            <div id="imagecost" class="card">
                <div class="card-block">
                    
                    <h4 class="card-title">Drop Image Or <button type="button" id="clickimagecost" class="btn btn-secondary btn-sm">Click here</button></h4>
                    <progress id="progressimage" class="hide progress" value="0" max="100">0%</progress>
                </div>
               
            </div>
                <?php
                   if(isset($objCustomer->picpath)){
                if(($objCustomer->picpath=="") ||($objCustomer->picpath==null))
                {?>
           <img height="150px" width="230px" src="/resources/customer/no_image.jpg">
            <?php }
        else{        ?> 
            <img height="150px" width="230px" src=" <?= $objCustomer->picpath; ?>  ">
            <?php }} ?> 
       </div>
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
<script>
    $(document).ready(function() {
        var id = $('#customer_id').val();
        var myDropzone = new Dropzone("#imagecost", {
            url: "index.php?r=property/uploadcustomerimage&id=" + id + "",
            clickable: '#clickimagecost',
            previewTemplate: '<div style="display:none"></div>'
        });
        myDropzone.on("addedfile", function(file) {
            $('#progressimage').removeClass('hide');
        });
        myDropzone.on("uploadprogress", function(file, progress, bytesSent) {
            $('#progressimage').attr('value', progress);
            $('#progressimage').html(bytesSent + ' bytes');
        });
        myDropzone.on("complete", function(file) {
            $('#progressimage').addClass('hide');
             location.reload();
        });
    });
    function saveUpdatecustomer() {
        $("#dialog").attr('title', ' Save Update Customer Info');
        $("#dialog-msg").html('Saving in Progress.');
        $("#dialog").dialog({
            modal: true,
        });
        if (validateCustomer()) {
        var obj = new Object();
            obj.customer_id = $('#customer_id').val();
            obj.name = $('#name').val();
            obj.phone = $('#phone').val();
            obj.email = $('#email').val();
            obj.location = $('#location').val();
            obj.city = $('#city').val();
            obj.pincode = $('#pincode').val();
            obj.picpath = $('#picpath').val();
            obj.description = $('#description').val();
            obj.status = $('#status').val();
// alert(obj.status);
// return false;
                    $.ajax({
                            url:'index.php?r=property/updatecustomer',
                            async:false,
                            data: obj,
                            type:'POST',
                            success:function(data){
                    console.log(data);


 alertify.alert("Customer Updated Succesfully !!", function(){
                    // resetCustomer();
                });


                    $('#dialog').dialog("close");
                    $('#myTab a:first').tab('show');
                }
            });
        } else {
            $('#dialog').dialog("close");
        }
    }


    function validateCustomer() {
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