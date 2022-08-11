
<?php

session_start();

include "classes/autoload.php";

//-------------------checking for user is logged in or not
$login = new Login();
$user_data = $login->check_login($_SESSION['myopinion_userid']);

//------------------------------------search--------------------------------

if(isset($_GET['find-question'])){
    
  $findQ=addslashes($_GET['find-question']);
  $sql="select *  from question where post like '%$findQ%' order by postid desc ";
  $DB =new Database();
  $result_question=$DB->read($sql);
  
  
  }
  else{
      // ------------------------------------------display questions
  $DB=new Database();
  $query ="select * from question order by postid desc";
  $result_question=$DB->read($query);
  
  }


//posting starts from here
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // print_r($_POST);// --------------------------------------------------------------------------comment
    $question = new Question();
    $id = $_SESSION['myopinion_userid'];
    $result = $question->create_question($id, $_POST);

    if($result==""){
        header("Location:timeline-question.php");
        die;
    }
   
}

?>
<!-- css -->
<link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,700;1,100;1,300;1,400&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

    <link rel="stylesheet" href="CSS/main_page_scrollbar.css">
    <link rel="stylesheet" href="CSS/main_page_nav.css">
    <link rel="stylesheet" href="css/main_page_body.css">
    <link rel="stylesheet" href="CSS/main_page_user_issue_qna.css">


 
   
    <link rel="stylesheet" href="css/report-issue.css">


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>mark-my-poinion</title>
</head>
<body>
  <?php
  
    include("header.php");
    
    include("main_page_qna.php");


  ?>
  <script>
        function toggle_blur2() {
            let blur = document.getElementById('mmo_body_blur');
            blur.classList.toggle('active');

            let show = document.getElementById('user_issue');
            show.classList.toggle('active');
        }
    </script>
</body>
</html>