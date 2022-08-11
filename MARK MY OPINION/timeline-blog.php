
<?php

session_start();
include "classes/autoload.php";
//-------------------checking for user is logged in or not
$login = new Login();
$user_data = $login->check_login($_SESSION['myopinion_userid']);

//------------------------------------search--------------------------------

if(isset($_GET['find-blog'])){
    
  $findB=addslashes($_GET['find-blog']);
  $sql="select *  from blogs where blog_heading like '%$findB%' order by blogid desc ";
  $DB =new Database();
  $result_blog=$DB->read($sql);
  
  
  }
  else{
      // ------------------------------------------display blogs
$DB=new Database();
$query ="select * from blogs order by blogid desc";
$result_blog=$DB->read($query);

  
  }



//posting starts from here
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // print_r($_POST);// --------------------------------------------------------------------------comment
    $blog = new Blog();
    $id = $_SESSION['myopinion_userid'];
    $result = $blog->create_blog($id, $_POST);

    if($result==""){
        header("Location:timeline-blog.php");
        die;
    }
   
}

// print_r($result_blog);
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
    <link rel="stylesheet" href="CSS/main_page_user_issue_blog.css">


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
  
    include("header-blog.php");
    
    include("main_page_blog.php");
  
  ?>
</body>
</html>