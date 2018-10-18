$(document).ready(function () {
    $('.js-example-basic-multiple').select2({
        placeholder: "Select ",
    });
    $('#possesiondate').datetimepicker({
        format: 'Y-m-d',
    });
});

function resetdata() {
    $('#pname').val(' ');
    $('#dname').val(' ');
    $('#location').val(' ');
    $('#pland').val(' ');
    $('#landmark').val(' ');
    $('#address').val(' ');
    $('#price').val(' ');
    $("#propertytypeid").select2().select2('val', 'asp');
    $("#saveBtn").attr("disabled", false);
}

function saveProperty() {
    var price = $('#price').val();
    var priceFormat = $('#price-format').val();
    if (priceFormat == 'Lakh') {
        var amt = price * 100000;
    } else if (priceFormat == 'Thousand') {
        var amt = price * 1000;
    } else if (priceFormat == 'Crore') {
        var amt = price * 10000000;
    }
    if (validateProperty()) {
    alertify.confirm("Are you sure you want add this property?",
            function () {
                var obj = new Object();
                obj.pname = $('#pname').val();
                obj.dname = $('#dname').val();
                obj.location = $('#location').val();
                obj.propertytypeid = $('#propertytypeid').val();
                obj.buytypeid = $('#buytypeid').val();
                obj.pland = $('#pland').val();
                obj.landmark = $('#landmark').val();
                obj.address = $('#address').val();
                obj.price = amt;
                obj.statusid = $('#statusid').val();
                obj.landtypeid = $('#landtypeid').val();
                $.ajax({
                    url: 'index.php?r=residential/saveproperty',
                    async: false,
                    data: obj,
                    type: 'POST',
                    success: function (data) {
                        showMessage('success', 'Property added successfully.');
                        $("#saveBtn").attr("disabled", true);
                    },
                    error: function (data) {
                        showMessage('danger', 'Please try again.');
                    }
                });
            });
    }
}

function validateProperty() {
    var flag = true;
    var cname = $('#cname').val();
//    var cphone = $('#cphone').val();
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
//
//
//    if (cphone == '') {
//        $('#err-cphone').html('Phone required');
//        flag = false;
//    } else {
//        $('#err-cphone').html('');
//        if (((cphone.length) > 10) || ((cphone.length) < 10)) {
//            $('#err-cphone').html('10 Digit mobile number required');
//            flag = false;
//        }
//        if (isNaN(cphone)) {
//            $('#err-cphone').html('Must be numerical');
//            flag = false;
//        }
//    }
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
            $('#err-price').html('Must be numerical');
            flag = false;
        }
    }
    return flag;
}