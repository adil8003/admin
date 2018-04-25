<?php
$this->title = Yii::t('app', 'Financial');
?>

<div class="container">
    <ul class="nav nav-tabs" role="tablist" id="myTab">
        <li class="nav-item">
            <a class="nav-link" href="#profile" role="tab" data-toggle="tab" aria-controls="profile">Fixed Deposit</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#professional" role="tab" data-toggle="tab" aria-controls="professional"> Mutual Funds</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#password" role="tab" data-toggle="tab" aria-controls="password">Bond</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#mediclaim1" role="tab" data-toggle="tab" aria-controls="mediclaim">Mediclaim</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#insurance1" role="tab" data-toggle="tab" aria-controls="insurance">Insurance</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#Personal" role="tab" data-toggle="tab" aria-controls="insurance">Personal Provident Fund</a>
        </li>
    </ul>
    <!-- Nav Bar- start-->

    <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="profile"> <!-- /tab-panel -list -->
            <h2>Fixed Deposit</h2>     
                  <?php
                        foreach ($objFinancial as $key => $value ) {
                            if($value->id===1 ){
                               echo' <textarea id="content"   name="content" >value='.$value->content.' </textarea>';
                            }
                        }
                   ?>
            <!--<textarea id="content"   name="content" > </textarea>-->
            <button type="button" onclick="saveFixeddeposit();" class="btn btn-success">Save</button>
        </div> <!-- /tab-panel list -->
        
        <div role="tabpanel" class="tab-pane" id="professional"><!-- /tab-panel settings -->
            <h2>Mutual Funds</h2>
                  <?php
                        foreach ($objFinancial as $key => $value ) {
                            if($value->id===2 ){
                                 echo' <textarea id="mutualfunds" name="mutualfunds" >value='.$value->content.' </textarea>';
                            }
                        }
                   ?>
           
             <button type="button" onclick="saveMutualfunds();" class="btn btn-success">Save</button>
        </div><!-- /tab-panel new -->
        
        <div role="tabpanel" class="tab-pane" id="password"><!-- /tab-panel settings -->
            <h2>Bond</h2>
                   <?php
                        foreach ($objFinancial as $key => $value ) {
                            if($value->id===4 ){
                                 echo' <textarea  id="bond" name="bond"> value='.$value->content.' </textarea>';
                            }
                        }
                   ?>
            <button type="button" onclick="saveBond();" class="btn btn-success">Save</button>
        </div><!-- /tab-panel new -->
        
         <div role="tabpanel" class="tab-pane" id="mediclaim1"><!-- /tab-panel settings -->
            <h2>Mediclaim</h2>
                   <?php
                        foreach ($objFinancial as $key => $value ) {
                            if($value->id===3 ){
                                 echo'  <textarea  id="mediclaim" name="mediclaim"> value='.$value->content.' </textarea>';
                            }
                        }
                   ?>
            <button type="button" onclick="saveMediclaim();" class="btn btn-success">Save</button>
        </div><!-- /tab-panel new -->
        
        <div role="tabpanel" class="tab-pane" id="insurance1"><!-- /tab-panel settings -->
            <h2>Insurance</h2>
             <?php
                        foreach ($objFinancial as $key => $value ) {
                            if($value->id===5 ){
                                 echo'   <textarea  id="insurance" name="insurance"> value='.$value->content.' </textarea>';
                            }
                        }
                   ?>
            <button type="button" onclick="saveInsurance();" class="btn btn-success">Save</button>
        </div><!-- /tab-panel new -->
        
         <div role="tabpanel" class="tab-pane" id="Personal"><!-- /tab-panel settings -->
            <h2>Personal Provident Fund</h2>
             <?php
                        foreach ($objFinancial as $key => $value ) {
                            if($value->id===6 ){
                                 echo' <textarea id="ppf" name="Personal"> value='.$value->content.' </textarea>';
                            }
                        }
                   ?>
            <button type="button" onclick="savePersonalprovidentfund();" class="btn btn-success">Save</button>
        </div><!-- /tab-panel new -->
    </div><!-- /tab-content -->

</div> <!-- /container -->

<script type="text/javascript">
    $(document).ready(function() {
        $('#myTab a:first').tab('show');
        new nicEditor({fullPanel : true}).panelInstance('content',{hasPanel : true});
        new nicEditor({fullPanel : true}).panelInstance('mutualfunds',{hasPanel : true});
        new nicEditor({fullPanel : true}).panelInstance('bond',{hasPanel : true});
        new nicEditor({fullPanel : true}).panelInstance('mediclaim',{hasPanel : true});
        new nicEditor({fullPanel : true}).panelInstance('insurance',{hasPanel : true});
        new nicEditor({fullPanel : true}).panelInstance('ppf',{hasPanel : true});
    });// end document.ready


function saveFixeddeposit() {
     if(confirm('Are you sure you want to change the Fixed deposit content?')){
        var nicE = new nicEditors.findEditor('content');
        var obj = new Object();
        obj.id = 1;
        obj.content =  nicE.getContent();
        $.ajax({
            url: 'index.php?r=financialservices/savefixeddeposit',
            async: false,
            data: obj,
            type: 'POST',
            success: function(data) {
            }
        });
    }
  }
    
    
    function saveMutualfunds() {
        if(confirm('Are you sure you want to change the Mutual funds content?')){
    var nicE = new nicEditors.findEditor('mutualfunds');
            var obj = new Object();
            obj.id = 2;
            obj.content = nicE.getContent();
            $.ajax({
                url: 'index.php?r=financialservices/savemutualfunds',
                async: false,
                data: obj,
                type: 'POST',
                success: function(data) {
                }
            });
    }
 }
     
     function saveMediclaim() {
         if(confirm('Are you sure you want to change the Mediclaim content?')){
       var nicE = new nicEditors.findEditor('mediclaim');
            var obj = new Object();
            obj.id = 3;
            obj.content = nicE.getContent();
            $.ajax({
                url: 'index.php?r=financialservices/savemediclaim',
                async: false,
                data: obj,
                type: 'POST',
                success: function(data) {
                }
            });
        }
    }
    
    function saveBond() {
        if(confirm('Are you sure you want to change the bond content?')){
    var nicE = new nicEditors.findEditor('bond');
            var obj = new Object();
            obj.id = 4;
            obj.content = nicE.getContent();
            $.ajax({
                url: 'index.php?r=financialservices/savebond',
                async: false,
                data: obj,
                type: 'POST',
                success: function(data) {
                }
            });
      }
    }
    function saveInsurance() {
        if(confirm('Are you sure you want to change the Insurance content?')){
    var nicE = new nicEditors.findEditor('insurance');
            var obj = new Object();
            obj.id = 5;
            obj.content = nicE.getContent();
            $.ajax({
                url: 'index.php?r=financialservices/saveinsurance',
                async: false,
                data: obj,
                type: 'POST',
                success: function(data) {
                }
            });
      }
    }
    function savePersonalprovidentfund() {
         if(confirm('Are you sure you want to change the Personal provident fund content?')){
    var nicE = new nicEditors.findEditor('ppf');
            var obj = new Object();
            obj.id = 6;
            obj.content = nicE.getContent();
            $.ajax({
                url: 'index.php?r=financialservices/savepersonalprovidentfund',
                async: false,
                data: obj,
                type: 'POST',
                success: function(data) {
                }
            });
        }
    }
    
    

</script>

