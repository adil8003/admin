<?php
$this->title = Yii::t('app', 'Employee');
?>
<!-- Nav Bar- start-->
<div class="container">
    <ul class="nav nav-tabs" role="tablist" id="myTab">
        <li class="nav-item">
            <a class="nav-link" href="#profile" role="tab" data-toggle="tab" aria-controls="profile">Profile</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#personal" role="tab" data-toggle="tab" aria-controls="personal">Personal</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#educational" role="tab" data-toggle="tab" aria-controls="educational">Educational </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#professional" role="tab" data-toggle="tab" aria-controls="professional">Professional</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#password" role="tab" data-toggle="tab" aria-controls="password">Password</a>
        </li>
    </ul>
    <!-- Nav Bar- start-->

    <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="profile"> <!-- /tab-panel -list -->
            <h2>Profile</h2>
            <form id="updprofile">
                <div class="form-group row control-group">
                    <label for="Username" class="col-sm-2 form-control-label">Username</label>
                    <div class="col-sm-10">
                        <input disabled="disabled" type="text" class="form-control input-sm" id="username" name="username" value="<?= $objUser->username; ?>" >
                        <p id="err-username" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Email" class="col-sm-2 form-control-label">Email</label>
                    <div class="col-sm-10">
                        <input disabled="disabled" type="email" class="form-control input-sm" id="email" name="email" value="<?= $objUser->email; ?>" >
                        <p id="err-email" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Email" class="col-sm-2 form-control-label">Role</label>
                    <div class="col-sm-10">
                        <input disabled="disabled" type="text" class="form-control input-sm" id="role" name="role" value="<?= $objUser->role->name; ?>" >
                        <p id="err-email" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Email" class="col-sm-2 form-control-label">Status</label>
                    <div class="col-sm-10">
                        <input disabled="disabled" type="text" class="form-control input-sm" id="status" name="status" value="<?= $objUser->status->name; ?>" >
                        <p id="err-email" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Email" class="col-sm-2 form-control-label">Joining Date</label>
                    <div class="col-sm-10">
                        <input disabled="disabled" type="text" class="form-control input-sm" id="date" name="date" value="<?= date('d-M-Y', strtotime($objUser->reg_date)); ?>" >
                        <p id="err-email" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button onclick="saveProfile();" type="button" class="btn btn-success">Save</button>
                        <button onclick="resetProfile();" type="button" class="btn btn-success">Cancel</button>
                    </div>
                </div>
            </form>
        </div> <!-- /tab-panel list -->
        <div role="tabpanel" class="tab-pane" id="personal"> <!-- /tab-panel new -->
            <h2>Personal</h2>
            <form id="updpersonal">
                <div class="form-group row control-group">
                    <label for="Username" class="col-sm-2 form-control-label">Phone</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control input-sm" ovalue="<?= $objUserpersonal->phone; ?>" value="<?= $objUserpersonal->phone; ?>" id="phone" name="phone" placeholder="Phone no">
                        <p id="err-phone" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Email" class="col-sm-2 form-control-label">Address</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control input-sm" ovalue="<?= $objUserpersonal->address; ?>" value="<?= $objUserpersonal->address; ?>" id="address" name="address" placeholder="Address">
                        <p id="err-address" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Email" class="col-sm-2 form-control-label">City</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control input-sm" ovalue="<?= $objUserpersonal->city; ?>" value="<?= $objUserpersonal->city; ?>" id="city" name="city" placeholder="City">
                        <p id="err-city" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Email" class="col-sm-2 form-control-label">State</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control input-sm" ovalue="<?= $objUserpersonal->state; ?>" value="<?= $objUserpersonal->state; ?>" id="state" name="state" placeholder="State">
                        <p id="err-state" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Email" class="col-sm-2 form-control-label">Country</label>
                    <div class="col-sm-10">
                        <input type="country" class="form-control input-sm" ovalue="<?= $objUserpersonal->country; ?>" value="<?= $objUserpersonal->country; ?>" id="country" name="country" placeholder="Country">
                        <p id="err-country" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button onclick="savePersonal();" type="button" class="btn btn-success">Save</button>
                        <button onclick="resetPersonal();" type="button" class="btn btn-success">Cancel</button>
                    </div>
                </div>
            </form>
        </div> <!-- /tab-panel new -->
        <div role="tabpanel" class="tab-pane" id="educational"> <!-- /tab-panel view -->
            <input type="hidden" value="<?= $objUser->id; ?>" id="profile_id">
            <h2>Educational </h2>
            <form id="updeducational">
                <div class="form-group row control-group">
                    <label for="Email" class="col-sm-2 form-control-label">10th</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control input-sm" ovalue="<?= $objUsereducational->tenth; ?>" value="<?= $objUsereducational->tenth; ?>" id="tenth" name="tenth" placeholder="tenth">
                        <p id="err-tenth" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Email" class="col-sm-2 form-control-label">12th</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control input-sm" ovalue="<?= $objUsereducational->twelth; ?>" value="<?= $objUsereducational->twelth; ?>" id="twelth" name="twelth"  placeholder="Enter twelth Mark">
                        <p id="err-twelth" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Email" class="col-sm-2 form-control-label">Graduate</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control input-sm" id="graduate" ovalue="<?= $objUsereducational->graduate; ?>" value="<?= $objUsereducational->graduate; ?>" name="graduate" placeholder="Enter graduate Mark">
                        <p id="err-graduate" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Email" class="col-sm-2 form-control-label">Postgraduate</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control input-sm" id="postgraduate" ovalue="<?= $objUsereducational->postgraduate; ?>" value="<?= $objUsereducational->postgraduate; ?>" name="email" placeholder="Enter postgraduate Mark">
                        <p id="err-postgraduate" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button onclick="saveEducational();" type="button" class="btn btn-success">Save</button>
                        <button onclick="resetEducational();" type="button" class="btn btn-success">Cancel</button>
                    </div>
                </div>
            </form>
        </div><!-- /tab-panel new -->

        <div role="tabpanel" class="tab-pane" id="professional"><!-- /tab-panel settings -->
            <h2>Professional</h2>
            <h1>Comming Soon</h1>
        </div><!-- /tab-panel new -->
        <div role="tabpanel" class="tab-pane" id="password"><!-- /tab-panel settings -->
            <h2>Password</h2>
            <h1>Comming Soon</h1>
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
        $('#updpersonal .form-control').bind('blur', function() {
            validatePersonal();
        });
        $('#updeducational .form-control').bind('blur', function() {
            validateEducational();
        });
    }); // end document.ready

    function resetEducational() {
        $('#tenth').val($('#tenth').attr('ovalue'));
        $('#twelth').val($('#twelth').attr('ovalue'));
        $('#graduate').val($('#graduate').attr('ovalue'));
        $('#postgraduate').val($('#postgraduate').attr('ovalue'));
    }
    function resetPersonal() {
        $('#phone').val($('#phone').attr('ovalue'));
        $('#address').val($('#address').attr('ovalue'));
        $('#city').val($('#city').attr('ovalue'));
        $('#state').val($('#state').attr('ovalue'));
        $('#country').val($('#country').attr('ovalue'));
    }
    function saveEmployee() {
        $('#addemployee .form-group input').attr('disabled', 'disabled');
        $('#addemployee .form-group select').attr('disabled', 'disabled');
        $('#addemployee .form-group button').attr('disabled', 'disabled');
        if (validateEmployee()) {
            var obj = new Object();
            obj.username = $('#username').val();
            obj.email = $('#email').val();
            obj.password = $('#password').val();
            obj.status_id = $('#status_id').val();
            obj.role_id = $('#roles_id').val();
            $.ajax({
                url: 'index.php?r=humanresource/saveemployee',
                async: false,
                data: obj,
                type: 'POST',
                success: function(data) {
                    $('#addemployee .form-group input').removeAttr('disabled');
                    $('#addemployee .form-group select').removeAttr('disabled');
                    $('#addemployee .form-group button').removeAttr('disabled');
                }
            });
        }
    }

    function savePersonal() {
        $("#dialog").attr('title', ' Save Personal Information');
        $("#dialog-msg").html('Saving in Progress.');
        $("#dialog").dialog({
            modal: true,
        });
        if (validatePersonal()) {
            var obj = new Object();
            obj.id = 0;
            obj.profile_id = $('#profile_id').val();
            obj.phone = $('#phone').val();
            obj.address = $('#address').val();
            obj.city = $('#city').val();
            obj.state = $('#state').val();
            obj.country = $('#country').val();
            $.ajax({
                url: 'index.php?r=employee/updatepersonal',
                async: false,
                data: obj,
                type: 'POST',
                success: function(data) {
                    $('#dialog').dialog("close");
                }
            });
        } else {
            $('#dialog').dialog("close");
        }
    }

    function saveEducational() {
        $("#dialog").attr('title', ' Save Educational Information');
        $("#dialog-msg").html('Saving in Progress.');
        $("#dialog").dialog({
            modal: true,
        });
        if (validateEducational()) {
            var obj = new Object();
            obj.profile_id = $('#profile_id').val();
            obj.tenth = $('#tenth').val();
            obj.twelth = $('#twelth').val();
            obj.graduate = $('#graduate').val();
            obj.postgraduate = $('#postgraduate').val();
            $.ajax({
                url: 'index.php?r=employee/updateemployeeeducatonal',
                async: false,
                data: obj,
                type: 'POST',
                success: function(data) {
                    $('#dialog').dialog("close");
                }
            });
        } else {
            $('#dialog').dialog("close");
        }
    }
    function validateEducational() {
        var flag = true;
        var tenth = $('#tenth').val();
        var twelth = $('#twelth').val();
        var graduate = $('#graduate').val();
        var postgraduate = $('#postgraduate').val();

        if (tenth == '') {
            $('#err-tenth').html('Enter Tenth mark');
            flag = false;
        } else {
            $('#err-tenth').html('');
        }
        if (twelth == '') {
            $('#err-twelth').html('Enter twelth mark');
            flag = false;
        } else {
            $('#err-twelth').html('');
        }
        if (graduate == '') {
            $('#err-graduate').html('Enter graduate mark');
            flag = false;
        } else {
            $('#err-graduate').html('');
        }
        if (postgraduate == '') {
            $('#err-postgraduate').html('Enter postgraduate mark');
            flag = false;
        } else {
            $('#err-postgraduate').html('');
        }

        return flag;
    }

    function validatePersonal() {
        var flag = true;
        var phone = $('#phone').val();
        var address = $('#address').val();
        var city = $('#city').val();
        var state = $('#state').val();
        var country = $('#country').val();

        if (phone == '') {
            $('#err-phone').html('Enter phone No');
            flag = false;
        } else {
            $('#err-phone').html('');
        }
        if (address == '') {
            $('#err-address').html('Enter address');
            flag = false;
        } else {
            $('#err-address').html('');
        }
        if (city == '') {
            $('#err-city').html('Enter city');
            flag = false;
        } else {
            $('#err-city').html('');
        }
        if (state == '') {
            $('#err-state').html('Enter state');
            flag = false;
        } else {
            $('#err-state').html('');
        }
        if (country == '') {
            $('#err-country').html('Enter country');
            flag = false;
        } else {
            $('#err-country').html('');
        }
        return flag;
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

//    jQuery.fn.dataTableExt.oApi.fnReloadAjax = function(oSettings, sNewSource, fnCallback, bStandingRedraw)
//    {
//        // DataTables 1.10 compatibility - if 1.10 then `versionCheck` exists.
//        // 1.10's API has ajax reloading built in, so we use those abilities
//        // directly.
//        if (jQuery.fn.dataTable.versionCheck) {
//            var api = new jQuery.fn.dataTable.Api(oSettings);
//
//            if (sNewSource) {
//                api.ajax.url(sNewSource).load(fnCallback, !bStandingRedraw);
//            }
//            else {
//                api.ajax.reload(fnCallback, !bStandingRedraw);
//            }
//            return;
//        }
//
//        if (sNewSource !== undefined && sNewSource !== null) {
//            oSettings.sAjaxSource = sNewSource;
//        }
//
//        // Server-side processing should just call fnDraw
//        if (oSettings.oFeatures.bServerSide) {
//            this.fnDraw();
//            return;
//        }
//
//        this.oApi._fnProcessingDisplay(oSettings, true);
//        var that = this;
//        var iStart = oSettings._iDisplayStart;
//        var aData = [];
//
//        this.oApi._fnServerParams(oSettings, aData);
//
//        oSettings.fnServerData.call(oSettings.oInstance, oSettings.sAjaxSource, aData, function(json) {
//            /* Clear the old information from the table */
//            that.oApi._fnClearTable(oSettings);
//
//            /* Got the data - add it to the table */
//            var aData = (oSettings.sAjaxDataProp !== "") ?
//                    that.oApi._fnGetObjectDataFn(oSettings.sAjaxDataProp)(json) : json;
//
//            for (var i = 0; i < aData.length; i++)
//            {
//                that.oApi._fnAddData(oSettings, aData[i]);
//            }
//
//            oSettings.aiDisplay = oSettings.aiDisplayMaster.slice();
//
//            that.fnDraw();
//
//            if (bStandingRedraw === true)
//            {
//                oSettings._iDisplayStart = iStart;
//                that.oApi._fnCalculateEnd(oSettings);
//                that.fnDraw(false);
//            }
//
//            that.oApi._fnProcessingDisplay(oSettings, false);
//
//            /* Callback user function - for event handlers etc */
//            if (typeof fnCallback == 'function' && fnCallback !== null)
//            {
//                fnCallback(oSettings);
//            }
//        }, oSettings);
//    };

</script>
