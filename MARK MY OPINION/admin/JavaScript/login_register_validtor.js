

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