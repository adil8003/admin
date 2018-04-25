<h2>Customer Feedback List</h2>
			<table id="employee" class="table table-striped table-bordered DataTable" cellspacing="0" width="100%">
		        <thead>
		            <tr>
		                <!--<th>Id</th>-->
		                <th>Name</th>
		                <th>Mobile No</th>
		                <th>Email</th>
		                <th>Description</th>
		                <!--<th>Status</th>-->
		            </tr>
		        </thead>
				<tbody>
					<?php
					foreach($objResalefeedback AS $row){
                                        
						echo "<tr>";
//						echo "<td>".$row->id."</td>";
						echo "<td>".$row->name."</td>";
						echo "<td>".$row->phone."</td>";
						echo "<td>".$row->email."</td>";
						echo "<td>".$row->description."</td>";
//						echo "<td>".date('d-M-Y', strtotime($row->reg_date))."</td>";
//						echo "<td><i class='fa fa-pencil'></i>&nbsp;<i class='fa fa-trash-o'></i></td>";
						echo "</tr>";
					}
					?>
		        </tbody>
			</table>