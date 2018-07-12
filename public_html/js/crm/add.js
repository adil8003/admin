$(document).ready(function () {
});


function saveCustomer() {
    if (validateCourse()) {
        alertify.confirm("Are you sure you want add this customer?",
                function () {
                    var obj = new Object();
                    obj.cname = $('#cname').val();
                    obj.cphone = $('#cphone').val();
                    obj.propertytypeid = $('#propertytypeid').val();
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
                    obj.statusid = $('#statusid').val();
                    $.ajax({
                        url: 'index.php?r=crm/savecustomer',
                        async: false,
                        data: obj,
                        type: 'POST',
                        success: function (data) {
                            showMessage('success', 'Customer added successfully.');
//                            $('#fees').val();
                        },
                        error: function (data) {
                            showMessage('danger', 'Please try again.');
                        }
                    });
                });
    }
}
function validateCourse() {
    var flag = true;
    var cname = $('#cname').val();
    var cphone = $('#cphone').val();
    var propertytypeid = $('#propertytypeid').val();
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
    $('#cname').keypress(function (e) {
        var regex = new RegExp("^[a-zA-Z]+$");
        var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
        if (regex.test(str)) {
            return true;
        } else
        {
            e.preventDefault();
            $('#err-cname').html(' Please Enter Alphabate');
            return false;
        }
    });


    if (cphone == '') {
        $('#err-cphone').html('Phone required');
        flag = false;
    } else {
        $('#err-cphone').html('');
        if (((cphone.length) > 10) || ((cphone.length) < 10)) {
            $('#err-cphone').html('10 Digit mobile number required');
            flag = false;
        }
        if (isNaN(cphone)) {
            $('#err-cphone').html('Must be numerical');
            flag = false;
        }
    }
    if (propertytypeid == '') {
        $('#err-propertytypeid').html('Property type required');
        flag = false;
    } else {
        $('#err-propertytypeid').html('');
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