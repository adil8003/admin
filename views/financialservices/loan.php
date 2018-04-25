<?php
$this->title = Yii::t('app', 'Financial');
?>

<div class="container">
    <ul class="nav nav-tabs" role="tablist" id="myTab">
        <li class="nav-item">
            <a class="nav-link" href="#personal" role="tab" data-toggle="tab" aria-controls="personal">Personal Loan</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#carloan1" role="tab" data-toggle="tab" aria-controls="carloan1">Car Loan</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#project" role="tab" data-toggle="tab" aria-controls="project">Project Loan</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#home" role="tab" data-toggle="tab" aria-controls="home">Home Loan</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#vehicle" role="tab" data-toggle="tab" aria-controls="vehicle">Vehicle Loan</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#Mortgage" role="tab" data-toggle="tab" aria-controls="Mortgage">Mortgage Loan</a>
        </li>
       
    </ul>
    <!-- Nav Bar- start-->

    <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="personal"> <!-- /tab-panel -list -->
            <h2>Personal Loan</h2>
                     <?php
                        foreach ($objFinancial as $key => $value ) {
                            if($value->id===7 ){
                                 echo'<textarea  id="personalloan" name="personal">'.$value->content.' </textarea>';
                            }
                        }
                   ?>  
            <button type="button" onclick="savePersonalloan();" class="btn btn-success">Save</button>
        </div> <!-- /tab-panel list -->
        
        <div role="tabpanel" class="tab-pane" id="carloan1"><!-- /tab-panel settings -->
            <h2>Car Loan</h2>
                   <?php
                        foreach ($objFinancial as $key => $value ) {
                            if($value->id===8 ){
                                 echo' <textarea  id="carloan" name="carloan">'.$value->content.' </textarea>';
                            }
                        }
                   ?>  
            <button type="button" onclick="saveCarloan();" class="btn btn-success">Save</button>
        </div><!-- /tab-panel new -->
        
        <div role="tabpanel" class="tab-pane" id="project"><!-- /tab-panel settings -->
            <h2>Project Loan</h2>
                   <?php
                        foreach ($objFinancial as $key => $value ) {
                            if($value->id===9 ){
                                 echo'  <textarea  id="projectloan" name="projectloan">'.$value->content.' </textarea>';
                            }
                        }
                   ?>  
            <button type="button" onclick="saveProjectloan();" class="btn btn-success">Save</button>
        </div><!-- /tab-panel new -->
        
         <div role="tabpanel" class="tab-pane" id="home"><!-- /tab-panel settings -->
            <h2>Home Loan</h2>
                   <?php
                        foreach ($objFinancial as $key => $value ) {
                            if($value->id===10 ){
                                 echo'<textarea  id="homeloan" name="homeloan">'.$value->content.' </textarea>';
                            }
                        }
                   ?>  
            <button type="button" onclick="saveHomeloan();" class="btn btn-success">Save</button>
        </div><!-- /tab-panel new -->
        
        <div role="tabpanel" class="tab-pane" id="vehicle"><!-- /tab-panel settings -->
            <h2>Vehicle Loan</h2>
                   <?php
                        foreach ($objFinancial as $key => $value ) {
                            if($value->id===11 ){
                                 echo'  <textarea  id="vehicleloan" name="vehicleloan">'.$value->content.' </textarea>';
                            }
                        }
                   ?>  
            <button type="button" onclick="saveVehicleloan();" class="btn btn-success">Save</button>
        </div><!-- /tab-panel new -->
        
         <div role="tabpanel" class="tab-pane" id="Mortgage"><!-- /tab-panel settings -->
            <h2>Mortgage Loan</h2>
                   <?php
                        foreach ($objFinancial as $key => $value ) {
                            if($value->id===12 ){
                                 echo'<textarea  id="mortgageloan" name="mortgageloan">'.$value->content.' </textarea>';
                            }
                        }
                   ?>  
            <button type="button" onclick="saveMortgageloan();" class="btn btn-success">Save</button>
        </div><!-- /tab-panel new -->
        
    </div><!-- /tab-content -->

</div> <!-- /container -->

<script type="text/javascript">
    $(document).ready(function() {
        $('#myTab a:first').tab('show');
        new nicEditor({fullPanel : true}).panelInstance('personalloan',{hasPanel : true});
        new nicEditor({fullPanel : true}).panelInstance('carloan',{hasPanel : true});
        new nicEditor({fullPanel : true}).panelInstance('projectloan',{hasPanel : true});
        new nicEditor({fullPanel : true}).panelInstance('homeloan',{hasPanel : true});
        new nicEditor({fullPanel : true}).panelInstance('vehicleloan',{hasPanel : true});
        new nicEditor({fullPanel : true}).panelInstance('mortgageloan',{hasPanel : true});
    });// end document.ready


function savePersonalloan() {
     if(confirm('Are you sure you want to change the Personal loan content?')){
            var nicE = new nicEditors.findEditor('personalloan');
            var obj = new Object();
            obj.id = 7;
            obj.content = nicE.getContent();
            $.ajax({
                url: 'index.php?r=financialservices/savepersonalloan',
                async: false,
                data: obj,
                type: 'POST',
                success: function(data) {
                }
            });
    }
    }
    
     function saveCarloan() {
          if(confirm('Are you sure you want to change the car loan content?')){
            var nicE = new nicEditors.findEditor('carloan');
            var obj = new Object();
            obj.id = 8;
            obj.content = nicE.getContent();
            $.ajax({
                url: 'index.php?r=financialservices/savecarloan',
                async: false,
                data: obj,
                type: 'POST',
                success: function(data) {
                }
            });
    }
    }
    
    function saveProjectloan() {
        if(confirm('Are you sure you want to change the project loan content?')){
            var nicE = new nicEditors.findEditor('projectloan');
            var obj = new Object();
            obj.id = 9;
            obj.content = nicE.getContent();
            $.ajax({
                url: 'index.php?r=financialservices/saveprojectloan',
                async: false,
                data: obj,
                type: 'POST',
                success: function(data) {
                }
            });
    }
    }
    
    function saveHomeloan() {
        if(confirm('Are you sure you want to change the home loan content?')){
            var nicE = new nicEditors.findEditor('homeloan');
            var obj = new Object();
            obj.id = 10;
            obj.content = nicE.getContent();
            $.ajax({
                url: 'index.php?r=financialservices/savehomeloan',
                async: false,
                data: obj,
                type: 'POST',
                success: function(data) {
                }
            });
    }
    }
    
    function saveVehicleloan() {
         if(confirm('Are you sure you want to change the vehicle loan content?')){
            var nicE = new nicEditors.findEditor('vehicleloan');
            var obj = new Object();
            obj.id = 11;
            obj.content = nicE.getContent();
            $.ajax({
                url: 'index.php?r=financialservices/savevehicleloan',
                async: false,
                data: obj,
                type: 'POST',
                success: function(data) {
                }
            });
    }
    }
    
    function saveMortgageloan() {
       if(confirm('Are you sure you want to change the mortgage loan content?')){
             var nicE = new nicEditors.findEditor('mortgageloan');
            var obj = new Object();
            obj.id = 12;
            obj.content = nicE.getContent();
            $.ajax({
                url: 'index.php?r=financialservices/savemortgageloan',
                async: false,
                data: obj,
                type: 'POST',
                success: function(data) {
                }
            });
    }
    }
    
    
    

</script>