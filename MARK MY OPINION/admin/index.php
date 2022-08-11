
<?php

session_start();

include "classes/autoload.php";
//-------------------checking for user is logged in or not

// --------

if ($_SERVER['REQUEST_METHOD'] == 'POST') {



    if (count($_POST) == 2 || count($_POST) == 3) {

        $login = new Login();
        $result = $login->evaluate($_POST);

        if ($result == "SUCCESS") {
            header("Location:main_page.php");
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
    <title>ADMIN</title>

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

      
        <button class="sign" id="signin" onclick="cleartext2(), toggle()">Log In</button>

    </div>

    <div class="popup">

        <div class="close_button">&times;</div>
        <form method="post" >
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

  
        <script>

            document.querySelector("#signin").addEventListener("click", function(){
                console.log(1);
                let popup = document.querySelector(".popup");
                console.log(popup);
                document.querySelector(".popup").classList.add("active");
                document.querySelector(".popup-register").classList.remove("active");
            });

          


            document.querySelector(".popup .close_button").addEventListener("click", function(){
                document.querySelector(".popup").classList.remove("active");
            });

          

            function toggle()
            {
                let blur= document.getElementById('blur');
                blur.classList.toggle('active');
            }


        </script>
        <script src="JavaScript/login_register_validtor.js"></script>

    </div>
</body>

</html>