$(document).ready(function () {
    $('#resproject a:first').tab('show');
    $('#tblresproject').DataTable();

    $('#Newproperty .form-control').bind('blur', function () {
        validateProperty();
    });
}); // end document.ready

function saveProfile() {
}
function resetProfile() {
}

function saveRespropertyproperty() {
//    if (confirm('Are you sure you want to Update this property?')) {
    alertify.confirm("Are you sure you want to Update this property?",
            function () {
                var obj = new Object();
                obj.respropertyid = $('#respropertyid').val();
                obj.name = $('#name').val();
                obj.sublocation = $('#sublocation').val();
                obj.location = $('#location').val();
                obj.city = $('#city').val();
                obj.state = $('#state').val();
                obj.pincode = $('#pincode').val();
                obj.latlong = $('#latlong').val();
                obj.status = $('#status').val();
                $.ajax({
                    url: 'index.php?r=property/saverespropertyproperty',
                    async: false,
                    data: obj,
                    type: 'POST',
                    success: function (data) {
                        alertify.alert("Property Updated !!", function () {
                        });
                    }
                });
            });
}

function saveResprojectowner() {
    var obj = new Object();
    obj.builderid = $('#builderid').val();
    obj.respropertyid = $('#respropertyid').val();
    $.ajax({
        url: 'index.php?r=property/saverespropertyowner',
        async: false,
        data: obj,
        type: 'POST',
        success: function (data) {
            data = JSON.parse(data);
            $('#builderid').val(data.id);
            $('#companyname').val(data.companyname);
            $('#email').val(data.email);
            $('#contact').val(data.contact);
            $('#website').val(data.website);
            $('#officecontact').val(data.officecontact);
            $('#description').val(data.description);
        }
    });
}

function savePropertyproject() {
//    alert($('#ownershiptypeid').val());
//    return false;
    alertify.confirm("Are you sure you want to save this project?",
            function () {
                
                var obj = new Object();
                obj.respropertyid = $('#respropertyid').val();
                obj.yearofconstruct = $('#yearofconstruct').val();
                obj.yearofpossion = $('#yearofpossion').val();
                obj.ownershiptypeid = $('#ownershiptypeid').val();
                obj.nooftower = $('#nooftower').val();
                obj.nooffloor = $('#nooffloor').val();
                obj.noofflatperfloor = $('#noofflatperfloor').val();
                obj.noofrowhouse = $('#noofrowhouse').val();
                obj.villa = $('#villa').val();
                obj.commercialshop = $('#commercialshop').val();
                obj.comment = $('#comment').val();
                $.ajax({
                    url: 'index.php?r=property/saverespropertyproject',
                    async: false,
                    data: obj,
                    type: 'POST',
                    success: function (data) {
                        alertify.alert("Project Updated !!", function () {
                        });
                    }
                });
            });

}

function savePropertycost() {
    alertify.confirm("Are you sure you want to save this Cost?",
            function () {
                var obj = new Object();
                obj.respropertyid = $('#respropertyid').val();
                obj.sale = $('#sale').val();
                obj.newproperty = $('#newproperty').val();
                obj.resaleproperty = $('#resaleproperty').val();
                obj.rent = $('#rent').val();
                obj.typeofproperties = $('#typeofproperties').val();
                $.ajax({
                    url: 'index.php?r=property/saverespropertycost',
                    async: false,
                    data: obj,
                    type: 'POST',
                    success: function (data) {
                        alertify.alert("Cost Updated !!", function () {
                        });
                    }
                });
            });
}

function saveTypeofproperty() {
    alert($('#flattypeid').val());
//    return false;
    alertify.confirm("Are you sure you want to save the Type?",
            function () {
                var obj = new Object();
                obj.respropertyid = $('#respropertyid').val();
                obj.aboutpropertyid = $('#aboutpropertyid').val();
                obj.flattypeid = $('#flattypeid').val();
                obj.noofbedroom = $('#noofbedroom').val();
                obj.noofbathroom = $('#noofbathroom').val();
                obj.noofbalcony = $('#noofbalcony').val();
                obj.dinningspace = $('#dinningspace').val();
                obj.parkingtype = $('#parkingtype').val();
                obj.furnishtype = $('#furnishtype').val();
                obj.flooring = $('#flooring').val();
                obj.sanctionauthority = $('#sanctionauthority').val();

                $.ajax({
                    url: 'index.php?r=property/saverespropertytype',
                    async: false,
                    data: obj,
                    type: 'POST',
                    success: function (data) {
                        alertify.alert("Property Updated !!", function () {
                        });
                    }
                });
            });

}
function saveAmaneties() {
    alertify.confirm("Are you sure you want to save Aminities ?",
            function () {
                var obj = new Object();
                obj.respropertyid = $('#respropertyid').val();
                obj.swimingpool = $('#swimingpool').val();
                obj.garden = $('#garden').val();
                obj.gym = $('#gym').val();
                obj.temple = $('#temple').val();
                obj.clubhouse = $('#clubhouse').val();
                obj.solarsystem = $('#solarsystem').val();
                obj.securitydoor = $('#securitydoor').val();
                $.ajax({
                    url: 'index.php?r=property/saverespropertyresamaneties',
                    async: false,
                    data: obj,
                    type: 'POST',
                    success: function (data) {
                        alertify.alert("Amaneties Updated !!", function () {
                        });
                    }
                });
            });

}

function saveGeolocation() {
    alertify.confirm("Are you sure you want to save GeoLocation ?",
            function () {

                var obj = new Object();
                obj.respropertyid = $('#respropertyid').val();
                obj.railwaystation = $('#railwaystation').val();
                obj.airport = $('#airport').val();
                obj.hospital = $('#hospital').val();
                obj.multiplex = $('#multiplex').val();
                obj.school = $('#school').val();
                obj.college = $('#college').val();
                obj.market = $('#market').val();
                obj.temple = $('#templegeo').val();
                obj.famousplace = $('#famousplace').val();
                $.ajax({
                    url: 'index.php?r=property/savepropertygeolocation',
                    async: false,
                    data: obj,
                    type: 'POST',
                    success: function (data) {
                        alertify.alert("GeoLocation Updated !!", function () {
                        });
                    }
                });
            });

}
//==========validation===========

