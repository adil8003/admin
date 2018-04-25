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
		                <!--<th>Id</th>-->
		                <th>Name</th>
		                <th>Email</th>
		                <th>Role</th>
		                <th>Status</th>
		                <th>Reg Date</th>
				<th>Action</th>
		            </tr>
		        </thead>
				<tbody>
					<?php
					foreach($objUser AS $row){
						echo "<tr>";
//						echo "<td>".$row->id."</td>";
						echo "<td>".$row->username."</td>";
						echo "<td>".$row->email."</td>";
						echo "<td>".$row->role->name."</td>";
						echo "<td>".$row->status->name."</td>";
						echo "<td>".date('d-M-Y', strtotime($row->reg_date))."</td>";
						echo "<td><i class='fa fa-pencil'></i>&nbsp;<i class='fa fa-trash-o'></i></td>";
						echo "</tr>";
					}
					?>
		        </tbody>
			</table>
		</div> <!-- /tab-panel list -->
		<div role="tabpanel" class="tab-pane" id="new"> <!-- /tab-panel new -->
			<h2>Add New Employee</h2>
			<form id="addemployee">
				<div class="form-group row control-group">
					<label for="Username" class="col-sm-2 form-control-label">Username</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="username" name="username" placeholder="Username">
					</div>
				</div>
				<div class="form-group row control-group">
					<label for="Email" class="col-sm-2 form-control-label">Email</label>
					<div class="col-sm-10">
						<input type="email" class="form-control" id="email" name="email" placeholder="Email">
					</div>
				</div>
				<div class="form-group row control-group">
					<label for="Password" class="col-sm-2 form-control-label">Password</label>
					<div class="col-sm-10">
						<input type="password" class="form-control" id="password" placeholder="Password">
					</div>
				</div>
				<div class="form-group row control-group ">
					<label for="Role" class="col-sm-2 form-control-label">Role</label>
					<div class="col-sm-10">
						<select class="form-control" id="roles_id" placeholder="- Select User Roles -">
							<?php
									foreach ($objRoles as $key => $value) {
										echo "<option value='$value->id' >".$value->name."</option>";
									}
							 ?>
						</select>
					</div>
				</div>
				<div class="form-group row control-group">
					<label for="Status" class="col-sm-2 form-control-label">Status</label>
					<div class="col-sm-10">
						<select class="form-control" id="status_id" placeholder="- Select User Status -">
							<?php
									foreach ($objStatus as $key => $value) {
										echo "<option value='$value->id' >".$value->name."</option>";
									}
							 ?>
						</select>
					</div>
				</div>
				<div class="form-group row">
					<div class="col-sm-offset-2 col-sm-10">
						<button type="button" class="btn btn-success">Save</button>
						<button type="button" class="btn btn-success">Cancel</button>
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
</style>
<script type="text/javascript">
$(document).ready(function(){
	$('#myTab a:first').tab('show');
	$('#employee').DataTable();
	$('#status_id').select2();
	$('#roles_id').select2();
        
//         $('#addemployee .form-control').bind('blur', function(){
//            validateAddEmployee();
//        });
$('#addemployee .form-control').bind('blur', function(){
            validateAddEmployee();
        });        
}); // end document.ready

function validateAddEmployee(){
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
</script>
