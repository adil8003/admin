$(document).ready(function () {
    var course_id = $('#course_id').val();

    var $fbEditor = document.getElementById('fb-editor');
    var formBuilder = $($fbEditor).formBuilder();
    document.addEventListener('fieldAdded', function () {
        alert(formBuilder.formData);
    });
//    var $fbEditor = $(document.getElementById('fb-editor')),
//            $formContainer = $(document.getElementById('fb-rendered-form')),
//            fbOptions = {
//                onSave: function () {
//                    $fbEditor.toggle();
//                    $formContainer.toggle();
//                    $('form', $formContainer).formRender({
//                        formData: formBuilder.formData
//                    });
//                }
//            },
//    formBuilder = $fbEditor.formBuilder(fbOptions);
//
//    $('.edit-form', $formContainer).click(function () {
//        $fbEditor.toggle();
//        $formContainer.toggle();
//    });
    document.getElementById('getData').addEventListener('click', function () {
        alert(formBuilder.actions.getData('json'));
    });
});

$('#fb-rendered-form').formRender(
        {
            formData: questionsJSON, // This is data you stored in database when you build the form
            dataType: 'json'
        }
);
$('#my-form').on('submit', function (e) {
    e.preventDefault();
// Collect form data
    var formData = $(this).serialize();
// Send data to server
    $.post('save-form.php', formData)
            .done(function (response) {
                console.log('form saved')
            }).fail(function (jqXHR) {
        console.log('form was not saved')
    });
    // Prevent form submission
    return false;
});














//function saveForm($formContainer) {
//     
//    $('form', $formContainer).formRender({
//        formData: formBuilder.formData
//    });
//    formBuilder = $fbEditor.formBuilder(fbOptions);
//    alert($formContainer);
//
//}
//var fb = $('#fb-editor').formBuilder();
//
//// Post the data to a script which will save it to your db
//$('#saveForm').on('click', function () {
//
//    $.ajax({
//        url: "index.php?r=course/saveform",
//        type: 'POST',
//        data: {
//            formStructure: JSON.stringify(fb.actions.getData('json'))
//        },
//        success: function (response) {
//
//            // Got a response
//            console.log('Response from the save action: ' + response);
//
//        },
//        error: function (jqXHR) {
//
//            // Something went wrong
//            console.log('Error saving the form (details below)');
//            console.log(jqXHR);
//
//        }
//
//    });
//
//});