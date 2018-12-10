<?php
$this->title = Yii::t('app', 'Edit');
$id = (isset($_GET['id'])) ? $_GET['id'] : 0;
?>
<input type="hidden" id="userid" value="<?php echo $id; ?>" />
<input type="hidden" id="listpage" value="1" />
<input type="hidden" id="follow_id" value=" " />
<div class="row">
    <div class="col-lg-8 col-md-5">
        <div  class="card">
            <div class="header">
                <h4 class="title">Emp - CRM
                    <span>
                        <a href="index.php?r=users"  <button class="btn btn-info btn-fill btn-xs btn-wd pull-right">Back</button></a>
                    </span> </h4>
            </div><hr>
            <div class="content table-responsive table-full-width">
                <table class="table table-striped" id="tblUsers">
                    <thead>
<!--                        <tr>
                            <td>Minimum price:</td>
                            <td><input type="text" class="form-control border-input input-xm small" id="cusmin" name="min"></td>
                        </tr>
                        <tr>
                            <td>Maximum price:</td>
                            <td><input type="text" class="form-control border-input input-sm" id="cusmax" name="max"></td>
                        </tr>-->
                    <th>name</th>
                    <th>Emp</th>
                    <th>Action</th>
                    </thead>
                    <tbody>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-7">
        <div  class="card">
            <div class="header">
                <h4 class="title">CRM - Details
                    <span>
                        <!--<a href="index.php?r=crm"  <button class="btn btn-info btn-fill btn-xs btn-wd pull-right">Back</button></a>-->
                    </span> </h4>
            </div><hr>
            <h5 id="crmcout"></h5>
        </div>
    </div>
<!--    <div class="col-lg-4 col-md-7">
        <div  class="card">
            <div class="header">
                <h4 class="title">Follow up List
                    <span>
                        <a href="index.php?r=crm"  <button class="btn btn-info btn-fill btn-xs btn-wd pull-right">Back</button></a>
                    </span> </h4>
            </div><hr>
            <div id="updateprofile">
                <div class="content" style="    padding: 0px 9px 10px 10px;">
                    <div class="text-danger" id="notAvailable1" style="    text-align: center;">

                    </div>
                    <div class="row " id="followuplist">
                        <div class="text-danger" id="notAvailable" style="    text-align: center;">

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>-->
    <div class="col-lg-8">
        <div  class="card">
            <div class="header">
                <h4 class="title">Emp - Res project
                    <span>
                        <a href="index.php?r=crm"  <button class="btn btn-info btn-fill btn-xs btn-wd pull-right">Back</button></a>
                    </span> </h4>
            </div><hr>
           <div class="content table-responsive table-full-width">
                <table class="table table-striped" id="tblRes">
                    <thead>
                        <tr>
                            <td>Minimum price:</td>
                            <td><input type="text" class="form-control border-input input-xm small" id="cusmin" name="min"></td>
                        </tr>
                        <tr>
                            <td>Maximum price:</td>
                            <td><input type="text" class="form-control border-input input-sm" id="cusmax" name="max"></td>
                        </tr>
                    <th>Emp</th>
                    <th>Project name</th>
                    <!--<th>Action</th>-->
                    </thead>
                    <tbody>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
<div class="col-lg-4 col-md-7">
        <div  class="card">
            <div class="header">
                <h4 class="title">Res - Details
                    <span>
                        <!--<a href="index.php?r=crm"  <button class="btn btn-info btn-fill btn-xs btn-wd pull-right">Back</button></a>-->
                    </span> </h4>
            </div><hr>
         
        </div>
    </div>
    <div class="col-lg-8">
        <div  class="card">
            <div class="header">
                <h4 class="title">Emp - Com project
                    <span>
                        <a href="index.php?r=crm"  <button class="btn btn-info btn-fill btn-xs btn-wd pull-right">Back</button></a>
                    </span> </h4>
            </div><hr>
           <div class="content table-responsive table-full-width">
                <table class="table table-striped" id="tblCom">
                    <thead>
                        <tr>
                            <td>Minimum price:</td>
                            <td><input type="text" class="form-control border-input input-xm small" id="cusmin" name="min"></td>
                        </tr>
                        <tr>
                            <td>Maximum price:</td>
                            <td><input type="text" class="form-control border-input input-sm" id="cusmax" name="max"></td>
                        </tr>
                    <th>Emp</th>
                    <th>Project name</th>
                    <!--<th>Action</th>-->
                    </thead>
                    <tbody>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
<div class="col-lg-4 col-md-7">
        <div  class="card">
            <div class="header">
                <h4 class="title">Com - Details
                    <span>
                        <!--<a href="index.php?r=crm"  <button class="btn btn-info btn-fill btn-xs btn-wd pull-right">Back</button></a>-->
                    </span> </h4>
            </div><hr>
         
        </div>
    </div>
</div>


<script src="js/user/details.js"></script>
<style>
    .shadow{-webkit-box-shadow:  -18px 17px 9px -17px rgba(212,26,26,1);
            -moz-box-shadow: -18px 17px 9px -17px rgba(212,26,26,1);
            box-shadow: -16px 16px 7px -17px rgba(212,26,26,1);
            /*height: 20px !important;*/
            min-height: 100px;
            margin: 14px;
            padding: 6px;
            word-wrap: break-word;
    }

</style>