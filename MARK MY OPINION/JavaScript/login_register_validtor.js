function cleartext(){
    document.getElementById('name_error').innerHTML=" ";
    document.getElementById('email_error').innerHTML=" ";
    document.getElementById('mobile_error').innerHTML=" ";
    document.getElementById('password_error').innerHTML=" ";
    document.getElementById('password2_error').innerHTML=" ";

    document.getElementById('name').value="";
    document.getElementsByName('name')[0].placeholder = 'Enter name';
    document.getElementById('email').value="";
    document.getElementsByName('email')[0].placeholder = 'Enter email';
    document.getElementById('number').value="";
    document.getElementsByName('number')[0].placeholder = 'Enter phone number';
    document.getElementById('password').value="";
    document.getElementsByName('password')[0].placeholder = 'Enter password';
    document.getElementById('c-password').value="";
    document.getElementsByName('c-password')[0].placeholder = 'Enter password again';

}

function cleartext2(){
    document.getElementById('log_email_error').innerHTML=" ";
    document.getElementById('log_password_error').innerHTML=" ";
    document.getElementById('log-email').innerHTML=" ";
    document.getElementById('log-password').innerHTML=" ";

    document.getElementById('log-email').value="";
    document.getElementsByName('log-email')[0].placeholder = 'Enter email';
    document.getElementById('log-password').value="";
    document.getElementsByName('log-password')[0].placeholder = 'Enter password';
}
function validate_user(){
    var name = document.getElementById('name').value;
    var mobile = document.getElementById('number').value;
    var email = document.getElementById('email').value;
    // var date = document.getElementById('date').value;
    var password = document.getElementById('password').value;
    var password2 = document.getElementById('c-password').value;

    document.getElementById('name_error').innerHTML = '';

    //console.log(name+' '+mobile+' '+email+' '+password+' '+password2);

    var error = false;

    if(name == '' || name==null){
        document.getElementById('name_error').innerHTML = 'Name is required';
        // alert('name is required');
        error = true;
    } else {
        document.getElementById('name_error').innerHTML = '';
        error = false;
    }

    var dotpos = email.lastIndexOf('.');
    var atpos = email.indexOf('@');
    if(email == '' || email==null){
        document.getElementById('email_error').innerHTML = 'Email is required';
        error = true;
    } else if(atpos <= 1 || dotpos<=4 || dotpos - atpos < 3){
        document.getElementById('email_error').innerHTML = 'Please enter a valid email address';
        error = true;
    } else {
        document.getElementById('email_error').innerHTML = '';
        error = false;
    }

    if(mobile == '' || mobile==null){
        document.getElementById('mobile_error').innerHTML = 'Mobile is required';
        error = true;
    } else if(mobile.length != 10 || isNaN(mobile)){
        document.getElementById('mobile_error').innerHTML = 'Please enter a 10 digit valid mobile number';
        error = true;
    }else {
        document.getElementById('mobile_error').innerHTML = '';
        error = false;
    }

    if(password == '' || password==null){
        document.getElementById('password_error').innerHTML = 'Password is required';
        error = true;
    } else if(password.length <6 || password.length >15){
        document.getElementById('password_error').innerHTML = 'Password shoud be 6 - 15 character long';
        error = true;
    }else {
        document.getElementById('password_error').innerHTML = '';
        error = false;
    }

    if(password2 == '' || password2==null){
        document.getElementById('password2_error').innerHTML = 'Confirm Password is required';
        error = true;
    } else if(password != password2){
        document.getElementById('password2_error').innerHTML = 'Password and Confirm Password must be same';
        error = true;
    }
        else if(password.length <6 || password.length >15){
            document.getElementById('password_error').innerHTML = 'Password shoud be 6 - 15 character long';
            error = true;
    } else {
        document.getElementById('password2_error').innerHTML = '';
        error = false;
    }

    if(error)
        return false;
    else
        return true;
}


function login_validate(){
    var email = document.getElementById('log-email').value;
    var password = document.getElementById('log-password').value;

    var error = false;

    //alert("login alert");

    var dotpos = email.lastIndexOf('.');
    var atpos = email.indexOf('@');
    if(email == '' || email==null){
        document.getElementById('log_email_error').innerHTML = 'Email is required';
        error = true;
    } else if(atpos <= 1 || dotpos<=4 || dotpos - atpos < 3){
        document.getElementById('log_email_error').innerHTML = 'Please enter a valid email address';
        error = true;
    } else {
        document.getElementById('log_email_error').innerHTML = '';
        error = false;
    }

    if(password == '' || password==null){
        document.getElementById('log_password_error').innerHTML = 'Password is required';
        error = true;
    } else if(password.length <6 || password.length >15){
        document.getElementById('log_password_error').innerHTML = 'Password shoud be 6 - 15 character long';
        error = true;
    }else {
        document.getElementById('log_password_error').innerHTML = '';
        error = false;
    }
    
    if(error)
        return false;
    else
        return true;
}