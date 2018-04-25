<?php
$this->title = Yii::t('app', 'Human Resource');
?>
<!-- Nav Bar- start-->
<div class="container">
    <ul class="nav nav-tabs" role="tablist" id="myTab">
        <li class="nav-item">
            <a class="nav-link" href="#list" role="tab" data-toggle="tab" aria-controls="list">List</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#new" role="tab" data-toggle="tab" aria-controls="new">New</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#view" role="tab" data-toggle="tab" aria-controls="view">View </a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" href="#settings" role="tab" data-toggle="tab" aria-controls="settings">Settings</a>
        </li>
    </ul>
    <!-- Nav Bar- start-->

    <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="list"> <!-- /tab-panel -list -->
            <h2>Action Item List</h2>
            <table id="items" class="table table-striped table-bordered DataTable" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Priority</th>
                        <th>Type</th>
                        <th>Status</th>
                        <!--<th>Created By</th>-->
                        <th>Assigned To</th>
                        <th>Created Date</th>
                        <th>Action</th>
                    </tr>

                </thead>
            </table>

        </div> <!-- /tab-panel list -->
        <div role="tabpanel" class="tab-pane" id="new"> <!-- /tab-panel new -->
            <h2>Create Action Item</h2>
            <form id="additem">
                <div class="form-group row control-group">
                    <label for="title" class="col-sm-2 form-control-label">Title</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="title" name="title" placeholder="Title">
                        <p id="err-title" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Description" class="col-sm-2 form-control-label">Description</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="description" name="description" placeholder="Description">
                        <p id="err-description" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group ">
                    <label for="Priority" class="col-sm-2 form-control-label">Priority</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="taskpriorityid" name="taskpriorityid" placeholder="- Select priority type -">
                            <?php
                            foreach ($objTaskpriority as $key => $value) {
                                echo "<option value='$value->id' >" . $value->name . "</option>";
                            }
                            ?>
                        </select>
                        <p id="err-taskpriorityid" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group ">
                    <label for="Type" class="col-sm-2 form-control-label">Type</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="tasktypeid" name="tasktypeid" placeholder="- Select type -">
                            <?php
                            foreach ($objTasktype as $key => $value) {
                                echo "<option value='$value->id' >" . $value->name . "</option>";
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
                                echo "<option value='$value->id' >" . $value->name . "</option>";
                            }
                            ?>
                        </select>
                        <p id="err-taskstatusid" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group ">
                    <label for="CreatedBy" class="col-sm-2 form-control-label">Created By</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="createdby" name="createdby" >
                            <?php
                            foreach ($objUser as $key => $value) {
                                echo "<option value='$value->id' >" . $value->username . "</option>";
                            }
                            ?>
                        </select>
                        <p id="err-createdby" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group ">
                    <label for="AssignedTo" class="col-sm-2 form-control-label">Assigned To</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="assignedto" name="assignedto" placeholder="- Select Assignee -">
                            <?php
                            foreach ($objUser as $key => $value) {
                                echo "<option value='$value->id' >" . $value->username . "</option>";
                            }
                            ?>
                        </select>
                        <p id="err-assignedto" class="text-danger"></p>
                    </div>
                </div>				
                <div class="form-group row">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button onclick="saveItem();" type="button" class="btn btn-success">Save</button>
                        <button onclick="resetItem();" type="button" class="btn btn-success">Cancel</button>
                    </div>
                </div>
            </form>
        </div> <!-- /tab-panel new -->
        <div role="tabpanel" class="tab-pane" id="view"> <!-- /tab-panel view -->
            <h2>View Employee </h2>
        </div><!-- /tab-panel new -->
        <div role="tabpanel" class="tab-pane" id="settings"><!-- /tab-panel settings -->
            <h2>Settings</h2>
        </div><!-- /tab-panel new -->
    </div><!-- /tab-content -->
</div> <!-- /container -->
<script type="text/javascript">
    $(document).ready(function() {
        $('#items').DataTable({
            ajax: "index.php?r=actionitems/allitem",
            "columns": [
                {"data": "title"},
                {"data": "description"},
                {"data": "priority"},
                {"data": "type"},
                {"data": "status"},
//                {"data": "createdby"},
                {"data": "assignedto"},
                {"data": "createddate"},
                {"data": "id",
                    "render": function(data, type, full, meta) {
                        var htmlAction = '';
                        htmlAction += '<a href="index.php?r=actionitems/viewtask&amp;id=' + data + '"><i class="fa fa-pencil"></i></a>&nbsp;'
                        htmlAction += '<i onclick="deleteTask(' + data + ')" class="fa  fa-thumbs-up"></i>';
                        return htmlAction;
                    }
                }
            ]
        });
        $('#myTab a:first').tab('show');
        $('#taskpriorityid').select2();
        $('#tasktypeid').select2();
        $('#taskstatusid').select2();
        $('#createdby').select2();
        $('#assignedto').select2();


        $('#additem .form-control').bind('blur', function() {
            validateAddItem();
        });
    }); // end document.ready
    function resetItem() {
        $('#title').val('');
        $('#description').val('');
        $('#taskpriorityid').select2('val', '');
        $('#taskstatusid').select2('val', '');
        $('#tasktypeid').select2('val', '');
        $('#createdby').select2('val', '');
        $('#assignedto').select2('val', '');
    }

    function saveItem() {
        $("#dialog").attr('title', ' Saving Your Action Item ');
        $("#dialog-msg").html('Saving in Progress.');

        $("#dialog").dialog({
            modal: true,
        });
        if (validateAddItem()) {
            var obj = new Object();
            obj.title = $('#title').val();
            obj.description = $('#description').val();
            obj.taskpriorityid = $('#taskpriorityid').select2('val');
            obj.taskstatusid = $('#taskstatusid').select2('val');
            obj.tasktypeid = $('#tasktypeid').select2('val');
            obj.createdby = $('#createdby').select2('val');
            obj.assignedto = $('#assignedto').select2('val');
            $.ajax({
                url: 'index.php?r=actionitems/saveitem',
                async: false,
                data: obj,
                type: 'POST',
                success: function(data) {
                    $('#dialog').dialog("close");
                    var table = $('#items').DataTable();
                    table.ajax.reload();
                    $('#myTab a:first').tab('show');
                }
            });
       } else {
            $('#dialog').dialog("close");
        }
    }

    function validateAddItem() {
        var flag = true;
        var title = $('#title').val();
        var description = $('#description').val();
        var taskpriorityid = $('#taskpriorityid').select2('val');
        var taskstatusid = $('#taskstatusid').select2('val');
        var tasktypeid = $('#tasktypeid').select2('val');
        var createdby = $('#createdby').select2('val');
        var assignedto = $('#assignedto').select2('val');
        if (title == '') {
            $('#err-title').html('Enter title');
            var flag = false;
        } else {
            $('#err-title').html('');
        }
        if (description == '') {
            $('#err-description').html('Enter description');
            var flag = false;
        } else {
            $('#err-description').html('');
        }
        if (taskpriorityid == '') {
            $('#err-taskpriorityid').html('select priority');
            var flag = false;
        } else {
            $('#err-taskpriorityid').html('');
        }
        if (tasktypeid == '') {
            $('#err-tasktypeid').html('select type');
            var flag = false;
        } else {
            $('#err-tasktypeid').html('');
        }

        if (taskstatusid == '') {
            $('#err-taskstatusid').html('select status');
            var flag = false;
        } else {
            $('#err-taskstatusid').html('');
        }

        if (createdby == '') {
            $('#err-createdby').html('select created suer');
            var flag = false;
        } else {
            $('#err-createdby').html('');
        }

        if (assignedto == '') {
            $('#err-assignedto').html('select assigned user');
            var flag = false;
        } else {
            $('#err-assignedto').html('');
        }
        return flag;
    }

    function deleteTask(id) {
        $("#dialog").attr('title', ' Complete Task');
        $("#dialog-msg").html('Are you sure you want to Change status of task');

        $("#dialog").dialog({
            modal: true,
            buttons: {
                "Yes": function() {
                    var obj = new Object();
                    obj.id = id;
                    obj.status = 'Completed',
                            $.ajax({
                                url: 'index.php?r=actionitems/deletetask',
                                async: false,
                                data: obj,
                                type: 'POST',
                                success: function(data) {
                                    data = JSON.parse(data);
                                    if (data.status == true) {
                                        $("#dialog").dialog("close");
                                        var table = $('#items').DataTable();
                                        table.ajax.reload();
                                        $('#myTab a:first').tab('show');
                                    } else {
                                        $("#dialog").dialog("close");
                                    }

                                }
                            });

                },
                No: function() {
                    $(this).dialog("close");
                }
            }
        });
    }
</script>
