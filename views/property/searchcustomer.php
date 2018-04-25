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
            <a class="nav-link" href="#activecustomer"  role="tab" data-toggle="tab" aria-controls="customer">Active Customer</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#inactivecustomer"  role="tab" data-toggle="tab" aria-controls="inactivecustomer">Inactive Customer</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#rescustomer"  role="tab" data-toggle="tab" aria-controls="rescustomer">Residential  Customer</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#comcustomer"  role="tab" data-toggle="tab" aria-controls="comcustomer">Commercial  Customer</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#plotcustomer"  role="tab" data-toggle="tab" aria-controls="plotcustomer">Plot  Customer</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#Indusccustomer"  role="tab" data-toggle="tab" aria-controls="Indusccustomer">Industrial  Customer</a>
        </li>
    </ul>
    <!-- Nav Bar- start-->
    <div class="tab-content">
        <div role="tabpanel" class="tab-pane" id="activecustomer"> <!-- /tab-panel -customer -->
            <h2>All Active Customer</h2>
            <table id="tblcustomer" class="table table-striped table-bordered DataTable" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Sub location</th>
                        <th>Location</th>
                        <th>City</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($objCustomerActive AS $row) {
                        if ($row['status'] == 'Active') {
                            echo "<tr>";
                            echo "<td>" . $row['id'] . "</td>";
                            echo "<td><a href='index.php?r=property/customer&id=" . $row['id'] . "' target='_blank'>" . $row['name'] . "</a></td>";
                            echo "<td>" . $row['phone'] . "</td>";
                            echo "<td>" . $row['sublocation'] . "</td>";
                            echo "<td>" . $row['location'] . "</td>";
                            echo "<td>" . $row['city'] . "</td>";
                            echo "<td><i onclick='deletecustomer(" . $row['id'] . ")' class='fa fa-trash-o'></i><a href='index.php?r=property/followup&id=" . $row['id'] . "' target='_blank'><button type='button' class='btn btn-success'>Followup</button></a></td>";
                            echo "</tr>";
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div> 
        <div role="tabpanel" class="tab-pane" id="inactivecustomer"> <!-- /tab-panel -customer -->
            <h2>Inactive / Dead Customer list</h2>
            <table id="Inccustomer" class="table table-striped table-bordered DataTable" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Sub location</th>
                        <th>Location</th>
                        <th>City</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($objCustomerActive AS $row) {
                        if ($row['status'] == 'Dead' || $row['status'] == 'Closed') {
                            echo "<tr>";
                            echo "<td>" . $row['id'] . "</td>";
                            echo "<td><a href='index.php?r=property/customer&id=" . $row['id'] . "' target='_blank'>" . $row['name'] . "</a></td>";
                            echo "<td>" . $row['phone'] . "</td>";
                            echo "<td>" . $row['sublocation'] . "</td>";
                            echo "<td>" . $row['location'] . "</td>";
                            echo "<td>" . $row['city'] . "</td>";
                            echo "<td><i onclick='deletecustomer(" . $row['id'] . ")' class='fa fa-trash-o'></i><a href='index.php?r=property/followup&id=" . $row['id'] . "' target='_blank'><button type='button' class='btn btn-success'>Followup</button></a></td>";
                            echo "</tr>";
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div> 
        <div role="tabpanel" class="tab-pane" id="rescustomer"> <!-- /tab-panel -customer -->
            <h2> Residential Customer</h2>
            <table id="resccustomer" class="table table-striped table-bordered DataTable" cellspacing="0" width="100%">
                <thead>
                     <tr>
                        <td>Min price:</td>
                        <td><input type="text" id="resMinprice" name="resMinprice"></td>
                        <td>Max Price:</td>
                        <td><input type="text" id="resMaxprice" name="resMaxprice"></td>
                    </tr>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Budget</th>
                        <th>Sub location</th>
                        <th>Location</th>
                        <th>Type</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($objCustomerActive AS $row) {
                        if ($row['projecttype'] == 'Residential') {
                            echo "<tr>";
                            echo "<td>" . $row['id'] . "</td>";
                            echo "<td><a href='index.php?r=property/customer&id=" . $row['id'] . "' target='_blank'>" . $row['name'] . "</a></td>";
                            echo "<td>" . $row['phone'] . "</td>";
                            echo "<td>" .getExpectedPriceinString($row['expectedprice']). "</td>";
                            echo "<td>" . $row['sublocation'] . "</td>";
                            echo "<td>" . $row['location'] . "</td>";
                            echo "<td>" . $row['restypeofproperty'] . "</td>";
                            echo "<td><i onclick='deletecustomer(" . $row['id'] . ")' class='fa fa-trash-o'></i><a href='index.php?r=property/followup&id=" . $row['id'] . "' target='_blank'><button type='button' class='btn btn-success'>Followup</button></a></td>";
                            echo "</tr>";
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div> 
        <div role="tabpanel" class="tab-pane" id="comcustomer"> <!-- /tab-panel -customer -->
            <h2>Commercial Customer</h2>
            <table id="comerccustomer" class="table table-striped table-bordered DataTable" cellspacing="0" width="100%">
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
                        <th>Phone</th>
                        <th>Sub location</th>
                        <th>Location</th>
                        <th>Type</th>
                         <th>Budget</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($objCustomerActive AS $row) {
                        if ($row['projecttype'] == 'Commercial') {
                            echo "<tr>";
                            echo "<td>" . $row['id'] . "</td>";
                            echo "<td><a href='index.php?r=property/customer&id=" . $row['id'] . "' target='_blank'>" . $row['name'] . "</a></td>";
                            echo "<td>" . $row['phone'] . "</td>";
                            echo "<td>" . $row['sublocation'] . "</td>";
                            echo "<td>" . $row['location'] . "</td>";
                            echo "<td>" . $row['comtypeofproperty'] . "</td>";
                            echo "<td>" . getExpectedPriceinString($row['expectedprice']) . "</td>";
                            echo "<td><i onclick='deletecustomer(" . $row['id'] . ")' class='fa fa-trash-o'></i><a href='index.php?r=property/followup&id=" . $row['id'] . "' target='_blank'><button type='button' class='btn btn-success'>Followup</button></a></td>";
                            echo "</tr>";
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div> 
        <div role="tabpanel" class="tab-pane" id="plotcustomer"> <!-- /tab-panel -customer -->
            <h2> Plot Customer</h2>
            <table id="plotccustomer" class="table table-striped table-bordered DataTable" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <td>Min price:</td>
                        <td><input type="text" id="plotMin" name="plotMin"></td>
                        <td>Max Price:</td>
                        <td><input type="text" id="plotMax" name="plotMax"></td>
                    </tr>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Sub location</th>
                        <th>Location</th>
                        <th>City</th>
                        <th>Budget</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($objCustomerActive AS $row) {
                        if ($row['projecttype'] == 'Plot') {
                            echo "<tr>";
                            echo "<td>" . $row['id'] . "</td>";
                            echo "<td><a href='index.php?r=property/customer&id=" . $row['id'] . "' target='_blank'>" . $row['name'] . "</a></td>";
                            echo "<td>" . $row['sublocation'] . "</td>";
                            echo "<td>" . $row['location'] . "</td>";
                            echo "<td>" . $row['city'] . "</td>";
                            echo "<td>" . getExpectedPriceinString($row['expectedprice']) . "</td>";
                            echo "<td><i onclick='deletecustomer(" . $row['id'] . ")' class='fa fa-trash-o'></i><a href='index.php?r=property/followup&id=" . $row['id'] . "' target='_blank'><button type='button' class='btn btn-success'>Followup</button></a></td>";
                            echo "</tr>";
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div> 
        <div role="tabpanel" class="tab-pane" id="Indusccustomer"> <!-- /tab-panel -customer -->
            <h2> Industrial Customer</h2>
            <table id="Industrialccustomer" class="table table-striped table-bordered DataTable" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <td>Min price:</td>
                        <td><input type="text" id="IndustrialMin" name="IndustrialMin"></td>
                        <td>Max Price:</td>
                        <td><input type="text" id="IndustrialMax" name="IndustrialMax"></td>
                    </tr>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Sub location</th>
                        <th>Location</th>
                        <th>Type</th>
                        <th>Budget</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($objCustomerActive AS $row) {
                        if ($row['projecttype'] == 'Industrial') {
                            echo "<tr>";
                            echo "<td>" . $row['id'] . "</td>";
                            echo "<td><a href='index.php?r=property/customer&id=" . $row['id'] . "' target='_blank'>" . $row['name'] . "</a></td>";
                            echo "<td>" . $row['phone'] . "</td>";
                            echo "<td>" . $row['sublocation'] . "</td>";
                            echo "<td>" . $row['location'] . "</td>";
                            echo "<td>" . $row['industypeofproperty'] . "</td>";
                            echo "<td>" . getExpectedPriceinString($row['expectedprice']) . "</td>";
                            echo "<td><i onclick='deletecustomer(" . $row['id'] . ")' class='fa fa-trash-o'></i><a href='index.php?r=property/followup&id=" . $row['id'] . "' target='_blank'><button type='button' class='btn btn-success'>Followup</button></a></td>";
                            echo "</tr>";
                        }
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
        $('#tblcustomer').DataTable();
        $('#Industrialccustomer').DataTable();
        $('#comerccustomer').DataTable();
        $('#plotccustomer').DataTable();
        $('#Inccustomer').DataTable();
        $('#resccustomer').DataTable();

//        inActive -----------
        var oTable1 = $('#Inccustomer').dataTable().yadcf([
            {column_number: 2,
                filter_default_label: 'Phone',
                filter_type: "text",
            },
            {column_number: 3,
                filter_type: "multi_select",
                select_type: 'select2',
                filter_default_label: 'Sub location',
                select_type_options: {
                    width: '150px',
                    minimumResultsForSearch: -1 // remove search box
                }
            },
            {column_number: 4,
                filter_type: "multi_select",
                select_type: 'select2',
                filter_default_label: 'Location',
                select_type_options: {
                    width: '150px',
                    minimumResultsForSearch: -1 // remove search box
                }
            },
            {column_number: 5,
                filter_type: "multi_select",
                select_type: 'select2',
                filter_default_label: 'City',
                select_type_options: {
                    width: '150px',
                    minimumResultsForSearch: -1 // remove search box
                }
            },
        ]);
        var table1 = $('#Inccustomer').DataTable();
        
//        ---res property --------
        var oTable1 = $('#resccustomer').dataTable().yadcf([
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
            {column_number: 5,
                filter_type: "multi_select",
                select_type: 'select2',
                filter_default_label: 'Type',
                select_type_options: {
                    width: '150px',
                    minimumResultsForSearch: -1 // remove search box
                }
            },
        ]);
         $.fn.dataTable.ext.search.push(function (settings, data, dataIndex) {
            var min = parseInt($('#resMinprice').val(), 10);
            var max = parseInt($('#resMaxprice').val(), 10);
            var expectedprice = parseInt(data[3]) || 0; // use data for the expectedprice column
            console.log(expectedprice);
            if ((isNaN(min) && isNaN(max)) || (isNaN(min) && expectedprice <= max) || (min <= expectedprice && isNaN(max)) || (min <= expectedprice && expectedprice <= max))
            {
                return true;
            }
            return false;
        });
        var table1 = $('#resccustomer').DataTable();
          $('#resMinprice, #resMaxprice').keyup(function () {
            table1.draw();
        });
//        -------plot ---
        var oTable1 = $('#plotccustomer').dataTable().yadcf([
            {column_number: 2,
                filter_default_label: 'Phone',
                filter_type: "text",
            },
            {column_number: 2,
                filter_type: "multi_select",
                select_type: 'select2',
                filter_default_label: 'Sub location',
                select_type_options: {
                    width: '150px',
                    minimumResultsForSearch: -1 // remove search box
                }
            },
            {column_number: 3,
                filter_type: "multi_select",
                select_type: 'select2',
                filter_default_label: 'Location',
                select_type_options: {
                    width: '150px',
                    minimumResultsForSearch: -1 // remove search box
                }
            },
            {column_number: 4,
                filter_type: "multi_select",
                select_type: 'select2',
                filter_default_label: 'City',
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
        var table1 = $('#plotccustomer').DataTable();
        $('#plotMin, #plotMax').keyup(function () {
            table1.draw();
        });
//        -----------com customer -
        var oTable1 = $('#comerccustomer').dataTable().yadcf([
            {column_number: 3,
                filter_type: "multi_select",
                select_type: 'select2',
                filter_default_label: 'Sub location',
                select_type_options: {
                    width: '150px',
                    minimumResultsForSearch: -1 // remove search box
                }
            },
            {column_number: 4,
                filter_type: "multi_select",
                select_type: 'select2',
                filter_default_label: 'Location',
                select_type_options: {
                    width: '150px',
                    minimumResultsForSearch: -1 // remove search box
                }
            },
            {column_number: 5,
                filter_type: "multi_select",
                select_type: 'select2',
                filter_default_label: 'Type',
                select_type_options: {
                    width: '150px',
                    minimumResultsForSearch: -1 // remove search box
                }
            },
        ]);
         $.fn.dataTable.ext.search.push(function (settings, data, dataIndex) {
            var min = parseInt($('#comMin').val(), 10);
            var max = parseInt($('#comMax').val(), 10);
            var expectedprice = parseInt(data[6]) || 0; // use data for the expectedprice column
            if ((isNaN(min) && isNaN(max)) || (isNaN(min) && expectedprice <= max) || (min <= expectedprice && isNaN(max)) || (min <= expectedprice && expectedprice <= max))
            {
                return true;
            }
            return false;
        });
        var table1 = $('#comerccustomer').DataTable();
         $('#comMin, #comMax').keyup(function () {
            table1.draw();
        });
//       --------------------- Industrial ----------
        var oTable1 = $('#Industrialccustomer').dataTable().yadcf([
            {column_number: 3,
                filter_type: "multi_select",
                select_type: 'select2',
                filter_default_label: 'Sub location',
                select_type_options: {
                    width: '150px',
                    minimumResultsForSearch: -1 // remove search box
                }
            },
            {column_number: 4,
                filter_type: "multi_select",
                select_type: 'select2',
                filter_default_label: 'Location',
                select_type_options: {
                    width: '150px',
                    minimumResultsForSearch: -1 // remove search box
                }
            },
            {column_number: 5,
                filter_type: "multi_select",
                select_type: 'select2',
                filter_default_label: 'Type',
                select_type_options: {
                    width: '150px',
                    minimumResultsForSearch: -1 // remove search box
                }
            },
        ]);
        $.fn.dataTable.ext.search.push(function (settings, data, dataIndex) {
            var min = parseInt($('#IndustrialMin').val(), 10);
            var max = parseInt($('#IndustrialMax').val(), 10);
            var expectedprice = parseInt(data[6]) || 0; // use data for the expectedprice column
            console.log(expectedprice);
            if ((isNaN(min) && isNaN(max)) || (isNaN(min) && expectedprice <= max) || (min <= expectedprice && isNaN(max)) || (min <= expectedprice && expectedprice <= max))
            {
                return true;
            }
            return false;
        });

        var table1 = $('#Industrialccustomer').DataTable();
        $('#IndustrialMin, #IndustrialMax').keyup(function () {
            table1.draw();
        });
//        ------------------------ customer -------------
        var oTable1 = $('#tblcustomer').dataTable().yadcf([
            {column_number: 2,
                filter_default_label: 'Phone',
                filter_type: "text",
            },
            {column_number: 3,
                filter_type: "multi_select",
                select_type: 'select2',
                filter_default_label: 'Sub location',
                select_type_options: {
                    width: '150px',
                    minimumResultsForSearch: -1 // remove search box
                }
            },
            {column_number: 4,
                filter_type: "multi_select",
                select_type: 'select2',
                filter_default_label: 'Location',
                select_type_options: {
                    width: '150px',
                    minimumResultsForSearch: -1 // remove search box
                }
            },
            {column_number: 5,
                filter_type: "multi_select",
                select_type: 'select2',
                filter_default_label: 'City',
                select_type_options: {
                    width: '150px',
                    minimumResultsForSearch: -1 // remove search box
                }
            },
        ]);
        var table1 = $('#tblcustomer').DataTable();
        /* -----------------for active plot  max and min price / footer search /top location search--- */
    });
</script>
