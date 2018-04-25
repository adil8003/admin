function add_feedback() {
    var flag = true;
    var name = $('#name').val();
    var email = $('#email').val();
   var phone = $('#phone').val();
    var message = $('#message').val();
    var reg = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

    if (name == '') {
        $('#err-name').html(' Please Enter Name');
        flag = false;
    }
    if ((name.trim().length) == 0) {
        $('#err-name').html(' Please Enter Name');
        flag = false;
    } else {
        $('#err-name').html('');
    }
    if (email == '') {
        $('#err-email').html('Please Enter Email ID');
        flag = false;
    } else {
        $('#err-email').html('');
        if (!reg.test(email)) {
            $('#err-email').html('Please Enter valid Email Address ');
            flag = false;
        }
    }
    if (phone == '') {
        $('#err-phone').html('Please Enter Mob No.');
        flag = false;
    } else {
        $('#err-phone').html('');
        if (((phone.length) > 10) || ((phone.length) < 10)) {
            $('#err-phone').html('Please Enter 10 Digit Mobile Number Only');
            flag = false;
        }
        if (isNaN(phone)) {
            $('#err-phone').html('Mobile No. Must Be Numerical');
            flag = false;
        }
    }
    if (message == '') {
        $('#err-message').html(' Please Enter Message');
        flag = false;
    } else {
        $('#err-message').html('');
    }

    return flag;

}