<?php
$this->title = Yii::t('app', 'Resale');

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
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="header">
                <h4 class="title">Resale Project List
                    <!--<form><input type="text" onblur="seacrhCustomer();" name="search" id="search" placeholder="Enter location"></form>-->
                    <span>
                        <div class="btn-group pull-right">
                            <a href="index.php?r=resale/add" type="button" class="btn btn-info btn-wd btn-fill btn-xs ">Add Property </a>
                            </div>
                    </span>
                </h4>
                <hr>
                <div class="content table-responsive table-full-width">
                    <table class="table table-striped" id="tblResale">
                        <thead>
                            <tr>
                                <td>Minimum price:</td>
                                <td><input type="text" class="form-control border-input input-xm small" id="resmin" name="min"></td>
                            </tr>
                            <tr>
                                <td>Maximum price:</td>
                                <td><input type="text" class="form-control border-input input-sm" id="resmax" name="max"></td>
                            </tr>
                        <th>Owner Name</th>
                        <th> Type</th>
                        <th>Location</th>
                        <th>Price</th>
                        <th>Phone</th>
                        <th>Status</th>
                        <th>Action</th>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>

                </div>
            </div>
            <div class="card" style="padding: 5px;">
                <div class="card shadow" id="propertyDetails">

                </div>
            </div>
        </div>
    </div>
</div> 
<script src="js/resale/index.js"></script>
<style>
    .cus-data{
        color: #100e0e;
        font-family: sans-serif;
        background-color: #47525d66;
    }
    .shadow{-webkit-box-shadow:  -18px 17px 9px -17px rgba(212,26,26,1);
            -moz-box-shadow: -18px 17px 9px -17px rgba(212,26,26,1);
            box-shadow: -16px 16px 7px -17px rgba(212,26,26,1);
            /*height: 20px !important;*/
            min-height: 100px;
            margin: 14px;
            padding: 6px;
            word-wrap: break-word;
    }
    .dataTables_length{
        display: none;
    }
</style>