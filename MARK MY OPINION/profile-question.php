<?php

session_start();

include "classes/autoload.php";

//-------------------checking for user is logged in or not
$login = new Login();
$user_data = $login->check_login($_SESSION['myopinion_userid']);

//-----------------------profile section
$profile = new Profile();
if (isset($_GET['id'])&& is_numeric($_GET['id'])) {
    $profile_data = $profile->get_profile($_GET['id']);
    if (is_array($profile_data)) {

      $user_data = $profile_data[0];
  }
  

  }
  else {

    $_GET['id']=$_SESSION['myopinion_userid'];
    $profile_data = $profile->get_profile($_GET['id']);
    if (is_array($profile_data)) {

      $user_data = $profile_data[0];
  }
  

  }

// print_r($user_data);
//read questions of the logged-in user-------------------------------------------------------
$question = new Question();
$id = $user_data['userid'];
$result_question = $question->get_question($id);

//checking image
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // print_r($_FILES);
    if (isset($_FILES['file']['name']) && $_FILES['file']['name'] != "") {

        if ($_FILES['file']['type'] == "image/jpeg") {
            $filename = "uploads/" . $_FILES['file']['name'];

            // move_uploaded_file(filename,destination);
            move_uploaded_file($_FILES['file']['tmp_name'], $filename);
            if (file_exists($filename)) {
                $userid = $user_data['userid'];
                // echo $userid;
                $query = "update users set profile_image ='$filename' where userid='$userid' ";
                $DB = new Database();
                $result = $DB->save($query);
                if ($result) {
                    header("Location:profile-question.php");
                }
            }
        }
    }
}

// print_r($user_data);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>profile page</title>
  </head>
  <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,700;1,100;1,300;1,400&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

    <link rel="stylesheet" href="CSS/main_page_scrollbar.css">
    <link rel="stylesheet" href="CSS/main_page_nav.css">
    <link rel="stylesheet" href="css/main_page_body.css">
    <link rel="stylesheet" href="css/profile-question.css">
    <link rel="stylesheet" href="css/change_image.css">
    <link rel="stylesheet" href="CSS/main_page_user_issue_qna.css">

  <body>
    <!-- top bar -->

    <?php include "header-profile.php"?>

<!-- mainpage profile -->

<!-- checking for image is set or not -->
<div id="profile-section"  >
<?php
if (file_exists($user_data['profile_image'])) {
    $image = $user_data['profile_image'];
    ?> <img src="<?php echo $image; ?>" id="profile-pic" alt=""><?php
} else {
    $image = "uploads/default.png";
    ?> <img src="<?php echo $image; ?>" id="profile-pic" alt=""><?php
}
?>





  <br> <div style="margin-top:10px;margin-left:-40px;background-color:transparent;text-align: center;color:blue;font-weight: bolder ;">
  <?php echo $user_data['username']; ?></div>
<br>

<!-- change image -->
<?php
if ($_GET['id']==$_SESSION['myopinion_userid'])
{

?>
<form method="post" enctype="multipart/form-data" > <!-- multipart/form-data is use to post file data-->
 <div id="change-image" font-family:tohma;color:white;background-color:blue >Change Image</div>

</form>
<?php

}
?>
<!-- popop chane image  -->
<div class="popup-container">

<div class="popup">

        <div class="close_button">&times;</div>
         <form method="post" enctype="multipart/form-data">
            <div class="form">

                <h2>change image</h2>

                <input style="font-size:16px;height:30px;" type="file" name="file"><br>
                <input style="color:white;background-color:blue;height:40px;border-radius:4px;" type="submit" value="Upload">
                <div id="error-change-image" style="color:red;"></div>


            </div>
         </form>


        </div>
</div>





  <br />
  <br><br><br><br><br><br>
      <div
        style="

          text-align: center;
          margin-top: -50px;

          color: whitesmoke;
            font-family: cursive;
        "
      >


      </div>

</div>

<div id="usercontent">
  <br><br>
  <?php

include "main_page_qna_profile.php";

?>
</div>
<script>

            document.querySelector("#change-image").addEventListener("click", function(){
                console.log(1);
                let popup = document.querySelector(".popup");
                console.log(popup);
                // document.querySelector(".popup").visibility = 'visible';
                document.querySelector(".popup").classList.add("active");

              });
              document.querySelector(".popup .close_button").addEventListener("click", function(){
                document.querySelector(".popup").classList.remove("active");
            });
</script>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js"
        integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2"
        crossorigin="anonymous"></script>
  </body>
</html>
