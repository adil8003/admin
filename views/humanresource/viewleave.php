<?php
$this->title = Yii::t('app', 'Human Resource');
?>
<!-- Nav Bar- start-->
<div class="container">
    <ul class="nav nav-tabs" role="tablist" id="myTab">
        <li class="nav-item">
            <a class="nav-link" href="#new" role="tab" data-toggle="tab" aria-controls="new">Update Leave</a>
        </li>
    </ul>
    <!-- Nav Bar- start-->
    <div class="tab-content">
        <div role="tabpanel" class="tab-pane" id="new"> <!-- /tab-panel new -->
            <input type="hidden" value="<?= $objLeave->id; ?>" id="leave_id">
            <h2>Update New Leave</h2>
            <form id="new-leave">
                <div class="form-group row control-group">
                    <label for="title" class="col-sm-2 form-control-label">Title</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" ovalue="<?= $objLeave->title; ?>" value="<?= $objLeave->title; ?>" id="title" name="title" placeholder="Title">
                        <p id="err-title" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Description" class="col-sm-2 form-control-label">Description</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" ovalue="<?= $objLeave->description; ?>" value="<?= $objLeave->description; ?>" id="description" name="description" placeholder="Description">
                        <p id="err-description" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group ">
                    <label for="Type" class="col-sm-2 form-control-label">Type</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="leavetypeid" placeholder="- Select Leave type -">
                            <?php
                            foreach ($objLeavetype as $key => $value) {
                                if ($value->id == 2 || $value->id == 3 || $value->id == 4) {
                                    if ($value->id == $objLeave->leavetypeid) {
                                        echo "<option selected value='$value->id' >" . $value->name . "</option>";
                                    } else {
                                        echo "<option value='$value->id' >" . $value->name . "</option>";
                                    }
                                }
                            }
                            ?>
                        </select>
                        <p id="err-leavetypeid" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Description" class="col-sm-2 form-control-label">Days</label>
                    <div class="col-sm-10">
                        <input onChange="setFromDate();" type="text" ovalue="<?= $objLeave->days; ?>" value="<?= $objLeave->days; ?>" class="form-control" id="days" name="days" placeholder="Description">
                        <p id="err-days" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Description" class="col-sm-2 form-control-label datepicker-here">Start Date</label>
                    <div class="col-sm-10">
                        <input onChange="setFromDate();" type="text" ovalue="<?= $objLeave->todate; ?>" value="<?= $objLeave->todate; ?>" class="form-control" id="todate" name="todate" placeholder="Start Date">
                        <p id="err-todate" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Description" class="col-sm-2 form-control-label datepicker-here">End Date</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" ovalue="<?= $objLeave->fromdate; ?>" value="<?= $objLeave->fromdate; ?>" id="fromdate" readonly name="fromdate" placeholder="End Date">
                        <p id="err-fromdate" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group ">
                    <label for="Type" class="col-sm-2 form-control-label">Applied By</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="appliedby" name="appliedby" placeholder="- Select Leave type -">
                            <?php
                            foreach ($objUser as $key => $value) {
                                if ($value->status->id == 2  && $value->role_id==3){
                                echo "<option value='$value->id' >" . $value->username . "</option>";
                              
                            }
                            }
                            ?>
                        </select>
                        <p id="err-appliedby" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group ">
                    <label for="Type" class="col-sm-2 form-control-label">Approved By</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="approvedby" name="approvedby" placeholder="- Select Leave type -">
                            <?php
                            foreach ($objUser as $key => $value) {
                                if ($value->role_id == 1 || $value->role_id == 2 || $value->status_id == 1) {
                                    
                                    echo "<option value='$value->id' >" . $value->username . "</option>";
                                }
                            }
                            ?>
                        </select>
                        <p id="err-approvedby" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group ">
                    <label for="Status" class="col-sm-2 form-control-label">Status</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="status" >
                            <option value='applied' >Applied</option>
                            <option value='approved' >Approved</option>
                            <option value='rejected' >Rejected</option>
                        </select>
                        <p id="err-status" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Comment" class="col-sm-2 form-control-label">Comment</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" ovalue="<?= $objLeave->comment; ?>" value="<?= $objLeave->comment; ?>"  id="comment" name="comment" placeholder="Comment">
                        <p id="err-comment" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="button" onclick="saveUpdateleave();" class="btn btn-success">Save</button>
                        <button type="button" onclick="resetUpdateleave();" class="btn btn-success">Cancel</button>
                    </div>
                </div>
            </form>
        </div> <!-- /tab-panel new -->
        <div role="tabpanel" class="tab-pane" id="view"> <!-- /tab-panel view -->
            <h2>Leave Type </h2>
            <table id="leavetype" class="table table-striped table-bordered DataTable" cellspacing="0" width="100%"></table>
            <div class="form-group row control-group ">
                <label for="Type" class="col-sm-2 form-control-label">Type</label>
                <div class="col-sm-10">
                    <select class="form-control" id="leavetype_id" placeholder="- Select Leave type -">
                        <?php
                        foreach ($objLeavetype as $key => $value) {
                            echo "<option value='$value->id' >" . $value->name . "</option>";
                        }
                        ?>
                    </select>
                    <p id="err-leavetype_id" class="text-danger"></p>
                </div>
            </div>

        </div><!-- /tab-panel new -->
        <div role="tabpanel" class="tab-pane" id="settings"><!-- /tab-panel settings -->
            <h2>Settings</h2>
        </div><!-- /tab-panel new -->
    </div><!-- /tab-content -->

</div> <!-- /container -->
<script type="text/javascript">
    $(document).ready(function() {
        $('#myTab a:first').tab('show');
        //$('#leave').DataTable();

        $('#fromdate').fdatepicker({format: 'yyyy-mm-dd'});
        $('#todate').fdatepicker({format: 'yyyy-mm-dd'});


        $('#new-leave .form-control').bind('blur', function() {
            validateLeave();
        });
    });

    function setFromDate() {
        var days = $('#days').val();
        var todate = $('#todate').val();
        if (days != '' && todate != '') {
            $('#fromdate').val(todate);
        } else {
            $('#fromdate').val('');
        }
    }

    function resetUpdateleave() {

        $('#title').val($('#title').attr('ovalue'));
        $('#description').val($('#description').attr('ovalue'));
        $('#leavetypeid').select2($('#leavetypeid').attr('ovalue'));
        $('#days').val($('#days').attr('ovalue'));
        $('#fromdate').val($('#fromdate').attr('ovalue'));
        $('#todate').val($('#todate').attr('ovalue'));
        $('#appliedby').select2($('#appliedby').attr('ovalue'));
        $('#approvedby').select2($('#approvedby').attr('ovalue'));
        $('#status').select2($('#status').attr('ovalue'));
        $('#comment').val($('#comment').attr('ovalue'));
    }
    function saveUpdateleave() {
        $("#dialog").attr('title', ' Save Update Request Leave');
        $("#dialog-msg").html('Saving in Progress.');

        $("#dialog").dialog({
            modal: true,
        });
        if (validateLeave()) {
            var obj = new Object();
            obj.leave_id = $('#leave_id').val();
            obj.title = $('#title').val();
            obj.description = $('#description').val();
            obj.leavetypeid = $('#leavetypeid').val();
            obj.days = $('#days').val();
            obj.fromdate = $('#fromdate').val();
            obj.todate = $('#todate').val();
            obj.appliedby = $('#appliedby').val();
            obj.approvedby = $('#approvedby').val();
            obj.status = $('#status').val();
            obj.comment = $('#comment').val();
//            obj.applieddate = $('#applieddate').val();
            $.ajax({
                url: 'index.php?r=humanresource/updateleave',
                async: false,
                data: obj,
                type: 'POST',
                success: function(data) {
                    console.log(data)
                    $('#dialog').dialog("close");
                    $('#myTab a:first').tab('show');
                }
            });
        } else {
            $('#dialog').dialog("close");
        }
    }

    function validateLeave() {
        var flag = true;
        var title = $('#title').val();
        var description = $('#description').val();
        var days = $('#days').val();
        var fromdate = $('#fromdate').val();
        var todate = $('#todate').val();
        var status = $('#status').val();

        if (title == '') {
            $('#err-title').html('Enter title');
            flag = false;
        } else {
            $('#err-title').html('');
        }
        if (description == '') {
            $('#err-description').html('Enter description');
            flag = false;
        } else {
            $('#err-description').html('');
        }
        if (days == '') {
            $('#err-days').html('Enter lave days ');
            flag = false;
        } else {
            $('#err-days').html('');
        }
        if (fromdate == '') {
            $('#err-fromdate').html('Enter fromdate');
            flag = false;
        } else {
            $('#err-fromdate').html('');
        }
        if (todate == '') {
            $('#err-todate').html('Enter todate');
            flag = false;
        } else {
            $('#err-todate').html('');
        }
        if (status == '') {
            $('#err-status').html('Enter status');
            flag = false;
        } else {
            $('#err-status').html('');
        }

        return flag;
    }

</script>
