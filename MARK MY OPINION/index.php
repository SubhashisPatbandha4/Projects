
<?php

session_start();

include "classes/autoload.php";
//-------------------checking for user is logged in or not

if (isset($_SESSION['myopinion_userid']) && is_numeric($_SESSION['myopinion_userid'])) {

    $id = $_SESSION['myopinion_userid'];

    $login = new Login();
    $result = $login->check_login($id);

    // var_dump($result);

    if ($result) { //retrive user data;
      
        $user = new User();
        $user_data = $user->get_data($id);

        if (!$user_data) {
            header("Location: index.php");
            die;
        } else {
            header("Location: timeline-question.php");
            die;
        }

    } else {
        header("Location:index.php");
        die;
    }
} else if($_SESSION['myopinion_userid']="") { //in case of session id is noy auhenticate it redirected to login
    header("Location:index.php");
    die;
}
// --------

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // print_r($_POST);

    if (count($_POST) == 6) {
        $signup = new Signup();
        $result = $signup->create_user($_POST);

        if ($result) {
           $email= $_POST['email'];
            $query="select userid from users where email='$email' limit 1 ";
            $DB=new Database();
            $result=$DB->read($query);
        
            $_SESSION['myopinion_userid']=$result[0]['userid'];
            header('Location:timeline-question.php');
            die;
        } else {
            ?>
            <script>
                    alert('Mobile number or Email id is already used. Try with different one');
            </script>
        <?php
}

    }

    if (count($_POST) == 2 || count($_POST) == 3) {

        $login = new Login();
        $result = $login->evaluate($_POST);

        if ($result == "SUCCESS") {
            header("Location:timeline-question.php");
            die;

        } else {

            ?>
        <script>
        alert("Email or Password doesn't match");
        </script>
        <?php

        }

    }

}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mark My Opinion</title>

    <link rel = "icon" href = "imgs_project/login_register_img/logo06.png" type = "image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Koulen&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="CSS/login_register_style.css">
</head>

<body >

    <div class="logo">
        <img class="logo-1" src="imgs_project/login_register_img/logo10.png" alt="">
        <img class="logo-2" src="imgs_project/login_register_img/logo11.png" alt="">
    </div>

    <div class="typewriter">
        <h1>Your Opinion deserves a place to live.</h1>
    </div>
<br>
    <div class="buttons">

        <button class="sign" id="signup" onclick="cleartext() , toggle()">Sign Up</button>
        <button class="sign" id="signin" onclick="cleartext2(), toggle()">Log In</button>

    </div>

    <div class="popup">

        <div class="close_button">&times;</div>
        <form method="post" onsubmit=" return login_validate()">
            <div class="form">

                <h2>Log In</h2>

                <div class="form_element">
                    <label for="log-email" class="form-label">Email</label>
                    <input type="email" name="log-email" id="log-email" placeholder="Enter email">
                    <label id="log_email_error" class="form-label text-danger"></label>
                </div>

                <div class="form_element">
                    <label for="log-password" class="form-label">Password</label>
                    <input type="password" name="log-password" id="log-password" placeholder="Enter password">
                    <label id="log_password_error" class="form-label text-danger"></label>
                </div>

                <!-- <div class="form_element">
                    <input type="checkbox" name="rem" id="rem">
                    <label for="rem">Remember me?</label>
                </div> -->

                <div class="form_element">
                    <button>Log In</button>
                </div>

                <!-- <div class="form_element">
                    <a href="kucbhi">Forgot Password?</a>
                </div> -->

            </div>
        </form>


    </div>

    <div class="popup-register">
        <div class="close_button">&times;</div>

        <form action="index.php" method="post" onsubmit=" return validate_user()">

            <div class="form">

                <h2>Sign Up</h2>

                <div class="form_element">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" id="name" placeholder="Enter name">
                    <label id="name_error" class="form-label text-danger"></label>

                </div>

                <div class="form_element">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" id="email" placeholder="Enter email">
                    <label id="email_error" class="form-label text-danger"></label>

                </div>

                <div class="form_element">
                    <label for="number" class="form-label">Phone Number</label>
                    <input type="number" name="number" id="number" placeholder="Enter phone number">
                    <label id="mobile_error" class="form-label text-danger"></label>

                </div>

                <!-- <div class="form_element">
                    <label for="date" class="form-label">Date of Birth</label>
                    <input type="date" name="date" id="date" placeholder="Enter Birth Date">
                    <label id="date_error" class="form-label text-danger"></label>

                </div> -->

                <div class="form_element">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" id="password" placeholder="Enter password">
                    <label id="password_error" class="form-label text-danger"></label>

                </div>

                <div class="form_element">
                    <label for="c-password">Confirm Password</label>
                    <input type="password" name="c-password" id="c-password" placeholder="Enter password again">
                    <label id="password2_error" class="form-label text-danger"></label>
                </div>

                <div class="form_element">
                    <button name="register">Sign Up!</button>
                </div>

            </div>
        </form>

        <script>

            document.querySelector("#signin").addEventListener("click", function(){
                console.log(1);
                let popup = document.querySelector(".popup");
                console.log(popup);
                // document.querySelector(".popup").visibility = 'visible';
                document.querySelector(".popup").classList.add("active");
                document.querySelector(".popup-register").classList.remove("active");
            });

            document.querySelector("#signup").addEventListener("click", function(){
                document.querySelector(".popup-register").classList.add("active");
                document.getElementsByTagName("body").style.filter= "blur(3px)";
                document.querySelector(".popup").classList.remove("active");
            });

            // document.querySelector("#signup").addEventListener("click", pop);

            document.querySelector(".popup .close_button").addEventListener("click", function(){
                document.querySelector(".popup").classList.remove("active");
            });

            document.querySelector(".popup-register .close_button").addEventListener("click", function(){
                document.querySelector(".popup-register").classList.remove("active");
            });

            function toggle()
            {
                let blur= document.getElementById('blur');
                blur.classList.toggle('active');
            }
            // document.getElementById("signup").onclick = pop;
            // function pop()
            // {
            //     document.querySelector(".popup").classList.add("active");
            // }

        </script>
        <script src="JavaScript/login_register_validtor.js"></script>

    </div>
</body>

</html>