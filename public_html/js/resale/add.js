$(document).ready(function () {
});

function saveResale() {
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
                    obj.ownername = $('#ownername').val();
                    obj.contact = $('#contact').val();
                    obj.propertytypeid = $('#propertytypeid').val();
                    obj.societyname = $('#societyname').val();
                    obj.buildingname = $('#buildingname').val();
                    obj.wing = $('#wing').val();
                    obj.flatnumber = $('#flatnumber').val();
                    obj.floornumber = $('#floornumber').val();
                    obj.price = amt;
                    obj.carpetarea = $('#carpetarea').val();
                    obj.landmark = $('#landmark').val();
                    obj.location = $('#location').val();
                    obj.age = $('#age').val();
                    obj.statusid = $('#statusid').val();
                    obj.propertyfacing = $('#propertyfacing').val();
                    obj.furniture = $('#furniture').val();
                    obj.address = $('#address').val();
                    obj.remarks = $('#remarks').val();
                    $.ajax({
                        url: 'index.php?r=resale/saveresaleproperty',
                        async: false,
                        data: obj,
                        type: 'POST',
                        success: function (data) {
                            showMessage('success', 'Property save successfully.');
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
    var ownername = $('#ownername').val();
    var contact = $('#contact').val();
    var price = $('#price').val();
    var carpetarea = $('#carpetarea').val();


    if (ownername == '') {
        $('#err-ownername').html('Owner name required');
        flag = false;
    } else {
        $('#err-ownername').html('');
    }
    if (contact == '') {
        $('#err-contact').html('Phone required');
        flag = false;
    } else {
        $('#err-contact').html('');
        if (((contact.length) > 10) || ((contact.length) < 10)) {
            $('#err-contact').html('10 Digit mobile number required');
            flag = false;
        }
        if (isNaN(contact)) {
            $('#err-contact').html('Must be numerical');
            flag = false;
        }
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