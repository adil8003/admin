
$(document).ready(function () {
    var crmid = $('#crm_id').val();

   
}); // end document.ready

 $(function () {
        $('#datetimes').daterangepicker({
//            timePicker: true,
//          startDate: moment().format('hours'),
//            startDate: moment().startOf('date'),
//             startDate: moment().startOf('hour'),
//    endDate: moment().startOf('hour').add(32, 'hour'),
            locale: {
                format: 'M/DD hh:mm A'
            }
        });
    });