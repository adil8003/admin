$(document).ready(function () {
});

function saveCustomer() {
    var price = $('#price').val();
    var priceFormat = $('#price-format').val();
    if (priceFormat == 'Lakh') {
        var amt = price * 100000;
    } else if (priceFormat == 'Thousand') {
        var amt = price * 1000;
    } else if (priceFormat == 'Crore') {
        var amt = price * 10000000;
    }
    if (validateCustomer()) {
        alertify.confirm("Are you sure you want add this customer?",
                function () {
                    var obj = new Object();
                    obj.cname = $('#cname').val();
                    obj.cemail = $('#cemail').val();
                    obj.cphone = $('#cphone').val();
                    obj.propertytypeid = $('#propertytypeid').val();
                    obj.buytypeid = $('#buytypeid').val();
                    obj.price = amt;
                    obj.location = $('#location').val();
                    obj.meetingstatus = $('#meetingstatus').val();
                    obj.meetingtypeid = $('#meetingtypeid').val();
                    obj.postremark = $('#postremark').val();
                    obj.detailsofproperty = $('#detailsofproperty').val();
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
function validateCustomer() {
    var flag = true;
    var cemail = $('#cemail').val();
    var cname = $('#cname').val();
    var cphone = $('#cphone').val();
    var propertytypeid = $('#propertytypeid').val();
    var buytypeid = $('#buytypeid').val();
    var price = $('#price').val();
    var location = $('#location').val();
    var reffrom = $('#reffrom').val();
    var postremark = $('#postremark').val();
    var finalstatus = $('#finalstatus').val();
    var meetingtypeid = $('#meetingtypeid').val();
    var reg = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

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
    if (cemail == '') {
        $('#err-cemail').html('Email required');
        flag = false;
    } else {
        $('#err-cemail').html('');
        if (!reg.test(cemail)) {
            $('#err-cemail').html(' Valid email required');
            flag = false;
        }
    }
    $('#remark').keypress(function (e) {
        var regex = new RegExp("^[a-zA-Z]+$");
        var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
        if (regex.test(str)) {
            return true;
        } else
        {
            e.preventDefault();
            $('#err-remark').html(' Please Enter Alphabate');
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
    $('#location').keypress(function (e) {
        var regex = new RegExp("^[a-zA-Z]+$");
        var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
        if (regex.test(str)) {
            return true;
        } else
        {
            e.preventDefault();
            $('#err-location').html(' Please Enter Alphabate');
            return false;
        }
    });

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
            $('#err-price').html('Must be numerical');
            flag = false;
        }
    }
    return flag;
}
function checkUniqueEmail() {
    var input_value = $('#cemail').val();
    $.ajax({
        url: 'index.php?r=crm/checkuniqueemail',
        type: 'POST',
        data: {
            cemail: input_value,
        },
        success: function (response) {
            data = JSON.parse(response);
            if (data.status === true) {
                $('#err-cemail').text("Already exist,try different !");
                $('#cemail').focus();
            } else {
                $('#err-cemail').text('');
            }
        }
    });
}