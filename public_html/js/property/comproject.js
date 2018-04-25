$(document).ready(function () {
    $('#Property a:first').tab('show');
    $('#tblresproject').DataTable();
}); // end document.ready

function saveProfile() {
}
function resetProfile() {
}


function saveGeolocation() {
    alertify.confirm("Are you sure you want to save this Office Geolocation?",
            function () {
                var obj = new Object();
                obj.comprojectid = $('#comprojectid').val();
                obj.railwaystation = $('#railwaystation').val();
                obj.airport = $('#airport').val();
                obj.hospital = $('#hospital').val();
                obj.multiplex = $('#multiplex').val();
                obj.school = $('#school').val();
                obj.college = $('#college').val();
                obj.market = $('#market').val();
                obj.temple = $('#temple').val();
                obj.famousplace = $('#famousplace').val();
                $.ajax({
                    url: 'index.php?r=property/savecomgeolocation',
                    async: false,
                    data: obj,
                    type: 'POST',
                    success: function (data) {
                        alertify.alert("GeoLocation Saved !!", function () {
                        });
                    }
                });
            });

}

function saveAmaneties() {
    alertify.confirm("Are you sure you want to save this Office Amaneties?",
            function () {
                var obj = new Object();
                obj.comprojectid = $('#comprojectid').val();
                obj.lift = $('#lift').val();
                obj.parking = $('#parking').val();
                obj.restroom = $('#restroom').val();
                obj.furnishing = $('#furnishing').val();
                obj.preferred = $('#preferred').val();
                $.ajax({
                    url: 'index.php?r=property/savecomamaneties',
                    async: false,
                    data: obj,
                    type: 'POST',
                    success: function (data) {
                        alertify.alert("Amaneties Saved !!", function () {
                        });
                    }
                });
            });

}


function saveOffice() {

    alertify.confirm("Are you sure you want to save this Office property?",
            function () {
                var obj = new Object();
                obj.comprojectid = $('#comprojectid').val();
                obj.yearofconstruct = $('#offyearofconstruct').val();
                obj.yearofposition = $('#offyearofposition').val();
                obj.age = $('#offage').val();
                obj.furnishingid = $('#furnishingid').val();
                obj.preferredid = $('#preferredid').val();
                obj.totalfloor = $('#offtotalfloor').val();
                obj.floorno = $('#floornooffice').val();
                obj.commercialprojtypeid = $('#commercialprojtypeid').val();
                obj.officetotalsqfeet = $('#officetotalsqfeet').val();
                obj.costpersqfeet = $('#offcostpersqfeet').val();
                obj.othercharges = $('#offothercharges').val();
                $.ajax({
                    url: 'index.php?r=property/savecomprojetoffice',
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

function saveProject() {
    alertify.confirm("Are you sure you want to save the Project ?",
            function () {
                var obj = new Object();
                obj.comprojectid = $('#comprojectid').val();
                obj.yearofconstruct = $('#yearofconstruct').val();
                obj.yearofposition = $('#yearofposition').val();
                obj.age = $('#age').val();
                obj.totalfloor = $('#totalfloor').val();
                obj.floorno = $('#floorno').val();
                obj.commercialprojtypeid = $('#commercialprojtypeid').val();
                obj.totalsqfeet = $('#totalsqfeet').val();
                obj.costpersqfeet = $('#costpersqfeet').val();
                obj.othercharges = $('#othercharges').val();
                obj.comments = $('#comments').val();
                $.ajax({
                    url: 'index.php?r=property/savecomprojectproject',
                    async: false,
                    data: obj,
                    type: 'POST',
                    success: function (data) {
                        alertify.alert("Project Saved !!", function () {
                        });
                    }
                });
            });

}

function saveComprojectowner() {
    var obj = new Object();
    obj.builderid = $('#builderid').val();
    obj.comprojectid = $('#comprojectid').val();
    $.ajax({
        url: 'index.php?r=property/savecomprojectowner',
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

function saveResprojectproperty() {
    var obj = new Object();
    obj.comprojectid = $('#comprojectid').val();
    obj.name = $('#name').val();
    obj.agentname = $('#agentname').val();
    obj.contactperson = $('#contactperson').val();
    obj.contactno = $('#contactno').val();
    obj.ewnsc = $('#ewnsc').val();
    obj.landmark = $('#landmark').val();
    obj.location = $('#location').val();
    obj.sublocation = $('#sublocation').val();
    obj.city = $('#city').val();
    obj.state = $('#state').val();
    obj.pincode = $('#pincode').val();
    obj.latlong = $('#latlong').val();
    obj.status = $('#status').val();
    obj.videolink = $('#videolink').val();

    alertify.confirm("Are you sure you want to Update this property?",
            function () {


                $.ajax({
                    url: 'index.php?r=property/savecomprojectproperty',
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
