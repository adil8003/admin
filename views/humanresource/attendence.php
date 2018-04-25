<?php
$this->title = Yii::t('app', 'Employee');
?>
<!-- Nav Bar- start-->
<div class="container">
    <ul class="nav nav-tabs" role="tablist" id="myTab">
        <li class="nav-item">
			<a class="nav-link" href="#list" role="tab" data-toggle="tab" aria-controls="list">List</a>
		</li>
        <li class="nav-item">
            <a class="nav-link" href="#attendence" role="tab" data-toggle="tab" aria-controls="attendence">Attendence</a>
        </li>
    </ul>
    <!-- Nav Bar- start-->

    <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="list"> <!-- /tab-panel -list -->
			<h2>Attendence List</h2>
			<table id="employee" class="table table-striped table-bordered DataTable" cellspacing="0" width="100%">
		        <thead>
		            <tr>
		                <!--<th>Id</th>-->
		                <th>Name</th>
		                <th>Attn Date</th>
		                <th>In Time</th>
		                <th>Out Time</th>
		                <!--<th>Reg Date</th>-->
				<th>Action</th>
		            </tr>
		        </thead>
				<tbody>
					<?php
					foreach($objAttendence AS $row){
						echo "<tr>";
//						echo "<td>".$row->id."</td>";
						echo "<td>".$row->user->username."</td>";
						echo "<td>".$row->attn_date."</td>";
						echo "<td>".$row->in_time."</td>";
						echo "<td>".$row->out_time."</td>";
//						echo "<td>".date('d-M-Y', strtotime($row->reg_date))."</td>";
                                                echo "<td><a href='index.php?r=humanresource/viewattendence&id=".$row->id."' ><i class='fa fa-pencil'></i></a>&nbsp;<i class='fa fa-trash-o'></i></td>";
						//echo "<td><i><a href=index.php?r=humanresource/viewattendence&amp;id=".$row->id." <i class='fa fa-pencil'></a></td>";
//						echo "</tr>";
					}
					?>
		        </tbody>
			</table>
		</div> <!-- /tab-panel list -->
        
        <div role="tabpanel" class="tab-pane active" id="attendence"> <!-- /tab-panel -list -->
<!--        <div class="dropdown  pull-right">
            <button class="btn btn-default dropdown-toggle" type="button" id="currMonth" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                <?php echo date('M Y'); ?>
            </button>

        </div>-->
        <h2>Add New Attendence</h2>
        <form id="addemployee">
            <div class="form-group row control-group ">
                <label for="Type" class="col-sm-2 form-control-label">Type</label>
                <div class="col-sm-10">
                    <select class="form-control" id="user_id" placeholder="- Select Username -">
                        <?php
                        foreach ($objUser as $key => $value) {
                            echo "<option value='$value->id' >" . $value->username . "</option>";
                        }
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
                        foreach ($objLeavetype as $key => $value) {
                            echo "<option value='$value->id' >" . $value->name . "</option>";
                        }
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

    </div><!-- /tab-content -->
    </div>
</div> <!-- /container -->
<script type="text/javascript">
    $(document).ready(function() {
        $('#myTab a:first').tab('show');
        $('#attn_date').fdatepicker({format: 'yyyy-mm-dd'});
    }); // end document.ready


    function saveAttendence() {
//        $('#new .form-group input').attr('disabled', 'disabled');
//        $('#new .form-group select').attr('disabled', 'disabled');
//        $('#new .form-group button').attr('disabled', 'disabled');
        //if (validateAttendence()) {
            var obj = new Object();
//            obj.id = 0;
            obj.user_id = $('#user_id').val();
            obj.attn_date = $('#attn_date').val();
            obj.in_time = $('#in_time').val();
            obj.out_time = $('#out_time').val();
            obj.leavetype_id = $('#leavetype_id').val();
          
            $.ajax({
                url: 'index.php?r=humanresource/saveattendence',
                async: false,
                data: obj,
                type: 'POST',
                success: function(data) {
//                    $('#new .form-group input').removeAttr('disabled');
//                    $('#new .form-group select').removeAttr('disabled');
//                    $('#new .form-group button').removeAttr('disabled');
                    
                    $('#myTab a:first').tab('show');
                }
            });
        //} 
         {
//            $('#new .form-group input').removeAttr('disabled');
//            $('#new .form-group select').removeAttr('disabled');
//            $('#new .form-group button').removeAttr('disabled');
        }
    }


</script>
