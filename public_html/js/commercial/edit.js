$(document).ready(function () {
    var res_id = $('#com_id').val();
});


function updateProperty() {
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
        alertify.confirm("Are you sure you want update this property?",
                function () {
                    var obj = new Object();
                    obj.id = $('#com_id').val();
                    obj.cname = $('#cname').val();
                    obj.dname = $('#dname').val();
                    obj.location = $('#location').val();
                    obj.propertytypeid = $('#propertytypeid').val();
                    obj.buytypeid = $('#buytypeid').val();
                    obj.landmark = $('#landmark').val();
                    obj.address = $('#address').val();
                    obj.price = amt;
                    obj.reraid = $('#reraid').val();
                    obj.statusid = $('#statusid').val();
                    $.ajax({
                        url: 'index.php?r=commercial/updateproprty',
                        async: false,
                        data: obj,
                        type: 'POST',
                        success: function (data) {
                            showMessage('success', 'Property added successfully.');
//                            $('#fees').val();
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
    var propertytypeid = $('#propertytypeid').val();
    var buytypeid = $('#buytypeid').val();
    var price = $('#price').val();
    var location = $('#location').val();

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