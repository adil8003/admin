$(document).ready(function () {
    $('#resproject a:first').tab('show');
    $('#tblresproject').DataTable();

//        $('#Viewproject .form-control').bind('blur', function() {
//            validateProject();
}); // end document.ready

function saveProfile() {
}
function resetProfile() {
}

function saveResprojectproperty() {

    alertify.confirm("Are you sure you want to Update this project ?",
            function () {
                var obj = new Object();
                obj.resprojectid = $('#resprojectid').val();
                obj.name = $('#name').val();
                obj.location = $('#location').val();
                obj.city = $('#city').val();
                obj.state = $('#state').val();
                obj.pincode = $('#pincode').val();
                obj.latlong = $('#latlong').val();
                obj.status = $('#status').val();
                $.ajax({
                    url: 'index.php?r=property/saveupdateresprojectproperty',
                    async: false,
                    data: obj,
                    type: 'POST',
                    success: function (data) {
                        alertify.alert("Project Saved Succesfully !!", function () {
                        });
                    }
                });
            });
}


function saveResprojectowner() {
    var obj = new Object();
    obj.builderid = $('#builderid').val();
    obj.resprojectid = $('#resprojectid').val();
    $.ajax({
        url: 'index.php?r=property/saveresprojectowner',
        async: false,
        data: obj,
        type: 'POST',
        success: function (data) {
            alertify.alert("Owner Saved Succesfully !!", function () {
            });
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


function saveGeolocation() {
    alertify.confirm("Are you sure you want to save Location ?",
            function () {
                var obj = new Object();
                obj.resprojectid = $('#resprojectid').val();
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
                    url: 'index.php?r=property/saveresprojectgeolocation',
                    async: false,
                    data: obj,
                    type: 'POST',
                    success: function (data) {
                        alertify.alert("Location Saved Succesfully !!", function () {
                        });
                    }
                });
            });
}

function saveAmaneties() {

    alertify.confirm("Are you sure you want to save Amaneties ?",
            function () {
                var obj = new Object();
                obj.resprojectid = $('#resprojectid').val();
                obj.swimingpool = $('#swimingpool').val();
                obj.garden = $('#garden').val();
                obj.gym = $('#gym').val();
                obj.temple = $('#temple').val();
                obj.clubhouse = $('#clubhouse').val();
                obj.solarsystem = $('#solarsystem').val();
                obj.securitydoor = $('#securitydoor').val();
                $.ajax({
                    url: 'index.php?r=property/saveresprojectamaneties',
                    async: false,
                    data: obj,
                    type: 'POST',
                    success: function (data) {
                        alertify.alert("Amaneties Saved Succesfully !!", function () {
                        });
                    }
                });
            });
}


function saveMicrosite() {

    alertify.confirm("Are you sure you want to save Microsite ?",
            function () {
                var obj = new Object();
                obj.resprojectid = $('#resprojectid').val();
                // obj.resprojectmicrositedetailsid = $('#resprojectmicrositedetailsid').val();
                obj.featuresheading1 = $('#featuresheading1').val();
                obj.featuresheading2 = $('#featuresheading2').val();
                obj.featuresheading3 = $('#featuresheading3').val();
                obj.featuresheading4 = $('#featuresheading4').val();
                obj.heading1details = $('#heading1details').val();
                obj.heading2details = $('#heading2details').val();
                obj.heading3details = $('#heading3details').val();
                obj.heading4details = $('#heading4details').val();
                obj.aboutuscontent = $('#aboutuscontent').val();
// alert(obj.featuresheading1);

                $.ajax({
                    url: 'index.php?r=property/saveresprojectmicrosite',
                    async: false,
                    data: obj,
                    type: 'POST',
                    success: function (data) {
                        alertify.alert("Microsite Saved Succesfully !!", function () {
                        });
                    }
                });
            });
}


function saveTypeofproperty() {

    alertify.confirm("Are you sure you want to save Property?",
            function () {


                var obj = new Object();
                obj.resprojectid = $('#resprojectid').val();
                obj.rkflat = $('#rkflat').val();
                obj.onebhk = $('#onebhk').val();
                obj.twobhk = $('#twobhk').val();
                obj.tp5bhk = $('#tp5bhk').val();
                obj.threebhk = $('#threebhk').val();
                obj.typeofvilla = $('#typeofvilla').val();
                obj.rowhose = $('#rowhose').val();
                $.ajax({
                    url: 'index.php?r=property/saveresprojecttypeproperty',
                    async: false,
                    data: obj,
                    type: 'POST',
                    success: function (data) {
                        alertify.alert("Property Saved Succesfully !!", function () {
                        });
                    }
                });
            });
}


function saveProject() {

    alertify.confirm("Are you sure you want to save Project ?",
            function () {

                var obj = new Object();
                obj.resprojectid = $('#resprojectid').val();
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
                    url: 'index.php?r=property/saveupdateresproject',
                    async: false,
                    data: obj,
                    type: 'POST',
                    success: function (data) {
                        alertify.alert("Project Saved Succesfully !!", function () {
                        });
                    }
                });

            });

}

function saveCost() {
    alertify.confirm("Are you sure you want to save Cost ?",
            function () {
                var obj = new Object();
                obj.resprojectid = $('#resprojectid').val();
                obj.persquarefeet = $('#persquarefeet').val();
                obj.othercharges = $('#othercharges').val();
                obj.totalcharges = $('#totalcharges').val();

                $.ajax({
                    url: 'index.php?r=property/saveresprojectcost',
                    async: false,
                    data: obj,
                    type: 'POST',
                    success: function (data) {
                        alertify.alert("Cost Saved Succesfully !!", function () {
                        });
                    }
                });
            });
}

