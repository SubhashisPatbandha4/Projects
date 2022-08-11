
<?php
session_start();
include "classes/autoload.php";
//posting starts from here
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $question = new Question();
    $id = $_SESSION['admin_userid'];
  
    $result = $question->create_question($id, $_POST);

    if($result==""){
        header("Location:main_page_question.php");
        die;
    }
   

   
   
}



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin MMO</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="CSS/main_body_nav.css">
    <link rel="stylesheet" href="CSS/main_body_func.css">
    <link rel="stylesheet" href="CSS/main_question.css">
</head>
<body>

<?php
        include "nav.php";
        ?>


    <div class="question_head">
        Ask Question
    </div>

    <div class="mmo_adminquestion">
        <form method="post">
        <textarea name="question"  cols="100" rows="1" placeholder="     Ask the Community"></textarea>
        <button class="question_post">Post</button>

        </form>
    </div>