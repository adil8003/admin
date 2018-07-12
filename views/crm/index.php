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
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Location</th>
                        <th>Price</th>
                        <th>Type</th>
                        <th>Date</th>
                        <th>Action</th>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div> 
<script src="js/crm/index.js"></script>