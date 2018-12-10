<?php
$this->title = Yii::t('app', ' Users');
?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="header">
                <h4 class="title">Users
                    <span>
                        <div class="btn-group pull-right">
                            <a href="index.php?r=users/add" type="button" class="btn btn-info btn-wd btn-fill btn-xs ">Add user</a>
                            <!--<a href="index.php?r=users/" type="button" class="btn btn-info btn-wd btn-fill btn-xs ">Back</a>-->
                            <!--<a href="index.php?r=crm/inactivecustomer" type="button" class="btn btn-info btn-wd btn-fill btn-xs">Inactive Customer</a>-->
                        </div>
                    </span> </h4>
            </div><hr>
            <div class="content table-responsive ">
                <div class="content table-responsive table-full-width">
                    <table class="table table-striped" id="tblusers">
                        <thead>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Role</th>
                        <th>Status</th>
                        <th>Date</th>
                        <th>Action</th>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>

                </div>
            </div>
            <!--</div>-->
        </div>
    </div>
</div>
<script src="js/user/index.js"></script>
