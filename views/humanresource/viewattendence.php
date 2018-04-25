<?php
$this->title = Yii::t('app', 'Employee');
?>
<!-- Nav Bar- start-->
<div class="container">
    <ul class="nav nav-tabs" role="tablist" id="myTab">
        <li class="nav-item">
            <a class="nav-link" href="#view" role="tab" data-toggle="tab" aria-controls="view">View</a>
        </li>
    </ul>
    <!-- Nav Bar- start-->

    <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="view"> <!-- /tab-panel -list -->
            <h2>Profile</h2>
            <p align="left"> </p>
            <form id="addemployee">
            <div class="form-group row control-group ">
                <label for="Type" class="col-sm-2 form-control-label">Type</label>
                <div class="col-sm-10">
                    <select class="form-control" id="user_id" placeholder="- Select Username -">
                        <?php
//                        foreach ($objUser as $key => $value) {
//                            echo "<option value='$value->id' >" . $value->username . "</option>";
//                        }
                        ?>
                    </select>
                    <p id="err-leavetype_id" class="text-danger"></p>
                </div>
            </div>
            <div class="form-group row control-group">
                <label for="Email" class="col-sm-2 form-control-label">Attendence Date</label>
                <div class="col-sm-10">
                    <input  type="text" class="form-control input-sm" id="attn_date" name="attn_date" placeholder="Email">
                    <p id="err-attn_date" class="text-danger"></p>
                </div>
            </div>
            <div class="form-group row control-group">
                <label for="Description" class="col-sm-2 form-control-label datepicker-here">In Time</label>
                <div class="col-sm-10">
                    <input  type="text" class="form-control" id="in_time" name="in_time" placeholder="In Time">
                    <p id="err-in_time" class="text-danger"></p>
                </div>
            </div>
            <div class="form-group row control-group">
                <label for="Description" class="col-sm-2 form-control-label datepicker-here">Out Time</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="out_time"  name="out_time" placeholder="Out Time">
                    <p id="err-out_time" class="text-danger"></p>
                </div>
            </div>
            <div class="form-group row control-group ">
                <label for="Type" class="col-sm-2 form-control-label">Type</label>
                <div class="col-sm-10">
                    <select class="form-control" id="leavetype_id" placeholder="- Select Leave type -">
                        <?php
//                        foreach ($objLeavetype as $key => $value) {
//                            echo "<option value='$value->id' >" . $value->name . "</option>";
//                        }
                        ?>
                    </select>
                    <p id="err-leavetype_id" class="text-danger"></p>
                </div>
            </div>
            <!--            <div class="form-group row control-group">
                            <label for="Username" class="col-sm-2 form-control-label">Username</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control input-sm" id="user_id" name="user_id" placeholder="Username">
                                <p id="err-user_id" class="text-danger"></p>
                            </div>
                        </div>-->

            <div class="form-group row">
                <div class="col-sm-offset-2 col-sm-10">
                    <button onclick="saveAttendence();" type="button" class="btn btn-success">Save</button>
                    <button onclick="resetAttendence();" type="button" class="btn btn-success">Cancel</button>
                </div>
            </div>
        </form>
        </div> <!-- /tab-panel list -->
    </div><!-- /tab-content -->

</div> <!-- /container -->

<script type="text/javascript">
    $(document).ready(function() {
        $('#myTab a:first').tab('show');

    });// end document.ready



</script>
