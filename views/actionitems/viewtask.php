<?php
$this->title = Yii::t('app', 'Human Resource');
?>
<!-- Nav Bar- start-->
<div class="container">
    <ul class="nav nav-tabs" role="tablist" id="myTab">
        <li class="nav-item">
            <a class="nav-link" href="#view_task" role="tab" data-toggle="tab" aria-controls="list">Task</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#view_routine" role="tab" data-toggle="tab" aria-controls="new">Routine</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#view_discussion" role="tab" data-toggle="tab" aria-controls="view">Discussion </a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" href="#view_setting" role="tab" data-toggle="tab" aria-controls="settings">Settings</a>
        </li>

    </ul>
    <!-- Nav Bar- end-->
    <div class="tab-content">
        <input type="hidden" value="<?= $objtask->id; ?>" id="task_id">
        <div role="tabpanel" class="tab-pane" id="view_task"> <!-- /tab-panel new -->

            <h2>Update Action Item</h2>
            <form id="addtask">
                <div class="form-group row control-group">
                    <label for="title" class="col-sm-2 form-control-label">Title</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="title" ovalue="<?= $objtask->title; ?>" value="<?= $objtask->title; ?>" name="title" placeholder="Title">
                        <p id="err-title" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Description" class="col-sm-2 form-control-label">Description</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="description" ovalue="<?= $objtask->description; ?>" value="<?= $objtask->description; ?>" name="description" placeholder="Description">
                        <p id="err-description" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group ">
                    <label for="Priority" class="col-sm-2 form-control-label">Priority</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="taskpriorityid" name="taskpriorityid" placeholder="- Select priority type -">
                            <?php
                            foreach ($objTaskpriority as $key => $value) {
                                if ($value->id == $objtask->taskpriorityid) {
                                    echo "<option selected value='$value->id' >" . $value->name . "</option>";
                                } else {
                                    echo "<option value='$value->id' >" . $value->name . "</option>";
                                }
                            }
                            ?>
                        </select>
                        <p id="err-taskpriorityid" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group ">
                    <label for="Type" class="col-sm-2 form-control-label">Task Type</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="tasktypeid" name="tasktypeid" placeholder="- Select type -">
                            <?php
                            foreach ($objTasktype as $key => $value) {
                                if ($value->id == $objtask->tasktypeid) {
                                    echo "<option selected value='$value->id' >" . $value->name . "</option>";
                                } else {
                                    echo "<option value='$value->id' >" . $value->name . "</option>";
                                }
                            }
                            ?>
                        </select>
                        <p id="err-taskpriorityid" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group ">
                    <label for="Status" class="col-sm-2 form-control-label">Status</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="taskstatusid" name="taskstatusid" placeholder="- Select status -">
                            <?php
                            foreach ($objTaskstatus as $key => $value) {
                                if ($value->id == $objtask->taskstatusid) {
                                    echo "<option selected value='$value->id' >" . $value->name . "</option>";
                                } else {
                                    echo "<option value='$value->id' >" . $value->name . "</option>";
                                }
                            }
                            ?>
                        </select>
                        <p id="err-taskstatusid" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Description" class="col-sm-2 form-control-label">Created By</label>
                    <div class="col-sm-10">
                        <select disabled="disabled" class="form-control "dropdown-menu btn-block role="menu"  readonly id="createdby" name="createdby" placeholder="- Select Assignee -">

                            <?php
                            foreach ($objUser as $key => $value) {
                                if ($value->id == $objtask->createdby0->id) {
                                    echo "<option selected value='$value->id' >" . $value->username . "</option>";
                                } else {
                                    echo "<option value='$value->id' >" . $value->username . "</option>";
                                }
                            }
                            ?>
                        </select>
                        <p id="err-description" class="text-danger" readonly></p>
                    </div>
                </div>
                <div class="form-group row control-group ">
                    <label for="AssignedTo" class="col-sm-2 form-control-label">Assigned To</label>
                    <div class="col-sm-10">
                        <select class="form-control"  id="assignedto" name="assignedto" placeholder="- Select Assignee -">
                            <?php
                            foreach ($objUser as $key => $value) {
                                if ($value->id == $objtask->assignedto0->id) {
                                    echo "<option selected value='$value->id' >" . $value->username . "</option>";
                                } else {
                                    echo "<option value='$value->id' >" . $value->username . "</option>";
                                }
                            }
                            ?>
                        </select>
                        <p id="err-assignedto" class="text-danger"></p>
                    </div>
                </div>	

                <div class="form-group row">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button onclick="saveTask();" type="button" class="btn btn-success">Save</button>
                        <button onclick="resetItem();" type="button" class="btn btn-success">Cancel</button>
                    </div>
                </div>
            </form>
        </div> 
        <div role="tabpanel" class="tab-pane" id="view_routine"> <!-- /tab-panel new -->
            <h2>Routine</h2>
            <form id="addroutine">
                <div class="form-group row control-group">
                    <label for="title" class="col-sm-2 form-control-label">frequency</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="frequency" value="<?= $objTaskroutine->frequency; ?>" name="frequency" placeholder="frequency">
                        <p id="err-frequency" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Description" class="col-sm-2 form-control-label">Next date</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nextdate" value="<?= $objTaskroutine->nextdate; ?>" name="nextdate" placeholder="nextdate">
                        <p id="err-nextdate" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button onclick="saveRoutine();" type="button" class="btn btn-success">Save</button>
                        <button onclick="resetRoutine();" type="button" class="btn btn-success">Cancel</button>
                    </div>
                </div>
            </form>
        </div>
        <div role="tabpanel" class="tab-pane" id="view_discussion"> <!-- /tab-panel new -->
            <h2>Discussion</h2>
            <?php // echo date('d-m-y');  ?>
            <form>
                <fieldset class="form-group">
                    <label for="formGroupExampleInput">Example label</label>
                    <textarea class="form-control" id="comment" name="comment" rows="3"></textarea>
                </fieldset>
                 <div class="form-group row control-group">
                    <label for="Description" class="col-sm-2 form-control-label">Comment Date</label>
<!--                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="commentdate" value="" name="commentdate" placeholder="nextdate">
                        <p id="err-nextdate" class="text-danger"></p>
                    </div>-->
                </div>
                <!--                <div class="form-group row control-group ">
                                    <label for="AssignedTo" class="col-sm-2 form-control-label">Comment by</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" id="commentby" name="commentby" placeholder="- Select Assignee -">
                                            //<?php
//                            foreach ($objUser as $key => $value) {
//                                echo "<option value='$value->id' >" . $value->username . "</option>";
//                            }
//                            
            ?>
                                        </select>
                                        <p id="err-assignedto" class="text-danger"></p>
                                    </div>
                                </div>	-->
                <input type="button" class="btn btn-danger" onclick="saveDiscussion();" value="Save">
                <input type="hidden" value="<?= $objtask->id; ?>" id="commentbyuserid">
            </form>
            <?php
            if (!$objTaskdiscussion) {
                foreach ($objTaskdiscussion AS $row) {
                    ?>
                    <div class="media">
                        <div class="media-left">
                            <a href="#">
                                <img class="media-object" id="commentby" src="images/User-icon.png" alt="Generic placeholder image">
                                <?php echo $row->commentby->name; ?>
                                <input disabled="disabled" type="text" class="form-control input-sm" id="comment" name="comment" value="<?= $objTaskdiscussion->comment; ?>" >

                            </a>
                        </div>
                        <div class="media-body"  >
                            <h4 class="media-heading">Media heading</h4>
                            <?php echo $row->comment; ?>

                        </div>
                    </div>
                <?php
                }
            } else {
                ?>
                <p>No Discussion yet.</p>
<?php } ?>
        </div>
        <div role="tabpanel" class="tab-pane" id="view_setting"> <!-- /tab-panel new -->

            <h2>Settings</h2>

        </div>
    </div>  <!-- /panel container -->
</div><!-- /container -->
<style>
    .media-object{
        width: 50px !important;
    }
</style>
<script type="text/javascript">
    $(document).ready(function() {
        $('#myTab a:first').tab('show');
        // end document.ready
        $('#nextdate').fdatepicker({format: 'yyyy-mm-dd'});
        $('#commentdate').fdatepicker({format: 'yyyy-mm-dd'});

        $('#addtask .form-control').bind('blur', function() {
            validatetask();
        });

        $('#addroutine .form-control').bind('blur', function() {
            validateroutine();
        });
    });

    function saveDiscussion() {
        var obj = new Object();
        obj.task_id = $('#task_id').val();
        obj.comment = $('#comment').val();
        obj.commentdate = $('#commentdate').val();

        $.ajax({
            url: 'index.php?r=actionitems/savediscussion',
            async: false,
            data: obj,
            type: 'POST',
            success: function(data) {
            }
        });
    }
    function resetItem() {
        $('#title').val($('#title').attr('ovalue'));
        $('#description').val($('#description').attr('ovalue'));
        $('#taskpriorityid').select2('val', '');
        $('#taskstatusid').select2('val', '');
        $('#tasktypeid').select2('val', '');
        $('#createdby').select2('val', '');
        $('#assignedto').select2('val', '');
    }


    function saveTask() {
        $("#dialog").attr('title', ' Save Update Task ');
        $("#dialog-msg").html('Saving in Progress.');
        $("#dialog").dialog({
            modal: true,
        });
        if (validatetask()) {
            var obj = new Object();
            obj.task_id = $('#task_id').val();
            obj.title = $('#title').val();
            obj.description = $('#description').val();
            obj.taskpriorityid = $('#taskpriorityid').val();
            obj.taskstatusid = $('#taskstatusid').val();
            obj.tasktypeid = $('#tasktypeid').val();
            obj.createdby = $('#createdby').val();
            obj.assignedto = $('#assignedto').val();
            $.ajax({
                url: 'index.php?r=actionitems/updatetask',
                async: false,
                data: obj,
                type: 'POST',
                success: function(data) {
                    $('#dialog').dialog("close");
                    $('#myTab a:first').tab('show');
                }
            });
        } else {
            $('#dialog').dialog("close");
        }
    }

    function saveRoutine() {
        if (validateroutine()) {
            var obj = new Object();
            obj.task_id = $('#task_id').val();
            obj.frequency = $('#frequency').val();
            obj.nextdate = $('#nextdate').val();
            $.ajax({
                url: 'index.php?r=actionitems/saveroutine',
                async: false,
                data: obj,
                type: 'POST',
                success: function(data) {
                }
            });
        }
    }

    function validateroutine() {
        var flag = true;
        var frequency = $('#frequency').val();
        var nextdate = $('#nextdate').val();

        if (frequency == '') {
            $('#err-frequency').html('Enter frequency');
            var flag = false;
        } else {
            $('#err-frequency').html('');
        }
        if (nextdate == '') {
            $('#err-nextdate').html('Enter next date');
            var flag = false;
        } else {
            $('#err-nextdate').html('');
        }
        return flag;
    }

    function validatetask() {
        var flag = true;
        var title = $('#title').val();
        var description = $('#description').val();

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
        return flag;
    }
</script>
