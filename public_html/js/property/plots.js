$(document).ready(function () {
    $('#Property a:first').tab('show');
    $('#tblresproject').DataTable();
}); // end document.ready

function saveUpdateplots() {
    // if (validateResproperty()) {
    var price = $('#plot-expectedprice').val();
    var priceFormat = $('#plot-price-format').val();
    if (priceFormat == 'Lakh') {
        var amt = price * 100000;
    } else if (priceFormat == 'Thousand') {
        var amt = price * 1000;
    } else if (priceFormat == 'Crore') {
        var amt = price * 10000000;
    }
    var firstVal = $('#plot-sharingratiosecond').val();
    var secondVal = $('#plot-sharingratiofirst').val();
    var sharingratio = firstVal + ':' + secondVal;
    alertify.confirm("Are you sure you want to save this Plot Property?",
            function () {
                var obj = new Object();
                obj.plotsid = $('#plotsid').val();
                obj.ownername = $('#plot-ownername').val();
                obj.contact = $('#plot-contact').val();
                obj.sublocation = $('#plot-sublocation').val();
                obj.location = $('#plot-location').val();
                obj.landmark = $('#plot-landmark').val();
                obj.zone = $('#plot-zones').val();
                obj.areapersquarefeet = $('#plot-areapersquarefeet').val();
                obj.saleorrent = $('#plot-saleorrent').val();
                obj.areaperguntha = $('#plot-areaperguntha').val();
                obj.peracre = $('#plot-peracre').val();
                obj.securitydeposit = $('#plot-securitydeposit').val();
                obj.sharingratio = sharingratio;
                obj.expectedprice = amt;
                obj.detailedaddress = $('#plot-detailedaddress').val();
                obj.status = $('#plot-status').val();
                obj.videolink = $('#plot-videolink').val();
                $.ajax({
                    url: 'index.php?r=property/saveupdateplots',
                    async: false,
                    data: obj,
                    type: 'POST',
                    success: function (data) {
                        alertify.alert("Plot Property Saved !!", function () {
                        });
                    }
                });
            });
    // }
}