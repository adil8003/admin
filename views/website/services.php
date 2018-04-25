<?php
$this->title = Yii::t('app', 'Website');
?>
<div class="container">
    <ul class="nav nav-tabs" role="tablist" id="myTab">
        <li class="nav-item">
            <a class="nav-link" href="#services" role="tab" data-toggle="tab" aria-controls="services">Services</a>
        </li>
    </ul>
    <!-- Nav Bar- start-->
    <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="services"> <!-- /tab-panel -list -->
            <h2>Services</h2>
                   <?php
                        foreach ($objWebsitecontent as $key => $value ) {
                            if($value->id===3 ){
                                 echo' <textarea id="content"  name="content" >'.$value->content.' </textarea>';
                            }
                        }
                   ?>
            <button type="button" onclick="saveServices();" class="btn btn-success">Save</button>
        </div> <!-- /tab-panel list -->
    </div><!-- /tab-panel new -->
</div> <!-- /container -->

<script type="text/javascript">
    $(document).ready(function() {
        new nicEditor({fullPanel : true}).panelInstance('content',{hasPanel : true});
    });// end document.ready
    
function saveServices() {
    if(confirm('Are you sure you want to change the service content ?')){
        var nicE = new nicEditors.findEditor('content');
        var obj = new Object();
        obj.id = 3;
        obj.content =  nicE.getContent();
        $.ajax({
            url: 'index.php?r=website/saveservices',
            async: false,
            data: obj,
            type: 'POST',
            success: function(data) {
            }
        });
    }
}
</script>

