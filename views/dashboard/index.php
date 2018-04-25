<?php
$this->title = Yii::t('app', 'Dashboard');

//function getExpectedPriceinString($digit) {
//    $strReturn = $digit;
//    $lengthNum = strlen($digit);
//    if ($lengthNum != 0 && $lengthNum != NULL) {
//        switch ($lengthNum) {
//            case 3:
//                $val = $digit / 100;
//                $val = round($val, 2);
//                $strReturn = $val . " Thundred";
//                break;
//            case 4:
//                $val = $digit / 1000;
//                $val = round($val, 2);
//                $strReturn = $val . " Thousand";
//                break;
//            case 5:
//                $val = $digit / 1000;
//                $val = round($val, 2);
//                $strReturn = $val . " Thousand";
//                break;
//            case 6:
//                $val = $digit / 100000;
//                $val = round($val, 2);
//                $strReturn = $val . " Lakh";
//                break;
//            case 7:
//                $val = $digit / 100000;
//                $val = round($val, 2);
//                $strReturn = $val . " Lakh";
//                break;
//            case 8:
//                $val = $digit / 10000000;
//                $val = round($val, 2);
//                $strReturn = $val . " Crore";
//                break;
//            case 9:
//                $val = $digit / 10000000;
//                $val = round($val, 2);
//                $strReturn = $val . " Crore";
//                break;
//        }
//    }
//    return $strReturn;
//}
//function userName($data){
//    $strReturn = $data;
//     if ($data != 0 && $data != NULL) {
//        switch ($data) {
//            case $data->builderid == 1:
//                $val = 'Owner';
//                $strReturn = $val;
//                break;
//            case $data->ownerid == 1:
//                $val = 'bui';
//                  $strReturn = $val;
//                break;
//            case $data->agentid == 1:
//                $val = 'agent';
//                  $strReturn = $val;
//                break;
//
//        }
//    }
//    return $strReturn;
//    
//}
?>
<div class="container">
    <div class="row">
        <!--<h3> Today's Followups(<?= $date ?>)</h3>-->
        <a target="_BLANK"href="index.php?r=cron/dailyfollowup/"><button type="button" class="btn btn-success">GET TODAY'S FOLLOWUP IN MY MAIL</button></a>
        <a href="#"><button type="button" onclick="addProperty();" class="btn btn-success">ADD PROPERTYS</button></a>
<?php // if (count($objFollowup)) { ?>
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
                        <!-- <th>Follow Up</th> -->
                    </tr>
                </thead>
                <tbody>
                    <?php
//                    foreach ($objFollowup AS $row) {
//                        echo "<tr>";
//                        echo "<td><a href='index.php?r=property/followup&id=" . $row['id'] . "' target='_blank'>" . $row['id'] . "</a></td>";
//                        echo "<td>" . $row['customername'] . "</td>";
//                        echo "<td>" . $row['customerphone'] . "</td>";
//                        echo "<td>" . $row['projecttype'] . "</td>";
//                        echo "<td>" . $row['firstdiscussionby'] . "</td>";
//                        echo "<td>" . $row['firstremark'] . "</td>";
//                        echo "<td>" . $row['followupdate'] . "</td>";
//                        echo "<td>" . $row['status'] . "</td>";
//                        echo "</tr>";
//                    }
                    ?>
                </tbody>
            </table>
            <?php
//        } else {
//            echo "<h4>No Followups Assigned for Today !!</h4>";
//        }
        ?>
        <div class="container">
            <h3>PROPERTIES DETAILS</h3>
            <table class="table table-bordered table-striped">
                <thead class="thead-default">
                    <tr>
                        <th>Sr. No</th>
                        <th>Items</th>
                        <th>Total Number</th>
                        <th>Added Yesterday( <?php // echo $yesterday ?>)</th>
                        <th>Added Last Week( <?php // echo $yesterday . " to " . $lastWeek ?>) </th>
                        <th>Added Last Month( <?php // echo $yesterday . " to " . $lastMonth ?>)</th>        
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td><b>Builders</b></td>
                        <td><?php // echo $countBuilder; ?></td>
                        <td><?php // echo $countYesterdayBuilder; ?></td>
                        <td><?php // echo $countLastWeekBuilder; ?></td>
                        <td><?php // echo $countLastMonthBuilder; ?></td>
                    </tr>
                    <tr>
                    <tr>
                        <td>2</td>
                        <td><b>Residential Projects</b></td>
                        <td><?php // echo $countResproject; ?></td>
                        <td><?php // echo $countYesterdayResproject; ?></td>
                        <td><?php // echo $countLastWeekResproject; ?></td>
                        <td><?php // echo $countLastMonthResproject; ?></td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td><b>Commercial Projects</b></td>
                        <td><?php // echo $countComproject; ?></td>
                        <td><?php // echo $countYesterdayCom; ?></td>
                        <td><?php // echo $countLastWeekCom; ?></td>
                        <td><?php // echo $countLastMonthCom; ?></td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td><b>Resale/Rent Properties</b></td>
                        <td><?php // echo $countResaleproperty; ?></td>
                        <td><?php // echo $countYesterdayResale; ?></td>
                        <td><?php // echo $countLastWeekResale; ?></td>
                        <td><?php // echo $countLastMonthResale; ?></td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td><b>Total Prperties</b></td>
                        <td><?php // echo $TotalProperties; ?></td>
                        <td><?php // echo $TotalPropertiesYesterday; ?></td>
                        <td><?php // echo $TotalPropertiesLastWeek; ?></td>
                        <td><?php // echo $TotalPropertiesLastMonth; ?></td>
                    </tr>
                </tbody>
            </table>

            <h3>CUSTOMERS AND FOLLOWUPS DETAILS</h3>
            <table class="table table-bordered table-striped">
                <thead class="thead-default">
                    <tr>
                        <th>Sr. No</th>
                        <th>Items</th>
                        <th>Total Number</th>
                        <th>Added Yesterday( <?php // echo $yesterday ?>)</th>
                        <th>Added Last Week( <?php // echo $yesterday . " to " . $lastWeek ?>) </th>
                        <th>Added Last Month( <?php // echo $yesterday . " to " . $lastMonth ?>)</th>        
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td><b>Customers</b></td>
                        <td><?php // echo $countBuilder; ?></td>
                        <td><?php // echo $countYesterdayResproject; ?></td>
                        <td><?php // echo $countLastWeekResproject; ?></td>
                        <td><?php // echo $countLastMonthResproject; ?></td>
                    </tr>
                    <tr>
                    <tr>
                        <td>2</td>
                        <td><b>General FeedBacks</b></td>
                        <td><?php // echo $countResproject; ?></td>
                        <td><?php // echo $countYesterdayResproject; ?></td>
                        <td><?php // echo $countLastWeekResproject; ?></td>
                        <td><?php // echo $countLastMonthResproject; ?></td>
                    </tr>

                </tbody>
            </table>
            <hr>
            <h2>Live data</h2>
            <h4><div>resale =rsl; <span>residential= res; </span><span>commercial= com</span></div></h4>
            <table id="LiveData" class="table table-striped table-bordered DataTable" cellspacing="0" width="100%">
                <thead class="thead-default">
                    <tr>
                        <td>Min price:</td>
                        <td><input type="text" id="min" name="min"></td>
                        <td>Max Price:</td>
                        <td><input type="text" id="max" name="max"></td>
                    </tr>
                    <tr>
                        <th>Propertyid</th>
                        <th>Name</th>
                        <th>Location</th>
                        <th>Expected price</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
//                    foreach ($objLiveData AS $row) {
//                        echo "<tr>";
//                        echo "<td>" . $row->propertyid . "</td>";
//                        echo "<td>" . $row->name . "</td>";
//                        echo "<td>" . $row->location . "</td>";
//                        echo "<td>" . getExpectedPriceinString($row->expectedprice) . "</td>";
//                        echo "</tr>";
//                    }
                    ?>
                </tbody>
            </table>
             <hr>
            <h2>User property list</h2>
            <table id="userproperty" class="table table-striped table-bordered DataTable" cellspacing="0" width="100%">
                <thead class="thead-default">
                    <tr>
                        <td>Min price:</td>
                        <td><input type="text" id="postmin" name="min"></td>
                        <td>Max Price:</td>
                        <td><input type="text" id="postmax" name="max"></td>
                    </tr>
                    <tr>
                        <th>Builder</th>
                        <th>Agent </th>
                        <th>Owner </th>
                        <th>Rent</th>
                        <th>Sale</th>
                        <th>Email</th>
                        <th>Contact</th>
                        <th>Location</th>
                        <th>Total area</th>
                        <th>Expected price</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
//                    foreach ($objPostproperty AS $row) {
////                        $val = $row->builderid == 1;
//                          $builder = $row->builderid == 1 ? 'Builder' : '';
//                          $agent= $row->agentid == 1 ? 'Agent' : '';
//                          $owner = $row->ownerid == 1 ? 'Owner' : '';
//                          $rent = $row->rentid == 1 ? 'Rent' : '';
//                          $sale = $row->saleid == 1 ? 'Sale' : '';
//                        echo "<tr>";
//                        echo "<td>" . $builder . "</td>";
//                        echo "<td>" . $agent . "</td>";
//                        echo "<td>" . $owner . "</td>";
//                        echo "<td>" . $rent. "</td>";
//                        echo "<td>" . $sale . "</td>";
//                        echo "<td>" . $row->email . "</td>";
//                        echo "<td>" . $row->contact . "</td>";
//                        echo "<td>" . $row->location . "</td>";
//                        echo "<td>" . $row->totalarea . "</td>";
//                        echo "<td>" . getExpectedPriceinString($row->expectedprice) . "</td>";
//                        echo "</tr>";
//                    }
//                    }
                    ?>
                </tbody>
            </table>
        </div>

    </div>
</div> 

<div class="modal fade modal-ext" id="adddata" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="margin-left: -300px;" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h3><i class="fa fa-database"></i> Data </h3>
            </div>
            <div class="modal-body">
                <p>  Data added successfully . </p>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        var oTable1 = $('#LiveData').dataTable().yadcf([
            {column_number: 2,
                filter_type: "multi_select",
                select_type: 'select2',
                filter_default_label: 'Select Location',
                select_type_options: {
                    width: '150px',
                    minimumResultsForSearch: -1 // remove search box
                }
            },
            {column_number: 0,
                filter_type: "text",
                select_type_options: {
                    width: '150px',
                    minimumResultsForSearch: -1 // remove search box
                }
            },
        ]);
        $.fn.dataTable.ext.search.push(function (settings, data, dataIndex) {
            var min = parseInt($('#min').val(), 10);
            var max = parseInt($('#max').val(), 10);
            var expectedprice = parseInt(data[3]) || 0; // use data for the expectedprice column
            if ((isNaN(min) && isNaN(max)) || (isNaN(min) && expectedprice <= max) || (min <= expectedprice && isNaN(max)) || (min <= expectedprice && expectedprice <= max))
            {
                return true;
            }
            return false;
        });
        var table1 = $('#LiveData').DataTable();
        $('#min, #max').keyup(function () {
            table1.draw();
        });
    }); // end document.ready
    function  addProperty() {
        $.ajax({
            url: 'index.php?r=cron/refreshsearchresproject',
            async: false,
            success: function (data) {
                data = JSON.parse(data);
                console.log(data);
                $('#adddata').modal('show');
                setTimeout(function () {
                    $('#adddata').modal('hide')
                }, 2000);


            }
        });
    }
</script>


