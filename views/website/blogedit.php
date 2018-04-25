<?php
$this->title = Yii::t('app', 'blogupdate');
?>
<div class="container">
    <ul class="nav nav-tabs" role="tablist" id="myTab">
        <li class="nav-item">
            <a class="nav-link" href="#add" role="tab" data-toggle="tab" aria-controls="add">Blog</a>
        </li>
    </ul>

    <div role="tabpanel" class="tab-pane" id="add"> <!-- /tab-panel -list -->
        <div id='message' class="alert alert-info" style="display:none;" role="alert"></div>
        <h2>New</h2> 
        <div class="row" >
            <div class="col-sm-8" >
                <div class="form-group row control-group">
                    <input type="hidden" value="<?= $objBlog->id; ?>" id="blogid">
                    <label for="blog" class="col-sm-2 form-control-label">Title</label>
                    <div class="col-sm-10">
                        <input  type="text" class="form-control input-sm" id="title" name="title" value="" placeholder="title">
                        <p id="err-securitydoor" class="text-danger"></p>
                    </div>
                </div>

                <div class="form-group row control-group">
                    <label for="blog" class="col-sm-2 form-control-label">Body</label>
                    <div class="col-sm-10">
                        <textarea name="body" id="body"  style="width: 600px; height: 150px"></textarea>
                        <p id="err-securitydoor" class="text-danger"></p>
                    </div>
                </div>



                <div class="form-group row control-group ">
                    <label for="blog" class="col-sm-2 form-control-label">Status</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="status" name="status" value="" placeholder="status">
                            <option value="publish">publish</option>
                            <option value="unpublish">unpublish</option>
                        </select>
                        <p id="err-flattype" class="text-danger"></p>
                    </div>
                </div>

                <div class="form-group row control-group">
                    <label for="blog" class="col-sm-2 form-control-label">Tag By</label>
                    <div class="col-sm-10">
                        <input  type="text" class="form-control input-sm" id="tags" name="tags" value="" placeholder="tag by">
                        <p id="err-securitydoor" class="text-danger"></p>
                    </div>
                </div>

                <button type="button" onclick="updateBlog();" class="btn btn-success">Update</button>
            </div> <!-- /tab-panel list -->


            <div class="col-sm-4">
                <div id="imagegeo" class="card">
                    <div class="card-block">
                        <h4 class="card-title">Drop Image Or <button type="button" id="clickimagegeo" class="btn btn-secondary btn-sm">Click here</button></h4>
                        <progress id="progressimage" class="hide progress" value="0" max="100">0%</progress>
                    </div>
                </div>



                <div class="card">';
<!--                    <div class="dz-error-mark"><span id="delete_image" onclick="delete_image('.$objImage->id.')">✘</span></div>';-->
                    <img id="blogimage" class="img-thumbnail card-img-top" src="" alt="Card image cap">';
                </div>';


            </div>
        </div>
    </div>
</div>
   
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
    .btnmargin{    margin-left: 135px;
        
    }
</style>

<script type="text/javascript">
    $(document).ready(function() {
        $('#myTab a:first').tab('show');
        new nicEditor({fullPanel : true}).panelInstance('body',{hasPanel : true});
        // Dropzone class:
        var id = $('#blogid').val();
        
        var myDropzone = new Dropzone("#imagegeo", {
            url: "index.php?r=website/uploadblogimage&id=" + id + "",
            clickable: '#clickimagegeo',
            previewTemplate: '<div style="display:none"></div>'
            
        });
        myDropzone.on("addedfile", function(file) {
            $('#progressimage').removeClass('hide');
        });
        myDropzone.on("uploadprogress", function(file, progress, bytesSent) {
            $('#progressimage').attr('value', progress);
            $('#progressimage').html(bytesSent + ' bytes');
        });
        myDropzone.on("complete", function(file) {
            $('#progressimage').addClass('hide');
            getBlogById($('#blogid').val());
        });
        getBlogById(id);
});
function getBlogById(id) {
    var obj = new Object();
    obj.id = id;
    $.ajax({
        url: "index.php?r=website/getblogbyid",
        async: false,
        data: obj,
        type: 'POST',
        success: function(data) {
            var nicE= new nicEditors.findEditor('body');
            data = JSON.parse(data);
            $('#title').val(data.data.title);
            $('#tags').val(data.data.tags);
            $('#status').val(data.data.status);
            nicE.setContent(data.data.body);
            $('#blogimage').attr('src', data.data.blogimage);
        }
    });
}  
    function delete_image(blogimage) {
      if(confirm("Are you sure you want to delete ?"))  {
             var obj = new Object();
                    obj.id = id;
                    obj.blogimage = blogimage;
            $.ajax({
                url: "index.php?r=website/deleteblogimage",
                async: false,
                data: obj,
                type: 'POST',
                success: function(data) {
                 data = JSON.parse(data);
                 location.reload();
                }
            });
     
        }
    }
    
    
    
    
    function updateBlog() {
    if(confirm('Are you sure you want to update to the blog content?')){
        var nicE = new nicEditors.findEditor('body');
        var obj = new Object();
        obj.id=$('#blogid').val();
         obj.title = $('#title').val();
        //obj.body = $('#body').val();
        obj.status = $('#status').val();
        obj.tags = $('#tags').val();
        obj.body =  nicE.getContent();
        
        $.ajax({
            url: 'index.php?r=website/updateblog',
            async: false,
            data: obj,
            type: 'POST',
            success: function(data) {
                data = JSON.parse(data);
                if(data.status == true){
                getBlogById($('#blogid').val());
                    $('#message').html('Updated successfully.');
                    $('#message').fadeIn('slow');
                    $('#message').delay(5000).fadeOut('slow');
                }else{
                    $('#message').fadeIn('slow');
                    $('#message').delay(5000).fadeOut('slow');
                    $('#message').html('Please try again.');
                }
            }
        });
    }
}
 </script>