<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin MMO</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="CSS/main_body_nav.css">
    <link rel="stylesheet" href="CSS/main_body_func.css">
    <link rel="stylesheet" href="CSS/main_report.css">

    <style>
        #b1{
            position: relative;
            top:2em;
            left: 5em;
        }

        #b2{
            top: 2em;
            left: 8em;
        }

        #b3{
            top: 8em;
            left: -12em;
        }
    </style>
</head>

<body>

    <?php include "nav.php";?>

    <div class="question_head">
        Review Reports
    </div>

    <main class="admin_func container">

        <div class="func_btn">
        
        <button onclick="document.location='main_page_report_answer.php'" id="b1" class="question ">Answer Review</button>
        <button onclick="document.location='main_page_report_blog.php'" id="b2" class="blog ">Blog Review</button>
        <button onclick="document.location='main_page_report_blog_comment.php'" id="b3" class=" report">Blog Comment Review</button>
        <!-- <button onclick="document.location='main_page_issue.html'" class="issue">Review Issues</button> -->
    </div>
    </main>