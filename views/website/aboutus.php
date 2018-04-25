<?php
$this->title = Yii::t('app', 'Website');
?>

<div class="container">
    <ul class="nav nav-tabs" role="tablist" id="myTab">
        <li class="nav-item">
            <a class="nav-link" href="#aboutus" role="tab" data-toggle="tab" aria-controls="aboutus">About Us</a>
        </li>
    </ul>
    <!-- Nav Bar- start-->

    <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="blog"> <!-- /tab-panel -list -->
            <h2>About Us</h2> 
                   <?php
                        foreach ($objWebsitecontent as $key => $value ) {
                            if($value->id===1 ){
                                 echo' <textarea id="content"  name="content" >'.$value->content.' </textarea>';
                            }
                        }
                   ?>
            <button type="button" onclick="saveAboutus();" class="btn btn-success">Save</button>
        </div> <!-- /tab-panel list -->
        </div><!-- /tab-panel new -->
</div> <!-- /container -->

<script type="text/javascript">
    $(document).ready(function() {
        new nicEditor({fullPanel : true}).panelInstance('content',{hasPanel : true});
    });// end document.ready
function saveAboutus() {
    if(confirm('Are you sure you want to change the about us content?')){
        var nicE = new nicEditors.findEditor('content');
        var obj = new Object();
        obj.id = 1;
        obj.content =  nicE.getContent();
        $.ajax({
            url: 'index.php?r=website/saveaboutus',
            async: false,
            data: obj,
            type: 'POST',
            success: function(data) {
            }
        });
    }
  }
</script>

