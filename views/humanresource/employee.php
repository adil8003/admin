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
            <h2>Employee List</h2>
            <table id="employee" class="table table-striped table-bordered DataTable" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Status</th>
                        <th>Reg. Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div> <!-- /tab-panel list -->
        <div role="tabpanel" class="tab-pane" id="new"> <!-- /tab-panel new -->
            <h2>Add New Employee</h2>
            <form id="addemployee">
                <div class="form-group row control-group">
                    <label for="Username" class="col-sm-2 form-control-label">Username</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control input-sm" id="username" name="username" placeholder="Username">
                        <p id="err-username" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Email" class="col-sm-2 form-control-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control input-sm" id="email" name="email" placeholder="Email">
                        <p id="err-email" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Password" class="col-sm-2 form-control-label">Password</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control input-sm" id="password" placeholder="Password">
                        <p id="err-password" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group ">
                    <label for="Role" class="col-sm-2 form-control-label">Role</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="roles_id" placeholder="- Select User Roles -">
                            <?php
                            foreach ($objRoles as $key => $value) {
                                echo "<option value='$value->id' >" . $value->name . "</option>";
                            }
                            ?>
                        </select>
                        <p id="err-roles_id" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Status" class="col-sm-2 form-control-label">Status</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="status_id" placeholder="- Select User Status -">
                            <?php
                            foreach ($objStatus as $key => $value) {
                                echo "<option value='$value->id' >" . $value->name . "</option>";
                            }
                            ?>
                        </select>
                        <p id="err-status_id" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button onclick="saveEmployee();" type="button" class="btn btn-success">Save</button>
                        <button onclick="resetEmployee();" type="button" class="btn btn-success">Cancel</button>
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
<style>
    label.valid {
        width: 24px;
        height: 24px;
        background: url(assets/img/valid.png) center center no-repeat;
        display: inline-block;
        text-indent: -9999px;
    }
    label.error {
        font-weight: bold;
        color: red;
        padding: 2px 8px;
        margin-top: 2px;
    }
    .form-group p {
        margin:0px;
    }
</style>
<script type="text/javascript">
    $(document).ready(function() {
        $('#myTab a:first').tab('show');
        $('#status_id').select2({
            placeholder: 'Select Status',
            allowClear: true
        });
        $('#roles_id').select2({
            placeholder: 'Select Roles',
            allowClear: true
        });


        $('#employee').DataTable({
            ajax: "index.php?r=humanresource/allemployee",
            "columns": [
                {"data": "username"},
                {"data": "email"},
                {"data": "role"},
                {"data": "status"},
                {"data": "regdate"},
                {"data": "id",
                    "render": function(data, type, full, meta) {
                        var htmlAction = '';
                        htmlAction += '<a href="index.php?r=humanresource/viewemployee&amp;id=' + data + '"><i class="fa fa-pencil"></i></a>&nbsp;'
                        if (full.status == 'Active') {
                            htmlAction += '<i onclick="inactiveEmployee(' + data + ')" class="fa fa-trash-o"></i>';
                        } else {
                            htmlAction += '<i onclick="activeEmployee(' + data + ')" class="fa fa-refresh"></i>';
                        }
                        return htmlAction;
                    }
                }
            ]
        });
        $('#myTab a:first').tab('show');
        $('#status_id').select2();
        $('#roles_id').select2();


        $('#addemployee .form-control').bind('blur', function() {
            validateEmployee();
        });
    }); // end document.ready

    function resetEmployee() {
        $('#username').val('');
        $('#email').val('');
        $('#password').val('');
        $('#status_id').select2('');
        $('#roles_id').select2('');
    }
    function saveEmployee() {
        $("#dialog").attr('title', ' Save New Employee');
        $("#dialog-msg").html('Saving in Progress.');

        $("#dialog").dialog({
            modal: true,
        });
        if (validateEmployee()) {
            var obj = new Object();
            obj.id = 0;
            obj.username = $('#username').val();
            obj.email = $('#email').val();
            obj.password = $('#password').val();
            obj.status_id = $('#status_id').select2('val');
            obj.role_id = $('#roles_id').select2('val');

            $.ajax({
                url: 'index.php?r=humanresource/saveemployee',
                async: false,
                data: obj,
                type: 'POST',
                success: function(data) {
                    $('#dialog').dialog("close");
                    var table = $('#employee').DataTable();
                    table.ajax.reload();
                    $('#myTab a:first').tab('show');
                }
            });
        } else {
            $('#dialog').dialog("close");
        }
    }

    function validateEmployee() {
        var flag = true;
        var username = $('#username').val();
        var email = $('#email').val();
        var password = $('#password').val();
        var status_id = $('#status_id').select2('val');
        var roles_id = $('#roles_id').select2('val');
        if (username == '') {
            $('#err-username').html('Enter username');
            var flag = false;
        } else {
            $('#err-username').html('');
        }
        if (email == '') {
            $('#err-email').html('Enter email');
            var flag = false;
        } else {
            $('#err-email').html('');
        }
        if (password == '') {
            $('#err-password').html('Enter password');
            var flag = false;
        } else {
            $('#err-password').html('');
        }
        if (status_id == '') {
            $('#err-status_id').html('Select status');
            var flag = false;
        } else {
            $('#err-status_id').html('');
        }
        if (roles_id == '') {
            $('#err-roles_id').html('Select role');
            var flag = false;
        } else {
            $('#err-roles_id').html('');
        }
        return flag;
    }
    function inactiveEmployee(id) {
        $("#dialog").attr('title', ' Inactivate Employee');
        $("#dialog-msg").html('Are you sure you want to inactivate employee');

        $("#dialog").dialog({
            modal: true,
            buttons: {
                "Yes": function() {
                    var obj = new Object();
                    obj.id = id;
                    obj.status = 'inactive';
                    ;
                    $.ajax({
                        url: 'index.php?r=humanresource/deleteemployee',
                        async: false,
                        data: obj,
                        type: 'POST',
                        success: function(data) {
                            data = JSON.parse(data);
                            if (data.status == true) {

                                $("#dialog").dialog("close");
                                var table = $('#employee').DataTable();
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
    function activeEmployee(id) {
        $("#dialog").attr('title', 'Activate Employee');
        $("#dialog-msg").html('Are you sure you want to activate employee');
        $("#dialog").dialog({
            modal: true,
            buttons: {
                "Yes": function() {
                    var obj = new Object();
                    obj.id = id;
                    obj.status = 'active';
                    $.ajax({
                        url: 'index.php?r=humanresource/deleteemployee',
                        async: false,
                        data: obj,
                        type: 'POST',
                        success: function(data) {
                            data = JSON.parse(data);
                            if (data.status == true) {

                                $("#dialog").dialog("close");
                                var table = $('#employee').DataTable();
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
    
    
//    -----------attendance------



    
</script>
