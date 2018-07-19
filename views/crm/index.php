<?php
$this->title = Yii::t('app', 'CRM');
?>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="header">
                <h4 class="title">CRM - Customer List 
                    <!--<form><input type="text" onblur="seacrhCustomer();" name="search" id="search" placeholder="Enter location"></form>-->
                    <span>
                        <div class="btn-group pull-right">
                            <a href="index.php?r=crm/add" type="button" class="btn btn-info btn-wd btn-fill btn-xs ">Add Customer</a>
                            <a href="index.php?r=crm/callnow" type="button" class="btn btn-info btn-wd btn-fill btn-xs ">Call Now</a>
                            <a href="index.php?r=crm/inactivecustomer" type="button" class="btn btn-info btn-wd btn-fill btn-xs">Inactive Customer</a>
                        </div>
                    </span>
                </h4>
                <hr>
                <div class="content table-responsive table-full-width">
                    <table class="table table-striped" id="tblCrmCustomer">
                        <thead>
                            <tr>
                                <td>Minimum price:</td>
                                <td><input type="text" class="form-control border-input input-xm small" id="cusmin" name="min"></td>
                            </tr>
                            <tr>
                                <td>Maximum price:</td>
                                <td><input type="text" class="form-control border-input input-sm" id="cusmax" name="max"></td>
                            </tr>
                        <th>Name</th>
                        <th>Type</ th>
                        <th>Location</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Price</th>
                        <th>Action</th>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>

                </div>
            </div>
            <div class="card" style="padding: 5px;">
                <div class="card shadow" id="customerDetails">

                </div>
            </div>
        </div>

    </div>
</div> 
<script src="js/crm/index.js"></script>
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