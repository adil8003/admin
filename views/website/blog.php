<?php
$this->title = Yii::t('app', 'Website');
?>

<div class="container">
    <ul class="nav nav-tabs" role="tablist" id="myTab">
<!--        <li class="nav-item">
            <a class="nav-link" href="#blog" role="tab" data-toggle="tab" aria-controls="blog">Blog</a>
        </li>-->
        <li class="nav-item">
            <a class="nav-link" href="#list" role="tab" data-toggle="tab" aria-controls="add">List</a>
        </li>
         <li class="nav-item">
            <a class="nav-link" href="#add" role="tab" data-toggle="tab" aria-controls="add">Add</a>
        </li>
         
        
    </ul>
    <!-- Nav Bar- start-->
    <div class="tab-content">

        
           <div role="tabpanel" class="tab-pane active" id="list"> <!-- /tab-panel -list -->
			<h2>Blog List</h2>
			<table id="employee" class="table table-striped table-bordered DataTable" cellspacing="0" width="100%">
		        <thead>
		            <tr>
		                <!--<th>Id</th>-->
		                <th>Id</th>
		                <th>Title</th>
		                <th>Tags</th>
		                <th>Status</th>
		                
		                <th>Date</th>
		                <th>Action</th>
		            </tr>
		        </thead>
				<tbody>
					<?php
                                        
					foreach($objBlog AS $row){
						echo "<tr>";
						echo "<td>".$row->id."</td>";
						echo "<td><a href='index.php?r=website/blogedit&id=".$row->id."' target='_blank'>".$row->title."</a></td>";
						echo "<td>".$row->tags."</td>";
						echo "<td>".$row->status."</td>";
						
						echo "<td>".date('d-M-Y', strtotime($row->date))."</td>";
						echo "<td><a href='index.php?r=website/blogedit&id=".$row->id."'><i class='fa fa-pencil'></a></i>&nbsp;<i class='fa fa-eye'></i></td>";
						echo "</tr>";
					}
					?>
		        </tbody>
			</table>
		</div> <!-- /tab-panel list -->
        
          
        <div role="tabpanel" class="tab-pane " id="add"> <!-- /tab-panel -list -->
            <h2>New</h2> 
            <div class="row" >
                <div class="col-sm-10" >
                   <div class="form-group row control-group">
                    <label for="blog" class="col-sm-2 form-control-label">Title</label>
                        <div class="col-sm-10">
                        <input  type="text" class="form-control input-sm" id="title" name="title" value="" placeholder="title">
                        <p id="err-securitydoor" class="text-danger"></p>
                        </div>
                    </div>
            
            <div class="form-group row control-group">
                    <label for="blog" class="col-sm-2 form-control-label">Body</label>
                    <div class="col-sm-10">
                        <textarea name="body" id="body" style="width: 780px; height: 150px"> </textarea>
                        <p id="err-securitydoor" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group ">
                    <label for="blog" class="col-sm-2 form-control-label">Status</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="status" name="status" placeholder="status">
                            <option value="publish">publish</option>
                            <option value="unpublish">unpublish</option>
                        </select>
                        <p id="err-flattype" class="text-danger"></p>
                    </div>
                </div>
                    
                <div class="form-group row control-group">
                    <label for="blog" class="col-sm-2 form-control-label">Tag By</label>
                    <div class="col-sm-10">
                        <input  type="text" class="form-control input-sm" id="tags" name="tags" value="" placeholder="title">
                        <p id="err-securitydoor" class="text-danger"></p>
                    </div>
                </div>
            
            <button type="button" onclick="addBlog();" class="btn btn-success">Add</button>
       
                 </div><!-- /tab-panel new -->
            </div>
        </div>
    </div>
</div> <!-- /container -->

<script type="text/javascript">
    $(document).ready(function() {
        $('#myTab a:first').tab('show');
       // new nicEditor({fullPanel : true}).panelInstance('content',{hasPanel : true});
        new nicEditor({fullPanel : true}).panelInstance('body',{hasPanel : true});
    });// end document.ready
    
function addBlog() {
    if(confirm('Are you sure you want to add to the blog content?')){
        var nicE = new nicEditors.findEditor('body');
        var obj = new Object();
       // obj.id=0;
         obj.title = $('#title').val();
        //obj.body = $('#body').val();
        obj.status = $('#status').val();
        obj.tags = $('#tags').val();
        obj.body =  nicE.getContent();
        
        $.ajax({
            url: 'index.php?r=website/addblog',
            async: false,
            data: obj,
            type: 'POST',
            success: function(data) {
            }
        });
    }
}
</script>

<script type="text/javascript">
$(document).ready(function(){
	$('#myTab a:first').tab('show');
	$('#employee').DataTable({
        "order": [[ 4, "desc" ]]
    });
}); // end document.ready

function unpulishBlog(id) {
        $("#dialog").attr('title', ' Unpublish Blog');
        $("#dialog-msg").html('Are you sure you want to unpublish blog');

        $("#dialog").dialog({
            modal: true,
            buttons: {
                "Yes": function() {
                    var obj = new Object();
                    obj.id = id;
                    obj.status = 'unpublish';
                    ;
                    $.ajax({
                        url: 'index.php?r=website/deleteblog',
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
    function publishBlog(id) {
        $("#dialog").attr('title', 'Publish Blog');
        $("#dialog-msg").html('Are you sure you want to publish Blog');
        $("#dialog").dialog({
            modal: true,
            buttons: {
                "Yes": function() {
                    var obj = new Object();
                    obj.id = id;
                    obj.status = 'publish';
                    $.ajax({
                        url: 'index.php?r=website/deleteblog',
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
</script>

