$(document).ready(function () {
    var crmid = $('#crm_id').val();
}); // end document.ready
function eidtCustomer() {
     var crmid = $('#crm_id').val();
    if (validateCustomer()) {
        alertify.confirm("Are you sure you want add this customer?",
                function () {
                    var obj = new Object();
                    obj.crmid = crmid;
                    obj.cname = $('#cname').val();
                    obj.cphone = $('#cphone').val();
                    obj.ptypeid = $('#ptypeid').val();
                    obj.buytypeid = $('#buytypeid').val();
                    obj.price = $('#price').val();
                    obj.location = $('#location').val();
                    obj.meetingstatus = $('#meetingstatus').val();
                    obj.meetingtypeid = $('#meetingtypeid').val();
                    obj.postremark = $('#postremark').val();
                    obj.detailsofproperty = $('#detailsofproperty').val();
                    obj.remark = $('#remark').val();
                    obj.reffrom = $('#reffrom').val();
                    obj.finalstatus = $('#finalstatus').val();
                    obj.followupdate = $('#followupdate').val();
                    $.ajax({
                        url: 'index.php?r=crm/eidtcustomer',
                        async: false,
                        data: obj,
                        type: 'POST',
                        success: function (data) {
                            showMessage('success', 'Course added successfully.');
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
    var cname = $('#cname').val();
    var cphone = $('#cphone').val();
    var ptypeid = $('#ptypeid').val();
    var buytypeid = $('#buytypeid').val();
    var price = $('#price').val();
    var location = $('#location').val();
    var meetingstatus = $('#meetingstatus').val();
    var meetingtypeid = $('#meetingtypeid').val();


    if (cname == '') {
        $('#err-cname').html('Name required');
        flag = false;
    } else {
        $('#err-cname').html('');
    }
    if (cphone == '') {
        $('#err-cphone').html('Phone required');
        flag = false;
    } else {
        $('#err-cphone').html('');
    }
    if (ptypeid == '') {
        $('#err-ptypeid').html('Property type required');
        flag = false;
    } else {
        $('#err-ptypeid').html('');
    }
    if (buytypeid == '') {
        $('#err-buytypeid').html('Type required');
        flag = false;
    } else {
        $('#err-buytypeid').html('');
    }

    if (location == '') {
        $('#err-location').html('Location required');
        flag = false;
    } else {
        $('#err-location').html('');
    }
    if (meetingstatus == '') {
        $('#err-meetingstatus').html('Metting status required');
        flag = false;
    } else {
        $('#err-meetingstatus').html('');
    }
    if (meetingtypeid == '') {
        $('#err-meetingtypeid').html('Metting type required');
        flag = false;
    } else {
        $('#err-meetingtypeid').html('');
    }
    if (price == '') {
        $('#err-price').html('Price required');
        flag = false;
    } else {
        $('#err-price').html('');
        if (isNaN(price)) {
            $('#err-fees').html('Must be numerical');
            flag = false;
        }
    }
    return flag;
}