$(document).ready(function () {
    getFollowbycustomerdetaisbyid();
    var crmid = $('#crm_id').val();
    new nicEditor({fullPanel: true}).panelInstance('mailEditorText');
    $('#updateForm').hide();
}); // end document.ready
function getFollowbycustomerdetaisbyid() {
    var crmid = $('#crm_id').val();
    var obj = new Object();
    obj.id = crmid;
    $.ajax({
        url: "index.php?r=crm/getcustomerdetailsbyid",
        async: false,
        data: obj,
        type: 'GET',
        success: function (data) {
            var data = JSON.parse(data);
            console.log(data);
            if (data.status == true) {
                $('#mailto').val(data.data.cemail);
                createHTML(data);

            }
        }
    });
}
function createHTML(data) {
    var html = '';
    html += '<div class="card " style="min-height: 240px;">';
    html += '<div class="alert alert-info text-info">';
    html += '<strong> Customer Name:   <a href="index.php?r=crm/edit&amp;id=' + data.data.id + '">    ' + data.data.cname + ' </a></strong>';
    html += '</div>';
    html += '<p class=" text-danger" style="font-size: 13px;padding:2px">Phone no.:- ' + data.data.cphone + '</p>';
    html += '<p class=" text-danger" style="font-size: 13px;padding:2px"> Property type:- ' + data.data.ptype + '</p>';
    html += '<p class=" text-danger" style="font-size: 13px;padding:2px">Buy/Rent/REsale:-  ' + data.data.btype + '</p>';
    html += '<p class=" text-danger" style="font-size: 13px;padding:2px"> Detals of property:-  ' + data.data.detailsofproperty + '</p>';
    html += '<p class=" text-danger" style="font-size: 13px;padding:2px">Status:-  ' + data.data.finalstatus + '</p>';
    html += '</div>';
    $('#customerDetails').html(html);
}
function sendMail() {
    var nicE = new nicEditors.findEditor('mailEditorText');
    var obj = new Object();
    obj.to = $('#mailto').val();
    obj.from = $('#from').val();
    obj.message = nicE.getContent();
    $.ajax({
        url: "index.php?r=crm/mailsend",
        async: false,
        data: obj,
        type: 'POST',
        success: function (data) {
//            var data = JSON.parse(data);
            if (data.status == true) {
                console.log('mail send');
            }
        }
    });
}