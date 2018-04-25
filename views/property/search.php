<?php
$this->title = Yii::t('app', 'Search');

function getExpectedPriceinString($digit) {
    $strReturn = $digit;
    $lengthNum = strlen($digit);
    if ($lengthNum != 0 && $lengthNum != NULL) {
        switch ($lengthNum) {
            case 3:
                $val = $digit / 100;
                $val = round($val, 2);
                $strReturn = $val . " Thundred";
                break;
            case 4:
                $val = $digit / 1000;
                $val = round($val, 2);
                $strReturn = $val . " Thousand";
                break;
            case 5:
                $val = $digit / 1000;
                $val = round($val, 2);
                $strReturn = $val . " Thousand";
                break;
            case 6:
                $val = $digit / 100000;
                $val = round($val, 2);
                $strReturn = $val . " Lakh";
                break;
            case 7:
                $val = $digit / 100000;
                $val = round($val, 2);
                $strReturn = $val . " Lakh";
                break;
            case 8:
                $val = $digit / 10000000;
                $val = round($val, 2);
                $strReturn = $val . " Crore";
                break;
            case 9:
                $val = $digit / 10000000;
                $val = round($val, 2);
                $strReturn = $val . " Crore";
                break;
        }
    }
    return $strReturn;
}
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
            <a class="nav-link" href="#customer"  role="tab" data-toggle="tab" aria-controls="customer">Customer</a>
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
        <li class="nav-item">
            <a class="nav-link" href="#plots" role="tab" data-toggle="tab" aria-controls="plots">ALL plots property</a>
        </li>
    </ul>
    <!-- Nav Bar- start-->
    <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="resprojectactive"> <!-- /tab-panel -resproject -->
            <h2>ACTIVE Residential Project</h2>
            <table id="tblresprojectactive" onclick="" class="table table-striped table-bordered DataTable" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <td>Min price:</td>
                        <td><input type="text" id="min" name="min"></td>
                        <td>Max Price:</td>
                        <td><input type="text" id="max" name="max"></td>
                    </tr>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Sub location</th>
                        <th>Location</th>
                        <th>City</th>
                        <th>Pincode</th>
                        <th>Expected price</th>
                        <th>Status</th>
                    </tr>
                </thead>


                <tbody>
                    <?php
                    foreach ($objResprojectActive AS $row) {

                        echo "<tr>";
                        echo "<td>" . $row->id . "</td>";
                        echo "<td><a href='index.php?r=property/resproject&id=" . $row->id . "' target='_blank'>" . $row->name . "</a></td>";
                        echo "<td>" . $row->sublocation . "</td>";
                        echo "<td>" . $row->location . "</td>";
                        echo "<td>" . $row->city . "</td>";
                        echo "<td>" . $row->pincode . "</td>";
                        echo "<td>" . getExpectedPriceinString($row->expectedprice) . "</td>";
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
                        <td>Min price:</td>
                        <td><input type="text" id="allresmin" name="allresmin"></td>
                        <td>Max Price:</td>
                        <td><input type="text" id="allresmax" name="allresmax"></td>
                    </tr>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th >Sub location</th>
                        <th >Location</th>
                        <th>City</th>
                        <th>Pincode</th>
                        <th>Expected price</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($objResproject AS $row) {

                        echo "<tr>";
                        echo "<td>" . $row->id . "</td>";
                        echo "<td><a href='index.php?r=property/resproject&id=" . $row->id . "' target='_blank'>" . $row->name . "</a></td>";
                        echo "<td>" . $row->sublocation . "</td>";
                        echo "<td>" . $row->location . "</td>";
                        echo "<td>" . $row->city . "</td>";
                        echo "<td>" . $row->pincode . "</td>";
                        echo "<td>" . getExpectedPriceinString($row->expectedprice) . "</td>";
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
                        <td>Min price:</td>
                        <td><input type="text" id="comMin" name="comMin"></td>
                        <td>Max Price:</td>
                        <td><input type="text" id="comMax" name="comMax"></td>
                    </tr>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th> Sub location</th>
                        <th>Location</th>
                        <th>East/West etc.</th>
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
                        echo "<td>" . $row->sublocation . "</td>";
                        echo "<td>" . $row->location . "</td>";
                        echo "<td>" . $row->ewnsc . "</td>";
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
                        <th>Sub location</th>
                        <th>Location</th>
                        <th>City</th>
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
                        echo "<td>" . $row->sublocation . "</td>";
                        echo "<td>" . $row->location . "</td>";
                        echo "<td>" . $row->city . "</td>";
                        echo "<td>" . $row->status . "</td>";
                        echo "<td><i onclick='deletecustomer(" . $row->id . ")' class='fa fa-trash-o'></i><a href='index.php?r=property/followup&id=" . $row->id . "' target='_blank'><button type='button' class='btn btn-success'>Followup</button></a></td>";
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
                        echo "<td><i onclick='deletefollowup(" . $row['id'] . ")' class='fa fa-trash-o'></i></td>";
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
                        echo "<td><i onclick='deletecustomer(" . $row['id'] . ")' class='fa fa-trash-o'></i><a href='index.php?r=property/followup&id=" . $row['id'] . "' target='_blank'><button type='button' class='btn btn-success'>Followup</button></a></td>";
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
            <table id="tblresalepropertyactive" class="table table-striped table-bordered DataTable" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <td>Min price:</td>
                        <td><input type="text" id="activerslMin" name="activerslMin"></td>
                        <td>Max Price:</td>
                        <td><input type="text" id="activerslMax" name="activerslMax"></td>
                    </tr>
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
                        echo "<td>" . getExpectedPriceinString($rowF->expectedprice) . "</td>";
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
                        <td>Min price:</td>
                        <td><input type="text" id="allrslMin" name="allrslMin"></td>
                        <td>Max Price:</td>
                        <td><input type="text" id="allrslMax" name="allrslMax"></td>
                    </tr>
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
                        echo "<td>" . getExpectedPriceinString($rowF->expectedprice) . "</td>";
                        echo "<td>" . $rowF->propertytype . "</td>";
                        echo "<td>" . $rowF->resellrent . "</td>";
                        echo "<td>" . $rowF->status . "</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div> 
        <div role="tabpanel" class="tab-pane" id="plots"> <!-- /tab-panel -resaleproperty -->
            <h2>ALL Plots property</h2>
            <table id="tblplots" class="table table-striped table-bordered DataTable" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <td>Min price:</td>
                        <td><input type="text" id="plotMin" name="plotMin"></td>
                        <td>Max Price:</td>
                        <td><input type="text" id="plotMax" name="plotMax"></td>
                    </tr>
                    <tr>
                        <th>Id</th>
                        <th>Ownername</th>
                        <th>Contact</th>
                        <th>Location</th>
                        <th>Plot Type</th>
                        <th>Expected Price</th>
                        <th>RESELL/RENT</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($objPlotsActive AS $rowF) {
                        echo "<tr>";
                        echo "<td>" . $rowF->id . "</td>";
                        echo "<td><a href='index.php?r=property/plot&id=" . $rowF->id . "' target='_blank'>" . $rowF->ownername . "</a></td>";
                        echo "<td>" . $rowF->contact . "</td>";
                        echo "<td>" . $rowF->location . "</td>";
                        echo "<td>" . $rowF->zone . "</td>";
                        echo "<td>" . getExpectedPriceinString($rowF->expectedprice) . "</td>";
                        echo "<td>" . $rowF->saleorrent . "</td>";
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
    $(document).ready(function () {
        'use strict';
        $('#search a:first').tab('show');
        $('#tblresproperty').DataTable();
        $('#tblcomproperty').DataTable();
        $('#tblbuilder').DataTable();
        $('#tblcustomer').DataTable();
        $('#tblfollowup').DataTable();
        $('#tblpendingfollowup').DataTable();
        $('#tblgenfeedback').DataTable();
        $('#tblplots').DataTable();

//        ------------------------ customer -------------
        var oTable1 = $('#tblcustomer').dataTable().yadcf([
            {column_number: 2,
                filter_default_label: 'Phone',
                filter_type: "text",
            },
            {column_number: 4,
                filter_type: "multi_select",
                select_type: 'select2',
                filter_default_label: 'Sub location',
                select_type_options: {
                    width: '150px',
                    minimumResultsForSearch: -1 // remove search box
                }
            },
            {column_number: 5,
                filter_type: "multi_select",
                select_type: 'select2',
                filter_default_label: 'Location',
                select_type_options: {
                    width: '150px',
                    minimumResultsForSearch: -1 // remove search box
                }
            },
        ]);
        var table1 = $('#tblcustomer').DataTable();
        /* -----------------for active plot  max and min price / footer search /top location search--- */
        var oTable1 = $('#tblplots').dataTable().yadcf([
            {column_number: 3,
                filter_type: "multi_select",
                select_type: 'select2',
                filter_default_label: 'Select Location',
                select_type_options: {
                    width: '150px',
                    minimumResultsForSearch: -1 // remove search box
                }
            },
            {column_number: 4,
                filter_type: "multi_select",
                select_type: 'select2',
                filter_default_label: 'Select Type',
                select_type_options: {
                    width: '150px',
                    minimumResultsForSearch: -1 // remove search box
                }
            },
        ]);
        $.fn.dataTable.ext.search.push(function (settings, data, dataIndex) {
            var min = parseInt($('#plotMin').val(), 10);
            var max = parseInt($('#plotMax').val(), 10);
            var expectedprice = parseInt(data[5]) || 0; // use data for the expectedprice column
            console.log(expectedprice);
            if ((isNaN(min) && isNaN(max)) || (isNaN(min) && expectedprice <= max) || (min <= expectedprice && isNaN(max)) || (min <= expectedprice && expectedprice <= max))
            {
                return true;
            }
            return false;
        });

        var table1 = $('#tblplots').DataTable();
        $('#plotMin, #plotMax').keyup(function () {
            table1.draw();
        });
        /* -----------------for active Residential  max and min price / footer search /top location search--- */
        var oTable1 = $('#tblresprojectactive').dataTable().yadcf([
            {column_number: 2,
                filter_type: "multi_select",
                select_type: 'select2',
                filter_default_label: 'Select Sub location',
                select_type_options: {
                    width: '150px',
                    minimumResultsForSearch: -1 // remove search box
                }
            },
            {column_number: 3,
                filter_type: "multi_select",
                select_type: 'select2',
                filter_default_label: 'Select Location',
                select_type_options: {
                    width: '150px',
                    minimumResultsForSearch: -1 // remove search box
                }
            },
            {column_number: 4,
                filter_type: "multi_select",
                select_type: 'select2',
                filter_default_label: 'Select City',
                select_type_options: {
                    width: '150px',
                    minimumResultsForSearch: -1 // remove search box
                }
            },
        ]);
        $.fn.dataTable.ext.search.push(function (settings, data, dataIndex) {
            var min = parseInt($('#min').val(), 10);
            var max = parseInt($('#max').val(), 10);
            var expectedprice = parseInt(data[6]) || 0; // use data for the expectedprice column
            if ((isNaN(min) && isNaN(max)) || (isNaN(min) && expectedprice <= max) || (min <= expectedprice && isNaN(max)) || (min <= expectedprice && expectedprice <= max))
            {
                return true;
            }
            return false;
        });

        var table1 = $('#tblresprojectactive').DataTable();
        $('#min, #max').keyup(function () {
            table1.draw();
        });

        /* ------------- All Residential  max and mix price/ footer search /top location search --- */
        var oTable2 = $('#tblresproject').dataTable().yadcf([
            {column_number: 2,
                filter_type: "multi_select",
                select_type: 'select2',
                filter_default_label: 'Select Sub location',
                select_type_options: {
                    width: '150px',
                    minimumResultsForSearch: -1 // remove search box
                }
            },
            {column_number: 3,
                filter_type: "multi_select",
                select_type: 'select2',
                filter_default_label: 'Select Location',
                select_type_options: {
                    width: '150px',
                    minimumResultsForSearch: -1 // remove search box
                }
            },
            {column_number: 4,
                filter_type: "multi_select",
                select_type: 'select2',
                filter_default_label: 'Select City',
                select_type_options: {
                    width: '150px',
                    minimumResultsForSearch: -1 // remove search box
                }
            },
        ]);
        $.fn.dataTable.ext.search.push(
                function (settings, data, dataIndex) {
                    var min = parseInt($('#allresmin').val(), 10);
                    var max = parseInt($('#allresmax').val(), 10);
                    var expectedprice = parseInt(data[6]) || 0; // use data for the expectedprice column
                    if ((isNaN(min) && isNaN(max)) ||
                            (isNaN(min) && expectedprice <= max) ||
                            (min <= expectedprice && isNaN(max)) ||
                            (min <= expectedprice && expectedprice <= max))
                    {
                        return true;
                    }
                    return false;
                }
        );
        var table2 = $('#tblresproject').DataTable();
        $('#allresmin, #allresmax').keyup(function () {
            table2.draw();
        });

        /*------------Commercial max and mix price/ footer search /top location search --- */
        var oTable3 = $('#tblcomproject').dataTable().yadcf([
            {column_number: 2,
                filter_type: "multi_select",
                select_type: 'select2',
                filter_default_label: 'Select Sub location',
                select_type_options: {
                    width: '150px',
                    minimumResultsForSearch: -1 // remove search box
                }
            },
            {column_number: 3,
                filter_type: "multi_select",
                select_type: 'select2',
                filter_default_label: 'Select Location',
                select_type_options: {
                    width: '150px',
                    minimumResultsForSearch: -1 // remove search box
                }
            },
            {column_number: 4,
                filter_type: "multi_select",
                select_type: 'select2',
                filter_default_label: 'Select City',
                select_type_options: {
                    width: '150px',
                    minimumResultsForSearch: -1 // remove search box
                }
            },
        ]);

        $.fn.dataTable.ext.search.push(
                function (settings, data, dataIndex) {
                    var min = parseInt($('#comMin').val(), 10);
                    var max = parseInt($('#comMax').val(), 10);
                    var expectedprice = parseInt(data[5]) || 0; // use data for the expectedprice column
                    if ((isNaN(min) && isNaN(max)) ||
                            (isNaN(min) && expectedprice <= max) ||
                            (min <= expectedprice && isNaN(max)) ||
                            (min <= expectedprice && expectedprice <= max))
                    {
                        return true;
                    }
                    return false;
                }
        );
        var table3 = $('#tblcomproject').DataTable();
        $('#comMin, #comMax').keyup(function () {
            table3.draw();
        });
        /*---------- ACTIVE Resale-Rent max and mix price/ footer search /top location search --- */
        var oTable4 = $('#tblresalepropertyactive').dataTable().yadcf([
            {column_number: 3,
                filter_type: "multi_select",
                select_type: 'select2',
                filter_default_label: 'Select Location',
                select_type_options: {
                    width: '150px',
                    minimumResultsForSearch: -1 // remove search box
                }
            },
        ]);
        $.fn.dataTable.ext.search.push(
                function (settings, data, dataIndex) {
                    var min = parseInt($('#activerslMin').val(), 10);
                    var max = parseInt($('#activerslMax').val(), 10);
                    var expectedprice = parseInt(data[4]) || 0; // use data for the expectedprice column
                    if ((isNaN(min) && isNaN(max)) ||
                            (isNaN(min) && expectedprice <= max) ||
                            (min <= expectedprice && isNaN(max)) ||
                            (min <= expectedprice && expectedprice <= max))
                    {
                        return true;
                    }
                    return false;
                }
        );
        var table4 = $('#tblresalepropertyactive').DataTable();
        $('#activerslMin, #activerslMax').keyup(function () {
            table4.draw();
        });
        /*---------- All Resale-Rent max and mix price/ footer search /top location search ---*/
        var oTable5 = $('#tblresaleproperty').dataTable().yadcf([
            {column_number: 3,
                filter_type: "multi_select",
                select_type: 'select2',
                filter_default_label: 'Select Location',
                select_type_options: {
                    width: '150px',
                    minimumResultsForSearch: -1 // remove search box
                }
            },
        ]);

        $.fn.dataTable.ext.search.push(
                function (settings, data, dataIndex) {
                    var min = parseInt($('#allrslMin').val(), 10);
                    var max = parseInt($('#allrslMax').val(), 10);
                    var expectedprice = parseInt(data[4]) || 0; // use data for the expectedprice column
                    if ((isNaN(min) && isNaN(max)) ||
                            (isNaN(min) && expectedprice <= max) ||
                            (min <= expectedprice && isNaN(max)) ||
                            (min <= expectedprice && expectedprice <= max))
                    {
                        return true;
                    }
                    return false;
                }
        );
        var table5 = $('#tblresaleproperty').DataTable();
        $('#allrslMin, #allrslMax').keyup(function () {
            table5.draw();
        });
    }); // end document.ready

    function deletefollowup(id) {
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

    function deletecustomer(id) {
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
                            if (data.msg == "deleted") {
                                alertify.alert("Customer Deleted Successfully !!", function () {
                                    location.reload();
                                });
                            }

                            if (data.msg == "not_deleted") {

                                alertify.alert("Server Error Please Try Again !!", function () {
                                });
                            }

                        }
                    });
                });

    }
</script>
