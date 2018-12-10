$(document).ready(function () {
    $('.js-example-basic-multiple').select2({
        placeholder: "Select "
    });
    var userid = $('#user_id').val();
}); // end document.ready
function eidtUser() {
    var userid = $('#user_id').val();
    if (validateCustomer()) {
        alertify.confirm("Are you sure you want update this customer?",
                function () {
                    var obj = new Object();
                    obj.userid = userid;
                    obj.uname = $('#uname').val();
                    obj.uemail = $('#uemail').val();
                    obj.uphone = $('#uphone').val();
                    obj.statusid = $('#statusid').val();
                    obj.roleid = $('#roleid').val();
                    $.ajax({
                        url: 'index.php?r=users/eidtuser',
                        async: false,
                        data: obj,
                        type: 'POST',
                        success: function (data) {
                            showMessage('success', 'Customer update successfully.');
//                            $('#fees').val();
                        },
                        error: function (data) {
                            showMessage('danger', 'Please try again.');
                        }
                    });
                });
    }
}
function validateCustomer() {
    var flag = true;
    var uemail = $('#uemail').val();
    var uname = $('#uname').val();
    var uphone = $('#uphone').val();
    var reg = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

    if (uname == '') {
        $('#err-uname').html('Name required');
        flag = false;
    } else {
        $('#err-uname').html('');
    }
    if (uemail == '') {
        $('#err-uemail').html('Email required');
        flag = false;
    } else {
        $('#err-uemail').html('');
        if (!reg.test(uemail)) {
            $('#err-uemail').html(' Valid email required');
            flag = false;
        }
    }
    if (uphone == '') {
        $('#err-uphone').html('Phone required');
        flag = false;
    } else {
        $('#err-uphone').html('');
        if (((uphone.length) > 10) || ((uphone.length) < 10)) {
            $('#err-uphone').html('10 Digit mobile number required');
            flag = false;
        }
        if (isNaN(uphone)) {
            $('#err-uphone').html('Must be numerical');
            flag = false;
        }
    }
    return flag;
}

function checkUniqueEmail() {
    var input_value = $('#uemail').val();
    $.ajax({
        url: 'index.php?r=users/checkuniqueemail',
        type: 'POST',
        data: {
            uemail: input_value,
        },
        success: function (data) {
            data = JSON.parse(data);
            if (data.status === true) {
                $('#err-uemail').text("Already exist,try different !");
                $('#uemail').focus();
             } else {
                   $('#err-cemail').hide('hide');
            }
        }
    });
}
function checkUniqueContact() {
    var input_value = $('#uphone').val();
    $.ajax({
        url: 'index.php?r=users/checkuniquecontact',
        type: 'POST',
        data: {
            uphone: input_value,
        },
        success: function (data) {
            data = JSON.parse(data);
            if (data.status === true) {
                $('#err-uphone').text("Already exist,try different !");
                $('#uphone').focus();
            } else  {
                $('#err-uphone').hide('hide');
            }
        }
    });
}