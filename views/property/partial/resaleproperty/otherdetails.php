<h2>Ameneties</h2>
<div class="container" id="myTab">
    <div class="row">
        <div class="col-sm-8"> 
            <form id="Newamaneties">
            <input type="hidden" id="resalepropertyid" value="<?php echo $objResaleproperty->id; ?>">
                <div class="form-group row control-group">
                    <label for="Username" class="col-sm-2 form-control-label">Society Name</label>
                    <div class="col-sm-10">
                        <input  type="text" class="form-control input-sm" value="<?php echo $objResaleproperty->societyname; ?>"
                         id="societyname" name="societyname" value="" placeholder="Society Name">
                        <p id="err-societyname" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Towers" class="col-sm-2 form-control-label">Building Name</label>
                    <div class="col-sm-10">
                        <input  type="text" class="form-control input-sm"  value="<?php echo $objResaleproperty->buildingname; ?>"
                         id="buildingname" name="buildingname" value="" placeholder="Building Name">
                        <p id="err-buildingname" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Towers" class="col-sm-2 form-control-label">Wing</label>
                    <div class="col-sm-10">
                        <input  type="text" class="form-control input-sm"  value="<?php echo $objResaleproperty->wing; ?>"
                        id="wing" name="wing" value="" placeholder="Wing ">
                        <p id="err-wing" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Towers" class="col-sm-2 form-control-label">Flat Number</label>
                    <div class="col-sm-10">
                        <input  type="text" class="form-control input-sm" value="<?php echo $objResaleproperty->flatnumber; ?>"
                         id="flatnumber" value="" name="flatnumber" value="" placeholder="Flat Number">
                        <p id="err-flatnumber" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Towers" class="col-sm-2 form-control-label">Floor Number</label>
                    <div class="col-sm-10">
                        <input  type="text" class="form-control input-sm" value="<?php echo $objResaleproperty->floornumber; ?>"
                         id="floornumber" value="" name="floornumber" value="" placeholder="Floor Number">
                        <p id="err-floornumber" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Towers" class="col-sm-2 form-control-label">Deatiled Address</label>
                    <div class="col-sm-10">
                        <input  type="text" class="form-control input-sm" value="<?php echo $objResaleproperty->detailaddress; ?>"
                         id="detailaddress" value="" name="detailaddress" value="" placeholder="Deatiled Address">
                        <p id="err-detailaddress" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Towers" class="col-sm-2 form-control-label">Landmark</label>
                    <div class="col-sm-10">
                        <input  type="text" class="form-control input-sm"  value="<?php echo $objResaleproperty->landmark; ?>"
                         id="landmark" value="" name="landmark" value="" placeholder="Landmark">
                        <p id="err-landmark" class="text-danger"></p>
                    </div>
                </div>
            
                <div class="form-group row control-group">
                    <label for="Towers" class="col-sm-2 form-control-label">Property Area</label>
                    <div class="col-sm-10">
                        <input  type="text" class="form-control input-sm"  value="<?php echo $objResaleproperty->propertyarea; ?>"
                         id="propertyarea" value="" name="propertyarea" value="" placeholder="Square Feet">
                        <p id="err-propertyarea" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Towers" class="col-sm-2 form-control-label">Reserve Parking</label>
                    <div class="col-sm-10">
                        <input  type="text" class="form-control input-sm"  value="<?php echo $objResaleproperty->reserveparking; ?>"
                         id="reserveparking" value="" name="reserveparking" value="" placeholder="Reserve Parking">
                        <p id="err-landmark" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Towers" class="col-sm-2 form-control-label">Lift</label>
                    <div class="col-sm-10">
                        <input  type="text" class="form-control input-sm"  value="<?php echo $objResaleproperty->lift; ?>"
                         id="lift" value="" name="lift" value="" placeholder="Lift">
                        <p id="err-lift" class="text-danger"></p>
                    </div>
                </div>                                
                <div class="form-group row control-group">
                    <label for="Towers" class="col-sm-2 form-control-label">Property Facing</label>
                    <div class="col-sm-10">
                        <input  type="text" class="form-control input-sm"  value="<?php echo $objResaleproperty->propertyfacing; ?>"
                         id="propertyfacing" value="" name="propertyfacing" value="" placeholder="Property Facing">
                        <p id="err-propertyfacing" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Towers" class="col-sm-2 form-control-label">Furniture</label>
                    <div class="col-sm-10">
                        <input  type="text" class="form-control input-sm"  value="<?php echo $objResaleproperty->furniture; ?>"
                         id="furniture" value="" name="furniture" value="" placeholder="Furniture">
                        <p id="err-furniture" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Towers" class="col-sm-2 form-control-label">Remarks</label>
                    <div class="col-sm-10">
                        <input  type="text" class="form-control input-sm"  value="<?php echo $objResaleproperty->remarks; ?>"
                         id="remarks" value="" name="remarks" value="" placeholder="Remarks">
                        <p id="err-remarks" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Towers" class="col-sm-2 form-control-label">Property Sourced By</label>
                    <div class="col-sm-10">
                        <input  type="text" class="form-control input-sm"  value="<?php echo $objResaleproperty->propertysource; ?>"
                         id="propertysource" value="" name="propertysource" value="" placeholder="Property source">
                        <p id="err-propertysource" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Towers" class="col-sm-2 form-control-label">Date</label>
                    <div class="col-sm-10">
                        <input  type="text" class="form-control input-sm"  value="<?php echo $objResaleproperty->date; ?>"
                         id="date" value="" name="date" value="" placeholder="Security Doors">
                        <p id="err-date" class="text-danger"></p>
                    </div>
                </div>
                
                <div class="form-group row">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button onclick="saveResleotherdetails();" type="button" class="btn btn-success">Save</button>
                        <button onclick="resetProfile();" type="button" class="btn btn-success">Cancel</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-sm-4 imageScroll">
            <div id="imageamaneti" class="card">
                <div class="card-block">
                    <h3> Others imgaes</h3>
                    <h4 class="card-title">Drop Image Or <button type="button" id="clickimageamaneti" class="btn btn-secondary btn-sm">Click here</button></h4>
                    <progress id="progressimage" class="hide progress" value="0" max="100">0%</progress>
                </div>
            </div>
            <?php
            foreach ($objResalepropertyimage AS $objImage) {
                 if ($objImage->type == 'other') {
                    echo ' <div class="card ">';
                    echo' <div class="dz-error-mark"><span id="delete_image" onclick="delete_image(' . $objImage->id . ')">✘</span></div>';
                    echo '<img id="image" class=" img-thumbnail card-img-top  " src="' . $objImage->path . '" alt="Click me to remove the file." data-dz-remove>';
                    echo ' </div>';
            }
            }
            ?>
        </div>
        <br>
        <br>
        <br>
        
        <div class="col-sm-4 imageScroll">
            <div id="florplan" class="card">
                <div class="card-block">
                    <h3> Floor Plan imgaes</h3>
                    <h4 class="card-title">Drop Image Or <button type="button" id="clickiflorplan" class="btn btn-secondary btn-sm">Click here</button></h4>
                    <progress id="progressimage" class="hide progress" value="0" max="100">0%</progress>
                </div>
            </div>
            <?php
            foreach ($objResalepropertyimage AS $objImage) {
                  if ($objImage->type == 'florplan') {
                    echo ' <div class="card ">';
                    echo' <div class="dz-error-mark"><span id="deleteFlorplanimg" onclick="deleteFlorplanimg(' . $objImage->id . ')">✘</span></div>';
                    echo '<img id="image" class=" img-thumbnail card-img-top  " src="' . $objImage->path . '" alt="Click me to remove the file." data-dz-remove>';
                    echo ' </div>';
            }
            }
            ?>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        // Dropzone class:
        var id = $('#resalepropertyid').val();
        var myDropzone = new Dropzone("#imageamaneti", {
            url: "index.php?r=property/uploadresalepropertyimage&id=" + id + "&type=other",
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
            location.reload();      
        });
    });
    $(document).ready(function () {
        // Dropzone class:
        var id = $('#resalepropertyid').val();
        var myDropzone = new Dropzone("#florplan", {
            url: "index.php?r=property/uploadresalepropertyflorplan&id=" + id + "&type=florplan",
            clickable: '#clickiflorplan',
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
            location.reload();      
        });
    });

    function delete_image(id) {
        alertify.confirm("Are you sure you want to Delete Image ?",
                function () {

                    var obj = new Object();
                    obj.id = id;
                    $.ajax({
                        url: "index.php?r=property/deleteresalepropertyother",
                        async: false,
                        data: obj,
                        type: 'POST',
                        success: function (data) {
                            data = JSON.parse(data);
                            alertify.alert("Image Deleted !!", function () {
                                location.reload();
                            });

                        }
                    });
                });

    }
    function deleteFlorplanimg(id) {
        alertify.confirm("Are you sure you want to Delete Image ?",
                function () {

                    var obj = new Object();
                    obj.id = id;
                    $.ajax({
                        url: "index.php?r=property/deleteresalepropertyflorplan",
                        async: false,
                        data: obj,
                        type: 'POST',
                        success: function (data) {
                            data = JSON.parse(data);
                            alertify.alert("Image Deleted !!", function () {
                                location.reload();
                            });

                        }
                    });
                });
    }




function saveResleotherdetails() {

    var obj = new Object();
    
            obj.resalepropertyid = $('#resalepropertyid').val();
            obj.societyname = $('#societyname').val();
            obj.buildingname = $('#buildingname').val();
            obj.wing = $('#wing').val();
            obj.flatnumber = $('#flatnumber').val();
            obj.floornumber = $('#floornumber').val();
            obj.detailaddress = $('#detailaddress').val();
            obj.landmark = $('#landmark').val();
            obj.reserveparking = $('#reserveparking').val();
            obj.lift = $('#lift').val();
            obj.propertyfacing = $('#propertyfacing').val();
            obj.furniture = $('#furniture').val();
            obj.propertyarea = $('#propertyarea').val();
            obj.remarks = $('#remarks').val();
            obj.propertysource = $('#propertysource').val();
            obj.date = $('#date').val();
                    $.ajax({
                            url:'index.php?r=property/saveupdateotherdetails',
                            async:false,
                            data: obj,
                            type:'POST',
                            success:function(data){
                    console.log(data);


 alertify.alert("Resale Property Other Deatils Updated Succesfully !!", function(){
                });



                }
            });


    }



</script>