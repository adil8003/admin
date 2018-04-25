<?php
$this->title = Yii::t('app', 'Builder');
?>
<!-- Nav Bar- start-->
<div class="container">
    <ul class="nav nav-tabs" role="tablist" id="Property">
        <li class="nav-item">
            <a class="nav-link" href="#builder" role="tab" data-toggle="tab" aria-controls="builder">Builder Info</a>
        </li>
    </ul>
    <!-- Nav Bar- start-->
    <div class="tab-content">
        <div role="tabpanel" class="col-sm-8 tab-pane active" id="builder" > <!-- /tab-panel -list -->
            <h2>Builder Info</h2>
            <input type="hidden" value="<?= $objBuilder->id; ?>" id="builder_id">
           <form id="Builder_info">
                <div class="form-group row control-group">
                    <label for="title" class="col-sm-2 form-control-label">Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control"  value="<?= $objBuilder->name; ?>" id="name" name="name" placeholder="Builder Name">
                        <p id="err-name" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Description" class="col-sm-2 form-control-label">Company Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" value="<?= $objBuilder->companyname; ?>" id="companyname" name="companyname" placeholder="Company Name">
                        <p id="err-companyname" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Description" class="col-sm-2 form-control-label">Contact</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control"  value="<?= $objBuilder->contact; ?>"  id="contact" name="contact" placeholder="contact">
                        <p id="err-contact" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Description" class="col-sm-2 form-control-label">Email</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control"  value="<?= $objBuilder->email; ?>" id="email" name="email" placeholder="Email">
                        <p id="err-email" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Description" class="col-sm-2 form-control-label">Website</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control"  value="<?= $objBuilder->website; ?>" id="website" name="website" placeholder="Website">
                        <p id="err-website" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Description" class="col-sm-2 form-control-label">Office Contact</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" value="<?= $objBuilder->officecontact; ?>" id="officecontact" name="officecontact" placeholder="Office Contact">
                        <p id="err-description" class="text-danger"></p>
                    </div>
                </div>
               <div class="form-group row control-group">
                    <label for="Description" class="col-sm-2 form-control-label">Description</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control"  value="<?= $objBuilder->description; ?>"  id="description" name="description" placeholder="Description">
                        <p id="err-description" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Status" class="col-sm-2 form-control-label">Status</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control input-sm" value="<?= $objBuilder->status; ?>" id="status" name="status" value="">
                        <p id="err-status" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="button" onclick="saveUpdatebuilder();" class="btn btn-success">Save</button>
                        <button type="button" onclick="resetUpdateleave();" class="btn btn-success">Cancel</button>
                    </div>
                </div>
            </form>
        </div> <!-- /tab-panel archictecture -->
        <div class="col-sm-4">
            <div id="imagecost" class="card">
                <div class="card-block">
                    
                    <h4 class="card-title">Drop Image Or <button type="button" id="clickbuilderlogo" class="btn btn-secondary btn-sm">Click here</button></h4>
                    <progress id="progressimagebuilder" class="hide progress" value="0" max="100">0%</progress>
                </div>
            </div>
              <?php
                    if(isset($objBuilder->picpath)){
                if(($objBuilder->picpath=="") ||($objBuilder->picpath==null))
               {?>
            <img height="150px" width="230px" src="/resources/builders/no_image.jpg">
            <?php }
             else{ ?> 
            <img height="150px" width="230px" src=" <?= $objBuilder->picpath; ?> "><br><br>
               <?php }}  else{  ?> 
           <img height="150px" width="230px" src="/resources/builders/no_image.jpg">
            <?php }?> 
            <div id="builderlogo" class="card">
                <div class="card-block">
                    
                    <h4 class="card-title">Drop Image Or <button type="button" id="clickimagecost" class="btn btn-secondary btn-sm">Click here</button></h4>
                    <progress id="progressimage" class="hide progress" value="0" max="100">0%</progress>
                </div>
            </div>
                <?php
                    if(isset($objBuilder->logopath)){
                if(($objBuilder->logopath=="") ||($objBuilder->logopath==null))
                {?>
                  <p><b>Company Logo</b></p> 
           <img height="150px" width="230px" src="/resources/builders/no-logo.png">
            <?php }
        else{        ?> 
            <p><b>Company Logo</b></p>
            <img height="150px" width="230px" src=" <?= $objBuilder->logopath; ?> ">
               <?php }} else{  ?> 
                     <p><b>Company Logo</b></p> 
           <img height="150px" width="230px" src="/resources/builders/no-logo.png">
            <?php }?> 
        </div>
    </div><!-- /tab-content 
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
    #my-file { visibility: hidden; }
</style>
<script>
  $(document).ready(function() {
        

        var id = $('#builder_id').val();

        var myDropzone = new Dropzone("#imagecost", {
            url: "index.php?r=property/uploadbilderlogo&id=" + id + "",
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
//             location.reload();
        });
      });
      $(document).ready(function() {

        var id = $('#builder_id').val();
        var myDropzone = new Dropzone("#builderlogo", {
            url: "index.php?r=property/uploadbilderimage&id=" + id + "",
            clickable: '#clickbuilderlogo',
            previewTemplate: '<div style="display:none"></div>'
        });
        myDropzone.on("addedfile", function(file) {
            $('#progressimagebuilder').removeClass('hide');
        });
        myDropzone.on("uploadprogress", function(file, progress, bytesSent) {
            $('#progressimagebuilder').attr('value', progress);
            $('#progressimagebuilder').html(bytesSent + ' bytes');
        });
        myDropzone.on("complete", function(file) {
            $('#progressimagebuilder').addClass('hide');
//             location.reload();
        });
      });
   function validateWebsite(website) {
                var re = /(https?:\/\/(?:www\.|(?!www))[^\s\.]+\.[^\s]{2,}|www\.[^\s]+\.[^\s]{2,})/;
                return re.test(website);
            }

    function saveUpdatebuilder() {

        $("#dialog").attr('title', ' Save Update Builder Info');
        $("#dialog-msg").html('Saving in Progress.');
        $("#dialog").dialog({
            modal: true,
        });
        if (validateBuilder()) {
        var obj = new Object();
            obj.builder_id = $('#builder_id').val();
            obj.name = $('#name').val();
            obj.companyname = $('#companyname').val();
            obj.contact = $('#contact').val();
            obj.email = $('#email').val();
            obj.website = $('#website').val();
            obj.officecontact = $('#officecontact').val();
            obj.description = $('#description').val();
            obj.status = $('#status').val();
                    $.ajax({
                            url:'index.php?r=property/updatebuilder',
                            async:false,
                            data: obj,
                            type:'POST',
                            success:function(data){
                    console.log(data)
                    $('#dialog').dialog("close");
                    $('#myTab a:first').tab('show');
                      alertify.alert("Builder Saved Succesfully !!", function(){
                    
                  });
                }
            });
        } else {
            $('#dialog').dialog("close");
        }
    }
    function validateBuilder(){
		  var flag = true;
        var nameOriginal = $('#name').val();
        var name = nameOriginal.trim();
        var companynameOriginal = $('#companyname').val();
        var companyname = companynameOriginal.trim();
        var contactOriginal = $('#contact').val();
        var contact = contactOriginal.trim();
        var statusOriginal = $('#status').val();
        var status = statusOriginal.trim();
        var emailOriginal = $('#email').val();
        var email = emailOriginal.trim();
        var websiteOriginal = $('#website').val();
        var website = websiteOriginal.trim();



        if (name == '') {
            $('#err-name').html('Enter name');
            var flag = false;
        } else {
            $('#err-name').html('');
        }
        if (companyname == '') {
            $('#err-companyname').html('Enter company name');
            var flag = false;
        } else {
            $('#err-companyname').html('');
        }
        if (contact == '') {
            $('#err-contact').html('Enter contact');
            var flag = false;
        } else {
            $('#err-contact').html('');
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

        if (website == '') {
                $('#err-website').html('');
        } else {
            if(website.length != 0){        
                  if (validateWebsite(website) == false) {
                $('#err-website').html('Enter valid website');
                    var flag = false;
                } else {
                    $('#err-website').html('');
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