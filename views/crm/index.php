<?php
$this->title = Yii::t('app', 'CRM');
?>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="header">
                <h4 class="title">CRM - Customer List
                    <span>
                        <a  href="index.php?r=crm/add"> <button class="btn btn-info btn-fill btn-xs btn-wd pull-right">Add Customer</button></a>
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