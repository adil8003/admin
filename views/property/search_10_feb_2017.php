<?php
$this->title = Yii::t('app', 'Search');
?>
<!-- Nav Bar- start-->
<div class="container">
    <ul class="nav nav-tabs" role="tablist" id="search">
        <li class="nav-item">
            <a class="nav-link" href="#resprojectactive" role="tab" data-toggle="tab" aria-controls="resprojectactive">ACTIVE Res Project</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#resproject" role="tab" data-toggle="tab" aria-controls="resproject">ALL Res Project</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#comproject" role="tab" data-toggle="tab" aria-controls="comproject">Com Project</a>
        </li>
      <!--   <li class="nav-item">
            <a class="nav-link" href="#comproperty" role="tab" data-toggle="tab" aria-controls="comproperty">Com Property </a>
        </li> -->
        <li class="nav-item">
            <a class="nav-link" href="#builder" role="tab" data-toggle="tab" aria-controls="builder">Builder</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#customer" role="tab" data-toggle="tab" aria-controls="customer">Customer</a>
        </li>
<!--         <li class="nav-item">
            <a class="nav-link" href="#followup" role="tab" data-toggle="tab" aria-controls="followup">Followups</a>
        </li> -->
        <li class="nav-item">
            <a class="nav-link" href="#pendingfollowup" role="tab" data-toggle="tab" aria-controls="pendingfollowup">Pending Followups</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="#genfeedback" role="tab" data-toggle="tab" aria-controls="genfeedback">Genral FeedBack</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="#resalepropertyactive" role="tab" data-toggle="tab" aria-controls="resalepropertyactive">ACTIVE Resale Property</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="#resaleproperty" role="tab" data-toggle="tab" aria-controls="resaleproperty">ALL Resale Property</a>
        </li>
    </ul>
    <!-- Nav Bar- start-->
    <div class="tab-content">
       
        <div role="tabpanel" class="tab-pane active" id="resprojectactive"> <!-- /tab-panel -resproject -->
            <h2>ACTIVE Residential Project</h2>
            <table id="tblresprojectactive" class="table table-striped table-bordered DataTable" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Location</th>
                        <th>City</th>
                        <th>Pincode</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($objResprojectActive AS $row) {
                        echo "<tr>";
                        echo "<td>" . $row->id . "</td>";
                        echo "<td><a href='index.php?r=property/resproject&id=" . $row->id . "' target='_blank'>" . $row->name . "</a></td>";
                        echo "<td>" . $row->location . "</td>";
                        echo "<td>" . $row->city . "</td>";
                        echo "<td>" . $row->pincode . "</td>";
                        echo "<td>" . $row->status . "</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div> <!-- /tab-panel resproject -->

<!-- //////////////////////////////////////////// -->
        
        <div role="tabpanel" class="tab-pane" id="resproject"> <!-- /tab-panel -resproject -->
            <h2>ALL Residential Project</h2>
            <table id="tblresproject" class="table table-striped table-bordered DataTable" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Location</th>
                        <th>City</th>
                        <th>Pincode</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($objResproject AS $row) {
                        echo "<tr>";
                        echo "<td>" . $row->id . "</td>";
                        echo "<td><a href='index.php?r=property/resproject&id=" . $row->id . "' target='_blank'>" . $row->name . "</a></td>";
                        echo "<td>" . $row->location . "</td>";
                        echo "<td>" . $row->city . "</td>";
                        echo "<td>" . $row->pincode . "</td>";
                        echo "<td>" . $row->status . "</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div> <!-- /tab-panel resproject -->
        


        <!-- ///////////////////////////// -->

        <div role="tabpanel" class="tab-pane" id="comproject"> <!-- /tab-panel -comproject -->
            <h2>Commercial Project</h2>
            <table id="tblcomproject" class="table table-striped table-bordered DataTable" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Location</th>
                        <th>City</th>
                        <th>Pincode</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($objComproject AS $row) {
                        echo "<tr>";
                        echo "<td>" . $row->id . "</td>";
                        echo "<td><a href='index.php?r=property/comproject&id=" . $row->id . "' target='_blank'>" . $row->name . "</a></td>";
                        echo "<td>" . $row->location . "</td>";
                        echo "<td>" . $row->city . "</td>";
                        echo "<td>" . $row->pincode . "</td>";
                        echo "<td>" . $row->status . "</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div> <!-- /tab-panel comproject -->




        <div role="tabpanel" class="tab-pane" id="comproperty"> <!-- /tab-panel -comproperty -->
            <h2>Commercial Property</h2>
            <table id="tblcomproperty" class="table table-striped table-bordered DataTable" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Location</th>
                        <th>City</th>
                        <th>Pincode</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($objComproperty AS $row) {
                        echo "<tr>";
                        echo "<td>" . $row->id . "</td>";
                        echo "<td><a href='index.php?r=property/comproperty&id=" . $row->id . "' target='_blank'>" . $row->name . "</a></td>";
                        echo "<td>" . $row->location . "</td>";
                        echo "<td>" . $row->city . "</td>";
                        echo "<td>" . $row->pincode . "</td>";
                        echo "<td>" . $row->status . "</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div> <!-- /tab-panel comproperty -->
        <div role="tabpanel" class="tab-pane" id="builder"> <!-- /tab-panel -builder -->
            <h2>Builder</h2>
            <table id="tblbuilder" class="table table-striped table-bordered DataTable" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Company Name</th>
                        <th>Contact</th>
                        <th>Email</th>
                        <th>Website</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($objBuilder AS $row) {
                        echo "<tr>";
                        echo "<td>" . $row->id . "</td>";
                        echo "<td><a href='index.php?r=property/builder&id=" . $row->id . "' target='_blank'>" . $row->name . "</a></td>";
                        echo "<td>" . $row->companyname . "</td>";
                        echo "<td>" . $row->contact . "</td>";
                        echo "<td>" . $row->email . "</td>";
                        echo "<td>" . $row->website . "</td>";
                        echo "<td>" . $row->status . "</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div> 
        <!-- /tab-panel builder -->
        <div role="tabpanel" class="tab-pane" id="customer"> <!-- /tab-panel -customer -->
            <h2>Customer</h2>
            <table id="tblcustomer" class="table table-striped table-bordered DataTable" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Location</th>
                        <th>City</th>
                        <th>Pincode</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($objCustomer AS $row) {
                        echo "<tr>";
                        echo "<td>" . $row->id . "</td>";
                        echo "<td><a href='index.php?r=property/customer&id=" . $row->id . "' target='_blank'>" . $row->name . "</a></td>";
                        echo "<td>" . $row->phone . "</td>";
                        echo "<td>" . $row->email . "</td>";
                        echo "<td>" . $row->location . "</td>";
                        echo "<td>" . $row->city . "</td>";
                        echo "<td>" . $row->pincode . "</td>";
                        echo "<td>" . $row->status . "</td>";
                        echo "<td><i onclick='deletecustomer(". $row->id .")' class='fa fa-trash-o'></i><a href='index.php?r=property/followup&id=" . $row->id . "' target='_blank'><button type='button' class='btn btn-success'>Followup</button></a></td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div> 
        <!-- /tab-panel customer -->

        <div role="tabpanel" class="tab-pane" id="followup"> <!-- /tab-panel -followup -->
            <h2>Followups</h2>
            <table id="tblfollowup" class="table table-striped table-bordered DataTable" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>FollowUp Id</th>
                        <th>Customer Name</th>
                        <th>Customer Phone</th>
                        <th>Property Type</th>
                        <th>First Discussion By</th>
                        <th>Fisrt Remark</th>
                        <th>Followup Date</th>
                        <th>Status</th>
                        <th>Action</th>
                        <!-- <th>Follow Up</th> -->
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($objFollowup AS $row) {
                        echo "<tr>";
                        echo "<td><a href='index.php?r=property/followup&id=" . $row['id'] . "' target='_blank'>" . $row['id'] . "</a></td>";
                        echo "<td>" . $row['customername'] . "</td>";
                        echo "<td>" . $row['customerphone'] . "</td>";
                        echo "<td>" . $row['projecttype'] . "</td>";
                        echo "<td>" . $row['firstdiscussionby'] . "</td>";
                        echo "<td>" . $row['firstremark'] . "</td>";
                        echo "<td>" . $row['followupdate'] . "</td>";
                        echo "<td>" . $row['status'] . "</td>";
                        echo "<td><i onclick='deletefollowup(". $row['id'].")' class='fa fa-trash-o'></i></td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div> 

<div role="tabpanel" class="tab-pane" id="pendingfollowup"> <!-- /tab-panel -followup -->
            <h2>Pending Followups(No Followup Added To These Customers !!)</h2>
            <table id="tblpendingfollowup" class="table table-striped table-bordered DataTable" cellspacing="0" width="100%">
               <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Location</th>
                        <th>City</th>
                        <th>Pincode</th>
                        <th>Added Date</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($objPendingFollowup AS $row) {
                        echo "<tr>";
                        echo "<td>" . $row['id'] . "</td>";
                        echo "<td><a href='index.php?r=property/customer&id=" . $row['id'] . "' target='_blank'>" . $row['name'] . "</a></td>";
                        echo "<td>" . $row['phone'] . "</td>";
                        echo "<td>" . $row['email'] . "</td>";
                        echo "<td>" . $row['location'] . "</td>";
                        echo "<td>" . $row['city'] . "</td>";
                        echo "<td>" . $row['pincode'] . "</td>";
                        echo "<td>" . $row['addeddate'] . "</td>";
                        echo "<td>" . $row['status'] . "</td>";
                        echo "<td><i onclick='deletecustomer(". $row['id'] .")' class='fa fa-trash-o'></i><a href='index.php?r=property/followup&id=" . $row['id'] . "' target='_blank'><button type='button' class='btn btn-success'>Followup</button></a></td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div> 

        <div role="tabpanel" class="tab-pane" id="genfeedback"> <!-- /tab-panel -genfeedback -->
            <h2>Feedback</h2>
            <table id="tblgenfeedback" class="table table-striped table-bordered DataTable" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Description</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($objGenfeedback AS $rowF) {
                        echo "<tr>";
                        echo "<td>" . $rowF->id . "</td>";
                        echo "<td>" . $rowF->name . "</td>";
                        echo "<td>" . $rowF->phone . "</td>";
                        echo "<td>" . $rowF->email . "</td>";
                        echo "<td>" . $rowF->description . "</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div> 
        <!-- /tab-panel customer -->


<div role="tabpanel" class="tab-pane" id="resalepropertyactive"> <!-- /tab-panel -resaleproperty -->
            <h2>ACTIVE Resale-Rent</h2>
            <table cellspacing="5" cellpadding="5" border="0">
        <tbody><tr>
            <td>Minimum Expected Price:</td>
            <td><input id="min" name="min" type="text"></td>
        </tr>
        <tr>
            <td>Maximum Expected Price:</td>
            <td><input id="max" name="max" type="text"></td>
        </tr>
    </tbody></table>
            <table id="tblresalepropertyactive" class="table table-striped table-bordered DataTable" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Ownername</th>
                        <th>Contact</th>
                        <th>Location</th>
                        <th>Expected Price</th>
                        <th>Property Type</th>
                        <th>RESELL/RENT</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($objResalepropertyActive AS $rowF) {
                        echo "<tr>";
                        echo "<td>" . $rowF->id . "</td>";
                        echo "<td><a href='index.php?r=property/resaleproperty&id=" . $rowF->id . "' target='_blank'>" . $rowF->ownername . "</a></td>";
                        echo "<td>" . $rowF->contact . "</td>";
                        echo "<td>" . $rowF->location . "</td>";
                        echo "<td>" . $rowF->expectedprice . "</td>";
                        echo "<td>" . $rowF->propertytype . "</td>";
                        echo "<td>" . $rowF->resellrent . "</td>";
                        echo "<td>" . $rowF->status . "</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div> 




        <div role="tabpanel" class="tab-pane" id="resaleproperty"> <!-- /tab-panel -resaleproperty -->
            <h2>ALL Resale-Rent</h2>
            <table id="tblresaleproperty" class="table table-striped table-bordered DataTable" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Ownername</th>
                        <th>Contact</th>
                        <th>Location</th>
                        <th>Expected Price</th>
                        <th>Property Type</th>
                        <th>RESELL/RENT</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($objResaleproperty AS $rowF) {
                        echo "<tr>";
                        echo "<td>" . $rowF->id . "</td>";
                        echo "<td><a href='index.php?r=property/resaleproperty&id=" . $rowF->id . "' target='_blank'>" . $rowF->ownername . "</a></td>";
                        echo "<td>" . $rowF->contact . "</td>";
                        echo "<td>" . $rowF->location . "</td>";
                        echo "<td>" . $rowF->expectedprice . "</td>";
                        echo "<td>" . $rowF->propertytype . "</td>";
                        echo "<td>" . $rowF->resellrent . "</td>";
                        echo "<td>" . $rowF->status . "</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div> 
        <!-- /tab-panel customer -->


    </div><!-- /tab-content -->

</div> <!-- /container -->

<script type="text/javascript">
    $(document).ready(function() {
        $('#search a:first').tab('show');
        $('#tblresprojectactive').DataTable();
        $('#tblresproject').DataTable();
        $('#tblresproperty').DataTable();
        $('#tblcomproject').DataTable();
        $('#tblcomproperty').DataTable();
        $('#tblbuilder').DataTable();
        $('#tblcustomer').DataTable();
$('#tblfollowup').DataTable();
$('#tblpendingfollowup').DataTable();

         $('#tblgenfeedback').DataTable();
          $('#tblresaleproperty').DataTable();
        var tblresalepropertyactive =  $('#tblresalepropertyactive').DataTable();
  
   $('#min, #max').keyup( function() {
   
        tblresalepropertyactive.draw();
    } );

    }); // end document.ready


$.fn.dataTable.ext.search.push(
    function( settings, data, dataIndex ) {
    alert("hjk")     
        var min = parseInt( $('#min').val(), 10 );
        var max = parseInt( $('#max').val(), 10 );
        var age = parseFloat( data[4] ) || 0; // use data for the age column
 
        if ( ( isNaN( min ) && isNaN( max ) ) ||
             ( isNaN( min ) && age <= max ) ||
             ( min <= age   && isNaN( max ) ) ||
             ( min <= age   && age <= max ) )
        {
            return true;
        }
        return false;
    }
);

    function deletefollowup(id){
                alertify.confirm("Are you sure you want to Delete Followup ?",
                function () {
                    var obj = new Object();
                    obj.id = id;
                    $.ajax({
                        url: "index.php?r=property/deletefollowup",
                        async: false,
                        data: obj,
                        type: 'POST',
                        success: function (data) {
                            data = JSON.parse(data);
                            alertify.alert("Followup Deleted !!", function () {
                                location.reload();

                            });

                        }
                    });
                });

    }

    function deletecustomer(id){
        alertify.confirm("All Followups Related to the Customer will be Deleted Are you Sure To delete Customer, ?",
                function () {
                    var obj = new Object();
                    obj.id = id;
                    $.ajax({
                        url: "index.php?r=property/deletecustomer",
                        async: false,
                        data: obj,
                        type: 'POST',
                        success: function (data) {
                            data = JSON.parse(data);
                            console.log(data);

                        if(data.msg=="deleted"){

                            alertify.alert("Customer Deleted Successfully !!", function () {
                                location.reload();
                            // return false;

                            });
                            }

                    if(data.msg=="not_deleted"){

                            alertify.alert("Server Error Please Try Again !!", function () {
                                // location.reload();
                            // return false;

                            });
                            }

                        }
                    });
                });


    }
</script>
