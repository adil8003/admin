<?php
$this->title = Yii::t('app', 'Organisations');
?>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="header">
                <h4 class="title">Organisations
                    <span>
                        <a  href="index.php?r=organisation/addorganisation"> <button class="btn btn-info btn-fill btn-xs btn-wd pull-right">Add Organisation</button></a>
                    </span>
                </h4>
                <hr>
                <div class="content table-responsive table-full-width">
                    <table class="table table-striped" id="tblorganisation">
                        <thead>
                        <th>Name</th>
                        <th>Type</th>
                        <th>Phone</th>
                        <th>City</th>
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